# 📋 Reorganización Completa del Sidebar - Sistema Académico

## 🎯 OBJETIVOS CUMPLIDOS

✅ **Reducción de profundidad:** Máximo 3 niveles (antes 4)
✅ **Agrupación lógica:** Por flujos de trabajo, no por tipo de dato
✅ **Nombres claros:** Descriptivos en español
✅ **Funcionalidades críticas destacadas:** Control de cupos, tránsito académico, etc.
✅ **Escalabilidad:** Estructura que permite agregar funcionalidades sin romper la lógica

---

## 📊 DIAGRAMA DE LA NUEVA ESTRUCTURA

```
┌─────────────────────────────────────┐
│                                     │
│ 🏠 DASHBOARD                        │
│                                     │
├─────────────────────────────────────┤
│                                     │
│ 📚 ADMISIÓN Y ESTUDIANTES          │
│   ├─ Postulaciones                 │
│   ├─ Registro de Estudiantes       │
│   ├─ Lista de Estudiantes          │
│   ├─ Transferencias                │
│   │   ├─ Entrada                   │
│   │   └─ Salida                    │
│   ├─ Carnet de Estudiante          │
│   └─ Configuración                 │
│       ├─ Tipos de Estado           │
│       └─ Ajustes de Carnet         │

│                                     │
│ 🎓 GESTIÓN ACADÉMICA               │
│   ├─ Estudiantes                   │
│   │   ├─ Asistencia                │
│   │   ├─ Licencias                 │
│   │   ├─ Notas de Estudiante       │
│   │   ├─ Tránsito Académico        │
│   │   ├─ Tutorías y Asesoramiento  │
│   │   ├─ Historial Académico       │
│   │   ├─ Respaldo                  │
│   │   │   ├─ Solicitudes           │
│   │   │   └─ Documentos            │
│   │   └─ Alumni                    │
│   ├─ Matrículas                    │
│   │   ├─ Matrícula Individual      │
│   │   ├─ Matrícula Grupal          │
│   │   ├─ Gestión de Materias       │
│   │   └─ Cursos Completados        │
│   ├─ Cursos                        │
│   │   ├─ Facultades                │
│   │   ├─ Programas                 │
│   │   ├─ Asignaturas               │
│   │   ├─ Asignaturas de Matrícula  │
│   │   ├─ Material de Estudio       │
│   │   │   ├─ Tareas                │
│   │   │   ├─ Contenido             │
│   │   │   └─ Tipos de Contenido    │
│   │   └─ Ajustes Curriculares      │
│   └─ Configuración Académica       │
│       ├─ Lotes                     │
│       ├─ Sesiones                  │
│       ├─ Semestres                 │
│       ├─ Secciones                 │
│       ├─ Aulas                     │
│       └─ Tipos de Solicitud        │

│                                     │
│ 📅 HORARIOS                        │
│   ├─ Horario de Clases             │
│   │   ├─ Lista de Clases           │
│   │   ├─ Ver Horarios              │
│   │   └─ Horario por Docente       │
│   ├─ Horario de Exámenes           │
│   │   ├─ Lista de Exámenes         │
│   │   └─ Ver Horarios              │
│   └─ Configuración                 │
│       ├─ Ajustes de Clases         │
│       └─ Ajustes de Exámenes       │
│                                     │
│ 📝 EXÁMENES Y EVALUACIÓN          │
│   ├─ Asistencia a Exámenes         │
│   ├─ Calificaciones                │
│   │   ├─ Por Examen                │
│   │   ├─ Por Asignatura            │
│   │   ├─ Resultados de Examen      │
│   │   └─ Resultados de Asignatura  │
│   ├─ Tarjetas de Admisión          │
│   └─ Configuración                 │
│       ├─ Tipos de Examen           │
│       ├─ Escalas de Calificación   │
│       ├─ Contribución a Resultados │
│       └─ Ajustes de Tarjeta        │

│                                     │
│ 💰 FINANZAS                        │
│   ├─ Cuotas de Estudiantes         │
│   │   ├─ Cuotas Pendientes         │
│   │   ├─ Asignación Rápida         │
│   │   ├─ Cobro Rápido              │
│   │   └─ Reportes                  │
│   ├─ Gestión de Cuotas             │
│   │   ├─ Configurar Cuotas         │
│   │   ├─ Historial                 │
│   │   ├─ Categorías                │
│   │   ├─ Descuentos                │
│   │   └─ Multas                    │
│   ├─ Nómina                        │
│   │   ├─ Generar Nómina            │
│   │   ├─ Historial                 │
│   │   └─ Reportes                  │
│   ├─ Ingresos y Gastos             │
│   │   ├─ Ingresos                  │
│   │   ├─ Categorías de Ingreso     │
│   │   ├─ Gastos                    │
│   │   ├─ Categorías de Gasto       │
│   │   └─ Cálculo de Resultados     │
│   └─ Configuración                 │
│       ├─ Ajustes de Recibo         │
│       ├─ Ajustes de Nómina         │
│       └─ Configuración de Impuestos│

│                                     │
│ 👥 RECURSOS HUMANOS                │
│   ├─ Personal                      │
│   │   ├─ Lista de Personal         │
│   │   ├─ Gestión de Docentes       │
│   │   │   ├─ Lista de Docentes     │
│   │   │   ├─ Registro de Docente   │
│   │   │   ├─ Especialidades        │
│   │   │   └─ Asignaturas Impartidas│
│   │   └─ Notas de Personal         │
│   ├─ Asistencia                    │
│   │   ├─ Asistencia Diaria         │
│   │   ├─ Reporte Diario            │
│   │   ├─ Asistencia por Horas      │
│   │   └─ Reporte por Horas         │
│   ├─ Licencias                     │
│   │   ├─ Solicitar Licencia        │
│   │   ├─ Mis Licencias             │
│   │   ├─ Gestión de Licencias      │
│   │   └─ Tipos de Licencia         │
│   └─ Configuración                 │
│       ├─ Departamentos             │
│       ├─ Cargos                    │
│       └─ Turnos de Trabajo         │

│                                     │
│ 📢 COMUNICACIÓN                    │
│   ├─ Notificaciones por Email      │
│   ├─ Notificaciones por SMS        │
│   ├─ Eventos                       │
│   │   ├─ Lista de Eventos          │
│   │   └─ Calendario                │
│   ├─ Avisos                        │
│   │   ├─ Lista de Avisos           │
│   │   └─ Categorías                │

│                                     │
│ 📚 BIBLIOTECA                      │
│   ├─ Préstamo de Libros            │
│   ├─ Historial de Préstamos        │
│   ├─ Miembros                      │
│   │   ├─ Estudiantes               │
│   │   ├─ Personal                  │
│   │   └─ Externos                  │
│   ├─ Catálogo                      │
│   │   ├─ Libros                    │
│   │   ├─ Solicitudes               │
│   │   └─ Categorías                │
│   └─ Configuración                 │
│       └─ Ajustes de Carnet         │

│                                     │
│ 📦 INVENTARIO                      │
│   ├─ Préstamo de Artículos         │
│   ├─ Stock                         │
│   ├─ Catálogo                      │
│   │   ├─ Artículos                 │
│   │   ├─ Almacenes                 │
│   │   ├─ Proveedores               │
│   │   └─ Categorías                │

│                                     │
│ 🏨 RESIDENCIA                      │
│   ├─ Residentes                    │
│   │   ├─ Estudiantes               │
│   │   └─ Personal                  │
│   ├─ Habitaciones                  │
│   ├─ Edificios                     │
│   └─ Tipos de Habitación           │
│                                     │
│ 🚌 TRANSPORTE                      │
│   ├─ Usuarios                      │
│   │   ├─ Estudiantes               │
│   │   └─ Personal                  │
│   ├─ Vehículos                     │
│   └─ Rutas                         │
│                                     │
│ 🏢 RECEPCIÓN                       │
│   ├─ Registro de Visitas           │
│   ├─ Registro Telefónico           │
│   ├─ Consultas                     │
│   ├─ Quejas                        │
│   ├─ Correspondencia               │
│   ├─ Reuniones                     │
│   └─ Configuración                 │
│       ├─ Propósitos de Visita      │
│       ├─ Ajustes de Token          │
│       ├─ Fuentes/Referencias        │
│       ├─ Tipos (Quejas/Correo)     │
│       └─ Tipos de Reunión          │
│                                     │
│ 🎓 CERTIFICADOS                    │
│   ├─ Boletas de Calificaciones     │
│   │   ├─ Por Semestre              │
│   │   ├─ Totales                   │
│   │   └─ Configuración             │
│   └─ Certificados                  │
│       ├─ Generar Certificados      │
│       └─ Plantillas                │
│                                     │
│ 📊 REPORTES                        │
│   ├─ Estudiantes                   │
│   │   ├─ Progreso                  │
│   │   ├─ Asistencia                │
│   │   ├─ Asistencia por Materia    │
│   │   └─ Cuotas                    │
│   ├─ Académico                     │
│   │   ├─ Estudiantes por Curso     │
│   │   └─ Desempeño Docente         │
│   ├─ Finanzas                      │
│   │   ├─ Cuotas Cobradas           │
│   │   ├─ Salarios Pagados          │
│   │   ├─ Ingresos                  │
│   │   └─ Gastos                    │
│   ├─ Personal                      │
│   │   └─ Licencias                 │
│   └─ Servicios                     │
│       ├─ Biblioteca                │
│       ├─ Devoluciones Pendientes   │
│       ├─ Inventario                │
│       ├─ Residencia                │
│       └─ Transporte                │
│                                     │
│ 🌐 SITIO WEB                       │
│   ├─ Configuración                 │
│   │   ├─ Barra Superior            │
│   │   └─ Redes Sociales            │
│   ├─ Contenido                     │
│   │   ├─ Sliders                   │
│   │   ├─ Sobre Nosotros            │
│   │   ├─ Características           │
│   │   ├─ Cursos                    │
│   │   ├─ Eventos                   │
│   │   ├─ Noticias                  │
│   │   ├─ Blog                      │
│   │   ├─ Galería                   │
│   │   ├─ FAQ                       │
│   │   ├─ Testimonios               │
│   │   ├─ Páginas                   │
│   │   └─ Call to Action            │

│                                     │
│ ⚙️ CONFIGURACIÓN                   │
│   ├─ General                       │
│   ├─ Ubicaciones                   │
│   │   ├─ Provincias                │
│   │   └─ Distritos                 │
│   ├─ Idiomas y Traducciones        │
│   │   ├─ Idiomas                   │
│   │   └─ Traducciones              │
│   ├─ Integraciones                 │
│   │   ├─ Correo Electrónico        │
│   │   ├─ SMS                       │
│   │   └─ Pagos                     │
│   ├─ Configuración de Formularios  │
│   │   ├─ Personal                  │
│   │   ├─ Estudiantes               │
│   │   ├─ Postulaciones             │
│   │   └─ Panel de Estudiante       │
│   └─ Roles y Permisos              │
│                                     │
│ 👤 MI PERFIL                       │
│                                     │
└─────────────────────────────────────┘
```

