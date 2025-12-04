<?php
/**
 * Configuración del módulo: Transporte
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Usuarios
$transportStudentSubitem = [
    'title' => 'module_student' . ' ' . 'list',
    'route' => 'admin.transport-student.index',
    'permissions' => ['transport-member-create', 'transport-member-view'],
    'active_when' => ['admin/transport-student*']
];

$transportStaffSubitem = [
    'title' => 'module_staff' . ' ' . 'list',
    'route' => 'admin.transport-staff.index',
    'permissions' => ['transport-member-create', 'transport-member-view'],
    'active_when' => ['admin/transport-staff*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Usuarios
$usersSubitems = [
    'students' => $transportStudentSubitem,
    'staff' => $transportStaffSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Usuarios (con subitems)
$usersItem = [
    'title' => 'module_member', // "Usuarios" según nueva estructura
    'icon' => 'fas fa-users',
    'route_pattern' => 'admin.transport-student.*',
    'permissions' => ['transport-member-create', 'transport-member-view'],
    'active_when' => ['admin/transport-student*', 'admin/transport-staff*'],
    'subitems' => $usersSubitems
];

// Item: Vehículos (simple)
$vehiclesItem = [
    'title' => 'module_transport_vehicle',
    'route' => 'admin.transport-vehicle.index',
    'permissions' => ['transport-vehicle-create', 'transport-vehicle-view'],
    'active_when' => ['admin/transport-vehicle*']
];

// Item: Rutas (simple)
$routesItem = [
    'title' => 'module_transport_route',
    'route' => 'admin.transport-route.index',
    'permissions' => ['transport-route-create', 'transport-route-view'],
    'active_when' => ['admin/transport-route*']
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$transportItems = [
    'users' => $usersItem,
    'vehicles' => $vehiclesItem,
    'routes' => $routesItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$transportModule = [
    'section' => 'transport',
    'title' => 'module_transport',
    'icon' => 'fas fa-bus-alt',
    'route_pattern' => 'admin.transport.*',
    'items' => $transportItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $transportModule;

