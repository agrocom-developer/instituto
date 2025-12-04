<?php
/**
 * Configuración del módulo: Certificados
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Boletas de Calificaciones
$marksheetSemesterSubitem = [
    'title' => 'module_marksheet_semester', // "Por Semestre"
    'route' => 'admin.marksheet.semester',
    'permissions' => ['marksheet-view', 'marksheet-print', 'marksheet-download'],
    'active_when' => ['admin/transcript/marksheet-semester*']
];

$marksheetTotalSubitem = [
    'title' => 'module_marksheet_total', // "Totales"
    'route' => 'admin.marksheet.index',
    'permissions' => ['marksheet-view', 'marksheet-print', 'marksheet-download'],
    'active_when' => ['admin/transcript/marksheet']
];

$marksheetSettingSubitem = [
    'title' => 'module_marksheet_setting',
    'trans_count' => 1, // "Configuración"
    'route' => 'admin.marksheet-setting.index',
    'permissions' => ['marksheet-setting-view'],
    'active_when' => ['admin/transcript/marksheet-setting*']
];

// Subitems de Certificados
$certificateGenerateSubitem = [
    'title' => 'module_certificate', // "Generar Certificados"
    'route' => 'admin.certificate.index',
    'permissions' => ['certificate-view', 'certificate-create', 'certificate-print', 'certificate-download'],
    'active_when' => ['admin/transcript/certificate*']
];

$certificateTemplateSubitem = [
    'title' => 'module_certificate_template', // "Plantillas"
    'route' => 'admin.certificate-template.index',
    'permissions' => ['certificate-template-view', 'certificate-template-create'],
    'active_when' => ['admin/transcript/certificate-template*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Boletas de Calificaciones
$marksheetSubitems = [
    'semester' => $marksheetSemesterSubitem,
    'total' => $marksheetTotalSubitem,
    'setting' => $marksheetSettingSubitem
];

// Agrupar subitems de Certificados
$certificatesSubitems = [
    'generate' => $certificateGenerateSubitem,
    'templates' => $certificateTemplateSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Boletas de Calificaciones (con subitems)
$marksheetItem = [
    'title' => 'Boletas de Calificaciones', // Nombre según nueva estructura
    'icon' => 'fas fa-file-alt',
    'route_pattern' => 'admin.marksheet.*',
    'permissions' => ['marksheet-view', 'marksheet-print', 'marksheet-download', 'marksheet-setting-view'],
    'active_when' => ['admin/transcript/marksheet*'],
    'subitems' => $marksheetSubitems
];

// Item: Certificados (con subitems)
$certificatesItem = [
    'title' => 'module_certificate',
    'icon' => 'fas fa-certificate',
    'route_pattern' => 'admin.certificate.*',
    'permissions' => ['certificate-view', 'certificate-create', 'certificate-print', 'certificate-download', 'certificate-template-view', 'certificate-template-create'],
    'active_when' => ['admin/transcript/certificate*'],
    'subitems' => $certificatesSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$certificatesItems = [
    'marksheet' => $marksheetItem,
    'certificates' => $certificatesItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$certificatesModule = [
    'section' => 'certificates',
    'title' => 'module_certificates', // "Certificados" (antes "Transcripción")
    'icon' => 'fas fa-address-card',
    'route_pattern' => 'admin.transcript.*',
    'items' => $certificatesItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $certificatesModule;

