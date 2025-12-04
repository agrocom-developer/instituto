{{-- Componente para renderizar una sección principal del menú --}}
@php
    $config = $config ?? [];
    $isActive = false;
    
    // Verificar si alguna ruta de la sección está activa
    if (isset($config['route_pattern'])) {
        $isActive = Request::routeIs($config['route_pattern']);
    }
    
    // Verificar items y subitems
    if (!$isActive && isset($config['items'])) {
        foreach ($config['items'] as $item) {
            if (isset($item['route']) && Request::routeIs($item['route'])) {
                $isActive = true;
                break;
            }
            if (isset($item['route_pattern']) && Request::routeIs($item['route_pattern'])) {
                $isActive = true;
                break;
            }
            if (isset($item['subitems'])) {
                foreach ($item['subitems'] as $subitem) {
                    if (isset($subitem['route']) && Request::routeIs($subitem['route'])) {
                        $isActive = true;
                        break 2;
                    }
                }
            }
        }
    }
    
    // Recopilar todos los permisos de la sección
    $allPermissions = [];
    if (isset($config['items'])) {
        foreach ($config['items'] as $item) {
            if (isset($item['permissions'])) {
                $allPermissions = array_merge($allPermissions, $item['permissions']);
            }
            if (isset($item['subitems'])) {
                foreach ($item['subitems'] as $subitem) {
                    if (isset($subitem['permissions'])) {
                        $allPermissions = array_merge($allPermissions, $subitem['permissions']);
                    }
                }
            }
        }
    }
    $allPermissions = array_unique($allPermissions);
@endphp

@canany($allPermissions)
    <li class="nav-item pcoded-hasmenu {{ $isActive ? 'pcoded-trigger active' : '' }}">
        <a href="#!" class="nav-link">
            @if(isset($config['icon']))
                <span class="pcoded-micon"><i class="{{ $config['icon'] }}"></i></span>
            @endif
            <span class="pcoded-mtext">
                @if(strpos($config['title'], 'module_') === 0)
                    {{ trans_choice($config['title'], 2) }}
                @else
                    {{ $config['title'] }}
                @endif
            </span>
        </a>
        <ul class="pcoded-submenu">
            @if(isset($config['items']))
                @foreach($config['items'] as $itemKey => $item)
                    @include('admin.layouts.sidebar.partials.nav-item', [
                        'item' => $item,
                        'level' => 1
                    ])
                @endforeach
            @endif
        </ul>
    </li>
@endcanany

