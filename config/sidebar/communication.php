<?php
/**
 * Configuración del módulo: Comunicación
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Eventos
$eventListSubitem = [
    'title' => 'module_event' . ' ' . 'list', // "Lista de Eventos"
    'route' => 'admin.event.index',
    'permissions' => ['event-create', 'event-view'],
    'active_when' => ['admin/communicate/event']
];

$eventCalendarSubitem = [
    'title' => 'module_calendar', // "Calendario"
    'route' => 'admin.event.calendar',
    'permissions' => ['event-calendar'],
    'active_when' => ['admin/communicate/event-calendar']
];

// Subitems de Avisos
$noticeListSubitem = [
    'title' => 'module_notice' . ' ' . 'list', // "Lista de Avisos"
    'route' => 'admin.notice.index',
    'permissions' => ['notice-create', 'notice-view'],
    'active_when' => ['admin/communicate/notice*']
];

$noticeCategorySubitem = [
    'title' => 'module_notice_category', // "Categorías"
    'route' => 'admin.notice-category.index',
    'permissions' => ['notice-category-create', 'notice-category-view'],
    'active_when' => ['admin/communicate/notice-category*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Eventos
$eventsSubitems = [
    'list' => $eventListSubitem,
    'calendar' => $eventCalendarSubitem
];

// Agrupar subitems de Avisos
$noticesSubitems = [
    'list' => $noticeListSubitem,
    'categories' => $noticeCategorySubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Notificaciones por Email (simple)
$emailNotifyItem = [
    'title' => 'module_email_notify',
    'route' => 'admin.email-notify.index',
    'permissions' => ['email-notify-create', 'email-notify-view'],
    'active_when' => ['admin/communicate/email-notify*']
];

// Item: Notificaciones por SMS (simple)
$smsNotifyItem = [
    'title' => 'module_sms_notify',
    'route' => 'admin.sms-notify.index',
    'permissions' => ['sms-notify-create', 'sms-notify-view'],
    'active_when' => ['admin/communicate/sms-notify*']
];

// Item: Eventos (con subitems)
$eventsItem = [
    'title' => 'module_event',
    'icon' => 'fas fa-calendar-alt',
    'route_pattern' => 'admin.event.*',
    'permissions' => ['event-create', 'event-view', 'event-calendar'],
    'active_when' => ['admin/communicate/event*'],
    'subitems' => $eventsSubitems
];

// Item: Avisos (con subitems)
$noticesItem = [
    'title' => 'Avisos', // Nombre según nueva estructura
    'icon' => 'fas fa-bullhorn',
    'route_pattern' => 'admin.notice.*',
    'permissions' => ['notice-create', 'notice-view', 'notice-category-create', 'notice-category-view'],
    'active_when' => ['admin/communicate/notice*'],
    'subitems' => $noticesSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$communicationItems = [
    'email-notify' => $emailNotifyItem,
    'sms-notify' => $smsNotifyItem,
    'events' => $eventsItem,
    'notices' => $noticesItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$communicationModule = [
    'section' => 'communication',
    'title' => 'module_communication', // "Comunicación" (antes "Comunicar")
    'icon' => 'fas fa-bullhorn',
    'route_pattern' => 'admin.communicate.*',
    'items' => $communicationItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $communicationModule;

