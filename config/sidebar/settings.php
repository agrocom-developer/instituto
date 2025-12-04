<?php
/**
 * Configuración del módulo: Configuración
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Ubicaciones
$provinceSubitem = [
    'title' => 'module_province', // "Provincias"
    'route' => 'admin.province.index',
    'permissions' => ['province-view', 'province-create'],
    'active_when' => ['admin/setting/province*']
];

$districtSubitem = [
    'title' => 'module_district', // "Distritos"
    'route' => 'admin.district.index',
    'permissions' => ['district-view', 'district-create'],
    'active_when' => ['admin/setting/district*']
];

// Subitems de Idiomas y Traducciones
$languageSubitem = [
    'title' => 'module_language', // "Idiomas"
    'route' => 'admin.language.index',
    'permissions' => ['language-view', 'language-create'],
    'active_when' => ['admin/setting/language*']
];

$translationsSubitem = [
    'title' => 'module_translate', // "Traducciones"
    'route' => 'admin.translations.index',
    'permissions' => ['translations-view', 'translations-create'],
    'active_when' => ['admin/translations*']
];

// Subitems de Integraciones
$mailSettingSubitem = [
    'title' => 'module_mail_setting',
    'trans_count' => 1, // "Correo Electrónico"
    'route' => 'admin.mail-setting.index',
    'permissions' => ['setting-mail'],
    'active_when' => ['admin/setting/mail-setting*']
];

$smsSettingSubitem = [
    'title' => 'module_sms_setting', // "SMS"
    'route' => 'admin.sms-setting.index',
    'permissions' => ['setting-sms'],
    'active_when' => ['admin/setting/sms-setting*']
];

$paymentSettingSubitem = [
    'title' => 'module_payment_setting', // "Pagos"
    'route' => 'admin.payment-setting.index',
    'permissions' => ['setting-payment'],
    'active_when' => ['admin/setting/payment-setting*']
];

// Subitems de Configuración de Formularios
$fieldStaffSubitem = [
    'title' => 'module_staff', // "Personal"
    'route' => 'admin.field.user',
    'permissions' => ['field-staff'],
    'active_when' => ['admin/setting/field-user*']
];

$fieldStudentSubitem = [
    'title' => 'module_student', // "Estudiantes"
    'route' => 'admin.field.student',
    'permissions' => ['field-student'],
    'active_when' => ['admin/setting/field-student*']
];

$fieldApplicationSubitem = [
    'title' => 'module_application', // "Postulaciones"
    'route' => 'admin.field.application',
    'permissions' => ['field-application'],
    'active_when' => ['admin/setting/field-application*']
];

$studentPanelSubitem = [
    'title' => 'module_student_panel', // "Panel de Estudiante"
    'route' => 'admin.student.panel',
    'permissions' => ['student-panel-view'],
    'active_when' => ['admin/setting/student-panel*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Ubicaciones
$locationSubitems = [
    'province' => $provinceSubitem,
    'district' => $districtSubitem
];

// Agrupar subitems de Idiomas y Traducciones
$languageTranslationSubitems = [
    'language' => $languageSubitem,
    'translations' => $translationsSubitem
];

// Agrupar subitems de Integraciones
$integrationSubitems = [
    'mail' => $mailSettingSubitem,
    'sms' => $smsSettingSubitem,
    'payment' => $paymentSettingSubitem
];

// Agrupar subitems de Configuración de Formularios
$formSettingSubitems = [
    'staff' => $fieldStaffSubitem,
    'student' => $fieldStudentSubitem,
    'application' => $fieldApplicationSubitem,
    'student-panel' => $studentPanelSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: General (simple)
$generalSettingItem = [
    'title' => 'module_general_setting',
    'trans_count' => 1, // "General"
    'route' => 'admin.setting.index',
    'permissions' => ['setting-view'],
    'active_when' => ['admin/setting']
];

// Item: Ubicaciones (con subitems)
$locationItem = [
    'title' => 'Ubicaciones', // Nombre según nueva estructura
    'icon' => 'fas fa-map-marker-alt',
    'route_pattern' => 'admin.province.*',
    'permissions' => ['province-view', 'province-create', 'district-view', 'district-create'],
    'active_when' => ['admin/setting/province*', 'admin/setting/district*'],
    'subitems' => $locationSubitems
];

// Item: Idiomas y Traducciones (con subitems)
$languageTranslationItem = [
    'title' => 'Idiomas y Traducciones', // Nombre según nueva estructura
    'icon' => 'fas fa-language',
    'route_pattern' => 'admin.language.*',
    'permissions' => ['language-view', 'language-create', 'translations-view', 'translations-create'],
    'active_when' => ['admin/setting/language*', 'admin/translations*'],
    'subitems' => $languageTranslationSubitems
];

// Item: Integraciones (con subitems)
$integrationItem = [
    'title' => 'Integraciones', // Nombre según nueva estructura
    'icon' => 'fas fa-plug',
    'route_pattern' => 'admin.mail-setting.*',
    'permissions' => ['setting-mail', 'setting-sms', 'setting-payment'],
    'active_when' => ['admin/setting/mail-setting*', 'admin/setting/sms-setting*', 'admin/setting/payment-setting*'],
    'subitems' => $integrationSubitems
];

// Item: Configuración de Formularios (con subitems)
$formSettingItem = [
    'title' => 'Configuración de Formularios', // Nombre según nueva estructura
    'icon' => 'fas fa-wpforms',
    'route_pattern' => 'admin.field.*',
    'permissions' => ['field-staff', 'field-student', 'field-application', 'student-panel-view'],
    'active_when' => ['admin/setting/field*', 'admin/setting/student-panel*'],
    'subitems' => $formSettingSubitems
];

// Item: Configuración de Postulaciones (simple)
$applicationSettingItem = [
    'title' => 'module_application_setting', // "Configuración de Postulaciones"
    'route' => 'admin.application-setting.index',
    'permissions' => ['application-setting-view'],
    'active_when' => ['admin/setting/application-setting*']
];

// Item: Roles y Permisos (simple)
$roleItem = [
    'title' => 'module_role', // "Roles y Permisos"
    'route' => 'admin.role.index',
    'permissions' => ['role-view', 'role-edit'],
    'active_when' => ['admin/setting/role*']
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$settingsItems = [
    'general' => $generalSettingItem,
    'location' => $locationItem,
    'language-translation' => $languageTranslationItem,
    'integration' => $integrationItem,
    'form-setting' => $formSettingItem,
    'application-setting' => $applicationSettingItem,
    'role' => $roleItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$settingsModule = [
    'section' => 'settings',
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.setting.*',
    'items' => $settingsItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $settingsModule;

