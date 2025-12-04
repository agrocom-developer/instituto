{{-- Componente base para renderizar un item individual del menú --}}
@php
    // Determinar si el item está activo
    $isActive = false;
    
    // Verificar por ruta específica
    if (isset($item['route'])) {
        $isActive = Request::routeIs($item['route']) || Request::is($item['active_when'] ?? []);
    }
    
    // Verificar por patrón de ruta
    if (!$isActive && isset($item['route_pattern'])) {
        $isActive = Request::routeIs($item['route_pattern']);
    }
    
    // Verificar por rutas adicionales
    if (!$isActive && isset($item['active_when'])) {
        foreach ($item['active_when'] as $pattern) {
            if (Request::is($pattern) || Request::routeIs($pattern)) {
                $isActive = true;
                break;
            }
        }
    }
    
    // Verificar si tiene subitems activos
    if (!$isActive && isset($item['subitems'])) {
        foreach ($item['subitems'] as $subitem) {
            if (isset($subitem['route']) && Request::routeIs($subitem['route'])) {
                $isActive = true;
                break;
            }
        }
    }
    
    $hasSubitems = isset($item['subitems']) && count($item['subitems']) > 0;
    
    // Determinar el título traducido
    $title = $item['title'];
    if (is_string($title)) {
        // Casos con concatenación como 'module_student' . ' ' . 'list'
        if (preg_match("/'module_([^']+)'[^']*'list'/", $title, $matches)) {
            $moduleKey = 'module_' . $matches[1];
            $transCount = isset($item['trans_count']) ? $item['trans_count'] : 2;
            $title = trans_choice($moduleKey, $transCount) . ' ' . __('list');
        } elseif (strpos($title, 'module_') === 0) {
            // Clave de traducción simple
            $transCount = isset($item['trans_count']) ? $item['trans_count'] : 2;
            $title = trans_choice($title, $transCount);
        }
    }
@endphp

@canany($item['permissions'] ?? [])
    @if($hasSubitems)
        {{-- Item con subitems (menú desplegable) --}}
        <li class="nav-item pcoded-hasmenu {{ $isActive ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                @if(isset($item['icon']))
                    <span class="pcoded-micon"><i class="{{ $item['icon'] }}"></i></span>
                @endif
                <span class="pcoded-mtext">
                    {{ $title }}
                    @if(isset($item['badge']))
                        <span class="badge badge-{{ $item['badge_type'] ?? 'info' }} ml-2">{{ $item['badge'] }}</span>
                    @endif
                    @if(isset($item['highlight']))
                        <span class="badge badge-warning ml-2">⭐</span>
                    @endif
                </span>
            </a>
            <ul class="pcoded-submenu">
                @foreach($item['subitems'] as $subitemKey => $subitem)
                    @include('admin.layouts.sidebar.partials.nav-item', [
                        'item' => $subitem,
                        'level' => ($level ?? 1) + 1
                    ])
                @endforeach
            </ul>
        </li>
    @else
        {{-- Item simple (sin subitems) --}}
        <li class="{{ $isActive ? 'active' : '' }}">
            <a href="{{ isset($item['route']) ? route($item['route']) : '#' }}" class="">
                <span class="pcoded-mtext">
                    {{ $title }}
                    @if(isset($item['badge']))
                        <span class="badge badge-{{ $item['badge_type'] ?? 'info' }} ml-2">{{ $item['badge'] }}</span>
                    @endif
                    @if(isset($item['highlight']))
                        <span class="badge badge-warning ml-2">⭐</span>
                    @endif
                </span>
            </a>
        </li>
    @endif
@endcanany
