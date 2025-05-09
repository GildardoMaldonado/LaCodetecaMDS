<?php
$input = 'admin';
$hash = '$2y$10$3UmPVg.zvPt5qoezCNXtN.Hn9AkLMdGzHYKvtFQebl97iImx1SOu2';

echo "Contraseña: $input<br>";
echo "Hash: $hash<br>";
echo "Resultado: ";
var_dump(password_verify($input, $hash));
