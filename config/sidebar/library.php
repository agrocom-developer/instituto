<?php
/**
 * Configuración del módulo: Biblioteca
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Miembros
$libraryStudentSubitem = [
    'title' => 'module_student' . ' ' . 'list',
    'route' => 'admin.library-student.index',
    'permissions' => ['library-member-view', 'library-member-create', 'library-member-card'],
    'active_when' => ['admin/member/library-student*']
];

$libraryStaffSubitem = [
    'title' => 'module_staff' . ' ' . 'list',
    'route' => 'admin.library-staff.index',
    'permissions' => ['library-member-view', 'library-member-create', 'library-member-card'],
    'active_when' => ['admin/member/library-staff*']
];

$libraryOutsiderSubitem = [
    'title' => 'module_outsider' . ' ' . 'list',
    'route' => 'admin.library-outsider.index',
    'permissions' => ['library-member-view', 'library-member-create', 'library-member-card'],
    'active_when' => ['admin/member/library-outsider*']
];

// Subitems de Catálogo
$bookListSubitem = [
    'title' => 'module_book' . ' ' . 'list',
    'route' => 'admin.book-list.index',
    'permissions' => ['book-create', 'book-view', 'book-print'],
    'active_when' => ['admin/library/book-list*']
];

$bookRequestSubitem = [
    'title' => 'module_book_request', // "Solicitudes"
    'route' => 'admin.book-request.index',
    'permissions' => ['book-request-create', 'book-request-view'],
    'active_when' => ['admin/library/book-request*']
];

$bookCategorySubitem = [
    'title' => 'module_book_category', // "Categorías"
    'route' => 'admin.book-category.index',
    'permissions' => ['book-category-create', 'book-category-view'],
    'active_when' => ['admin/library/book-category*']
];

// Subitems de Configuración
$libraryCardSettingSubitem = [
    'title' => 'module_library_card_setting',
    'trans_count' => 1, // "Ajustes de Carnet"
    'route' => 'admin.library-card-setting.index',
    'permissions' => ['library-card-setting-view'],
    'active_when' => ['admin/library-card-setting*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Miembros
$membersSubitems = [
    'students' => $libraryStudentSubitem,
    'staff' => $libraryStaffSubitem,
    'outsiders' => $libraryOutsiderSubitem
];

// Agrupar subitems de Catálogo
$catalogSubitems = [
    'books' => $bookListSubitem,
    'requests' => $bookRequestSubitem,
    'categories' => $bookCategorySubitem
];

// Agrupar subitems de Configuración
$librarySettingsSubitems = [
    'card-setting' => $libraryCardSettingSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Préstamo de Libros (simple)
$bookIssueItem = [
    'title' => 'module_book_issue',
    'route' => 'admin.issue-return.create',
    'permissions' => ['book-issue-action'],
    'active_when' => ['admin/library/issue-return/create']
];

// Item: Historial de Préstamos (simple)
$bookIssueReturnItem = [
    'title' => 'module_book_issue_return',
    'route' => 'admin.issue-return.index',
    'permissions' => ['book-issue-action', 'book-issue-view'],
    'active_when' => ['admin/library/issue-return']
];

// Item: Miembros (con subitems)
$membersItem = [
    'title' => 'module_member',
    'icon' => 'fas fa-users',
    'route_pattern' => 'admin.library-student.*',
    'permissions' => ['library-member-view', 'library-member-create', 'library-member-card'],
    'active_when' => ['admin/member/library*'],
    'subitems' => $membersSubitems
];

// Item: Catálogo (con subitems)
$catalogItem = [
    'title' => 'Catálogo', // Nombre según nueva estructura
    'icon' => 'fas fa-book',
    'route_pattern' => 'admin.book-list.*',
    'permissions' => ['book-create', 'book-view', 'book-print', 'book-request-create', 'book-request-view', 'book-category-create', 'book-category-view'],
    'active_when' => ['admin/library/book-list*', 'admin/library/book-request*', 'admin/library/book-category*'],
    'subitems' => $catalogSubitems
];

// Item: Configuración (con subitems)
$librarySettingsItem = [
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.library-card-setting.*',
    'permissions' => ['library-card-setting-view'],
    'active_when' => ['admin/library-card-setting*'],
    'subitems' => $librarySettingsSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$libraryItems = [
    'book-issue' => $bookIssueItem,
    'book-issue-return' => $bookIssueReturnItem,
    'members' => $membersItem,
    'catalog' => $catalogItem,
    'settings' => $librarySettingsItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$libraryModule = [
    'section' => 'library',
    'title' => 'module_library',
    'icon' => 'fas fa-book-open',
    'route_pattern' => 'admin.library.*',
    'items' => $libraryItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $libraryModule;