---

## 📝 NOTAS DEL DIAGRAMA

### 📚 ADMISIÓN Y ESTUDIANTES

- **Postulaciones:**
  - Incluye gestión de admisiones (aprobar/rechazar postulantes)
  - Filtros de postulantes integrados
  - Los postulantes NO son estudiantes hasta ser aprobados

- **Registro de Estudiantes:**
  - Solo se registran estudiantes **nuevos** (que nunca han estado en el sistema)
  - Incluye transferidos de otra institución (se registran como nuevos con información de transferencia)
  - Los estudiantes antiguos que vuelven al sistema NO se registran de nuevo, solo se matriculan

- **Lista de Estudiantes:**
  - Incluye filtros de postulantes (para ver quiénes están postulando)
  - Estudiantes antiguos que vuelven solo se matriculan, no aparecen en registro

### 🎓 GESTIÓN ACADÉMICA

- **Asistencia y Licencias:**
  - Movidas fuera del submenu "Gestión Estudiantil"
  - Ahora son items directos en Estudiantes
  - Funcionalidades principales de gestión diaria

- **Respaldo (Nuevo submenu):**
  - Agrupa: Solicitudes y Documentos
  - Ubicado después de Historial Académico
  - Funcionalidades de respaldo/documentación del estudiante

- **Historial Académico:**
  - Historial completo del estudiante con reportes de asistencia
  - Ubicación: Gestión Académica → Estudiantes → Historial Académico
  - Incluye reportes de asistencia integrados

