CÓMO HACER LAS PRUEBAS

Archivo UsuarioTest.php creado con tres pruebas automáticas:

✅ Crear un usuario administrador.

✅ Verificar autenticación correcta.

❌ Verificar fallo de autenticación con contraseña incorrecta.

PARA EJECUTARLO:
Requisitos:
-Tener instalado PHPUnit
-Base de datos de prueba

Se utiliza el archivo UsuarioTest.php:

Ejecutar el test en bash:
phpunit tests/UsuarioTest.php

Estas pruebas funcionaron tanto como pruebas unitarias como de regresión
Cada que se hacía un cambio en el código, se corrían para ver que no se haya roto nada


Con estas pruebas se aseguró que:
-Se cree correctamente el usuario

-Se asignó correctamente el rol de administrador

-Se puede iniciar sesión

-Se accede a funciones de administrador.

-Futuros cambios no rompen las funcionalidades
