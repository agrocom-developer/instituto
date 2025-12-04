{{-- Componente del módulo: Recepción --}}
@php
    $config = config('sidebar.reception');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

