{{-- Componente del módulo: Recursos Humanos --}}
@php
    $config = config('sidebar.human-resources');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

