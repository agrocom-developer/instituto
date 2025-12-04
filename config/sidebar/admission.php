<?php
/**
 * Configuración del módulo: Admisión y Estudiantes
 * Construcción modular de adentro hacia afuera
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Transferencias
$transferIncomingSubitem = [
    'title' => 'module_transfer_in',
    'trans_count' => 1,
    'route' => 'admin.student-transfer-in.index',
    'permissions' => ['student-transfer-in-create', 'student-transfer-in-view'],
    'active_when' => ['admin/admission/student-transfer-in*']
];

$transferOutgoingSubitem = [
    'title' => 'module_transfer_out',
    'trans_count' => 1,
    'route' => 'admin.student-transfer-out.index',
    'permissions' => ['student-transfer-out-create', 'student-transfer-out-view'],
    'active_when' => ['admin/admission/student-transfer-out*']
];

// Subitems de Configuración
$cardSettingsSubitem = [
    'title' => 'module_id_card_setting',
    'trans_count' => 1,
    'trans_count' => 1,
    'route' => 'admin.id-card-setting.index',
    'permissions' => ['id-card-setting-view'],
    'active_when' => ['admin/admission/id-card-setting*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

$transfersSubitems = [
    'incoming' => $transferIncomingSubitem,
    'outgoing' => $transferOutgoingSubitem
];

$settingsSubitems = [
    'card-settings' => $cardSettingsSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Items simples (sin subitems)
$applicationsItem = [
    'title' => 'module_application',
    'route' => 'admin.application.index',
    'permissions' => ['application-create', 'application-view'],
    'active_when' => ['admin/admission/application*']
];

$studentRegisterItem = [
    'title' => 'module_registration',
    'trans_count' => 1,
    'route' => 'admin.student.create',
    'permissions' => ['student-create'],
    'active_when' => ['admin/admission/student/create']
];

$studentListItem = [
    'title' => 'module_student' . ' ' . 'list',
    'route' => 'admin.student.index',
    'permissions' => ['student-view', 'student-password-print', 'student-password-change', 'student-card', 'student-import'],
    'active_when' => ['admin/admission/student']
];

$studentCardItem = [
    'title' => 'module_id_card',
    'route' => 'admin.id-card.index',
    'permissions' => ['student-card'],
    'active_when' => ['admin/admission/id-card']
];

$statusTypesItem = [
    'title' => 'module_status_type',
    'route' => 'admin.status-type.index',
    'permissions' => ['status-type-create', 'status-type-view'],
    'active_when' => ['admin/admission/status-type*']
];

// Items con subitems
$transfersItem = [
    'title' => 'module_student_transfer',
    'icon' => 'fas fa-exchange-alt',
    'route_pattern' => 'admin.student-transfer-*',
    'permissions' => ['student-transfer-in-create', 'student-transfer-in-view', 'student-transfer-out-create', 'student-transfer-out-view'],
    'active_when' => ['admin/admission/student-transfer*'],
    'subitems' => $transfersSubitems
];

$settingsItem = [
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.id-card-setting.*',
    'permissions' => ['id-card-setting-view'],
    'active_when' => ['admin/admission/id-card-setting*'],
    'subitems' => $settingsSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$admissionItems = [
    'applications' => $applicationsItem,
    'student-register' => $studentRegisterItem,
    'student-list' => $studentListItem,
    'transfers' => $transfersItem,
    'student-card' => $studentCardItem,
    'status-types' => $statusTypesItem,
    'settings' => $settingsItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$admissionModule = [
    'section' => 'admission',
    'title' => 'module_admission', // "Admisión y Estudiantes"
    'icon' => 'fas fa-university',
    'route_pattern' => 'admin.admission.*',
    'items' => $admissionItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $admissionModule;

