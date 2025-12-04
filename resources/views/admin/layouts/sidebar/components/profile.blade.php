{{-- Componente del módulo: Perfil --}}
@php
    $config = config('sidebar.profile');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

