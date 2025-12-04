# 📋 Guía de Implementación del Sidebar Modular

## ✅ Estado Actual

### Módulos Implementados (Modulares)
- ✅ **Admisión y Estudiantes** (`admission.php`)
- ✅ **Gestión Académica** (`academic-management.php`)

### Módulos Pendientes (Estructura Original)
- ⏳ Horarios
- ⏳ Exámenes y Evaluación
- ⏳ Finanzas
- ⏳ Recursos Humanos
- ⏳ Comunicación
- ⏳ Biblioteca
- ⏳ Inventario
- ⏳ Residencia
- ⏳ Transporte
- ⏳ Recepción
- ⏳ Certificados
- ⏳ Reportes
- ⏳ Sitio Web
- ⏳ Configuración
- ⏳ Perfil

## 🚀 Cómo Continuar la Implementación

### Paso 1: Crear Archivo de Configuración

Para cada módulo pendiente, crear un archivo en `config/sidebar/` siguiendo el patrón:

```php
<?php
// config/sidebar/[nombre-modulo].php

// Construir subitems (nivel más bajo)
$subitem1 = [
    'title' => trans_choice('module_xxx', 2),
    'route' => 'admin.xxx.index',
    'permissions' => ['xxx-view', 'xxx-create'],
    'active_when' => ['admin/xxx*']
];

// Agrupar subitems
$subitems = [
    'key1' => $subitem1,
    // ...
];

// Construir items
$item1 = [
    'title' => trans_choice('module_xxx', 2),
    'route' => 'admin.xxx.index',
    'permissions' => ['xxx-view'],
    'active_when' => ['admin/xxx*'],
    'subitems' => $subitems // Si tiene subitems
];

// Agrupar items
$moduleItems = [
    'key1' => $item1,
    // ...
];

// Construir módulo completo
$module = [
    'section' => 'module-name',
    'title' => 'Nombre del Módulo',
    'icon' => 'fas fa-icon',
    'route_pattern' => 'admin.module.*',
    'items' => $moduleItems
];

return $module;
```

### Paso 2: Registrar en menu-items.php

Agregar el módulo a `config/sidebar/menu-items.php`:

```php
return [
    'admission' => require __DIR__ . '/admission.php',
    'academic-management' => require __DIR__ . '/academic-management.php',
    'new-module' => require __DIR__ . '/new-module.php', // ← Agregar aquí
];
```

### Paso 3: Crear Componente Blade

Crear `resources/views/admin/layouts/sidebar/components/[nombre-modulo].blade.php`:

```blade
@php
    $config = config('sidebar.[nombre-modulo]');
@endphp

@include('admin.layouts.sidebar.partials.nav-section', ['config' => $config])
```

### Paso 4: Incluir en Sidebar Principal

Agregar en `resources/views/admin/layouts/inc/sidebar.blade.php`:

```blade
@include('admin.layouts.sidebar.components.[nombre-modulo]')
```

## 📝 Notas Importantes

1. **Rutas NO cambian**: Todas las rutas se mantienen iguales
2. **Permisos NO cambian**: Todos los permisos se mantienen iguales
3. **Estructura**: Seguir el patrón de construcción de adentro hacia afuera
4. **Iconos**: Usar Font Awesome (fas fa-*)
5. **Traducciones**: Usar `trans_choice()` para los títulos

## 🔍 Verificación

Después de implementar cada módulo:

1. Verificar que las rutas funcionen
2. Verificar que los permisos funcionen
3. Verificar que los estados activos funcionen
4. Verificar que los iconos se muestren correctamente

## 📚 Referencias

- Ver `SIDEBAR_REORGANIZADO.md` para la estructura completa
- Ver `IMPLEMENTACION_SIDEBAR.md` para detalles de arquitectura
- Ver `config/sidebar/admission.php` como ejemplo completo

