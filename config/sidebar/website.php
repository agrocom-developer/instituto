<?php
/**
 * Configuración del módulo: Sitio Web
 * Construcción modular de adentro hacia afuera
 * Respeta todas las rutas existentes del sistema
 */

// ============================================
// PASO 1: Construir Subitems (Nivel más bajo)
// ============================================

// Subitems de Configuración
$topbarSettingSubitem = [
    'title' => 'module_topbar_setting',
    'trans_count' => 1, // "Barra Superior"
    'route' => 'admin.topbar-setting.index',
    'permissions' => ['topbar-setting-view'],
    'active_when' => ['admin/web/topbar-setting*']
];

$socialSettingSubitem = [
    'title' => 'module_social_setting',
    'trans_count' => 1, // "Redes Sociales"
    'route' => 'admin.social-setting.index',
    'permissions' => ['social-setting-view'],
    'active_when' => ['admin/web/social-setting*']
];

// ============================================
// PASO 2: Agrupar Subitems en Arrays
// ============================================

// Agrupar subitems de Configuración
$websiteSettingsSubitems = [
    'topbar' => $topbarSettingSubitem,
    'social' => $socialSettingSubitem
];

// ============================================
// PASO 3: Construir Items (Nivel intermedio)
// ============================================

// Item: Configuración (con subitems)
$websiteSettingsItem = [
    'title' => 'module_setting',
    'icon' => 'fas fa-cog',
    'route_pattern' => 'admin.topbar-setting.*',
    'permissions' => ['topbar-setting-view', 'social-setting-view'],
    'active_when' => ['admin/web/topbar-setting*', 'admin/web/social-setting*'],
    'subitems' => $websiteSettingsSubitems
];

// Item: Sliders (simple)
$sliderItem = [
    'title' => 'module_slider',
    'route' => 'admin.slider.index',
    'permissions' => ['slider-view', 'slider-create'],
    'active_when' => ['admin/web/slider*']
];

// Item: Sobre Nosotros (simple)
$aboutUsItem = [
    'title' => 'module_about_us',
    'trans_count' => 1,
    'route' => 'admin.about-us.index',
    'permissions' => ['about-us-view'],
    'active_when' => ['admin/web/about-us*']
];

// Item: Características (simple)
$featureItem = [
    'title' => 'module_feature',
    'route' => 'admin.feature.index',
    'permissions' => ['feature-view', 'feature-create'],
    'active_when' => ['admin/web/feature*']
];

// Item: Cursos (simple)
$courseItem = [
    'title' => 'module_course',
    'route' => 'admin.course.index',
    'permissions' => ['course-view', 'course-create'],
    'active_when' => ['admin/web/course*']
];

// Item: Eventos (simple)
$eventItem = [
    'title' => 'module_event',
    'route' => 'admin.web-event.index',
    'permissions' => ['web-event-view', 'web-event-create'],
    'active_when' => ['admin/web/web-event*']
];

// Item: Noticias (simple)
$newsItem = [
    'title' => 'module_news',
    'route' => 'admin.news.index',
    'permissions' => ['news-view', 'news-create'],
    'active_when' => ['admin/web/news*']
];

// Item: Blog (simple)
// Nota: Por ahora usa la misma ruta de noticias, se actualizará cuando exista la ruta específica de blog
$blogItem = [
    'title' => 'Blog', // Nombre según nueva estructura
    'route' => 'admin.news.index', // Temporal: usar noticias hasta que exista ruta específica
    'permissions' => ['news-view', 'news-create'], // Temporal: usar permisos de noticias
    'active_when' => ['admin/web/news*'] // Temporal
];

// Item: Galería (simple)
$galleryItem = [
    'title' => 'module_gallery',
    'route' => 'admin.gallery.index',
    'permissions' => ['gallery-view', 'gallery-create'],
    'active_when' => ['admin/web/gallery*']
];

// Item: FAQ (simple)
$faqItem = [
    'title' => 'module_faq',
    'route' => 'admin.faq.index',
    'permissions' => ['faq-view', 'faq-create'],
    'active_when' => ['admin/web/faq*']
];

// Item: Testimonios (simple)
$testimonialItem = [
    'title' => 'module_testimonial',
    'route' => 'admin.testimonial.index',
    'permissions' => ['testimonial-view', 'testimonial-create'],
    'active_when' => ['admin/web/testimonial*']
];

// Item: Páginas (simple)
$pageItem = [
    'title' => 'module_footer_page',
    'route' => 'admin.page.index',
    'permissions' => ['page-view', 'page-create'],
    'active_when' => ['admin/web/page*']
];

// Item: Call to Action (simple)
$callToActionItem = [
    'title' => 'module_call_to_action',
    'trans_count' => 1,
    'route' => 'admin.call-to-action.index',
    'permissions' => ['call-to-action-view'],
    'active_when' => ['admin/web/call-to-action*']
];

// ============================================
// PASO 4: Agrupar Items en Array
// ============================================

// Agrupar items de Contenido
$contentItems = [
    'slider' => $sliderItem,
    'about-us' => $aboutUsItem,
    'feature' => $featureItem,
    'course' => $courseItem,
    'event' => $eventItem,
    'news' => $newsItem,
    'blog' => $blogItem,
    'gallery' => $galleryItem,
    'faq' => $faqItem,
    'testimonial' => $testimonialItem,
    'page' => $pageItem,
    'call-to-action' => $callToActionItem
];

// Item: Contenido (con subitems)
$contentItem = [
    'title' => 'Contenido', // Nombre según nueva estructura
    'icon' => 'fas fa-file-alt',
    'route_pattern' => 'admin.slider.*',
    'permissions' => [
        'slider-view', 'slider-create',
        'about-us-view',
        'feature-view', 'feature-create',
        'course-view', 'course-create',
        'web-event-view', 'web-event-create',
        'news-view', 'news-create',
        'gallery-view', 'gallery-create',
        'faq-view', 'faq-create',
        'testimonial-view', 'testimonial-create',
        'page-view', 'page-create',
        'call-to-action-view'
    ],
    'active_when' => ['admin/web/*'],
    'subitems' => $contentItems
];

$websiteItems = [
    'settings' => $websiteSettingsItem,
    'content' => $contentItem
];

// ============================================
// PASO 5: Construir Módulo Completo (Nivel superior)
// ============================================

$websiteModule = [
    'section' => 'website',
    'title' => 'module_website', // "Sitio Web" (antes "Front Web")
    'icon' => 'fas fa-globe',
    'route_pattern' => 'admin.web.*',
    'items' => $websiteItems
];

// ============================================
// PASO 6: Retornar Configuración Final
// ============================================

return $websiteModule;

