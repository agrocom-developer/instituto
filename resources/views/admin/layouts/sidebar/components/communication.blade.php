{{-- Componente del módulo: Comunicación --}}
@php
    $config = config('sidebar.communication');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

