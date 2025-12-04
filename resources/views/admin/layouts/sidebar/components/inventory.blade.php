{{-- Componente del módulo: Inventario --}}
@php
    $config = config('sidebar.inventory');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

