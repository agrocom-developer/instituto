<?php
/**
 * Configuración del módulo: Finanzas
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Cuotas de Estudiantes
$feesDueSubitem = [
    'title' => 'module_fees_due',
    'trans_count' => 1, // "Cuotas Pendientes"
    'route' => 'admin.fees-student.index',
    'permissions' => ['fees-student-due'],
    'active_when' => ['admin/fees-student']
];

$feesQuickAssignSubitem = [
    'title' => 'module_fees_quick_assign',
    'trans_count' => 1, // "Asignación Rápida"
    'route' => 'admin.fees-student.quick.assign',
    'permissions' => ['fees-student-quick-assign'],
    'active_when' => ['admin/fees-student-quick-assign*']
];

$feesQuickReceivedSubitem = [
    'title' => 'module_fees_quick_received',
    'trans_count' => 1, // "Cobro Rápido"
    'route' => 'admin.fees-student.quick.received',
    'permissions' => ['fees-student-quick-received'],
    'active_when' => ['admin/fees-student-quick-received*']
];

$feesReportSubitem = [
    'title' => 'module_fees_report', // "Reportes"
    'route' => 'admin.fees-student.report',
    'permissions' => ['fees-student-report', 'fees-student-print'],
    'active_when' => ['admin/fees-student-report*']
];

// Subitems de Gestión de Cuotas
$feesMasterCreateSubitem = [
    'title' => 'module_fees_master', // "Configurar Cuotas"
    'route' => 'admin.fees-master.create',
    'permissions' => ['fees-master-create'],
    'active_when' => ['admin/fees-master/create*']
];

$feesMasterViewSubitem = [
    'title' => 'module_fees_master_history', // "Historial"
    'route' => 'admin.fees-master.index',
    'permissions' => ['fees-master-view'],
    'active_when' => ['admin/fees-master']
];

$feesCategorySubitem = [
    'title' => 'module_fees_category', // "Categorías"
    'route' => 'admin.fees-category.index',
    'permissions' => ['fees-category-view', 'fees-category-create'],
    'active_when' => ['admin/fees-category*']
];

$feesDiscountSubitem = [
    'title' => 'module_fees_discount', // "Descuentos"
    'route' => 'admin.fees-discount.index',
    'permissions' => ['fees-discount-view', 'fees-discount-create'],
    'active_when' => ['admin/fees-discount*']
];

$feesFineSubitem = [
    'title' => 'module_fees_fine', // "Multas"
    'route' => 'admin.fees-fine.index',
    'permissions' => ['fees-fine-view', 'fees-fine-create'],
    'active_when' => ['admin/fees-fine*']
];

// Subitems de Nómina
$payrollGenerateSubitem = [
    'title' => 'module_payroll', // "Generar Nómina" / "Historial" (misma ruta)
    'route' => 'admin.payroll.index',
    'permissions' => ['payroll-view', 'payroll-action', 'payroll-print'],
    'active_when' => ['admin/staff/payroll']
];

$payrollReportSubitem = [
    'title' => 'module_payroll_report', // "Reportes"
    'route' => 'admin.payroll.report',
    'permissions' => ['payroll-report'],
    'active_when' => ['admin/staff/payroll-report*']
];

// Subitems de Ingresos y Gastos
$incomeSubitem = [
    'title' => 'module_income' . ' ' . 'list', // "Ingresos"
    'route' => 'admin.income.index',
    'permissions' => ['income-create', 'income-view'],
    'active_when' => ['admin/account/income*']
];

$incomeCategorySubitem = [
    'title' => 'module_income_category', // "Categorías de Ingreso"
    'route' => 'admin.income-category.index',
    'permissions' => ['income-category-create', 'income-category-view'],
    'active_when' => ['admin/account/income-category*']
];

$expenseSubitem = [
    'title' => 'module_expense' . ' ' . 'list', // "Gastos"
    'route' => 'admin.expense.index',
    'permissions' => ['expense-create', 'expense-view'],
    'active_when' => ['admin/account/expense*']
];

$expenseCategorySubitem = [
    'title' => 'module_expense_category', // "Categorías de Gasto"
    'route' => 'admin.expense-category.index',
    'permissions' => ['expense-category-create', 'expense-category-view'],
    'active_when' => ['admin/account/expense-category*']
];

$outcomeSubitem = [
    'title' => 'module_outcome_calculation', // "Cálculo de Resultados"
    'route' => 'admin.outcome.index',
    'permissions' => ['outcome-view'],
    'active_when' => ['admin/account/outcome*']
];

// Subitems de Configuración
$feesReceiptSubitem = [
    'title' => 'module_fees_receipt_setting',
    'trans_count' => 1, // "Ajustes de Recibo"
    'route' => 'admin.fees-receipt.index',
    'permissions' => ['fees-receipt-view'],
    'active_when' => ['admin/fees-receipt*']
];

$payrollSettingsSubitem = [
    'title' => 'module_pay_slip_setting',
    'trans_count' => 1, // "Ajustes de Nómina"
    'route' => 'admin.pay-slip-setting.index',
    'permissions' => ['pay-slip-setting-view'],
    'active_when' => ['admin/staff/pay-slip-setting*']
];

$taxSettingsSubitem = [
    'title' => 'module_tax_setting', // "Configuración de Impuestos"
    'route' => 'admin.tax-setting.index',
    'permissions' => ['tax-setting-create', 'tax-setting-view'],
    'active_when' => ['admin/staff/tax-setting*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Cuotas de Estudiantes
$studentFeesSubitems = [
    'due' => $feesDueSubitem,
    'quick-assign' => $feesQuickAssignSubitem,
    'quick-received' => $feesQuickReceivedSubitem,
    'report' => $feesReportSubitem
];

// Agrupar subitems de Gestión de Cuotas
$feesManagementSubitems = [
    'create' => $feesMasterCreateSubitem,
    'history' => $feesMasterViewSubitem,
    'category' => $feesCategorySubitem,
    'discount' => $feesDiscountSubitem,
    'fine' => $feesFineSubitem
];

// Agrupar subitems de Nómina
$payrollSubitems = [
    'generate' => $payrollGenerateSubitem,
    'report' => $payrollReportSubitem
];

// Agrupar subitems de Ingresos y Gastos
$incomeExpenseSubitems = [
    'income' => $incomeSubitem,
    'income-category' => $incomeCategorySubitem,
    'expense' => $expenseSubitem,
    'expense-category' => $expenseCategorySubitem,
    'outcome' => $outcomeSubitem
];

// Agrupar subitems de Configuración
$financesSettingsSubitems = [
    'receipt' => $feesReceiptSubitem,
    'payroll' => $payrollSettingsSubitem,
    'tax' => $taxSettingsSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Cuotas de Estudiantes (con subitems)
$studentFeesItem = [
    'title' => 'module_student_fees',
    'icon' => 'fas fa-money-bill-wave',
    'route_pattern' => 'admin.fees-student.*',
    'permissions' => ['fees-student-due', 'fees-student-quick-assign', 'fees-student-quick-received', 'fees-student-report', 'fees-student-print'],
    'active_when' => ['admin/fees-student*'],
    'subitems' => $studentFeesSubitems
];

// Item: Gestión de Cuotas (con subitems)
$feesManagementItem = [
    'title' => 'Gestión de Cuotas', // Nombre según nueva estructura
    'icon' => 'fas fa-cogs',
    'route_pattern' => 'admin.fees-master.*',
    'permissions' => ['fees-master-view', 'fees-master-create', 'fees-category-view', 'fees-category-create', 'fees-discount-view', 'fees-discount-create', 'fees-fine-view', 'fees-fine-create'],
    'active_when' => ['admin/fees-master*', 'admin/fees-category*', 'admin/fees-discount*', 'admin/fees-fine*'],
    'subitems' => $feesManagementSubitems
];

// Item: Nómina (con subitems)
// Nota: "Generar Nómina" e "Historial" comparten la misma ruta (admin.payroll.index)
// Se muestra como un solo item "Generar Nómina" que incluye el historial
$payrollItem = [
    'title' => 'module_payroll',
    'icon' => 'fas fa-file-invoice-dollar',
    'route_pattern' => 'admin.payroll.*',
    'permissions' => ['payroll-view', 'payroll-action', 'payroll-print', 'payroll-report'],
    'active_when' => ['admin/staff/payroll*'],
    'subitems' => $payrollSubitems
];

// Item: Ingresos y Gastos (con subitems)
$incomeExpenseItem = [
    'title' => 'module_income_expense',
    'icon' => 'fas fa-chart-line',
    'route_pattern' => 'admin.income.*',
    'permissions' => ['income-create', 'income-view', 'income-category-create', 'income-category-view', 'expense-create', 'expense-view', 'expense-category-create', 'expense-category-view', 'outcome-view'],
    'active_when' => ['admin/account/*'],
    'subitems' => $incomeExpenseSubitems
];

// Item: Configuración (con subitems)
$financesSettingsItem = [
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.fees-receipt.*',
    'permissions' => ['fees-receipt-view', 'pay-slip-setting-view', 'tax-setting-create', 'tax-setting-view'],
    'active_when' => ['admin/fees-receipt*', 'admin/staff/pay-slip-setting*', 'admin/staff/tax-setting*'],
    'subitems' => $financesSettingsSubitems
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

$financesItems = [
    'student-fees' => $studentFeesItem,
    'fees-management' => $feesManagementItem,
    'payroll' => $payrollItem,
    'income-expense' => $incomeExpenseItem,
    'settings' => $financesSettingsItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$financesModule = [
    'section' => 'finances',
    'title' => 'module_finances', // "Finanzas" (antes "Cobro de Tarifas")
    'icon' => 'fas fa-money-bill-wave',
    'route_pattern' => 'admin.fees*',
    'items' => $financesItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $financesModule;

