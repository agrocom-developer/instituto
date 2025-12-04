{{-- Componente del módulo: Finanzas --}}
@php
    $config = config('sidebar.finances');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

