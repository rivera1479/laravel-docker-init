# Laravel Docker Init

## Descripción del Proyecto

**Laravel Docker Init** es una plantilla inicial lista para usar, que integra Laravel con autenticación basada en [Sanctum](https://laravel.com/docs/12.x/sanctum), funciones básicas de autenticación (login, registro, perfil, logout) y un CRUD completo de usuarios. El entorno está completamente dockerizado, facilitando la instalación, despliegue y desarrollo sin preocuparse por la configuración local de PHP, Nginx o bases de datos.

Ideal para comenzar nuevos proyectos Laravel de forma rápida, segura y escalable.

---

## Requisitos

- [Docker](https://docs.docker.com/get-docker/) y [Docker Compose](https://docs.docker.com/compose/install/) instalados en tu sistema.
- (Opcional) [Postman](https://www.postman.com/downloads/) para probar las rutas de la API.
- (Opcional) [Git](https://git-scm.com/) para clonar el repositorio.

---

## Instalación y Configuración

1. **Clona el repositorio:**

   ```sh
   git clone https://github.com/tu-usuario/laravel-docker-init.git
   cd laravel-docker-init
   ```

2. **Copia el archivo de entorno:**

   ```sh
   cp src/.env.example src/.env
   ```

3. **Levanta los contenedores:**

   ```sh
   docker compose up -d
   ```

4. **Instala las dependencias de Composer:**

   ```sh
   docker compose run --rm app composer install
   ```

5. **Genera la clave de la aplicación:**

   ```sh
   docker compose run --rm app php artisan key:generate
   ```

6. **Publica y ejecuta las migraciones (incluyendo Sanctum):**

   ```sh
   docker compose run --rm app php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   docker compose run --rm app php artisan migrate
   ```

7. **(Opcional) Seeders y datos de prueba:**

   ```sh
   docker compose run --rm app php artisan db:seed
   ```

---

## Uso de la API

El backend expone endpoints para autenticación y gestión de usuarios, protegidos por Sanctum.  
Puedes probarlos fácilmente usando [Postman](https://www.postman.com/downloads/).

### Endpoints principales

- `POST /auth` — Login de usuario
- `POST /register` — Registro de usuario
- `POST /logout` — Cerrar sesión (requiere token)
- `GET /profile` — Perfil del usuario autenticado
- `GET /` — Listar usuarios (requiere token)
- `POST /` — Crear usuario (requiere token)
- `PUT /` — Actualizar usuario (requiere token)

### Colección Postman

Puedes importar la colección de Postman incluida en el repositorio (`postman_collection.json`) para probar todos los endpoints de forma sencilla.  
Si no existe, puedes crear una colección nueva y agregar los endpoints anteriores, usando el token recibido en el login para las rutas protegidas.

---

## Recursos y Documentación

- [Documentación oficial de Laravel](https://laravel.com/docs/)
- [Laravel Sanctum](https://laravel.com/docs/10.x/sanctum)
- [Docker Compose](https://docs.docker.com/compose/)
- [Postman](https://learning.postman.com/docs/getting-started/introduction/)

---

## Notas adicionales

- El proyecto utiliza **MariaDB** como base de datos y **Redis** para cache/cola.
- El servidor web es **Nginx** y el código fuente de Laravel está en la carpeta `src`.
- Puedes personalizar los puertos y variables de entorno en `docker-compose.yml` y `src/.env`.
- Si necesitas agregar más servicios, simplemente edita el archivo `docker-compose.yml`.

---

¡Listo! Ahora tienes un entorno Laravel moderno, seguro y portable, listo para comenzar a desarrollar 🚀