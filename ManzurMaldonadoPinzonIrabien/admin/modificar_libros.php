<?php
session_start();
include '../conexionBD.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar'])) {
        $titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
        $autor = mysqli_real_escape_string($conexion, $_POST['autor']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
        $libro = mysqli_real_escape_string($conexion, $_POST['libro']);
        $imagen = mysqli_real_escape_string($conexion, $_POST['imagen']);

        $sql = "INSERT INTO libros (titulo, autor, descripcion, libro, imagen) 
                VALUES ('$titulo', '$autor', '$descripcion', '$libro', '$imagen')";
        $conexion->query($sql);

    } elseif (isset($_POST['editar'])) {
        $id = intval($_POST['id']);
        $titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
        $autor = mysqli_real_escape_string($conexion, $_POST['autor']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
        $libro = mysqli_real_escape_string($conexion, $_POST['libro']);
        $imagen = mysqli_real_escape_string($conexion, $_POST['imagen']);

        $sql = "UPDATE libros SET 
                titulo = '$titulo', 
                autor = '$autor', 
                descripcion = '$descripcion', 
                libro = '$libro', 
                imagen = '$imagen' 
                WHERE id = $id";
        $conexion->query($sql);

    } elseif (isset($_GET['eliminar'])) {
        $id = intval($_GET['eliminar']);
        $sql = "DELETE FROM libros WHERE id = $id";
        $conexion->query($sql);
    }
}

$libros = $conexion->query("SELECT * FROM libros ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Libros</title>
    <link rel="stylesheet" href="../admin/estiloModificar_libros.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Administrar Libros</h1>

    <div class="form-container">
        <h2><?= isset($_GET['editar_id']) ? 'Editar Libro' : 'Agregar Nuevo Libro' ?></h2>
        <form method="POST">
            <?php if (isset($_GET['editar_id'])): ?>
                <?php 
                    $editar_id = intval($_GET['editar_id']);
                    $libro_editar = $conexion->query("SELECT * FROM libros WHERE id = $editar_id")->fetch_assoc();
                ?>
                <input type="hidden" name="id" value="<?= $libro_editar['id'] ?>">
                <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
                <a href="modificar_libros.php" class="btn btn-secondary">Cancelar</a>
            <?php else: ?>
                <button type="submit" name="agregar" class="btn btn-primary">Agregar Libro</button>
            <?php endif; ?>

            <label>Título</label>
            <input type="text" name="titulo" required value="<?= $libro_editar['titulo'] ?? '' ?>">

            <label>Autor</label>
            <input type="text" name="autor" required value="<?= $libro_editar['autor'] ?? '' ?>">

            <label>Descripción</label>
            <textarea name="descripcion" rows="3" required><?= $libro_editar['descripcion'] ?? '' ?></textarea>

            <label>Archivo del libro (ruta)</label>
            <input type="text" name="libro" required value="<?= $libro_editar['libro'] ?? '' ?>">

            <label>Imagen (ruta)</label>
            <input type="text" name="imagen" required value="<?= $libro_editar['imagen'] ?? '' ?>">
        </form>
    </div>

    <h2>Lista de Libros</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($libro = $libros->fetch_assoc()): ?>
            <tr>
                <td><?= $libro['id'] ?></td>
                <td><?= htmlspecialchars($libro['titulo']) ?></td>
                <td><?= htmlspecialchars($libro['autor']) ?></td>
                <td>
                    <a href="modificar_libros.php?editar_id=<?= $libro['id'] ?>" class="btn btn-outline-dark">Editar</a>
                    <a href="modificar_libros.php?eliminar=<?= $libro['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este libro?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-outline-dark">Volver al Inicio</a>
</div>
</body>
</html>