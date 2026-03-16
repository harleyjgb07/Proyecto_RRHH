# Sistema de Gestión de Colaboradores y Contratos

Este proyecto es una aplicación web desarrollada con Laravel que permite gestionar colaboradores, contratos, prórrogas y terminaciones anticipadas para **Tech Solutions SAS**.

El sistema se enfoca en la lógica de negocio del backend, sin una interfaz gráfica de usuario (GUI), y sigue buenas prácticas como TDD (Test Driven Development) y control de versiones con GitFlow.

## Tecnologías utilizadas

El proyecto fue desarrollado utilizando:

*   PHP
*   Laravel 11
*   MySQL 8.0+
*   PHPUnit
*   `spatie/laravel-permission` (Roles y Permisos)

## Funcionalidades del sistema

### Autenticación de usuarios

El sistema incluirá control de acceso basado en roles a nivel de API.

### Módulo de Colaboradores

Permite gestionar los perfiles de los colaboradores en la organización.

**Funciones disponibles:**

*   Crear colaboradores
*   Listar colaboradores
*   Actualizar colaboradores
*   Desactivar colaboradores

### Módulo de Contratos

Permite gestionar contratos asociados a los colaboradores.

**Funciones disponibles:**

*   Crear contratos (Fijo, Indefinido, Prestación de Servicios)
*   Actualizar contratos
*   Terminar contratos

### Módulo de Prórrogas de Contrato

Permite extender contratos existentes.

**Tipos de prórroga:**

*   Prórroga de tiempo
*   Prórroga de valor
*   Prórroga de tiempo y valor (Ambos)

**Reglas del sistema:**

*   Si la prórroga incluye tiempo, se actualiza la fecha final del contrato.
*   No se pueden crear prórrogas para contratos finalizados o terminados.

### Módulo de Terminación Anticipada

Permite finalizar contratos antes de su fecha de finalización.

**Funciones:**

*   Registrar terminación anticipada
*   Guardar motivo de terminación
*   Guardar fecha de terminación
*   Cambiar estado del contrato a Terminado

**Reglas del sistema:**

*   No se puede terminar un contrato que ya esté Terminado o Finalizado.

## Requisitos del sistema

Para ejecutar el proyecto necesitas tener instalado:

*   PHP 8 o superior
*   Composer
*   MySQL 8.0+

## Instalación del proyecto

1.  **Clonar el repositorio**

    ```bash
    git clone https://github.com/harleyjgb07/Proyecto_RRHH.git
    cd Proyecto_RRHH
    ```

2.  **Instalar dependencias de PHP**

    ```bash
    composer install
    ```

3.  **Crear archivo de entorno**

    ```bash
    cp .env.example .env
    ```

4.  **Generar clave de la aplicación**

    ```bash
    php artisan key:generate
    ```

5.  **Configurar la base de datos**

    Editar el archivo `.env` con tus credenciales de base de datos:

    ```
    DB_DATABASE=nombre_base_datos
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña (si tiene)
    ```

6.  **Ejecutar migraciones**

    ```bash
    php artisan migrate
    ```

    Esto creará todas las tablas necesarias.

7.  **Ejecutar seeders (opcional)**

    Si el proyecto incluye seeders para poblar la base de datos con datos de ejemplo (incluyendo roles y permisos):

    ```bash
    php artisan db:seed
    ```

## Ejecutar pruebas

El proyecto incluye pruebas automatizadas utilizando PHPUnit, siguiendo la metodología TDD (Test Driven Development).

Actualmente el proyecto cuenta con:

  * 39 pruebas automatizadas
  * 95 assertions

Todas las pruebas pasan correctamente.

Para ejecutar las pruebas:

```bash
php artisan test
```

## Estructura del proyecto

```
app/
 ├── Http/Controllers
 │    ├── CollaboratorController
 │    ├── ContractController
 │    ├── ContractExtensionController
 │    └── ContractTerminationController
 │
 ├── Models
 │    ├── Collaborator
 │    ├── Contract
 │    ├── ContractExtension
 │    └── ContractTermination

database/
 ├── migrations

tests/
 ├── Feature
 │    ├── CollaboratorTest
 │    ├── ContractTest
 │    ├── ContractExtensionTest
 │    └── ContractTerminationTest
```

## Rutas principales

*   `POST /collaborators`
*   `PUT /collaborators/{collaborator}`
*   `DELETE /collaborators/{collaborator}`
*   `POST /collaborators/{collaborator}/contracts`
*   `PUT /contracts/{contract}`
*   `POST /contract-extensions`
*   `POST /contract-terminations`

## Flujo de desarrollo

El proyecto utiliza **GitFlow** para el control de versiones:

*   `main`: Código de producción estable.
*   `develop`: Rama principal de desarrollo.
*   `feature/*`: Ramas para nuevas funcionalidades.

## Autor

**Harley Guerra** 
