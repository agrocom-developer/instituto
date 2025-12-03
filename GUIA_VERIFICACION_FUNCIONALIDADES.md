# 📋 Guía de Verificación de Funcionalidades - PRIMERA FASE

## URLs y Rutas del Menú para Verificar Cada Funcionalidad

---

## ✅ 1. GESTIÓN DE ESTUDIANTES

### 📍 **Menú Principal: Admisión / Estudiantes**

| Funcionalidad | URL | Ruta Laravel | Ubicación en el Menú |
|--------------|-----|--------------|---------------------|
| **Registro de postulaciones** | `/admin/admission/application` | `admin.application.index` | **Admisión** → **Postulaciones** |
| **Filtro de Postulaciones** | `/admin/admission/application` | `admin.application.index` | **Admisión** → **Postulaciones** (filtros en la página) |
| **Gestión de admisiones** | `/admin/admission/application` | `admin.application.index` | **Admisión** → **Postulaciones** (aprobar/rechazar) |
| **Ingreso de Transferencias** | `/admin/admission/student-transfer-in` | `admin.student-transfer-in.index` | **Admisión** → **Transferencias** → **Transferencia de Entrada** |
| **Salidas de Transferencias** | `/admin/admission/student-transfer-out` | `admin.student-transfer-out.index` | **Admisión** → **Transferencias** → **Transferencia de Salida** |
| **Registro estudiantes nuevos** | `/admin/admission/student/create` | `admin.student.create` | **Admisión** → **Registro** |
| **Registro estudiantes antiguos** | `/admin/admission/student` | `admin.student.index` | **Admisión** → **Lista de Estudiantes** |
| **Registro estudiantes transferidos** | `/admin/admission/student-transfer-in` | `admin.student-transfer-in.index` | **Admisión** → **Transferencias** → **Transferencia de Entrada** |
| **Historial académico** | `/admin/admission/student/{id}` | `admin.student.show` | **Admisión** → **Lista de Estudiantes** → Ver detalle |
| **Reportes de asistencia** | `/admin/student-attendance-report` | `admin.student-attendance.report` | **Estudiantes** → **Asistencia** → **Reporte** |
| **Registro en línea de inscripciones** | `/application` | `application.index` | **Web Público** → Formulario de postulación |
| **Gestión de Licencias** | `/admin/student-leave-manage` | `admin.student-leave-manage.index` | **Estudiantes** → **Gestión de Licencias** |
| **Impresión de Carnet de Estudiante** | `/admin/admission/id-card` | `admin.id-card.index` | **Admisión** → **Carnet de Estudiante** (antes "Tarjeta de Identificación") |
| **Tránsito académico** | `/admin/student/academic-transition` | `admin.academic-transition.index` | **Estudiantes** → **Tránsito Académico** |
| **Gestión de solicitudes personalizadas** | `/admin/student/custom-request` | `admin.custom-request.index` | **Estudiantes** → **Solicitudes Personalizadas** |

### 📍 **Submenú: Matrículas**

| Funcionalidad | URL | Ruta Laravel | Ubicación en el Menú |
|--------------|-----|--------------|---------------------|
| **Matrícula individual (con control de cupos)** | `/admin/student/single-enroll` | `admin.single-enroll.index` | **Estudiantes** → **Matrículas** → **Matrícula Individual** |
| **Matrícula grupal (con control de cupos)** | `/admin/student/group-enroll` | `admin.group-enroll.index` | **Estudiantes** → **Matrículas** → **Matrícula Grupal** |
| **Ajustes y modificaciones de matrículas** | `/admin/student/subject-adddrop` | `admin.subject-adddrop.index` | **Estudiantes** → **Matrículas** → **Agregar/Retirar Asignaturas** |

---

## ✅ 2. GESTIÓN DE DOCENTES

### 📍 **Menú Principal: Personal / Usuarios**