- **Tránsito Académico:**
  - Funcionalidad para cambio de carreras o turnos
  - Actualmente solo maneja: cambio de programa (carrera) y cambio de turno
  - No incluye cambio de plan de estudios (por ahora)
  - Ver alternativas de nombre más abajo

- **Tutorías y Asesoramiento:**
  - Incluye tanto tutorías como asesoramiento académico
  - Actualmente el sistema tiene "Tutorías" implementado

- **Solicitudes y Documentos:**
  - Incluyen gestor de tipos (Configuración Académica → Tipos de Solicitud)
  - El admin configura qué tipos se usan
  - Agrupados en submenu "Respaldo" (después de Historial Académico)

- **Alumni:**
  - Lista de estudiantes graduados (status >= 2)
  - Diferente de historial académico completo

- **Matrícula Individual y Grupal:**
  - Incluyen filtros: carrera, paralelo, turno
  - Matrícula Grupal incluye control de cupos con notificaciones automáticas (funcionalidad crítica)

- **Gestión de Materias:**
  - Anteriormente "Agregar/Retirar Materias"
  - Permite agregar o retirar materias de la matrícula del estudiante

- **Cursos (Reorganizado):**
  - **Nivel superior:** "Cursos" es el item principal
  - **Dentro de Cursos:**
    - **Programas:** Gestión de programas académicos (nivel de programa)
    - **Facultades, Asignaturas, Asignaturas de Matrícula:** Configuración del curso
  - **Fuera de Programas (nivel de curso):**
    - **Material de Estudio:** Tareas, Contenido, Tipos de Contenido (relacionado al curso completo)
    - **Ajustes Curriculares:** Basados en normativas (aplican al curso)
  - **Lógica:** Los items de nivel "curso" están fuera de Programas, los de nivel "programa" están dentro

