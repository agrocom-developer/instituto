{{-- Componente del módulo: Residencia --}}
@php
    $config = config('sidebar.residence');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

