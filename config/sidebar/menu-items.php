<?php
/**
 * Archivo principal de carga de configuración del sidebar
 * Carga todos los módulos de configuración
 */

return [
    'admission' => require __DIR__ . '/admission.php',
    'academic-management' => require __DIR__ . '/academic-management.php',
    'schedules' => require __DIR__ . '/schedules.php',
    'exams' => require __DIR__ . '/exams.php',
    'finances' => require __DIR__ . '/finances.php',
    'human-resources' => require __DIR__ . '/human-resources.php',
    'communication' => require __DIR__ . '/communication.php',
    'library' => require __DIR__ . '/library.php',
    'inventory' => require __DIR__ . '/inventory.php',
    'residence' => require __DIR__ . '/residence.php',
    'transport' => require __DIR__ . '/transport.php',
    'reception' => require __DIR__ . '/reception.php',
    'certificates' => require __DIR__ . '/certificates.php',
    'reports' => require __DIR__ . '/reports.php',
    'website' => require __DIR__ . '/website.php',
    'settings' => require __DIR__ . '/settings.php',
    'profile' => require __DIR__ . '/profile.php',
];