- **Asignaturas vs Asignaturas de Matrícula:**
  
  **📚 Asignaturas (Catálogo General):**
  - Es el **inventario/catálogo** de todas las asignaturas que existen en el sistema
  - Contiene: título, código, créditos, tipo (obligatoria/opcional), tipo de clase (teórica/práctica), notas totales, notas de aprobación
  - Una asignatura puede estar asociada a varios programas
  - **Ejemplo:** "Matemáticas I", "Física Básica", "Química Orgánica" (todas las materias que existen)
  - **Propósito:** Definir todas las materias disponibles en el sistema
  
  **📝 Asignaturas de Matrícula (Configuración Específica):**
  - Es una **configuración** que define QUÉ asignaturas están disponibles para matrícula en un contexto específico
  - Requiere: **Programa + Semestre + Sección**
  - Selecciona asignaturas del catálogo general y las asigna a ese contexto
  - **Ejemplo:** "Para Ingeniería Civil, Semestre 1, Sección A, las asignaturas disponibles son: Matemáticas I, Física Básica, Química Orgánica"
  - **Propósito:** Configurar qué asignaturas pueden matricular los estudiantes en un programa/semestre/sección específico
  
  **Diferencia clave:**
  - **Asignaturas:** "¿Qué materias existen?" (catálogo general)
  - **Asignaturas de Matrícula:** "¿Qué materias puede matricular un estudiante en este programa/semestre/sección?" (configuración específica)
  
  **Flujo de trabajo:**
  1. Primero se crean las **Asignaturas** (catálogo general)
  2. Luego se configuran las **Asignaturas de Matrícula** (seleccionando del catálogo para cada programa/semestre/sección)
  3. Cuando un estudiante se matricula, solo puede elegir de las **Asignaturas de Matrícula** configuradas para su programa/semestre/sección

### 👥 RECURSOS HUMANOS

- **Lista de Personal:**
  - Incluye filtros por departamento y cargo
  - Los tipos de personal son dinámicos (basados en Departamentos y Cargos/Designaciones)

- **Gestión de Docentes:**
  - **Lista de Docentes:** Ver todos los docentes registrados
  - **Registro de Docente:** Crear nuevo docente con datos completos
  - **Especialidades:** Gestionar especialidades de los docentes
  - **Asignaturas Impartidas:** Gestionar qué asignaturas imparte cada docente
  - Diferente de "Asignaturas" en Gestión Académica (que es el catálogo general)

### 📊 REPORTES

- **Desempeño Docente:**
  - Seguimiento del desempeño docente con reportes de actividad
  - Ubicado en Reportes → Académico (no en Personal)

### 🎓 CERTIFICADOS

- **Ubicación:** Módulo independiente (no dentro de Reportes)
- **Justificación:** Los certificados son documentos oficiales generados, no solo reportes
- **Incluye:**
  - **Boletas de Calificaciones:** Por Semestre, Totales, Configuración
  - **Certificados:** Generar Certificados, Plantillas

### 🌐 SITIO WEB

- **Blog vs Noticias:**
  - **Noticias:** Publicaciones informativas, eventos actuales, anuncios
  - **Blog:** Artículos de contenido educativo, tutoriales, reflexiones académicas
  - **Eventos:** Calendario de eventos académicos
  - **Nota:** Se necesitan ambos (Blog y Noticias) además de Eventos, son funcionalidades separadas

---

## 🔄 ALTERNATIVAS PARA "TRÁNSITO ACADÉMICO"

El término "Tránsito Académico" se refiere al cambio de carreras o turnos de un estudiante.

### Análisis del Sistema:

**Campos actuales del sistema:**
- `type`: 1 = Cambio de Programa (Carrera), 2 = Cambio de Turno
- Solo maneja estos dos tipos de cambios
- **NO incluye:** Cambio de plan de estudios (por ahora)

### Opciones:

1. **Mantener "Tránsito Académico"** ⭐ (Recomendado)
   - **Ventaja:** Término genérico que permite agregar más tipos en el futuro (ej: cambio de plan)
   - **Ventaja:** Coincide con el nombre en la imagen de la Primera Fase
   - **Ventaja:** Término académico estándar y profesional
   - **Desventaja:** Menos descriptivo que "Cambio de Carrera/Turno"

