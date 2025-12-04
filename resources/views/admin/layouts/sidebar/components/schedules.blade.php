{{-- Componente del módulo: Horarios --}}
@php
    $config = config('sidebar.schedules');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

