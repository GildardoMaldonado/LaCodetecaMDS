<?php
session_start();
include '../conexionBD.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar'])) {
        $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
        $contrasenia = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $es_admin = isset($_POST['es_admin']) ? 1 : 0;

        $sql = "INSERT INTO usuarios (correo, contrasenia, nombre, es_admin) 
                VALUES ('$correo', '$contrasenia', '$nombre', $es_admin)";
        $conexion->query($sql);

    } elseif (isset($_POST['editar'])) {
        $id = intval($_POST['id']);
        $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $es_admin = isset($_POST['es_admin']) ? 1 : 0;

        $sql_extra = '';
        if (!empty($_POST['contrasenia'])) {
            $contrasenia = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
            $sql_extra = ", contrasenia = '$contrasenia'";
        }

        $sql = "UPDATE usuarios SET 
                correo = '$correo', 
                nombre = '$nombre', 
                es_admin = $es_admin
                $sql_extra
                WHERE id = $id";
        $conexion->query($sql);

    } elseif (isset($_GET['eliminar'])) {
        $id = intval($_GET['eliminar']);
        if ($id != $_SESSION['user_id']) {
            $sql = "DELETE FROM usuarios WHERE id = $id";
            $conexion->query($sql);
        }
    }
}

$usuarios = $conexion->query("SELECT id, correo, nombre, es_admin FROM usuarios ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <link rel="stylesheet" href="../admin/estiloGestionar_usuarios.css">
</head>
<body>
<div class="container">
    <h1>Gestionar Usuarios</h1>

    <h2><?= isset($_GET['editar_id']) ? 'Editar Usuario' : 'Agregar Nuevo Usuario' ?></h2>
    <form method="POST">
        <?php if (isset($_GET['editar_id'])): ?>
            <?php 
                $editar_id = intval($_GET['editar_id']);
                $usuario_editar = $conexion->query("SELECT * FROM usuarios WHERE id = $editar_id")->fetch_assoc();
            ?>
            <input type="hidden" name="id" value="<?= $usuario_editar['id'] ?>">
            <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
            <a href="gestionar_usuarios.php" class="btn btn-outline-dark">Cancelar</a>
        <?php else: ?>
            <button type="submit" name="agregar" class="btn btn-primary">Agregar Usuario</button>
        <?php endif; ?>

        <label>Correo electrónico</label>
        <input type="email" name="correo" required value="<?= $usuario_editar['correo'] ?? '' ?>">

        <label>Nombre</label>
        <input type="text" name="nombre" required value="<?= $usuario_editar['nombre'] ?? '' ?>">

        <label>Contraseña</label>
        <input type="password" name="contrasenia" placeholder="<?= isset($_GET['editar_id']) ? 'Dejar en blanco para no cambiar' : '' ?>" <?= !isset($_GET['editar_id']) ? 'required' : '' ?>>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="es_admin" id="es_admin" <?= ($usuario_editar['es_admin'] ?? 0) == 1 ? 'checked' : '' ?>>
            <label class="form-check-label" for="es_admin">¿Es administrador?</label>
        </div>
    </form>

    <h2>Lista de Usuarios</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($usuario = $usuarios->fetch_assoc()): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= htmlspecialchars($usuario['correo']) ?></td>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= $usuario['es_admin'] == 1 ? 'Administrador' : 'Usuario' ?></td>
                <td>
                    <a href="gestionar_usuarios.php?editar_id=<?= $usuario['id'] ?>" class="btn btn-outline-dark">Editar</a>
                    <?php if ($usuario['id'] != $_SESSION['user_id']): ?>
                        <a href="gestionar_usuarios.php?eliminar=<?= $usuario['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
                    <?php else: ?>
                        <button class="btn btn-secondary" disabled>Tú</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-outline-dark">Volver al Inicio</a>
</div>
</body>
</html>
