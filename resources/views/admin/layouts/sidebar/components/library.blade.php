{{-- Componente del módulo: Biblioteca --}}
@php
    $config = config('sidebar.library');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

