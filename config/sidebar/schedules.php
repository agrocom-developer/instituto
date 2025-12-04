<?php
/**
 * Configuración del módulo: Horarios
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Horario de Clases
$classRoutineCreateSubitem = [
    'title' => 'module_manage_class', // "Lista de Clases" según nueva estructura
    'route' => 'admin.class-routine.create',
    'permissions' => ['class-routine-create'],
    'active_when' => ['admin/routine/class-routine/create']
];

$classRoutineViewSubitem = [
    'title' => 'module_class_routine', // "Ver Horarios" según nueva estructura
    'route' => 'admin.class-routine.index',
    'permissions' => ['class-routine-view', 'class-routine-print'],
    'active_when' => ['admin/routine/class-routine']
];

$classRoutineTeacherSubitem = [
    'title' => 'module_teacher_routine', // "Horario por Docente"
    'route' => 'admin.class-routine.teacher',
    'permissions' => ['class-routine-teacher'],
    'active_when' => ['admin/routine/class-routine-teacher']
];

// Subitems de Horario de Exámenes
$examRoutineCreateSubitem = [
    'title' => 'module_manage_exam', // "Lista de Exámenes" según nueva estructura
    'route' => 'admin.exam-routine.create',
    'permissions' => ['exam-routine-create'],
    'active_when' => ['admin/routine/exam-routine/create']
];

$examRoutineViewSubitem = [
    'title' => 'module_exam_routine', // "Ver Horarios" según nueva estructura
    'route' => 'admin.exam-routine.index',
    'permissions' => ['exam-routine-view', 'exam-routine-print'],
    'active_when' => ['admin/routine/exam-routine']
];

// Subitems de Configuración
$routineSettingClassSubitem = [
    'title' => 'module_class_routine', // "Ajustes de Clases"
    'route' => 'admin.routine-setting.class',
    'permissions' => ['routine-setting-class'],
    'active_when' => ['admin/routine/routine-setting/class*']
];

$routineSettingExamSubitem = [
    'title' => 'module_exam_routine', // "Ajustes de Exámenes"
    'route' => 'admin.routine-setting.exam',
    'permissions' => ['routine-setting-exam'],
    'active_when' => ['admin/routine/routine-setting/exam*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Horario de Clases
$classRoutineSubitems = [
    'create' => $classRoutineCreateSubitem,
    'view' => $classRoutineViewSubitem,
    'teacher' => $classRoutineTeacherSubitem
];

// Agrupar subitems de Horario de Exámenes
$examRoutineSubitems = [
    'create' => $examRoutineCreateSubitem,
    'view' => $examRoutineViewSubitem
];

// Agrupar subitems de Configuración
$routineSettingsSubitems = [
    'class' => $routineSettingClassSubitem,
    'exam' => $routineSettingExamSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Horario de Clases (con sus subitems)
$classRoutineItem = [
    'title' => 'Horario de Clases', // Nombre según nueva estructura
    'icon' => 'fas fa-calendar-week',
    'route_pattern' => 'admin.class-routine.*',
    'permissions' => ['class-routine-create', 'class-routine-view', 'class-routine-print', 'class-routine-teacher'],
    'active_when' => ['admin/routine/class-routine*', 'admin/routine/class-routine-teacher*'],
    'subitems' => $classRoutineSubitems
];

// Item: Horario de Exámenes (con sus subitems)
$examRoutineItem = [
    'title' => 'Horario de Exámenes', // Nombre según nueva estructura
    'icon' => 'fas fa-calendar-check',
    'route_pattern' => 'admin.exam-routine.*',
    'permissions' => ['exam-routine-create', 'exam-routine-view', 'exam-routine-print'],
    'active_when' => ['admin/routine/exam-routine*'],
    'subitems' => $examRoutineSubitems
];

// Item: Configuración (con sus subitems)
$routineSettingsItem = [
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.routine-setting.*',
    'permissions' => ['routine-setting-class', 'routine-setting-exam'],
    'active_when' => ['admin/routine/routine-setting*'],
    'subitems' => $routineSettingsSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$schedulesItems = [
    'class-routine' => $classRoutineItem,
    'exam-routine' => $examRoutineItem,
    'settings' => $routineSettingsItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$schedulesModule = [
    'section' => 'schedules',
    'title' => 'module_schedules', // "Horarios" (antes "Rutina")
    'icon' => 'far fa-calendar-alt',
    'route_pattern' => 'admin.routine.*',
    'items' => $schedulesItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $schedulesModule;

