{{-- Componente del módulo: Admisión y Estudiantes --}}
@php
    $config = config('sidebar.admission');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