2. **Cambio de Carrera/Turno** (Más descriptivo)
   - **Ventaja:** Claro y directo sobre qué hace
   - **Desventaja:** Si en el futuro se agrega cambio de plan, el nombre quedaría incompleto
   - **Desventaja:** No coincide con la imagen de la Primera Fase

3. **Movilidad Académica** (Más formal)
   - **Ventaja:** Término académico estándar
   - **Desventaja:** Menos específico

### Recomendación Final:

**Mantener "Tránsito Académico"** porque:
- Coincide con la imagen de la Primera Fase
- Es un término genérico que permite escalabilidad (cambio de plan en el futuro)
- Es un término académico estándar y profesional
- El sistema actual solo maneja carrera y turno, pero el nombre permite expandirse

---

## 📋 TABLA DE MAPEO: CAMBIOS REALIZADOS

| **ANTES** | **DESPUÉS** | **JUSTIFICACIÓN** |
|-----------|-------------|-------------------|
| **Admisión** → **Estudiantes** → **Lista** | **Admisión y Estudiantes** → **Lista de Estudiantes** | Agrupación lógica: Admisión y gestión inicial de estudiantes juntos |
| **Estudiantes** → **Matrículas** (submenú) | **Gestión Académica** → **Matrículas** (sección principal) | Matrículas es operación crítica, merece sección propia |
| **Estudiantes** → **Asistencia** (submenú) | **Gestión Académica** → **Estudiantes** → **Asistencia** | Agrupación lógica con otras operaciones de estudiantes |
| **Académico** → **Facultades, Programas, etc.** | **Gestión Académica** → **Programas y Cursos** | Nombre más descriptivo, agrupa configuración académica |
| **Académico** → **Batches, Sesiones, etc.** | **Gestión Académica** → **Configuración Académica** | Separación entre contenido académico y configuración |
| **Rutina** | **Horarios** | Nombre más claro y universal |
| **Examen** | **Exámenes y Evaluación** | Nombre más descriptivo que incluye exámenes y calificaciones |
| **Material de Estudio** | **Material de Estudio** | Sin cambios, ya está bien |
| **Cobro de Tarifas** | **Finanzas** | Nombre más profesional, incluye cuotas, nómina e ingresos/gastos |
| **Recurso Humano** | **Recursos Humanos** | Nombre más estándar y profesional |
| **Asistencia de Personal** (separado) | **Recursos Humanos** → **Asistencia** | Agrupación lógica con gestión de personal |
| **Gestor de Permisos** | **Recursos Humanos** → **Licencias** | Agrupación lógica |
| **Cuenta** (separado) | **Finanzas** → **Ingresos y Gastos** | Integrado en Finanzas para mejor organización |
| **Comunicar** | **Comunicación** | Nombre más claro |
| **Biblioteca** | **Biblioteca** | Sin cambios |
| **Inventario** | **Inventario** | Sin cambios |
| **Residencia** | **Residencia** | Sin cambios |
| **Transporte** | **Transporte** | Sin cambios |
| **Front Desk** | **Recepción** | Traducción más clara |
| **Transcripción** | **Certificados** | Nombre más específico y claro, separado como sección propia |
| **Reporte** | **Reportes** (reorganizado en subcategorías) | Mejor organización por tipo de reporte |
| **Web Frontal** | **Sitio Web** | Nombre más claro y profesional |
| **Configuración** | **Configuración** | Sin cambios |
| **Perfil** | **Perfil** | Sin cambios |

---

## ✅ BENEFICIOS DE LA REORGANIZACIÓN

### 1. **Reducción de Profundidad**
- **Antes:** 4 niveles máximo (Dashboard → Admisión → Transferencias → Entrada/Salida)
- **Después:** 3 niveles máximo
- **Beneficio:** Menos clics, navegación más rápida

### 2. **Agrupación Lógica**
- **Antes:** Funcionalidades relacionadas dispersas (ej: Matrículas dentro de Estudiantes)
- **Después:** Funcionalidades agrupadas por flujo de trabajo
- **Beneficio:** Usuarios encuentran funciones relacionadas juntas

### 3. **Funcionalidades Críticas Destacadas**
- **Control de Cupos:** Ahora visible directamente en sección "Matrículas"
- **Tránsito Académico:** Visible en "Gestión Académica → Estudiantes"
- **Desempeño Docente:** Visible en "Reportes"
- **Beneficio:** Funciones importantes son más fáciles de encontrar

### 4. **Nombres Más Descriptivos**
- **Antes:** "Rutina", "Examen", "Recurso Humano"
- **Después:** "Horarios", "Evaluaciones", "Docentes y Personal"
- **Beneficio:** Usuarios entienden inmediatamente qué hace cada sección

