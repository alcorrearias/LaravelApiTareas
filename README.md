
# ApiTareasCrud

## Api en Laravel 11

La api creada sin framework (https://github.com/alcorrearias/LaravelApiTareas) ahora en Laravel
- <b>PHP 8.2 </b>
- CRUD
- Se utiliza <b>Validator</b> para validaro los input de la solicitud

Instalación:

1) Clonar o descargar el proyecto en el directorio de tu servidor web

2) Acceder mediante terminal a la carpeta del proyecto ApiTareasCrud

4) Ejecutar:  <b>Composer install</b>

5) Crear el archivo .env con los comandos: <b> cp .env.example .env</b>

6) Generar la API key ejecutando: <b> php artisan key:generate </b>

7) En el archivo .env colocar el nombre de la base de datos

8) Para ejecutar las migraciones: <b>php artisan migrate</b>

9) se ejecuta el proyecto php artisan serve --port=8001

## Columnas de la tabla
- id 
- titulo 
- estado

## API Reference

#### Get all tareas

```http
  GET /api/tareas
```

#### Get tarea

```http
  GET /api/tarea/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id de cada tarea creada |

```http
  POST /api/tarea
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `titulo`      | `string` | **Required**. descripcion de la tarea |
| :-------- | :------- | :-------------------------------- |
| `estado`      | `string` | **Required**. estado en el que se encuentra la tarea, sea 0 (pendiente) , 1 (completada) |

```http
  PUT /api/tarea/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id de cada tarea creada |
| :-------- | :------- | :-------------------------------- |
| `titulo`      | `string` | **Required**. descripcion de la tarea |
| :-------- | :------- | :-------------------------------- |
| `estado`      | `string` | **Required**. estado en el que se encuentra la tarea, sea 0 (pendiente) , 1 (completada) |

```http
  DELETE /api/tarea/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id de cada tarea creada |

# tareas-vue

## Api en Vuejs

La api creada en (https://github.com/alcorrearias/LaravelApiTareas/tree/main/tareas-vue)

- CRUD

Instalación:

1) Clonar o descargar el proyecto en el directorio de tu servidor web

2) Acceder mediante terminal a la carpeta del proyecto tareas-vue

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

