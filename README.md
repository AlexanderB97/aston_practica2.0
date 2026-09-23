# Academia

Sistema de gestión académica desarrollado para **Formosa Hack 2026**, hackathon "ultra" de 24 horas organizada por el IPF.

Gestiona materias, proyectos, entregas de trabajos y calificaciones, con tres roles diferenciados: **Admin**, **Docente** y **Estudiante**.

## 📋 Tabla de contenidos

- [Stack tecnológico](#-stack-tecnológico)
- [Diseño del sistema](#-diseño-del-sistema)
- [Instalación](#-instalación)
- [Organización del trabajo en equipo](#-organización-del-trabajo-en-equipo)
- [Testing](#-testing)
- [Flujo de trabajo diario](#-flujo-de-trabajo-diario)

## 🛠️ Stack tecnológico

| Capa | Tecnología | Versión |
|---|---|---|
| Lenguaje | PHP | 8.4.25 |
| Framework | Laravel | 13.33.0 |
| Frontend reactivo | Livewire | 4.4.6 |
| | Livewire Volt | 1.11.2 |
| Estilos | Tailwind CSS | v4 |
| Build tool | Vite | 8.0.0 |
| Auth scaffolding | Laravel Breeze | 2.4.2 (stack Livewire Volt - Class API) |
| Base de datos | MariaDB | 11.8.6 |
| Gestor de dependencias PHP | Composer | 2.10.2 |
| Runtime JS | Node.js | 22.23.2 |
| Gestor de paquetes JS | npm | 10.9.8 |
| Testing | PHPUnit (vía `php artisan test`, corre sobre Pest) | — |
| CI | GitHub Actions | `.github/workflows/tests.yml` — corre tests con SQLite en memoria en cada push/PR |
| Control de versiones | Git | 4 ramas: `main`, `backend`, `frontend`, `testing` |

### Paquetes adicionales (skeleton de Laravel 13)

- `laravel/fortify` — verificación de email, autenticación de dos factores
- `laravel/passkeys` — autenticación sin contraseña
- `laravel/boost`, `laravel/mcp`, `laravel/roster` — tooling de desarrollo
- `livewire/flux`, `livewire/blaze` — componentes UI adicionales

## 🎨 Diseño del sistema

El diseño se definió siguiendo 5 pasos antes de codificar:

1. **RBAC** — roles `admin` / `docente` / `estudiante` controlan acceso y permisos
2. **Diagrama ER** — tablas `users` (con campo `rol`), `materias`, `proyectos`, `entregas`, `notas`
3. **User flow**:
   - Login → según rol →
     - **Estudiante**: ver proyectos → subir entrega → ver su nota
     - **Docente**: ver entregas → calificar
     - **Admin**: usuarios y roles → editar materias
4. **Wireframes** — pendiente de definir
5. **Arquitectura en 3 capas**:
   - Frontend: Livewire / Volt / Tailwind CSS
   - Backend: Laravel (controladores y modelos)
   - Datos: MySQL / MariaDB

## 🚀 Instalación

```bash
# Clonar el repositorio
git clone https://github.com/AlexanderB97/aston_practica2.0.git
cd aston_practica2.0

# Instalar dependencias PHP
composer install

# Instalar dependencias JS
npm install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar la base de datos en .env (MariaDB)
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_DATABASE=academia
# DB_USERNAME=...
# DB_PASSWORD=...

# Migrar y sembrar datos de prueba
php artisan migrate --seed

# Compilar assets
npm run build

# Levantar el servidor
php artisan serve --host=0.0.0.0 --port=8000
```

### Usuarios de prueba (seeder)

| Rol | Email | Password |
|---|---|---|
| admin | admin@academia.test | password |
| docente | docente@academia.test | password |
| estudiante | estudiante@academia.test | password |

> ⚠️ El registro público (`/register`) asigna rol `estudiante` por defecto. El resto de los roles se gestiona por Admin (ver HU1.4, 1.6, 1.7).

## 👥 Organización del trabajo en equipo

### Ramas de Git

Repo con 4 ramas: `main`, `testing`, `backend`, `frontend`.

Flujo de 4 niveles:

1. Cada developer crea `feature/<epica>-<hu>-back` o `-front` desde `backend` o `frontend` (no desde `testing`)
2. Mergea de vuelta a su rama de rol
3. Cuando `backend` y `frontend` tienen avances suficientes, se mergean a `testing`
4. Validado en `testing` → mergea a `main`
5. Tests automatizados (`test/<epica>-<hu>`) nacen de `testing`

### Épicas (Milestones de GitHub)

| # | Épica | Prioridad |
|---|---|---|
| 1 | RBAC y gestión de usuarios | 🔴 Must have |
| 2 | Gestión de materias | 🟡 Could have |
| 3 | Gestión de proyectos | 🟠 Should have |
| 4 | Entregas de trabajos | 🔴 Must have |
| 5 | Calificación y notas | 🔴 Must have |
| 6 | Paneles por rol | 🟡 Could have |

### Épica 1 (RBAC) — Historias de usuario

| HU | Descripción | Prioridad | Estado |
|---|---|---|---|
| 1.1 | Login | 🔴 Must have | ✅ Cerrada |
| 1.2 | Asignación de rol | 🔴 Must have | ✅ Cerrada (campo `rol` migrado y funcional) |
| 1.3 | Restricción de acceso | 🔴 Must have | 🔲 Pendiente (redirect por rol tras login) |
| 1.4 | Alta de usuario | 🟠 Should have | 🔲 Pendiente |
| 1.5 | Cierre de sesión | 🟠 Should have | ✅ Cerrada (Breeze) |
| 1.6 | Desactivar usuario | 🟡 Could have | 🔲 Pendiente |
| 1.7 | Editar usuario | 🟡 Could have | 🔲 Pendiente |

### Template de Issue

Cada HU se documenta en GitHub Issues con la siguiente estructura (`.github/ISSUE_TEMPLATE/hu.md`):

🎯 Objetivo · 👤 Historia de usuario (+ Épica/Milestone + Prioridad) · 📌 Contexto · 🛠️ Alcance · 🚫 Fuera de alcance · 🔗 Contrato de interfaz · 🗄️ Base de datos · 🔙 Backend · 🎨 Frontend · 🧪 Testing · 📦 Entregables · 🔀 Git · 📚 Dependencias · ✔️ Definición de terminado.

Se usa un único issue con **dos assignees** (backend y frontend) en vez de duplicar en 2 issues separados.

## 🧪 Testing

```bash
php artisan test
```

34/34 tests pasando (Auth, registro, verificación de email, 2FA, perfil, seguridad). GitHub Actions corre automáticamente los tests en cada push o pull request a `main`, `testing`, `backend` y `frontend`, usando SQLite en memoria para no depender de MariaDB en CI.

## 📅 Flujo de trabajo diario

- Checkpoints cada 2-3 horas para mergear avances parciales
- Reservar 1-2 horas antes de la entrega para armar la demo/pitch
- Probar el flujo completo de punta a punta antes de entregar
