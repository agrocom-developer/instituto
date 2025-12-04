<!-- Sidemenu -->
<div class="navbar-content scroll-div ps ps--active-y">
    <ul class="nav pcoded-inner-navbar">

        {{-- Dashboard (menú huérfano - se mantiene aquí por ser un item simple) --}}
        <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-home"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_dashboard', 1) }}</span>
            </a>
        </li>

        {{-- Módulos modulares --}}
        @include('admin.layouts.sidebar.components.admission')
        @include('admin.layouts.sidebar.components.academic-management')
        @include('admin.layouts.sidebar.components.schedules')
        @include('admin.layouts.sidebar.components.exams')
        @include('admin.layouts.sidebar.components.finances')
        @include('admin.layouts.sidebar.components.human-resources')
        @include('admin.layouts.sidebar.components.communication')
        @include('admin.layouts.sidebar.components.library')
        @include('admin.layouts.sidebar.components.inventory')
        @include('admin.layouts.sidebar.components.residence')
        @include('admin.layouts.sidebar.components.transport')
        @include('admin.layouts.sidebar.components.reception')
        @include('admin.layouts.sidebar.components.certificates')
        @include('admin.layouts.sidebar.components.reports')
        @include('admin.layouts.sidebar.components.website')
        @include('admin.layouts.sidebar.components.settings')
        @include('admin.layouts.sidebar.components.profile')

    </ul>
</div>
<!-- End Sidebar -->