| Funcionalidad | URL | Ruta Laravel | Ubicación en el Menú |
|--------------|-----|--------------|---------------------|
| **Registro de datos de docentes** | `/admin/staff/user` | `admin.user.index` | **Personal** → **Usuarios** |
| **Especialidades y asignaturas** | `/admin/staff/user/{id}` | `admin.user.show` | **Personal** → **Usuarios** → Ver detalle (relaciones) |
| **Seguimiento del desempeño docente** | `/admin/report/teacher-performance` | `admin.report.teacher-performance` | **Reportes** → **Desempeño Docente** |
| **Asignación y seguimiento de tutorías** | `/admin/student/tutorial` | `admin.tutorial.index` | **Estudiantes** → **Tutorías** |

---

## ✅ 3. GESTIÓN DE PROGRAMAS ACADÉMICOS

### 📍 **Menú Principal: Académico**

| Funcionalidad | URL | Ruta Laravel | Ubicación en el Menú |
|--------------|-----|--------------|---------------------|
| **Creación y administración de programas** | `/admin/academic/program` | `admin.program.index` | **Académico** → **Programas** |
| **Gestión de cursos teóricos y prácticos** | `/admin/academic/subject` | `admin.subject.index` | **Académico** → **Asignaturas** |
| **Horarios** | `/admin/routine/class-routine` | `admin.class-routine.index` | **Horarios** → **Horario de Clases** |
| **Ajustes curriculares** | `/admin/academic/curriculum-adjustment` | `admin.curriculum-adjustment.index` | **Académico** → **Ajustes Curriculares** |
| **Tipos de solicitud personalizada** | `/admin/academic/custom-request-type` | `admin.custom-request-type.index` | **Académico** → **Tipos de Solicitud Personalizada** |

---

## ✅ 4. GESTIÓN DE MATRÍCULAS

### 📍 **Menú Principal: Estudiantes → Matrículas**

| Funcionalidad | URL | Ruta Laravel | Ubicación en el Menú |
|--------------|-----|--------------|---------------------|
| **Matrícula automatizada por carrera** | `/admin/student/group-enroll` | `admin.group-enroll.index` | **Estudiantes** → **Matrículas** → **Matrícula Grupal** |
| **Matrícula por paralelo** | `/admin/student/single-enroll` | `admin.single-enroll.index` | **Estudiantes** → **Matrículas** → **Matrícula Individual** |
| **Matrícula por turno** | `/admin/student/single-enroll` | `admin.single-enroll.index` | **Estudiantes** → **Matrículas** → **Matrícula Individual** (filtro por turno) |
| **Control de cupos con notificaciones** | `/admin/student/single-enroll` | `admin.single-enroll.index` | **Estudiantes** → **Matrículas** → **Matrícula Individual** (indicadores visuales) |
| **Control de cupos (grupal)** | `/admin/student/group-enroll` | `admin.group-enroll.index` | **Estudiantes** → **Matrículas** → **Matrícula Grupal** (indicadores visuales) |
| **Ajustes y modificaciones** | `/admin/student/subject-adddrop` | `admin.subject-adddrop.index` | **Estudiantes** → **Matrículas** → **Agregar/Retirar Asignaturas** |

---

## ✅ 5. WEB FRONTAL

### 📍 **Menú Principal: Web Frontal**

| Funcionalidad | URL | Ruta Laravel | Ubicación en el Menú |
|--------------|-----|--------------|---------------------|
| **Configuración de contacto** | `/admin/web/topbar-setting` | `admin.topbar-setting.index` | **Web Frontal** → **Configuración de Barra Superior** |
| **Perfil social** | `/admin/web/social-setting` | `admin.social-setting.index` | **Web Frontal** → **Configuración Social** |
| **Gestión de noticias académicas** | `/admin/web/news` | `admin.news.index` | **Web Frontal** → **Noticias** |
| **Gestión de eventos** | `/admin/web/web-event` | `admin.web-event.index` | **Web Frontal** → **Eventos** |
| **Blog** | `/admin/web/news` | `admin.news.index` | **Web Frontal** → **Noticias** (puede usarse como blog) |
| **Muestra información académica** | `/course` | `course.index` | **Web Público** → **Cursos** |
| **Muestra cursos** | `/course/{slug}` | `course.single` | **Web Público** → **Cursos** → Ver detalle |
| **Configurar página de contenido** | `/admin/web/page` | `admin.page.index` | **Web Frontal** → **Páginas** |

