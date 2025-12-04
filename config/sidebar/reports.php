<?php
/**
 * Configuración del módulo: Reportes
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Reportes de Estudiantes
$studentProgressSubitem = [
    'title' => 'module_student_progress', // "Progreso"
    'route' => 'admin.report.student',
    'permissions' => ['report-student-progress'],
    'active_when' => ['admin/report/student']
];

$studentAttendanceSubitem = [
    'title' => 'module_student_attendance', // "Asistencia"
    'route' => 'admin.report.student-attendance',
    'permissions' => ['report-student-attendance'],
    'active_when' => ['admin/report/student-attendance']
];

$subjectAttendanceSubitem = [
    'title' => 'module_student_subject_attendance', // "Asistencia por Materia"
    'route' => 'admin.report.subject-attendance',
    'permissions' => ['report-subject-attendance'],
    'active_when' => ['admin/report/subject-attendance']
];

$studentFeesSubitem = [
    'title' => 'module_student_fees', // "Cuotas"
    'route' => 'admin.report.student-fees',
    'permissions' => ['report-student-fees'],
    'active_when' => ['admin/report/student-fees']
];

// Subitems de Reportes Académicos
$subjectStudentsSubitem = [
    'title' => 'module_course_students', // "Estudiantes por Curso"
    'route' => 'admin.report.subject',
    'permissions' => ['report-subject-students'],
    'active_when' => ['admin/report/subject']
];

$teacherPerformanceSubitem = [
    'title' => 'module_teacher_performance_report', // "Desempeño Docente"
    'route' => 'admin.report.teacher-performance',
    'permissions' => ['report-teacher-performance'],
    'active_when' => ['admin/report/teacher-performance']
];

// Subitems de Reportes Financieros
$collectedFeesSubitem = [
    'title' => 'module_collected_fees', // "Cuotas Cobradas"
    'route' => 'admin.report.fees',
    'permissions' => ['report-collected-fees'],
    'active_when' => ['admin/report/fees']
];

$salaryPaidSubitem = [
    'title' => 'module_salary_paid', // "Salarios Pagados"
    'route' => 'admin.report.payroll',
    'permissions' => ['report-salary-paid'],
    'active_when' => ['admin/report/payroll']
];

$incomeSubitem = [
    'title' => 'module_total_income', // "Ingresos"
    'route' => 'admin.report.income',
    'permissions' => ['report-income'],
    'active_when' => ['admin/report/income']
];

$expenseSubitem = [
    'title' => 'module_total_expense', // "Gastos"
    'route' => 'admin.report.expense',
    'permissions' => ['report-expense'],
    'active_when' => ['admin/report/expense']
];

// Subitems de Reportes de Servicios
$libraryReportSubitem = [
    'title' => 'module_library_history', // "Biblioteca"
    'route' => 'admin.report.library',
    'permissions' => ['report-library'],
    'active_when' => ['admin/report/library']
];

$bookReturnSubitem = [
    'title' => 'module_book_return_due', // "Devoluciones Pendientes"
    'route' => 'admin.report.book-return',
    'permissions' => ['report-book-return'],
    'active_when' => ['admin/report/book-return']
];

$inventoryReportSubitem = [
    'title' => 'module_inventory_history', // "Inventario"
    'route' => 'admin.report.inventory',
    'permissions' => ['report-inventory'],
    'active_when' => ['admin/report/inventory']
];

$hostelReportSubitem = [
    'title' => 'module_hostel_members', // "Residencia"
    'route' => 'admin.report.hostel',
    'permissions' => ['report-hostel'],
    'active_when' => ['admin/report/hostel']
];

$transportReportSubitem = [
    'title' => 'module_transport_members', // "Transporte"
    'route' => 'admin.report.transport',
    'permissions' => ['report-transport'],
    'active_when' => ['admin/report/transport']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Reportes de Estudiantes
$studentReportsSubitems = [
    'progress' => $studentProgressSubitem,
    'attendance' => $studentAttendanceSubitem,
    'subject-attendance' => $subjectAttendanceSubitem,
    'fees' => $studentFeesSubitem
];

// Agrupar subitems de Reportes Académicos
$academicReportsSubitems = [
    'subject-students' => $subjectStudentsSubitem,
    'teacher-performance' => $teacherPerformanceSubitem
];

// Agrupar subitems de Reportes Financieros
$financeReportsSubitems = [
    'collected-fees' => $collectedFeesSubitem,
    'salary-paid' => $salaryPaidSubitem,
    'income' => $incomeSubitem,
    'expense' => $expenseSubitem
];

// Agrupar subitems de Reportes de Servicios
$serviceReportsSubitems = [
    'library' => $libraryReportSubitem,
    'book-return' => $bookReturnSubitem,
    'inventory' => $inventoryReportSubitem,
    'hostel' => $hostelReportSubitem,
    'transport' => $transportReportSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Reportes de Estudiantes (con subitems)
$studentReportsItem = [
    'title' => 'Estudiantes', // Nombre según nueva estructura
    'icon' => 'fas fa-user-graduate',
    'route_pattern' => 'admin.report.student*',
    'permissions' => ['report-student-progress', 'report-student-attendance', 'report-subject-attendance', 'report-student-fees'],
    'active_when' => ['admin/report/student*', 'admin/report/subject-attendance', 'admin/report/student-fees'],
    'subitems' => $studentReportsSubitems
];

// Item: Reportes Académicos (con subitems)
$academicReportsItem = [
    'title' => 'Académico', // Nombre según nueva estructura
    'icon' => 'fas fa-graduation-cap',
    'route_pattern' => 'admin.report.subject*',
    'permissions' => ['report-subject-students', 'report-teacher-performance'],
    'active_when' => ['admin/report/subject', 'admin/report/teacher-performance'],
    'subitems' => $academicReportsSubitems
];

// Item: Reportes Financieros (con subitems)
$financeReportsItem = [
    'title' => 'Finanzas', // Nombre según nueva estructura
    'icon' => 'fas fa-dollar-sign',
    'route_pattern' => 'admin.report.fees*',
    'permissions' => ['report-collected-fees', 'report-salary-paid', 'report-income', 'report-expense'],
    'active_when' => ['admin/report/fees', 'admin/report/payroll', 'admin/report/income', 'admin/report/expense'],
    'subitems' => $financeReportsSubitems
];

// Item: Reportes de Personal (simple)
$personalReportsItem = [
    'title' => 'Personal', // Nombre según nueva estructura
    'icon' => 'fas fa-users',
    'route' => 'admin.report.leave',
    'permissions' => ['report-staff-leaves'],
    'active_when' => ['admin/report/leave']
];

// Item: Reportes de Servicios (con subitems)
$serviceReportsItem = [
    'title' => 'Servicios', // Nombre según nueva estructura
    'icon' => 'fas fa-concierge-bell',
    'route_pattern' => 'admin.report.library*',
    'permissions' => ['report-library', 'report-book-return', 'report-inventory', 'report-hostel', 'report-transport'],
    'active_when' => ['admin/report/library', 'admin/report/book-return', 'admin/report/inventory', 'admin/report/hostel', 'admin/report/transport'],
    'subitems' => $serviceReportsSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$reportsItems = [
    'students' => $studentReportsItem,
    'academic' => $academicReportsItem,
    'finances' => $financeReportsItem,
    'personal' => $personalReportsItem,
    'services' => $serviceReportsItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$reportsModule = [
    'section' => 'reports',
    'title' => 'module_report',
    'icon' => 'fas fa-chart-line',
    'route_pattern' => 'admin.report.*',
    'items' => $reportsItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $reportsModule;

