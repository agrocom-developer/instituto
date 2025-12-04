<?php
/**
 * Configuración del módulo: Inventario
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Catálogo
$itemListSubitem = [
    'title' => 'module_item' . ' ' . 'list', // "Artículos"
    'route' => 'admin.item-list.index',
    'permissions' => ['item-create', 'item-view'],
    'active_when' => ['admin/inventory/item-list*']
];

$itemStoreSubitem = [
    'title' => 'module_item_store', // "Almacenes"
    'route' => 'admin.item-store.index',
    'permissions' => ['item-store-create', 'item-store-view'],
    'active_when' => ['admin/inventory/item-store*']
];

$itemSupplierSubitem = [
    'title' => 'module_item_supplier', // "Proveedores"
    'route' => 'admin.item-supplier.index',
    'permissions' => ['item-supplier-create', 'item-supplier-view'],
    'active_when' => ['admin/inventory/item-supplier*']
];

$itemCategorySubitem = [
    'title' => 'module_item_category', // "Categorías"
    'route' => 'admin.item-category.index',
    'permissions' => ['item-category-create', 'item-category-view'],
    'active_when' => ['admin/inventory/item-category*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Catálogo
$catalogSubitems = [
    'items' => $itemListSubitem,
    'stores' => $itemStoreSubitem,
    'suppliers' => $itemSupplierSubitem,
    'categories' => $itemCategorySubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Préstamo de Artículos (simple)
$itemIssueItem = [
    'title' => 'module_item_issue',
    'route' => 'admin.item-issue.create',
    'permissions' => ['item-issue-action'],
    'active_when' => ['admin/inventory/item-issue/create']
];

// Item: Stock (simple)
// Nota: "Stock" incluye tanto el préstamo/retorno como el stock mismo
$itemStockItem = [
    'title' => 'module_item_stock',
    'route' => 'admin.item-stock.index',
    'permissions' => ['item-stock-create', 'item-stock-view'],
    'active_when' => ['admin/inventory/item-stock*']
];

// Item: Historial de Préstamos (simple)
// Nota: Este item muestra el historial de préstamos y devoluciones
$itemIssueReturnItem = [
    'title' => 'module_item_issue_return', // "Historial de Préstamos"
    'route' => 'admin.item-issue.index',
    'permissions' => ['item-issue-action', 'item-issue-view'],
    'active_when' => ['admin/inventory/item-issue']
];

// Item: Catálogo (con subitems)
$catalogItem = [
    'title' => 'Catálogo', // Nombre según nueva estructura
    'icon' => 'fas fa-boxes',
    'route_pattern' => 'admin.item-list.*',
    'permissions' => ['item-create', 'item-view', 'item-store-create', 'item-store-view', 'item-supplier-create', 'item-supplier-view', 'item-category-create', 'item-category-view'],
    'active_when' => ['admin/inventory/item-list*', 'admin/inventory/item-store*', 'admin/inventory/item-supplier*', 'admin/inventory/item-category*'],
    'subitems' => $catalogSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$inventoryItems = [
    'item-issue' => $itemIssueItem,
    'item-issue-return' => $itemIssueReturnItem,
    'stock' => $itemStockItem,
    'catalog' => $catalogItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$inventoryModule = [
    'section' => 'inventory',
    'title' => 'module_inventory',
    'icon' => 'fas fa-dolly-flatbed',
    'route_pattern' => 'admin.inventory.*',
    'items' => $inventoryItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $inventoryModule;

