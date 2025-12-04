<?php
/**
 * Configuración del módulo: Residencia
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Residentes
$hostelStudentSubitem = [
    'title' => 'module_student' . ' ' . 'list',
    'route' => 'admin.hostel-student.index',
    'permissions' => ['hostel-member-create', 'hostel-member-view'],
    'active_when' => ['admin/hostel-student*']
];

$hostelStaffSubitem = [
    'title' => 'module_staff' . ' ' . 'list',
    'route' => 'admin.hostel-staff.index',
    'permissions' => ['hostel-member-create', 'hostel-member-view'],
    'active_when' => ['admin/hostel-staff*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Residentes
$residentsSubitems = [
    'students' => $hostelStudentSubitem,
    'staff' => $hostelStaffSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Residentes (con subitems)
$residentsItem = [
    'title' => 'module_member',
    'icon' => 'fas fa-users',
    'route_pattern' => 'admin.hostel-student.*',
    'permissions' => ['hostel-member-create', 'hostel-member-view'],
    'active_when' => ['admin/hostel-student*', 'admin/hostel-staff*'],
    'subitems' => $residentsSubitems
];

// Item: Habitaciones (simple)
$hostelRoomsItem = [
    'title' => 'module_hostel_room',
    'route' => 'admin.hostel-room.index',
    'permissions' => ['hostel-room-create', 'hostel-room-view'],
    'active_when' => ['admin/hostel/hostel-room*']
];

// Item: Edificios (simple)
$hostelBuildingsItem = [
    'title' => 'module_hostel' . ' ' . 'list',
    'route' => 'admin.hostel.index',
    'permissions' => ['hostel-create', 'hostel-view'],
    'active_when' => ['admin/hostel/hostel']
];

// Item: Tipos de Habitación (simple)
$roomTypesItem = [
    'title' => 'module_room_type',
    'route' => 'admin.room-type.index',
    'permissions' => ['room-type-create', 'room-type-view'],
    'active_when' => ['admin/hostel/room-type*']
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$residenceItems = [
    'residents' => $residentsItem,
    'rooms' => $hostelRoomsItem,
    'buildings' => $hostelBuildingsItem,
    'room-types' => $roomTypesItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$residenceModule = [
    'section' => 'residence',
    'title' => 'module_residence', // "Residencia" (antes "Hostel")
    'icon' => 'fas fa-hotel',
    'route_pattern' => 'admin.hostel.*',
    'items' => $residenceItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $residenceModule;

