<!-- Sidemenu -->
<div class="navbar-content scroll-div ps ps--active-y">
    <ul class="nav pcoded-inner-navbar">

        {{-- Dashboard --}}
        <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-home"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_dashboard', 1) }}</span>
            </a>
        </li>

        {{-- Módulos Modulares --}}
        @include('admin.layouts.sidebar.components.admission')
        @include('admin.layouts.sidebar.components.academic-management')

        {{-- Módulos pendientes de migración (mantener estructura actual temporalmente) --}}
        {{-- Horarios --}}
        @canany(['class-routine-create', 'class-routine-view', 'class-routine-print', 'exam-routine-create', 'exam-routine-view', 'exam-routine-print', 'class-routine-teacher', 'routine-setting-class', 'routine-setting-exam'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/routine*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="far fa-calendar-alt"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_routine', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @canany(['class-routine-create'])
                <li class="{{ Request::is('admin/routine/class-routine/create') ? 'active' : '' }}"><a href="{{ route('admin.class-routine.create') }}" class="">{{ trans_choice('module_manage_class', 2) }}</a></li>
                @endcanany

                @canany(['class-routine-view', 'class-routine-print'])
                <li class="{{ Request::is('admin/routine/class-routine') ? 'active' : '' }}"><a href="{{ route('admin.class-routine.index') }}" class="">{{ trans_choice('module_class_routine', 2) }}</a></li>
                @endcanany

                @canany(['exam-routine-create'])
                <li class="{{ Request::is('admin/routine/exam-routine/create') ? 'active' : '' }}"><a href="{{ route('admin.exam-routine.create') }}" class="">{{ trans_choice('module_manage_exam', 2) }}</a></li>
                @endcanany

                @canany(['exam-routine-view', 'exam-routine-print'])
                <li class="{{ Request::is('admin/routine/exam-routine') ? 'active' : '' }}"><a href="{{ route('admin.exam-routine.index') }}" class="">{{ trans_choice('module_exam_routine', 2) }}</a></li>
                @endcanany

                @can('class-routine-teacher')
                <li class="{{ Request::is('admin/routine/class-routine-teacher') ? 'active' : '' }}"><a href="{{ route('admin.class-routine.teacher') }}" class="">{{ trans_choice('module_teacher_routine', 2) }}</a></li>
                @endcan

                @canany(['routine-setting-class', 'routine-setting-exam'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/routine/routine-setting*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @can('routine-setting-class')
                        <li class="{{ Request::is('admin/routine/routine-setting/class*') ? 'active' : '' }}"><a href="{{ route('admin.routine-setting.class') }}" class="">{{ trans_choice('module_class_routine', 1) }}</a></li>
                        @endcan

                        @can('routine-setting-exam')
                        <li class="{{ Request::is('admin/routine/routine-setting/exam*') ? 'active' : '' }}"><a href="{{ route('admin.routine-setting.exam') }}" class="">{{ trans_choice('module_exam_routine', 1) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </li>
        @endcanany

        {{-- Resto de módulos se mantienen igual por ahora --}}
        {{-- TODO: Migrar gradualmente los demás módulos a la estructura modular --}}

        {{-- Exámenes y Evaluación --}}
        @canany(['exam-attendance', 'exam-marking', 'exam-result', 'subject-marking', 'subject-result', 'grade-view', 'grade-create', 'exam-type-view', 'exam-type-create', 'admit-card-view', 'admit-card-print', 'admit-card-download', 'admit-setting-view', 'result-contribution-view'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/exam*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-file-alt"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_examination', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @can('exam-attendance')
                <li class="{{ Request::is('admin/exam/exam-attendance*') ? 'active' : '' }}"><a href="{{ route('admin.exam-attendance.index') }}" class="">{{ trans_choice('module_exam_attendance', 2) }}</a></li>
                @endcan

                @can('exam-marking')
                <li class="{{ Request::is('admin/exam/exam-marking*') ? 'active' : '' }}"><a href="{{ route('admin.exam-marking.index') }}" class="">{{ trans_choice('module_exam_marking', 2) }}</a></li>
                @endcan

                @can('exam-result')
                <li class="{{ Request::is('admin/exam/exam-result*') ? 'active' : '' }}"><a href="{{ route('admin.exam-result') }}" class="">{{ trans_choice('module_exam_result', 2) }}</a></li>
                @endcan

                @can('subject-marking')
                <li class="{{ Request::is('admin/exam/subject-marking*') ? 'active' : '' }}"><a href="{{ route('admin.subject-marking.index') }}" class="">{{ trans_choice('module_subject_marking', 2) }}</a></li>
                @endcan

                @can('subject-result')
                <li class="{{ Request::is('admin/exam/subject-result*') ? 'active' : '' }}"><a href="{{ route('admin.subject-result') }}" class="">{{ trans_choice('module_subject_result', 2) }}</a></li>
                @endcan

                @canany(['grade-view', 'grade-create'])
                <li class="{{ Request::is('admin/exam/grade*') ? 'active' : '' }}"><a href="{{ route('admin.grade.index') }}" class="">{{ trans_choice('module_grade', 2) }}</a></li>
                @endcanany

                @canany(['exam-type-view', 'exam-type-create'])
                <li class="{{ Request::is('admin/exam/exam-type*') ? 'active' : '' }}"><a href="{{ route('admin.exam-type.index') }}" class="">{{ trans_choice('module_exam_type', 2) }}</a></li>
                @endcanany

                @canany(['admit-card-view', 'admit-card-print', 'admit-card-download'])
                <li class="{{ Request::is('admin/exam/admit-card*') ? 'active' : '' }}"><a href="{{ route('admin.admit-card.index') }}" class="">{{ trans_choice('module_admit_card', 2) }}</a></li>
                @endcanany

                @canany(['admit-setting-view', 'result-contribution-view'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/exam/admit-setting*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/exam/result-contribution*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @can('admit-setting-view')
                        <li class="{{ Request::is('admin/exam/admit-setting*') ? 'active' : '' }}"><a href="{{ route('admin.admit-setting.index') }}" class="">{{ trans_choice('module_admit_setting', 1) }}</a></li>
                        @endcan

                        @can('result-contribution-view')
                        <li class="{{ Request::is('admin/exam/result-contribution*') ? 'active' : '' }}"><a href="{{ route('admin.result-contribution.index') }}" class="">{{ trans_choice('module_result_contribution', 2) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </li>
        @endcanany

        {{-- Continuar con el resto de módulos del sidebar original... --}}
        {{-- Por ahora, copiamos el resto del sidebar original para mantener funcionalidad --}}
        @php
            // Incluir el resto del sidebar desde el archivo original
            // Esto se puede hacer gradualmente migrando módulo por módulo
        @endphp

        {{-- Fin de módulos modulares --}}

    </ul>
</div>
<!-- End Sidebar -->

