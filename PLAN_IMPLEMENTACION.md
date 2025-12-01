# 📋 Plan de Implementación - Funcionalidades Faltantes

## 🎯 Objetivo
Implementar las funcionalidades faltantes de manera armoniosa y detallada, siguiendo las convenciones del sistema existente.

---

## 📦 FASE 1: CONTROL DE CUPOS EN MATRÍCULAS (Prioridad ALTA)

### ✅ Estado Actual
- ✅ Campo `seat` ya existe en tabla `sections`
- ✅ Modelo `Section` ya tiene `seat` en fillable
- ✅ Controlador `SectionController` ya maneja `seat`
- ❌ **FALTA**: Validación de cupos en matrículas
- ❌ **FALTA**: Mostrar cupos disponibles en interfaz
- ❌ **FALTA**: Notificaciones automáticas

### 📝 Pasos de Implementación

#### **Paso 1.1: Agregar método helper al modelo Section**
**Archivo**: `app/Models/Section.php`
- Agregar método `getAvailableSeats($programId, $sessionId, $semesterId)` para calcular cupos disponibles
- Agregar método `isFull($programId, $sessionId, $semesterId)` para verificar si está lleno

#### **Paso 1.2: Actualizar StudentSingleEnrollController**
**Archivo**: `app/Http/Controllers/Admin/StudentSingleEnrollController.php`
- Agregar validación de cupos antes de matricular
- Mostrar mensaje de error si no hay cupos disponibles
- Mostrar cupos disponibles en la vista

#### **Paso 1.3: Actualizar StudentGroupEnrollController**
**Archivo**: `app/Http/Controllers/Admin/StudentGroupEnrollController.php`
- Agregar validación de cupos antes de matrícula grupal
- Validar que el número de estudiantes no exceda los cupos disponibles
- Mostrar cupos disponibles en la vista

#### **Paso 1.4: Crear notificación de cupos llenos**
**Archivo**: `app/Notifications/SectionFullNotification.php`
- Crear notificación cuando se alcanza el 80% de capacidad
- Crear notificación cuando se alcanza el 100% de capacidad

#### **Paso 1.5: Actualizar vistas de matrícula**
**Archivos**:
- `resources/views/admin/single-enroll/index.blade.php`
- `resources/views/admin/group-enroll/index.blade.php`
- Mostrar cupos disponibles/ocupados
- Mostrar alerta si está cerca del límite

#### **Paso 1.6: Agregar traducciones**
**Archivo**: `resources/lang/es.json` y `resources/lang/en.json`
- Agregar mensajes de cupos disponibles
- Agregar mensajes de error cuando no hay cupos

---

## 📦 FASE 2: TRÁNSITO ACADÉMICO (Cambio de Carrera/Turno) (Prioridad MEDIA)

### 📝 Pasos de Implementación

#### **Paso 2.1: Crear migración para transiciones académicas**
**Archivo**: `database/migrations/YYYY_MM_DD_HHMMSS_create_academic_transitions_table.php`
- Tabla para solicitudes de cambio de carrera
- Tabla para solicitudes de cambio de turno
- Estados: pendiente, aprobado, rechazado

#### **Paso 2.2: Crear modelo AcademicTransition**
**Archivo**: `app/Models/AcademicTransition.php`
- Relaciones con Student, Program, WorkShiftType
- Estados y workflow

#### **Paso 2.3: Crear controlador AcademicTransitionController**
**Archivo**: `app/Http/Controllers/Admin/AcademicTransitionController.php`
- CRUD completo
- Workflow de aprobación
- Historial de cambios

#### **Paso 2.4: Crear vistas**
**Archivos**:
- `resources/views/admin/academic-transition/index.blade.php`
- `resources/views/admin/academic-transition/create.blade.php`
- `resources/views/admin/academic-transition/show.blade.php`

#### **Paso 2.5: Agregar rutas**
**Archivo**: `routes/web.php`
- Rutas para transiciones académicas

---

## 📦 FASE 3: MÓDULO DE TUTORÍAS Y ASESORAMIENTO (Prioridad MEDIA)

### 📝 Pasos de Implementación

#### **Paso 3.1: Crear migración para tutorías**
**Archivo**: `database/migrations/YYYY_MM_DD_HHMMSS_create_tutorials_table.php`
- Tabla para sesiones de tutoría
- Relación con estudiantes y docentes

#### **Paso 3.2: Crear modelo Tutorial**
**Archivo**: `app/Models/Tutorial.php`
- Relaciones con Student y User (docente)

#### **Paso 3.3: Crear controlador TutorialController**
**Archivo**: `app/Http/Controllers/Admin/TutorialController.php`
- CRUD completo
- Asignación de tutores
- Seguimiento de sesiones

#### **Paso 3.4: Crear vistas**
**Archivos**:
- `resources/views/admin/tutorial/index.blade.php`
- `resources/views/admin/tutorial/create.blade.php`
- `resources/views/admin/tutorial/show.blade.php`

---

## 📦 FASE 4: REPORTES DE DESEMPEÑO DOCENTE (Prioridad MEDIA)

### 📝 Pasos de Implementación

#### **Paso 4.1: Agregar método al ReportController**
**Archivo**: `app/Http/Controllers/Admin/ReportController.php`
- Método `teacherPerformance()` para reporte de desempeño

#### **Paso 4.2: Crear vista de reporte**
**Archivo**: `resources/views/admin/report/teacher-performance.blade.php`
- Métricas de actividad docente
- Clases impartidas
- Asistencia
- Estudiantes asignados

---

## 🔄 Orden de Implementación Recomendado

1. **FASE 1** - Control de Cupos (Crítico, base para otras funcionalidades)
2. **FASE 2** - Tránsito Académico (Importante para gestión estudiantil)
3. **FASE 3** - Tutorías (Complementa gestión académica)
4. **FASE 4** - Reportes Docente (Mejora análisis)

---

## ✅ Checklist de Implementación

### FASE 1: Control de Cupos
- [ ] Métodos helper en modelo Section
- [ ] Validación en StudentSingleEnrollController
- [ ] Validación en StudentGroupEnrollController
- [ ] Notificaciones de cupos
- [ ] Actualización de vistas
- [ ] Traducciones
- [ ] Pruebas

### FASE 2: Tránsito Académico
- [ ] Migración
- [ ] Modelo
- [ ] Controlador
- [ ] Vistas
- [ ] Rutas
- [ ] Traducciones
- [ ] Pruebas

### FASE 3: Tutorías
- [ ] Migración
- [ ] Modelo
- [ ] Controlador
- [ ] Vistas
- [ ] Rutas
- [ ] Traducciones
- [ ] Pruebas

### FASE 4: Reportes Docente
- [ ] Método en ReportController
- [ ] Vista de reporte
- [ ] Traducciones
- [ ] Pruebas

---

## 📝 Notas Importantes

1. **Seguir convenciones existentes**: Usar el mismo estilo de código, nombres de variables, estructura de vistas
2. **Validaciones**: Agregar validaciones tanto en frontend como backend
3. **Permisos**: Usar el sistema de permisos existente (Spatie Permission)
4. **Traducciones**: Agregar todas las traducciones en español e inglés
5. **Notificaciones**: Usar el sistema de notificaciones de Laravel existente
6. **Pruebas**: Probar cada funcionalidad antes de pasar a la siguiente

---

## 🚀 Iniciar Implementación

¿Listo para comenzar con la FASE 1?