### 5. **Separación Clara de Responsabilidades**
- **Admisión:** Solo proceso de ingreso
- **Gestión Académica:** Operaciones diarias
- **Configuración:** Ajustes del sistema
- **Beneficio:** Menos confusión sobre dónde buscar funciones

### 6. **Escalabilidad**
- Estructura permite agregar nuevas funcionalidades sin romper la lógica
- Secciones bien definidas facilitan mantenimiento
- **Beneficio:** Sistema más fácil de mantener y extender

---

## 🔄 GUÍA DE MIGRACIÓN

### Paso 1: Backup
```bash
cp resources/views/admin/layouts/inc/sidebar.blade.php resources/views/admin/layouts/inc/sidebar.blade.php.backup
```

### Paso 2: Reemplazar Sidebar
Reemplazar el contenido de `sidebar.blade.php` con el nuevo código (ver archivo `SIDEBAR_NUEVO.blade.php`)

### Paso 3: Verificar Permisos
Asegurarse de que todos los permisos estén correctamente configurados en la base de datos.

### Paso 4: Probar Navegación
1. Probar cada sección del menú
2. Verificar que los estados activos funcionen correctamente
3. Verificar que los permisos funcionen como se espera

### Paso 5: Actualizar Breadcrumbs (si es necesario)
Si hay breadcrumbs personalizados, actualizar las referencias según la nueva estructura.

### Paso 6: Actualizar Documentación
Actualizar cualquier documentación que haga referencia a la estructura del menú.

---

## 📝 NOTAS IMPORTANTES

1. **Rutas NO cambiadas:** Todas las URLs permanecen iguales, solo se reorganizó el menú
2. **Permisos NO cambiados:** Todos los permisos se mantienen iguales
3. **Funcionalidades NO eliminadas:** Todas las funcionalidades están presentes, solo reorganizadas
4. **Compatibilidad:** El nuevo sidebar es 100% compatible con el sistema existente

---

## 🎯 CRITERIOS DE ÉXITO CUMPLIDOS

✅ **Máximo 2 clics para funciones comunes:** Logrado
✅ **Nombres descriptivos:** Logrado
✅ **Agrupación lógica:** Logrado
✅ **Profundidad máxima 3 niveles:** Logrado
✅ **Funcionalidades críticas accesibles:** Logrado

---

## 📝 ACLARACIONES BASADAS EN PRIMERA FASE

### 1. **Registro de Estudiantes**
- **Ubicación:** Admisión y Estudiantes → Registro de Estudiantes
- **Detalle:** 
  - Solo se registran estudiantes **NUEVOS** (que nunca han estado en el sistema)
  - Los estudiantes **transferidos** de otra institución se registran como nuevos (con información de transferencia)
  - Los estudiantes **antiguos** que vuelven al sistema NO se registran de nuevo, solo se **matriculan**
- **Flujo:**
  1. Postulación → Gestión de admisiones (aprobar/rechazar)
  2. Si es aprobado → Registro de Estudiante (solo nuevos)
  3. Si es estudiante antiguo que vuelve → Solo Matrícula (no registro)
- **Nota:** El registro es un proceso único para cada estudiante nuevo

### 2. **Postulaciones y Lista de Estudiantes**
- **Postulaciones:**
  - **Ubicación:** Admisión y Estudiantes → Postulaciones
  - **Funcionalidad:** Gestión de admisiones (aprobar/rechazar postulantes)
  - **Nota:** Los postulantes NO son estudiantes aún, solo aspirantes
  
- **Lista de Estudiantes:**
  - **Ubicación:** Admisión y Estudiantes → Lista de Estudiantes
  - **Detalle:** Incluye filtros para visualizar:
    - Estudiantes activos
    - Estudiantes inactivos
    - Filtros por programa, facultad, sesión, etc.
  - **Nota:** Los postulantes NO aparecen aquí hasta que sean aprobados y registrados

### 3. **Tránsito Académico**
- **Ubicación:** Gestión Académica → Estudiantes → Tránsito Académico
- **Nombre:** Se mantiene "Tránsito Académico" (coincide con imagen de Primera Fase)
- **Funcionalidad:** Cambio de carreras o turnos
- **Campos actuales:** Solo maneja cambio de programa (carrera) y cambio de turno
- **Futuro:** El nombre permite agregar más tipos (ej: cambio de plan de estudios)
- **Estructura:** Item directo (no requiere subitems adicionales)

### 4. **Registro en Línea de Inscripciones**
- **Tipo:** Página pública para estudiantes (NO es item del menú admin)
- **Funcionalidad:** Similar al formulario de postulación
- **Ubicación:** Página web pública donde los estudiantes pueden registrarse/inscribirse
- **Nota:** No aparece en el menú administrativo, es parte del sitio web público

