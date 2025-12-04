<?php
/**
 * Configuración del módulo: Gestión Académica
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems de ESTUDIANTES
// ============================================

// Subitems de Asistencia
$attendanceActionSubitem = [
    'title' => 'module_student_subject_attendance',
    'route' => 'admin.student-attendance.index',
    'permissions' => ['student-attendance-action'],
    'active_when' => ['admin/student-attendance']
];

$attendanceReportSubitem = [
    'title' => 'module_student_subject_report',
    'route' => 'admin.student-attendance.report',
    'permissions' => ['student-attendance-report'],
    'active_when' => ['admin/student-attendance-report*']
];

// Subitems de Respaldo (Solicitudes y Documentos)
$customRequestsSubitem = [
    'title' => 'module_custom_request',
    'route' => 'admin.custom-request.index',
    'permissions' => ['custom-request-view', 'custom-request-create'],
    'active_when' => ['admin/student/custom-request*']
];

// Nota: Documentos personalizados - verificar si existe ruta específica
// Por ahora usamos custom-request como base

// ============================================
// PASO 2: Agrupar Subitems
// ============================================

$attendanceSubitems = [
    'action' => $attendanceActionSubitem,
    'report' => $attendanceReportSubitem
];

$backupSubitems = [
    'requests' => $customRequestsSubitem,
    // 'documents' => $customDocumentsSubitem, // Agregar cuando exista la ruta
];

// ============================================
// PASO 3: Construir Items de ESTUDIANTES
// ============================================

$attendanceItem = [
    'title' => 'module_attendance',
    'icon' => 'fas fa-calendar-check',
    'route_pattern' => 'admin.student-attendance.*',
    'permissions' => ['student-attendance-action', 'student-attendance-report'],
    'active_when' => ['admin/student-attendance*'],
    'subitems' => $attendanceSubitems
];

$leavesItem = [
    'title' => 'module_leave_manage',
    'trans_count' => 1,
    'route' => 'admin.student-leave-manage.index',
    'permissions' => ['student-leave-manage-view', 'student-leave-manage-edit'],
    'active_when' => ['admin/student-leave-manage*']
];

$notesItem = [
    'title' => 'module_student_note',
    'route' => 'admin.student-note.index',
    'permissions' => ['student-note-create', 'student-note-view'],
    'active_when' => ['admin/student/student-note*']
];

$academicTransitionItem = [
    'title' => 'module_academic_transition',
    'route' => 'admin.academic-transition.index',
    'permissions' => ['academic-transition-view', 'academic-transition-create'],
    'active_when' => ['admin/student/academic-transition*'],
    'highlight' => true // ⭐ Funcionalidad crítica
];

$tutorialsItem = [
    'title' => 'module_tutorial',
    'route' => 'admin.tutorial.index',
    'permissions' => ['tutorial-view', 'tutorial-create'],
    'active_when' => ['admin/student/tutorial*']
];

// Nota: Historial Académico - verificar si existe ruta específica
// Por ahora no se incluye hasta confirmar la ruta

$backupItem = [
    'title' => 'Respaldo', // Nombre según nueva estructura
    'icon' => 'fas fa-folder',
    'route_pattern' => 'admin.custom-request.*',
    'permissions' => ['custom-request-view', 'custom-request-create'],
    'active_when' => ['admin/student/custom-request*'],
    'subitems' => $backupSubitems
];

$alumniItem = [
    'title' => 'module_student_alumni' . ' ' . 'list',
    'route' => 'admin.student-alumni.index',
    'permissions' => ['student-enroll-alumni'],
    'active_when' => ['admin/student/student-alumni*']
];

// ============================================
// PASO 4: Construir Items de MATRÍCULAS
// ============================================

$singleEnrollmentItem = [
    'title' => 'module_single_enroll',
    'route' => 'admin.single-enroll.index',
    'permissions' => ['student-enroll-single'],
    'active_when' => ['admin/student/single-enroll*']
];

$groupEnrollmentItem = [
    'title' => 'module_group_enroll',
    'route' => 'admin.group-enroll.index',
    'permissions' => ['student-enroll-group'],
    'active_when' => ['admin/student/group-enroll*'],
    'badge' => 'cupos' // Indicador de control de cupos
];

$adddropEnrollmentItem = [
    'title' => 'module_subject_adddrop', // "Gestión de Materias" según nueva estructura
    'route' => 'admin.subject-adddrop.index',
    'permissions' => ['student-enroll-adddrop'],
    'active_when' => ['admin/student/subject-adddrop*']
];

$completeEnrollmentItem = [
    'title' => 'module_course_complete',
    'route' => 'admin.course-complete.index',
    'permissions' => ['student-enroll-complete'],
    'active_when' => ['admin/student/course-complete*']
];

// ============================================
// PASO 5: Construir Items de CURSOS
// ============================================

// Subitems de Material de Estudio
$assignmentsSubitem = [
    'title' => 'module_assignment',
    'route' => 'admin.assignment.index',
    'permissions' => ['assignment-create', 'assignment-view', 'assignment-marking'],
    'active_when' => ['admin/download/assignment*']
];

$contentSubitem = [
    'title' => 'module_content' . ' ' . 'list',
    'route' => 'admin.content.index',
    'permissions' => ['content-create', 'content-view'],
    'active_when' => ['admin/download/content*']
];

$contentTypeSubitem = [
    'title' => 'module_content_type',
    'route' => 'admin.content-type.index',
    'permissions' => ['content-type-view', 'content-type-create'],
    'active_when' => ['admin/download/content-type*']
];

$studyMaterialSubitems = [
    'assignments' => $assignmentsSubitem,
    'content' => $contentSubitem,
    'content-types' => $contentTypeSubitem
];

$studyMaterialItem = [
    'title' => 'module_study_material',
    'icon' => 'fas fa-book-open',
    'route_pattern' => 'admin.assignment.*',
    'permissions' => ['assignment-create', 'assignment-view', 'content-create', 'content-view', 'content-type-view'],
    'active_when' => ['admin/download*'],
    'subitems' => $studyMaterialSubitems
];

// ============================================
// PASO 6: Construir Items de CONFIGURACIÓN ACADÉMICA
// ============================================

$batchItem = [
    'title' => 'module_batch',
    'route' => 'admin.batch.index',
    'permissions' => ['batch-create', 'batch-view'],
    'active_when' => ['admin/academic/batch*']
];

$sessionItem = [
    'title' => 'module_session',
    'route' => 'admin.session.index',
    'permissions' => ['session-create', 'session-view'],
    'active_when' => ['admin/academic/session*']
];

$semesterItem = [
    'title' => 'module_semester',
    'route' => 'admin.semester.index',
    'permissions' => ['semester-create', 'semester-view'],
    'active_when' => ['admin/academic/semester*']
];

$sectionItem = [
    'title' => 'module_section',
    'route' => 'admin.section.index',
    'permissions' => ['section-create', 'section-view'],
    'active_when' => ['admin/academic/section*']
];

$roomItem = [
    'title' => 'module_class_room',
    'route' => 'admin.room.index',
    'permissions' => ['class-room-create', 'class-room-view'],
    'active_when' => ['admin/academic/room*']
];

$requestTypeItem = [
    'title' => 'module_custom_request_type',
    'route' => 'admin.custom-request-type.index',
    'permissions' => ['custom-request-type-view', 'custom-request-type-create'],
    'active_when' => ['admin/academic/custom-request-type*']
];

// ============================================
// PASO 7: Agrupar Items por Sección
// ============================================

// Items de Estudiantes
$studentsItems = [
    'attendance' => $attendanceItem,
    'leaves' => $leavesItem,
    'notes' => $notesItem,
    'academic-transition' => $academicTransitionItem,
    'tutorials' => $tutorialsItem,
    'backup' => $backupItem,
    'alumni' => $alumniItem
];

// Items de Matrículas
$enrollmentsItems = [
    'single' => $singleEnrollmentItem,
    'group' => $groupEnrollmentItem,
    'adddrop' => $adddropEnrollmentItem,
    'complete' => $completeEnrollmentItem
];

// Items de Cursos
$coursesItems = [
    'faculty' => [
        'title' => 'module_faculty',
        'route' => 'admin.faculty.index',
        'permissions' => ['faculty-create', 'faculty-view'],
        'active_when' => ['admin/academic/faculty*']
    ],
    'program' => [
        'title' => 'module_program',
        'route' => 'admin.program.index',
        'permissions' => ['program-create', 'program-view'],
        'active_when' => ['admin/academic/program*']
    ],
    'subject' => [
        'title' => 'module_subject',
        'route' => 'admin.subject.index',
        'permissions' => ['subject-create', 'subject-view'],
        'active_when' => ['admin/academic/subject*']
    ],
    'enroll-subject' => [
        'title' => 'module_enroll_subject',
        'route' => 'admin.enroll-subject.index',
        'permissions' => ['enroll-subject-create', 'enroll-subject-view'],
        'active_when' => ['admin/academic/enroll-subject*']
    ],
    'study-material' => $studyMaterialItem,
    'curriculum-adjustment' => [
        'title' => 'module_curriculum_adjustment',
        'route' => 'admin.curriculum-adjustment.index',
        'permissions' => ['curriculum-adjustment-view', 'curriculum-adjustment-create'],
        'active_when' => ['admin/academic/curriculum-adjustment*'],
        'highlight' => true
    ]
];

// Items de Configuración Académica
$academicConfigItems = [
    'batch' => $batchItem,
    'session' => $sessionItem,
    'semester' => $semesterItem,
    'section' => $sectionItem,
    'room' => $roomItem,
    'request-type' => $requestTypeItem
];

// ============================================
// PASO 8: Construir Items Principales con Subitems
// ============================================

$studentsMainItem = [
    'title' => 'module_student',
    'icon' => 'fas fa-user-graduate',
    'route_pattern' => 'admin.student.*',
    'permissions' => array_merge(
        ['student-attendance-action', 'student-attendance-report'],
        ['student-leave-manage-view', 'student-leave-manage-edit'],
        ['student-note-create', 'student-note-view'],
        ['academic-transition-view', 'academic-transition-create'],
        ['tutorial-view', 'tutorial-create'],
        ['custom-request-view', 'custom-request-create'],
        ['student-enroll-alumni']
    ),
    'active_when' => ['admin/student*'],
    'subitems' => $studentsItems
];

$enrollmentsMainItem = [
    'title' => 'module_student_enroll',
    'icon' => 'fas fa-clipboard-list',
    'route_pattern' => 'admin.*-enroll.*',
    'permissions' => ['student-enroll-single', 'student-enroll-group', 'student-enroll-adddrop', 'student-enroll-complete'],
    'active_when' => ['admin/student/*-enroll*', 'admin/student/subject-adddrop*', 'admin/student/course-complete*'],
    'highlight' => true, // ⭐ CRÍTICO
    'subitems' => $enrollmentsItems
];

$coursesMainItem = [
    'title' => 'Cursos', // Nombre según nueva estructura
    'icon' => 'fas fa-book',
    'route_pattern' => 'admin.faculty.*',
    'permissions' => array_merge(
        ['faculty-create', 'faculty-view'],
        ['program-create', 'program-view'],
        ['subject-create', 'subject-view'],
        ['enroll-subject-create', 'enroll-subject-view'],
        ['assignment-create', 'assignment-view'],
        ['curriculum-adjustment-view', 'curriculum-adjustment-create']
    ),
    'active_when' => ['admin/academic/*', 'admin/download/*'],
    'subitems' => $coursesItems
];

$academicConfigMainItem = [
    'title' => 'Configuración Académica', // Nombre según nueva estructura
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.batch.*',
    'permissions' => array_merge(
        ['batch-create', 'batch-view'],
        ['session-create', 'session-view'],
        ['semester-create', 'semester-view'],
        ['section-create', 'section-view'],
        ['class-room-create', 'class-room-view'],
        ['custom-request-type-view', 'custom-request-type-create']
    ),
    'active_when' => ['admin/academic/batch*', 'admin/academic/session*', 'admin/academic/semester*', 'admin/academic/section*', 'admin/academic/room*', 'admin/academic/custom-request-type*'],
    'subitems' => $academicConfigItems
];

// ============================================
// PASO 9: Agrupar Todos los Items del Módulo
// ============================================

$academicManagementItems = [
    'students' => $studentsMainItem,
    'enrollments' => $enrollmentsMainItem,
    'courses' => $coursesMainItem,
    'academic-config' => $academicConfigMainItem
];

// ============================================
// PASO 10: Construir Módulo Completo
// ============================================

$academicManagementModule = [
    'section' => 'academic-management',
    'title' => 'module_academic_management', // "Gestión Académica"
    'icon' => 'fas fa-graduation-cap',
    'route_pattern' => 'admin.student.*',
    'items' => $academicManagementItems
];

// ============================================
// PASO 11: Retornar Configuración Final
// ============================================

return $academicManagementModule;

