# Sistema de Gestión Universitaria (University Management System)

Sistema integral de gestión para instituciones educativas desarrollado en Laravel 9, diseñado para administrar todos los aspectos operativos de una universidad o instituto, desde la admisión de estudiantes hasta la gestión académica, financiera y administrativa.

## 📋 Tabla de Contenidos

- [Descripción](#descripción)
- [Características Principales](#características-principales)
- [Módulos del Sistema](#módulos-del-sistema)
- [Requisitos del Sistema](#requisitos-del-sistema)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Tecnologías Utilizadas](#tecnologías-utilizadas)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Licencia](#licencia)

## 🎯 Descripción

El Sistema de Gestión Universitaria es una plataforma web completa que permite a las instituciones educativas gestionar de manera eficiente todos sus procesos administrativos, académicos y operativos. El sistema está diseñado para manejar múltiples usuarios con diferentes roles y permisos, proporcionando una solución integral para la administración de estudiantes, personal, recursos académicos y operaciones financieras.

### Propósito

Este sistema está diseñado para:

- **Automatizar procesos administrativos**: Reducir la carga de trabajo administrativo mediante la automatización de procesos como inscripciones, gestión de horarios y generación de reportes.
- **Centralizar la información**: Proporcionar un único punto de acceso para toda la información académica, estudiantil y administrativa.
- **Mejorar la comunicación**: Facilitar la comunicación entre estudiantes, personal administrativo y docentes mediante notificaciones, avisos y eventos.
- **Gestionar recursos**: Controlar eficientemente los recursos de la institución como biblioteca, inventario, transporte y alojamiento.
- **Optimizar operaciones financieras**: Gestionar pagos, tarifas, nóminas y contabilidad de manera integrada.

## ✨ Características Principales

### 🔐 Seguridad y Autenticación
- Sistema de autenticación multi-usuario (Administradores, Personal, Estudiantes)
- Control de acceso basado en roles y permisos (RBAC) usando Spatie Permission
- Protección contra ataques XSS
- Verificación de licencia del sistema

### 🌐 Multiidioma
- Soporte para múltiples idiomas
- Sistema de traducciones integrado
- Interfaz adaptable según el idioma seleccionado

### 📱 Responsive Design
- Interfaz adaptable a dispositivos móviles y tablets
- Dashboard moderno y fácil de usar

### 💳 Integración de Pagos
- Soporte para múltiples pasarelas de pago:
  - PayPal
  - Stripe
  - Razorpay
  - Paystack
  - Flutterwave
  - Skrill

### 📧 Comunicaciones
- Sistema de notificaciones por email
- Envío de SMS (soporte para múltiples proveedores: Twilio, Vonage, TextLocal, Clickatell, AfricasTalking, SMSCountry)
- Sistema de avisos y notificaciones internas

### 📊 Reportes y Analytics
- Generación de reportes detallados en múltiples áreas
- Exportación de datos a Excel
- Visualización de estadísticas en tiempo real

## 🏗️ Módulos del Sistema

### 1. 📚 Gestión Académica (Academic Management)

#### Admisión y Matrícula
- **Aplicaciones/Admisiones**: Gestión de solicitudes de ingreso
- **Registro de Estudiantes**: Inscripción de nuevos estudiantes
- **Transferencias**: Gestión de transferencias de entrada y salida
- **Tarjetas de Identificación**: Generación y gestión de tarjetas de estudiante
- **Tipos de Estado**: Control de estados estudiantiles

#### Configuración Académica
- **Facultades**: Gestión de facultades/departamentos
- **Programas**: Administración de programas académicos
- **Lotes/Batches**: Gestión de cohortes estudiantiles
- **Sesiones**: Control de sesiones académicas
- **Semestres**: Administración de semestres
- **Secciones**: Gestión de secciones de clase
- **Aulas**: Asignación de espacios físicos
- **Asignaturas/Cursos**: Catálogo de materias
- **Inscripción de Asignaturas**: Gestión de matrícula de cursos

#### Rutinas y Horarios
- **Rutina de Clases**: Creación y gestión de horarios de clases
- **Rutina de Exámenes**: Programación de exámenes
- **Configuración de Rutinas**: Personalización de horarios

### 2. 👨‍🎓 Gestión Estudiantil (Student Management)

- **Información de Estudiantes**: Perfiles completos de estudiantes
- **Asistencia Estudiantil**: Registro y seguimiento de asistencia
- **Notas de Estudiantes**: Registro de observaciones y notas
- **Inscripción Individual/Grupal**: Proceso de matrícula
- **Agregar/Retirar Asignaturas**: Gestión de cambios de matrícula
- **Finalización de Curso**: Proceso de graduación
- **Alumni**: Gestión de egresados
- **Permisos Estudiantiles**: Gestión de ausencias justificadas

### 3. 📝 Evaluación y Calificaciones (Examination & Grading)

- **Asistencia a Exámenes**: Control de presencia en exámenes
- **Calificación de Exámenes**: Registro de calificaciones
- **Calificación por Asignatura**: Evaluación específica por materia
- **Tipos de Examen**: Configuración de diferentes tipos de evaluación
- **Sistema de Calificaciones**: Escalas de calificación personalizables
- **Contribución de Resultados**: Configuración de ponderaciones
- **Tarjetas de Admisión**: Generación de tarjetas para exámenes

### 4. 📄 Asignaciones y Contenido (Assignments & Content)

- **Asignaciones**: Gestión de tareas y trabajos
- **Calificación de Asignaciones**: Evaluación de trabajos
- **Centro de Descargas**: Repositorio de materiales educativos
- **Tipos de Contenido**: Categorización de recursos

### 5. 💰 Gestión de Tarifas (Fees Management)

- **Tarifas por Estudiante**: Seguimiento de pagos individuales
- **Cobro Rápido**: Proceso de pago simplificado
- **Asignación Rápida**: Asignación masiva de tarifas
- **Tarifas Maestras**: Configuración de estructuras de pago
- **Descuentos**: Aplicación de descuentos
- **Multas**: Gestión de penalizaciones
- **Categorías de Tarifas**: Organización de tipos de pago
- **Configuración de Recibos**: Personalización de comprobantes

### 6. 👨‍🏫 Gestión de Personal (Staff Management)

- **Usuarios/Personal**: Gestión de personal administrativo y docente
- **Nómina**: Cálculo y gestión de salarios
- **Generación de Nómina**: Proceso automatizado de pagos
- **Configuración de Recibos de Pago**: Personalización de comprobantes de nómina
- **Designaciones**: Cargos y posiciones
- **Departamentos**: Organización departamental
- **Tipos de Turno**: Gestión de horarios laborales
- **Notas de Personal**: Registro de observaciones
- **Configuración de Impuestos**: Gestión fiscal

### 7. ⏰ Asistencia del Personal (Staff Attendance)

- **Asistencia Diaria**: Registro diario de presencia
- **Reportes Diarios**: Análisis de asistencia diaria
- **Asistencia por Horas**: Control horario detallado
- **Reportes por Horas**: Análisis de tiempo trabajado

### 8. 🏖️ Gestión de Permisos (Leave Management)

- **Permisos del Personal**: Solicitud y gestión de permisos
- **Mis Permisos**: Vista personal de permisos
- **Tipos de Permiso**: Configuración de tipos de ausencia
- **Gestión de Permisos**: Aprobación y control administrativo

### 9. 💵 Contabilidad (Income & Expense)

- **Ingresos**: Registro de ingresos institucionales
- **Categorías de Ingresos**: Clasificación de ingresos
- **Gastos**: Registro de gastos
- **Categorías de Gastos**: Clasificación de gastos
- **Resumen de Resultados**: Análisis financiero general

### 10. 📢 Comunicación (Communication)

- **Notificaciones por Email**: Envío masivo de correos
- **Notificaciones por SMS**: Envío masivo de mensajes
- **Eventos**: Gestión de eventos institucionales
- **Calendario**: Visualización de eventos
- **Avisos**: Publicación de anuncios
- **Categorías de Avisos**: Organización de comunicados

### 11. 📚 Biblioteca (Library)

- **Lista de Libros**: Catálogo bibliográfico
- **Solicitudes de Libros**: Gestión de solicitudes
- **Préstamo y Devolución**: Control de préstamos
- **Multas**: Gestión de penalizaciones por retraso
- **Miembros**: Gestión de miembros de biblioteca
  - Estudiantes
  - Personal
  - Usuarios externos
- **Categorías de Libros**: Clasificación bibliográfica
- **Configuración de Tarjetas**: Personalización de carnets

### 12. 📦 Inventario (Inventory)

- **Lista de Artículos**: Catálogo de inventario
- **Stock de Artículos**: Control de existencias
- **Préstamo de Artículos**: Gestión de préstamos
- **Devolución de Artículos**: Control de retornos
- **Almacenes**: Gestión de ubicaciones
- **Proveedores**: Gestión de proveedores
- **Categorías**: Clasificación de artículos

### 13. 🏠 Alojamiento (Hostel)

- **Hostales**: Gestión de residencias
- **Habitaciones**: Administración de espacios
- **Tipos de Habitación**: Configuración de categorías
- **Estudiantes en Hostal**: Asignación de estudiantes
- **Personal en Hostal**: Asignación de personal

### 14. 🚌 Transporte (Transport)

- **Rutas**: Gestión de rutas de transporte
- **Vehículos**: Administración de flota vehicular
- **Estudiantes en Transporte**: Asignación de estudiantes
- **Personal en Transporte**: Asignación de personal

### 15. 🏢 Recepción/Front Desk

#### Visitantes
- **Registro de Visitantes**: Control de entrada/salida
- **Propósitos de Visita**: Clasificación de visitas
- **Configuración de Tokens**: Personalización de comprobantes

#### Comunicaciones
- **Registro Telefónico**: Log de llamadas
- **Consultas**: Gestión de consultas
- **Fuentes de Consulta**: Origen de consultas
- **Referencias**: Gestión de referencias

#### Quejas y Reclamos
- **Quejas**: Gestión de reclamos
- **Tipos de Queja**: Clasificación
- **Fuentes de Queja**: Origen de reclamos

#### Correspondencia
- **Intercambio Postal**: Gestión de correo
- **Tipos Postales**: Clasificación de correspondencia

#### Reuniones
- **Agenda de Reuniones**: Programación de reuniones
- **Tipos de Reunión**: Clasificación

### 16. 📜 Transcripts y Certificados (Transcripts & Certificates)

- **Boletas de Calificaciones**: Generación de transcripciones
  - Boletas totales
  - Boletas por semestre
- **Configuración de Boletas**: Personalización de formatos
- **Certificados**: Generación de certificados
- **Plantillas de Certificados**: Diseño personalizado

### 17. 📊 Reportes (Reports)

El sistema genera reportes detallados en múltiples áreas:

- **Reporte de Estudiantes**: Información estudiantil
- **Reporte de Asignaturas**: Estadísticas por materia
- **Reporte de Asistencia Estudiantil**: Análisis de presencia
- **Reporte de Asistencia por Asignatura**: Detalle por materia
- **Reporte de Tarifas**: Análisis financiero estudiantil
- **Reporte de Tarifas por Estudiante**: Detalle individual
- **Reporte de Nómina**: Análisis de pagos al personal
- **Reporte de Permisos**: Estadísticas de ausencias
- **Reporte de Ingresos**: Análisis de ingresos
- **Reporte de Gastos**: Análisis de gastos
- **Reporte de Biblioteca**: Estadísticas bibliográficas
- **Reporte de Devolución de Libros**: Libros pendientes
- **Reporte de Inventario**: Control de existencias
- **Reporte de Hostal**: Gestión de alojamiento
- **Reporte de Transporte**: Gestión de flota

### 18. 🌐 Sitio Web (Front Web)

- **Sliders**: Gestión de banners
- **Acerca de Nosotros**: Contenido institucional
- **Características**: Destacados del sitio
- **Cursos**: Catálogo público de cursos
- **Eventos Web**: Eventos públicos
- **Noticias**: Publicación de noticias
- **Galería**: Gestión de imágenes
- **Preguntas Frecuentes (FAQ)**: Base de conocimiento
- **Testimonios**: Opiniones de usuarios
- **Páginas**: Contenido estático personalizable
- **Llamado a la Acción**: Elementos de conversión
- **Configuración de Redes Sociales**: Enlaces sociales
- **Configuración de Barra Superior**: Información de contacto

### 19. ⚙️ Configuración (Settings)

- **Información del Sitio**: Configuración general
- **Direcciones**: Gestión de provincias y distritos
- **Idiomas**: Configuración de idiomas soportados
- **Traducciones**: Gestión de textos traducibles
- **Roles y Permisos**: Control de acceso
- **Configuración de Email**: Parámetros SMTP
- **Configuración de SMS**: Integración con proveedores
- **Configuración de Pagos**: Pasarelas de pago
- **Configuración de Horarios**: Parámetros de tarifas
- **Configuración de Aplicaciones**: Configuración de admisiones
- **Campos Personalizables**: Personalización de formularios
- **Panel de Estudiantes**: Configuración del portal estudiantil

## 💻 Requisitos del Sistema

### Servidor
- **PHP**: >= 8.0.1
- **Composer**: >= 2.0
- **Base de Datos**: MySQL 5.7+ / MariaDB 10.3+
- **Servidor Web**: Apache / Nginx
- **Extensiones PHP requeridas**:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
  - Fileinfo

### Para Desarrollo Local (MAMP)
- **MAMP** o **XAMPP** con PHP 8.0+
- MySQL/MariaDB en puerto 8889 (MAMP)
- Node.js y NPM (para assets frontend)

## 🚀 Instalación

### 1. Clonar el Repositorio

```bash
git clone <repository-url>
cd instituto
```

### 2. Instalar Dependencias

```bash
composer install
npm install
```

### 3. Configurar el Entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar Base de Datos

Editar el archivo `.env` con las credenciales de tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=instituto
DB_USERNAME=root
DB_PASSWORD=root
```

### 5. Ejecutar Migraciones

```bash
php artisan migrate
php artisan db:seed
```

### 6. Compilar Assets (Opcional)

```bash
npm run dev
# o para producción
npm run build
```

### 7. Iniciar el Servidor

Para desarrollo local con estructura no estándar:

```bash
php -S localhost:8000 -t . index.php
```

O usando el servidor de Artisan (si existe directorio `public/`):

```bash
php artisan serve
```

## 🔧 Configuración

### Configuración de Pagos

Configurar las pasarelas de pago en `.env`:

```env
PAYMENT_GATEWAY=paypal # o stripe, razorpay, paystack, flutterwave, skrill
```

### Configuración de SMS

Configurar el proveedor de SMS en `.env`:

```env
SMS_GATEWAY=twilio # o vonage, textlocal, clickatell, africastalking, smscountry
```

### Configuración de Email

Configurar SMTP en `.env`:

```env
MAIL_DRIVER=smtp
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
```

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 9**: Framework PHP
- **PHP 8.0+**: Lenguaje de programación
- **MySQL/MariaDB**: Base de datos
- **Spatie Permission**: Gestión de roles y permisos
- **Spatie Translatable**: Sistema de traducciones

### Frontend
- **Bootstrap**: Framework CSS
- **JavaScript/jQuery**: Interactividad
- **Toastr**: Notificaciones
- **DataTables**: Tablas interactivas
- **Chart.js**: Gráficos y visualizaciones

### Librerías y Paquetes
- **Maatwebsite Excel**: Importación/Exportación de Excel
- **Intervention Image**: Procesamiento de imágenes
- **Milon Barcode**: Generación de códigos de barras
- **Múltiples SDKs de Pagos**: Integración con pasarelas
- **Múltiples SDKs de SMS**: Integración con proveedores

## 📁 Estructura del Proyecto

```
instituto/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Admin/          # Controladores del panel administrativo
│   │       ├── Student/         # Controladores del portal estudiantil
│   │       ├── Web/             # Controladores del sitio web público
│   │       └── Payment/         # Controladores de pagos
│   ├── Models/                  # Modelos Eloquent
│   ├── Services/                # Servicios de negocio
│   └── Traits/                  # Traits reutilizables
├── config/                       # Archivos de configuración
├── database/
│   ├── migrations/              # Migraciones de base de datos
│   └── seeders/                 # Seeders de datos iniciales
├── resources/
│   ├── views/                   # Vistas Blade
│   ├── lang/                    # Archivos de idioma
│   └── js/                      # Assets JavaScript
├── routes/
│   └── web.php                  # Rutas de la aplicación
└── storage/                     # Archivos de almacenamiento
```

## 📝 Notas Importantes

- El proyecto utiliza una estructura no estándar donde `index.php` está en la raíz en lugar de `public/`
- Se requiere configuración de permisos para el directorio `storage/`
- El sistema incluye sistema de verificación de licencia
- Se recomienda usar HTTPS en producción
- Configurar permisos adecuados para archivos subidos

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👤 Autor

**Miguel Angel**

- **GitHub**: [@Angello-27](https://github.com/Angello-27)
- **Email**: M.escobar_27@outlook.com
- **Ubicación**: Santa Cruz - Bolivia
- **Facebook**: [Miguel Angel Escobar Lazcano](https://www.facebook.com/miguelangel.escobarlazcano/)
- **Organización**: [@forming-lives](https://github.com/forming-lives)

## 👥 Contribuciones

Las contribuciones son bienvenidas. Por favor, sigue las mejores prácticas de Laravel y mantén el código limpio y documentado.

## 📞 Soporte

Para soporte técnico o consultas, por favor contacta al equipo de desarrollo:

- **Email**: M.escobar_27@outlook.com
- **GitHub Issues**: [Reportar un problema](https://github.com/Angello-27/instituto/issues)

---

**Desarrollado por [Miguel Angel](https://github.com/Angello-27) usando Laravel**
