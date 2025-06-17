# Sistema de Gestión de Taller de Vehículos

## Descripción
Sistema de gestión para talleres de vehículos que permite administrar vehículos, clientes, revisiones y servicios de manera eficiente.

## Características Principales
- Gestión de vehículos y clientes
- Registro y seguimiento de revisiones
- Catálogo de servicios
- Historial de mantenimientos
- Sistema de costos y facturación

## Requisitos del Sistema
- PHP >= 8.0
- MySQL >= 5.7
- Composer
- Laravel >= 8.0
- Node.js y NPM (para assets frontend)

## Instalación

1. Clonar el repositorio:
```bash
git clone [URL_DEL_REPOSITORIO]
cd taller-de-vehiculos
```

2. Instalar dependencias de PHP:
```bash
composer install
```

3. Instalar dependencias de Node.js:
```bash
npm install
```

4. Configurar el archivo .env:
```bash
cp .env.example .env
php artisan key:generate
```

5. Configurar la base de datos en el archivo .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taller_vehiculos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

6. Ejecutar las migraciones:
```bash
php artisan migrate
```

7. Iniciar el servidor:
```bash
php artisan serve
```

## Estructura de la Base de Datos

### Tabla: vehiculos
- id (INT, PK)
- marca (VARCHAR)
- modelo (VARCHAR)
- anio (INT)
- placa (VARCHAR, UNIQUE)
- color (VARCHAR)
- kilometraje (INT)
- cliente_nombre (VARCHAR)
- cliente_telefono (VARCHAR)
- cliente_email (VARCHAR)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)

### Tabla: revisiones
- id (INT, PK)
- vehiculo_id (INT, FK)
- fecha_revision (DATE)
- descripcion (TEXT)
- costo (DECIMAL)
- estado (ENUM)
- mecanico (VARCHAR)
- observaciones (TEXT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)

### Tabla: servicios
- id (INT, PK)
- nombre (VARCHAR)
- descripcion (TEXT)
- precio_base (DECIMAL)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)

### Tabla: revision_servicios
- id (INT, PK)
- revision_id (INT, FK)
- servicio_id (INT, FK)
- precio_final (DECIMAL)
- created_at (TIMESTAMP)

## Rutas Principales

- `/` - Redirecciona a la página de vehículos
- `/vehiculos` - Lista de vehículos
- `/registrar/vehiculo` - Formulario de registro de vehículos
- `/registrar/vehiculo/{id}` - Detalles del vehículo
- `/buscarVehiculo` - Búsqueda de vehículos
- `/revision/{id}` - Historial de revisiones
- `/revision/crear/{id}` - Crear nueva revisión


## Licencia
Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.