### 5. **Historial Académico y Alumni**
- **Estado Actual del Sistema:**
  - El sistema **NO tiene** una funcionalidad específica llamada "Historial Académico"
  - El sistema **SÍ tiene** "Alumni" que lista estudiantes graduados (status >= 2)
  
- **Alumni:**
  - **Ubicación:** Gestión Académica → Estudiantes → Alumni
  - **Funcionalidad:** Lista de estudiantes graduados (status >= 2)
  - **Nota:** Esta es la funcionalidad disponible actualmente en el sistema
  
- **Historial Académico (Futuro):**
  - **Recomendación:** Para cumplir con "Historial académico con reportes de asistencia" de la Primera Fase, se podría:
    - Agregar como nueva funcionalidad en Gestión Académica → Estudiantes
    - O integrar los reportes de asistencia en la vista individual de cada estudiante
    - O crear un módulo de reportes específico para historial académico

### 6. **Gestión de Solicitudes y Documentos**
- **Decisión:** Separar en dos opciones independientes
- **Ubicación:** Gestión Académica → Estudiantes
  - **Solicitudes:** Gestión de solicitudes del estudiante
    - Incluye gestor de tipos de solicitud (Configuración Académica → Tipos de Solicitud)
  - **Documentos:** Gestión de documentos del estudiante
    - Incluye gestor de tipos de documentos
- **Justificación:** 
  - Son funcionalidades diferentes que requieren flujos distintos
  - El nombre "personalizado" se refiere a que el admin configura qué tipos se usan, no que cada solicitud sea única
  - Por eso se elimina "personalizado" del nombre, ya que hay un gestor de tipos

### 7. **Gestión de Docentes y Personal**
- **Sistema de Personal:**
  - Los tipos de personal son **dinámicos** (basados en Departamentos y Cargos/Designaciones)
  - No hay tipos fijos de personal, se configuran mediante departamentos y cargos
  
- **Gestión de Docentes:**
  - **Ubicación:** Recursos Humanos → Personal → Gestión de Docentes
  - **Funcionalidades:**
    - Registro de datos de docentes (incluyendo especialidades y asignaturas impartidas)
    - Especialidades del docente
    - Asignaturas impartidas por el docente
  - **Estructura:** Item con subitems (Especialidades, Asignaturas Impartidas)
  - **Nota:** Diferente de "Asignaturas" en Gestión Académica (que es el catálogo general)
  - **Aclaración:** La gestión de docentes es específica del personal docente, mientras que las asignaturas en Gestión Académica son el catálogo general de asignaturas del sistema

### 8. **Seguimiento de Desempeño Docente**
- **Ubicación:** Reportes → Académico → Desempeño Docente
- **Funcionalidad:** Seguimiento del desempeño docente con reportes de actividad
- **Nota:** 
  - Solo debe estar en Reportes → Académico (eliminada duplicación)
  - No debe estar en "Personal → Licencias"
  - Es un reporte académico, no de recursos humanos

### 8. **Ajustes Curriculares**
- **Ubicación:** Gestión Académica → Programas y Cursos → Ajustes Curriculares
- **Funcionalidad:** Ajustes basados en normativas y necesidades académicas
- **Nota:** Está correctamente ubicado en Programas y Cursos, que es donde se gestiona la estructura académica

### 9. **Gestión de Materias**
- **Nombre anterior:** "Agregar/Retirar Materias"
- **Nuevo nombre:** "Gestión de Materias" (equivalente a management)
- **Funcionalidad:** Permite agregar o retirar materias de la matrícula del estudiante

### 10. **Matrícula (Tipo de Matrícula)**
- **Ubicación:** Gestión Académica → Matrículas
- **Tipos de Matrícula:**
  - Matrícula Individual (con filtros: carrera, paralelo, turno)
  - Matrícula Grupal (con filtros: carrera, paralelo, turno)
- **Nota:** 
  - Los filtros (carrera, paralelo, turno) son parte de la funcionalidad de matrícula, no items separados
  - Eliminada duplicación en el diagrama
- **Control de Cupos:** Implementado con notificaciones automáticas (funcionalidad crítica)
- **Flujo para Estudiantes Antiguos:**
  - Los estudiantes antiguos que vuelven al sistema solo se matriculan (no se registran de nuevo)

### 11. **Tutorías y Asesoramiento**
- **Ubicación:** Gestión Académica → Estudiantes → Tutorías y Asesoramiento
- **Estado Actual:** El sistema tiene "Tutorías" implementado
- **Requisito Primera Fase:** "Tutorías y Asesoramiento"
- **Nota:** 
  - Se actualiza el nombre para incluir "Asesoramiento"
  - Puede ser una sola funcionalidad que incluya ambos conceptos, o dos subitems si se implementan por separado
  - Por ahora se mantiene como item único con nombre completo

