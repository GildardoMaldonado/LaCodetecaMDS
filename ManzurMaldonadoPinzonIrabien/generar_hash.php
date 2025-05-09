<?php
$clave = "admin"; // cambia esto por la contraseña que necesites
$hash = password_hash($clave, PASSWORD_DEFAULT);
echo "Contraseña: $clave<br>";
echo "Hash generado:<br><textarea cols='80' rows='3'>$hash</textarea>";
