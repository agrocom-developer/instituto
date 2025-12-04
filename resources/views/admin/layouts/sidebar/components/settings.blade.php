{{-- Componente del módulo: Configuración --}}
@php
    $config = config('sidebar.settings');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