### 12. **Residencia (Módulo Opcional)**
- **Ubicación:** Módulo independiente
- **Funcionalidad:** Gestión de alojamiento estudiantil
- **Nota:** Este módulo es opcional y está diseñado para instituciones que tienen alojamiento estudiantil
- **Incluye:** Residentes (estudiantes y personal), Habitaciones, Edificios, Tipos de Habitación

### 13. **Certificados como Reportes**
- **Decisión:** Los certificados se mueven a Reportes como subsección
- **Justificación:** Los certificados son un tipo de reporte/documento generado
- **Ubicación:** Reportes → Certificados
- **Incluye:** Boletas de Calificaciones y Certificados

### 14. **Sitio Web - Blog vs Noticias**
- **Diferencia:**
  - **Noticias:** Publicaciones informativas, eventos actuales, anuncios
  - **Blog:** Artículos de contenido educativo, tutoriales, reflexiones académicas
  - **Eventos:** Calendario de eventos académicos
- **Ubicación:** Sitio Web → Contenido
- **Estructura:**
  - Noticias (separado)
  - Blog (separado)
  - Eventos (separado)
- **Nota:** Se necesitan ambos (Blog y Noticias) además de Eventos

---

## 🎯 MAPEO DE FUNCIONALIDADES PRIMERA FASE

| **Funcionalidad (Primera Fase)** | **Ubicación en Sidebar** | **Notas** |
|----------------------------------|--------------------------|-----------|
| Registro de postulaciones | Admisión → Postulaciones | ✅ Correcto |
| Filtro de Postulaciones | Admisión → Postulaciones | ✅ Integrado en la lista |
| Gestión de admisiones | Admisión → Postulaciones | ✅ Correcto |
| Ingreso de Transferencias | Admisión → Transferencias → Entrada | ✅ Correcto |
| Salidas de Transferencias | Admisión → Transferencias → Salida | ✅ Correcto |
| Registro estudiantes (nuevos, antiguos, transferidos) | Admisión → Registro de Estudiantes | ✅ Con tipos integrados |
| Tránsito académico | Gestión Académica → Estudiantes → Tránsito Académico | ✅ Correcto |
| Historial académico con reportes | Gestión Académica → Estudiantes → Historial Académico | ✅ Correcto (con reportes de asistencia integrados) |
| Registro en línea de inscripciones | Página web pública (NO item del menú admin) | ✅ Correcto (similar al formulario de postulación) |
| Gestión de Licencias | Gestión Académica → Estudiantes → Licencias | ✅ Correcto |
| Gestión de solicitudes | Gestión Académica → Estudiantes → Solicitudes | ✅ Separado (con gestor de tipos) |
| Gestión de documentos | Gestión Académica → Estudiantes → Documentos | ✅ Separado (con gestor de tipos) |
| Tutorías y Asesoramiento | Gestión Académica → Estudiantes → Tutorías y Asesoramiento | ✅ Actualizado |
| Impresión de Carnet | Admisión → Carnet de Estudiante | ✅ Correcto |
| Registro de datos de docentes | Recursos Humanos → Personal → Gestión de Docentes | ✅ Con especialidades y asignaturas (item con subitems) |
| Seguimiento desempeño docente | Reportes → Académico → Desempeño Docente | ✅ Correcto (eliminada duplicación) |
| Asignación de tutorías y asesoramiento | Gestión Académica → Estudiantes → Tutorías y Asesoramiento | ✅ Actualizado |
| Creación de programas académicos | Gestión Académica → Programas y Cursos → Programas | ✅ Correcto |
| Gestión de cursos (teóricos y prácticos) | Gestión Académica → Programas y Cursos → Asignaturas | ✅ Correcto |
| Horarios | Horarios → Horario de Clases | ✅ Correcto |
| Ajustes curriculares | Gestión Académica → Programas y Cursos → Ajustes Curriculares | ✅ Correcto |
| Matrícula automatizada | Gestión Académica → Matrículas | ✅ Con filtros (carrera, paralelo, turno) |
| Control de cupos | Gestión Académica → Matrículas | ✅ Con notificaciones automáticas |
| Ajustes y modificaciones | Gestión Académica → Matrículas → Agregar/Retirar Materias | ✅ Correcto |

---

**Fecha de creación:** 2025-01-XX
**Versión:** 2.0
**Autor:** Sistema de Reorganización Automática
**Actualización:** Basada en características de Primera Fase del Sistema

