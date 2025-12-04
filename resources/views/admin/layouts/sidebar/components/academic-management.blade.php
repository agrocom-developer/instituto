{{-- Componente del módulo: Gestión Académica --}}
@php
    $config = config('sidebar.academic-management');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

