
# Libreria (Gestor de préstamo de libros)

## Primeros pasos

- Clonar el repositorio con ``git clone https://github.com/CalebCupul/libreria.git``
- Copiar el archivo .env.example a .env y editar las credenciales de acceso a la base de datos
- Ejecutar ``composer update``
- Ejecutar ``php artisan key:generate``
- Ejecutar ``php artisan migrate --seed``
- Ejecutar ``php artisan serve``

- Ahora puede iniciar sesión como:
    - Super Admin: ``superadmin@gmail.com:password``
    - Admin: ``demoAdmin@gmail.com:password``
    - Empleado: ``demoEmpleado@gmail.com:password``
    - User: ``demoCliente@gmail.com:password``
