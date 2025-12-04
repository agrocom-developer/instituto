<?php
/**
 * Configuración del módulo: Perfil
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Nota: El módulo de Perfil es simple, no tiene subitems en la estructura actual
// Pero incluye rutas adicionales para cuenta y cambio de contraseña/correo

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// No hay subitems para agrupar en este módulo

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Mi Perfil (simple)
$profileItem = [
    'title' => 'module_profile', // "Mi Perfil"
    'route' => 'admin.profile.index',
    'permissions' => ['profile-view', 'profile-edit'],
    'active_when' => ['admin/profile*']
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$profileItems = [
    'profile' => $profileItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$profileModule = [
    'section' => 'profile',
    'title' => 'module_profile', // "Mi Perfil"
    'icon' => 'fas fa-user-edit',
    'route_pattern' => 'admin.profile.*',
    'items' => $profileItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $profileModule;

