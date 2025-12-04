{{-- Componente del módulo: Sitio Web --}}
@php
    $config = config('sidebar.website');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

