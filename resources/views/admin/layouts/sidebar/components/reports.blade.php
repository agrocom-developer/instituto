{{-- Componente del módulo: Reportes --}}
@php
    $config = config('sidebar.reports');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

