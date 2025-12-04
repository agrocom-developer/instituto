<?php
/**
 * Configuración del módulo: Exámenes y Evaluación
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Calificaciones
$examMarkingSubitem = [
    'title' => 'module_exam_marking', // "Por Examen"
    'route' => 'admin.exam-marking.index',
    'permissions' => ['exam-marking'],
    'active_when' => ['admin/exam/exam-marking*']
];

$examResultSubitem = [
    'title' => 'module_exam_result', // "Resultados de Examen"
    'route' => 'admin.exam-result',
    'permissions' => ['exam-result'],
    'active_when' => ['admin/exam/exam-result*']
];

$subjectMarkingSubitem = [
    'title' => 'module_subject_marking', // "Por Asignatura"
    'route' => 'admin.subject-marking.index',
    'permissions' => ['subject-marking'],
    'active_when' => ['admin/exam/subject-marking*']
];

$subjectResultSubitem = [
    'title' => 'module_subject_result', // "Resultados de Asignatura"
    'route' => 'admin.subject-result',
    'permissions' => ['subject-result'],
    'active_when' => ['admin/exam/subject-result*']
];

// Subitems de Configuración
$examTypeSubitem = [
    'title' => 'module_exam_type', // "Tipos de Examen"
    'route' => 'admin.exam-type.index',
    'permissions' => ['exam-type-view', 'exam-type-create'],
    'active_when' => ['admin/exam/exam-type*']
];

$gradeSubitem = [
    'title' => 'module_grade', // "Escalas de Calificación"
    'route' => 'admin.grade.index',
    'permissions' => ['grade-view', 'grade-create'],
    'active_when' => ['admin/exam/grade*']
];

$resultContributionSubitem = [
    'title' => 'module_result_contribution', // "Contribución a Resultados"
    'route' => 'admin.result-contribution.index',
    'permissions' => ['result-contribution-view'],
    'active_when' => ['admin/exam/result-contribution*']
];

$admitSettingSubitem = [
    'title' => 'module_admit_setting',
    'trans_count' => 1, // "Ajustes de Tarjeta"
    'route' => 'admin.admit-setting.index',
    'permissions' => ['admit-setting-view'],
    'active_when' => ['admin/exam/admit-setting*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Calificaciones
$gradesSubitems = [
    'exam-marking' => $examMarkingSubitem,
    'exam-result' => $examResultSubitem,
    'subject-marking' => $subjectMarkingSubitem,
    'subject-result' => $subjectResultSubitem
];

// Agrupar subitems de Configuración
$examSettingsSubitems = [
    'exam-type' => $examTypeSubitem,
    'grade' => $gradeSubitem,
    'result-contribution' => $resultContributionSubitem,
    'admit-setting' => $admitSettingSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Asistencia a Exámenes (simple)
$examAttendanceItem = [
    'title' => 'module_exam_attendance',
    'route' => 'admin.exam-attendance.index',
    'permissions' => ['exam-attendance'],
    'active_when' => ['admin/exam/exam-attendance*']
];

// Item: Calificaciones (con subitems)
$gradesItem = [
    'title' => 'Calificaciones', // Nombre según nueva estructura
    'icon' => 'fas fa-clipboard-check',
    'route_pattern' => 'admin.exam-marking.*',
    'permissions' => ['exam-marking', 'exam-result', 'subject-marking', 'subject-result'],
    'active_when' => ['admin/exam/exam-marking*', 'admin/exam/exam-result*', 'admin/exam/subject-marking*', 'admin/exam/subject-result*'],
    'subitems' => $gradesSubitems
];

// Item: Tarjetas de Admisión (simple)
$admitCardItem = [
    'title' => 'module_admit_card',
    'route' => 'admin.admit-card.index',
    'permissions' => ['admit-card-view', 'admit-card-print', 'admit-card-download'],
    'active_when' => ['admin/exam/admit-card*']
];

// Item: Configuración (con subitems)
$examSettingsItem = [
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.exam-type.*',
    'permissions' => ['exam-type-view', 'exam-type-create', 'grade-view', 'grade-create', 'result-contribution-view', 'admit-setting-view'],
    'active_when' => ['admin/exam/exam-type*', 'admin/exam/grade*', 'admin/exam/result-contribution*', 'admin/exam/admit-setting*'],
    'subitems' => $examSettingsSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$examsItems = [
    'attendance' => $examAttendanceItem,
    'grades' => $gradesItem,
    'admit-card' => $admitCardItem,
    'settings' => $examSettingsItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$examsModule = [
    'section' => 'exams',
    'title' => 'module_exams_evaluation', // "Exámenes y Evaluación" (antes "Examen")
    'icon' => 'fas fa-file-alt',
    'route_pattern' => 'admin.exam.*',
    'items' => $examsItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $examsModule;

