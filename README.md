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
     - **Admin**: usuarios y roles → editar