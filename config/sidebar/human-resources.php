<?php
/**
 * Configuración del módulo: Recursos Humanos
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Gestión de Docentes
// Nota: Estas rutas pueden no existir aún, se dejan preparadas para futura implementación
// Por ahora, los docentes se gestionan a través de admin.user.index
$teacherListSubitem = [
    'title' => 'Lista de Docentes', // Futuro: ruta específica para docentes
    'route' => 'admin.user.index', // Temporal: usar lista de personal con filtro
    'permissions' => ['user-view'],
    'active_when' => ['admin/staff/user*']
];

$teacherRegisterSubitem = [
    'title' => 'Registro de Docente', // Futuro: ruta específica para registro de docente
    'route' => 'admin.user.create', // Temporal: usar registro de personal
    'permissions' => ['user-create'],
    'active_when' => ['admin/staff/user/create']
];

// Nota: Especialidades y Asignaturas Impartidas se implementarán cuando existan las rutas

// Subitems de Asistencia
$dailyAttendanceSubitem = [
    'title' => 'module_staff_daily_attendance', // "Asistencia Diaria"
    'route' => 'admin.staff-daily-attendance.index',
    'permissions' => ['staff-daily-attendance-action'],
    'active_when' => ['admin/attendance/staff-daily-attendance*']
];

$dailyReportSubitem = [
    'title' => 'module_staff_daily_report', // "Reporte Diario"
    'route' => 'admin.staff-daily-attendance.report',
    'permissions' => ['staff-daily-attendance-report'],
    'active_when' => ['admin/attendance/staff-daily-report*']
];

$hourlyAttendanceSubitem = [
    'title' => 'module_staff_hourly_attendance', // "Asistencia por Horas"
    'route' => 'admin.staff-hourly-attendance.index',
    'permissions' => ['staff-hourly-attendance-action'],
    'active_when' => ['admin/attendance/staff-hourly-attendance*']
];

$hourlyReportSubitem = [
    'title' => 'module_staff_hourly_report', // "Reporte por Horas"
    'route' => 'admin.staff-hourly-attendance.report',
    'permissions' => ['staff-hourly-attendance-report'],
    'active_when' => ['admin/attendance/staff-hourly-report*']
];

// Subitems de Licencias
$applyLeaveSubitem = [
    'title' => 'module_apply_leave',
    'trans_count' => 1, // "Solicitar Licencia"
    'route' => 'admin.staff-leave.create',
    'permissions' => ['staff-leave-create'],
    'active_when' => ['admin/leave/staff-leave/create']
];

$myLeavesSubitem = [
    'title' => 'module_my_leave', // "Mis Licencias"
    'route' => 'admin.staff-leave.index',
    'permissions' => ['staff-leave-view'],
    'active_when' => ['admin/leave/staff-leave']
];

$leaveManageSubitem = [
    'title' => 'module_leave_manage',
    'trans_count' => 1, // "Gestión de Licencias"
    'route' => 'admin.leave-manage.index',
    'permissions' => ['staff-leave-manage-edit', 'staff-leave-manage-view'],
    'active_when' => ['admin/leave/leave-manage*']
];

$leaveTypeSubitem = [
    'title' => 'module_leave_type', // "Tipos de Licencia"
    'route' => 'admin.leave-type.index',
    'permissions' => ['leave-type-create', 'leave-type-view'],
    'active_when' => ['admin/leave/leave-type*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Gestión de Docentes
$teacherManagementSubitems = [
    'list' => $teacherListSubitem,
    'register' => $teacherRegisterSubitem,
    // 'specialties' => $specialtiesSubitem, // Futuro
    // 'subjects' => $subjectsImpartedSubitem, // Futuro
];

// Agrupar subitems de Asistencia
$attendanceSubitems = [
    'daily' => $dailyAttendanceSubitem,
    'daily-report' => $dailyReportSubitem,
    'hourly' => $hourlyAttendanceSubitem,
    'hourly-report' => $hourlyReportSubitem
];

// Agrupar subitems de Licencias
$leavesSubitems = [
    'apply' => $applyLeaveSubitem,
    'my-leaves' => $myLeavesSubitem,
    'manage' => $leaveManageSubitem,
    'types' => $leaveTypeSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Lista de Personal (simple, será subitem de Personal)
$staffListSubitem = [
    'title' => 'module_staff' . ' ' . 'list',
    'route' => 'admin.user.index',
    'permissions' => ['user-create', 'user-view', 'user-password-print', 'user-password-change'],
    'active_when' => ['admin/staff/user*']
];

// Item: Gestión de Docentes (con subitems, será subitem de Personal)
$teacherManagementItem = [
    'title' => 'Gestión de Docentes', // Nombre según nueva estructura
    'icon' => 'fas fa-chalkboard-teacher',
    'route_pattern' => 'admin.user.*',
    'permissions' => ['user-create', 'user-view'],
    'active_when' => ['admin/staff/user*'],
    'subitems' => $teacherManagementSubitems
];

// Item: Notas de Personal (simple, será subitem de Personal)
$staffNotesSubitem = [
    'title' => 'module_staff_note',
    'route' => 'admin.staff-note.index',
    'permissions' => ['staff-note-create', 'staff-note-view'],
    'active_when' => ['admin/staff/staff-note*']
];

// Agrupar subitems de Personal
$personalSubitems = [
    'list' => $staffListSubitem,
    'teacher-management' => $teacherManagementItem,
    'notes' => $staffNotesSubitem
];

// Item: Personal (con subitems)
$personalItem = [
    'title' => 'Personal', // Nombre según nueva estructura
    'icon' => 'fas fa-users',
    'route_pattern' => 'admin.user.*',
    'permissions' => ['user-create', 'user-view', 'user-password-print', 'user-password-change', 'staff-note-create', 'staff-note-view'],
    'active_when' => ['admin/staff/user*', 'admin/staff/staff-note*'],
    'subitems' => $personalSubitems
];

// Item: Asistencia (con subitems)
$attendanceItem = [
    'title' => 'module_staff_attendance',
    'icon' => 'fas fa-calendar-check',
    'route_pattern' => 'admin.staff-daily-attendance.*',
    'permissions' => ['staff-daily-attendance-action', 'staff-daily-attendance-report', 'staff-hourly-attendance-action', 'staff-hourly-attendance-report'],
    'active_when' => ['admin/attendance*'],
    'subitems' => $attendanceSubitems
];

// Item: Licencias (con subitems)
$leavesItem = [
    'title' => 'module_leave_manager',
    'icon' => 'fas fa-notes-medical',
    'route_pattern' => 'admin.staff-leave.*',
    'permissions' => ['staff-leave-create', 'staff-leave-view', 'leave-type-create', 'leave-type-view', 'staff-leave-manage-edit', 'staff-leave-manage-view'],
    'active_when' => ['admin/leave*'],
    'subitems' => $leavesSubitems
];

// Item: Configuración (con subitems)
$hrSettingsSubitems = [
    'departments' => [
        'title' => 'module_department',
        'route' => 'admin.department.index',
        'permissions' => ['department-create', 'department-view'],
        'active_when' => ['admin/staff/department*']
    ],
    'designations' => [
        'title' => 'module_designation', // "Cargos"
        'route' => 'admin.designation.index',
        'permissions' => ['designation-create', 'designation-view'],
        'active_when' => ['admin/staff/designation*']
    ],
    'work-shifts' => [
        'title' => 'module_work_shift_type', // "Turnos de Trabajo"
        'route' => 'admin.work-shift-type.index',
        'permissions' => ['work-shift-type-create', 'work-shift-type-view'],
        'active_when' => ['admin/staff/work-shift-type*']
    ]
];

$hrSettingsItem = [
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.department.*',
    'permissions' => ['department-create', 'department-view', 'designation-create', 'designation-view', 'work-shift-type-create', 'work-shift-type-view'],
    'active_when' => ['admin/staff/department*', 'admin/staff/designation*', 'admin/staff/work-shift-type*'],
    'subitems' => $hrSettingsSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$hrItems = [
    'personal' => $personalItem,
    'attendance' => $attendanceItem,
    'leaves' => $leavesItem,
    'settings' => $hrSettingsItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$humanResourcesModule = [
    'section' => 'human-resources',
    'title' => 'module_human_resource', // "Recursos Humanos" (antes "Recurso Humano")
    'icon' => 'fas fa-users-cog',
    'route_pattern' => 'admin.staff.*',
    'items' => $hrItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $humanResourcesModule;

