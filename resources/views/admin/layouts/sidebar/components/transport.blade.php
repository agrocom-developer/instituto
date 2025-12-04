{{-- Componente del módulo: Transporte --}}
@php
    $config = config('sidebar.transport');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