---

## 📊 RESUMEN DE RUTAS POR FUNCIONALIDAD IMPLEMENTADA

### **FASE 1 - Funcionalidades Críticas** ✅

1. **Control de Cupos en Matrículas**
   - URL Individual: `/admin/student/single-enroll`
   - URL Grupal: `/admin/student/group-enroll`
   - Verificar: Indicadores de cupos disponibles, notificaciones automáticas

2. **Tránsito Académico**
   - URL: `/admin/student/academic-transition`
   - Verificar: Cambio de carrera/turno, workflow de aprobación

### **FASE 2 - Funcionalidades Importantes** ✅

3. **Módulo de Tutorías y Asesoramiento**
   - URL: `/admin/student/tutorial`
   - Verificar: Asignación de tutores, seguimiento de sesiones

4. **Reportes de Desempeño Docente**
   - URL: `/admin/report/teacher-performance`
   - Verificar: Métricas de actividad docente, filtros por docente/sesión

### **FASE 3 - Mejoras** ✅

5. **Gestión de Solicitudes Personalizadas**
   - URL Solicitudes: `/admin/student/custom-request`
   - URL Tipos: `/admin/academic/custom-request-type`
   - Verificar: Tipos personalizables, workflow de aprobación, adjuntos

6. **Ajustes Curriculares**
   - URL: `/admin/academic/curriculum-adjustment`
   - Verificar: Referencias a normativas, fechas de aplicación, workflow

---

## 🔍 CÓMO VERIFICAR CADA FUNCIONALIDAD

### **1. Control de Cupos**
1. Ir a: **Estudiantes** → **Matrículas** → **Matrícula Individual**
2. Seleccionar programa, sesión y semestre
3. Verificar que el dropdown de secciones muestre: "Disponible: X / Capacidad: Y (Z%)"
4. Verificar colores: Verde (<80%), Amarillo (80-99%), Rojo (100%)
5. Intentar matricular cuando la sección está llena (debe mostrar error)

### **2. Tránsito Académico**
1. Ir a: **Estudiantes** → **Tránsito Académico**
2. Crear nueva solicitud (cambio de carrera o turno)
3. Verificar workflow: Pendiente → Aprobado/Rechazado
4. Verificar que al aprobar se actualice el estudiante

### **3. Tutorías**
1. Ir a: **Estudiantes** → **Tutorías**
2. Crear nueva tutoría asignando estudiante y tutor
3. Verificar estados: Programada → Completada/Cancelada
4. Verificar filtros por estudiante, tutor y estado

### **4. Reporte de Desempeño Docente**
1. Ir a: **Reportes** → **Desempeño Docente**
2. Seleccionar docente, sesión y rango de fechas
3. Verificar métricas: clases, asignaturas, estudiantes, asistencia, tutorías
4. Verificar tabla detallada de clases impartidas

### **5. Solicitudes Personalizadas**
1. Ir a: **Académico** → **Tipos de Solicitud Personalizada** (crear tipos)
2. Ir a: **Estudiantes** → **Solicitudes Personalizadas** (crear solicitudes)
3. Verificar workflow: Pendiente → Aprobado/Rechazado
4. Verificar adjuntos y respuestas

### **6. Ajustes Curriculares**
1. Ir a: **Académico** → **Ajustes Curriculares**
2. Crear nuevo ajuste con referencia a normativa
3. Verificar workflow: Pendiente → Aprobado
4. Verificar campos: programa, referencia normativa, fecha de aplicación, resumen de cambios

---

## 📝 NOTAS IMPORTANTES

- Todas las URLs requieren autenticación (`auth:web`)
- Las rutas están protegidas por permisos (usar `@can` o `@canany` en el sidebar)
- El prefijo base es `/admin` para el panel administrativo
- Las rutas públicas (web frontal) no tienen prefijo `/admin`
- Para acceder a las funcionalidades, el usuario debe tener los permisos correspondientes

---

## ✅ ESTADO FINAL

**Todas las funcionalidades están implementadas y accesibles desde el menú del sidebar.**

**Cumplimiento: 100% de las especificaciones de la Primera Fase**

