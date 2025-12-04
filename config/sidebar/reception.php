<?php
/**
 * Configuración del módulo: Recepción
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Configuración
$visitPurposeSubitem = [
    'title' => 'module_visit_purpose',
    'trans_count' => 1, // "Propósitos de Visita"
    'route' => 'admin.visit-purpose.index',
    'permissions' => ['visit-purpose-create', 'visit-purpose-view'],
    'active_when' => ['admin/frontdesk/visit-purpose*']
];

$visitorTokenSettingSubitem = [
    'title' => 'module_visitor_token_setting',
    'trans_count' => 1, // "Ajustes de Token"
    'route' => 'admin.visitor-token-setting.index',
    'permissions' => ['visitor-token-setting-view'],
    'active_when' => ['admin/frontdesk/visitor-token-setting*']
];

$enquirySourceSubitem = [
    'title' => 'module_enquiry_source',
    'trans_count' => 1, // "Fuentes"
    'route' => 'admin.enquiry-source.index',
    'permissions' => ['enquiry-source-create', 'enquiry-source-view'],
    'active_when' => ['admin/frontdesk/enquiry-source*']
];

$enquiryReferenceSubitem = [
    'title' => 'module_enquiry_reference',
    'trans_count' => 1, // "Referencias"
    'route' => 'admin.enquiry-reference.index',
    'permissions' => ['enquiry-reference-create', 'enquiry-reference-view'],
    'active_when' => ['admin/frontdesk/enquiry-reference*']
];

$complainTypeSubitem = [
    'title' => 'module_complain_type',
    'trans_count' => 1, // "Tipos (Quejas)"
    'route' => 'admin.complain-type.index',
    'permissions' => ['complain-type-create', 'complain-type-view'],
    'active_when' => ['admin/frontdesk/complain-type*']
];

$complainSourceSubitem = [
    'title' => 'module_complain_source',
    'trans_count' => 1, // "Fuentes (Quejas)"
    'route' => 'admin.complain-source.index',
    'permissions' => ['complain-source-create', 'complain-source-view'],
    'active_when' => ['admin/frontdesk/complain-source*']
];

$postalTypeSubitem = [
    'title' => 'module_postal_type',
    'trans_count' => 1, // "Tipos (Correo)"
    'route' => 'admin.postal-type.index',
    'permissions' => ['postal-type-create', 'postal-type-view'],
    'active_when' => ['admin/frontdesk/postal-type*']
];

$meetingTypeSubitem = [
    'title' => 'module_meeting_type',
    'trans_count' => 1, // "Tipos de Reunión"
    'route' => 'admin.meeting-type.index',
    'permissions' => ['meeting-type-create', 'meeting-type-view'],
    'active_when' => ['admin/frontdesk/meeting-type*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Configuración
$receptionSettingsSubitems = [
    'visit-purpose' => $visitPurposeSubitem,
    'token-setting' => $visitorTokenSettingSubitem,
    'enquiry-source' => $enquirySourceSubitem,
    'enquiry-reference' => $enquiryReferenceSubitem,
    'complain-type' => $complainTypeSubitem,
    'complain-source' => $complainSourceSubitem,
    'postal-type' => $postalTypeSubitem,
    'meeting-type' => $meetingTypeSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Registro de Visitas (simple)
$visitorLogItem = [
    'title' => 'module_visitor_log',
    'route' => 'admin.visitor.index',
    'permissions' => ['visitor-create', 'visitor-view', 'visitor-print'],
    'active_when' => ['admin/frontdesk/visit*']
];

// Item: Registro Telefónico (simple)
$phoneLogItem = [
    'title' => 'module_phone_log',
    'route' => 'admin.phone-log.index',
    'permissions' => ['phone-log-create', 'phone-log-view'],
    'active_when' => ['admin/frontdesk/phone-log*']
];

// Item: Consultas (simple)
$enquiryItem = [
    'title' => 'module_enquiry' . ' ' . 'list',
    'route' => 'admin.enquiry.index',
    'permissions' => ['enquiry-create', 'enquiry-view'],
    'active_when' => ['admin/frontdesk/enquiry*']
];

// Item: Quejas (simple)
$complainItem = [
    'title' => 'module_complain' . ' ' . 'list',
    'route' => 'admin.complain.index',
    'permissions' => ['complain-create', 'complain-view'],
    'active_when' => ['admin/frontdesk/complain*']
];

// Item: Correspondencia (simple)
$postalExchangeItem = [
    'title' => 'module_postal_exchange',
    'route' => 'admin.postal-exchange.index',
    'permissions' => ['postal-exchange-create', 'postal-exchange-view'],
    'active_when' => ['admin/frontdesk/postal*']
];

// Item: Reuniones (simple)
$meetingItem = [
    'title' => 'module_meeting',
    'route' => 'admin.meeting.index',
    'permissions' => ['meeting-create', 'meeting-view'],
    'active_when' => ['admin/frontdesk/meeting*']
];

// Item: Configuración (con subitems)
$receptionSettingsItem = [
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.visit-purpose.*',
    'permissions' => [
        'visit-purpose-create', 'visit-purpose-view',
        'visitor-token-setting-view',
        'enquiry-source-create', 'enquiry-source-view',
        'enquiry-reference-create', 'enquiry-reference-view',
        'complain-type-create', 'complain-type-view',
        'complain-source-create', 'complain-source-view',
        'postal-type-create', 'postal-type-view',
        'meeting-type-create', 'meeting-type-view'
    ],
    'active_when' => [
        'admin/frontdesk/visit-purpose*',
        'admin/frontdesk/visitor-token-setting*',
        'admin/frontdesk/enquiry-source*',
        'admin/frontdesk/enquiry-reference*',
        'admin/frontdesk/complain-type*',
        'admin/frontdesk/complain-source*',
        'admin/frontdesk/postal-type*',
        'admin/frontdesk/meeting-type*'
    ],
    'subitems' => $receptionSettingsSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$receptionItems = [
    'visitor-log' => $visitorLogItem,
    'phone-log' => $phoneLogItem,
    'enquiry' => $enquiryItem,
    'complain' => $complainItem,
    'postal-exchange' => $postalExchangeItem,
    'meeting' => $meetingItem,
    'settings' => $receptionSettingsItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$receptionModule = [
    'section' => 'reception',
    'title' => 'module_reception', // "Recepción" (antes "Front Desk")
    'icon' => 'fas fa-desktop',
    'route_pattern' => 'admin.frontdesk.*',
    'items' => $receptionItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $receptionModule;

