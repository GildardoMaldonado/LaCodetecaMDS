<?php
class UsuarioRepositorio {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function usuarioExiste($correo): bool {
        $correoLimpio = mysqli_real_escape_string($this->conexion, $correo);
        $query = "SELECT * FROM usuarios WHERE correo = '$correoLimpio'";
        $resultado = mysqli_query($this->conexion, $query);

        if (!$resultado) {
            return false;
        }

        return mysqli_num_rows($resultado) > 0;
    }
}
