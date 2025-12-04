{{-- Componente del módulo: Certificados --}}
@php
    $config = config('sidebar.certificates');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

