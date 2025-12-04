{{-- Componente del módulo: Exámenes y Evaluación --}}
@php
    $config = config('sidebar.exams');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])

