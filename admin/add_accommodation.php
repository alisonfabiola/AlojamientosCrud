<?php
include '../includes/db.php';
session_start();

if ($_SESSION['id_role'] != 1) {
    header('Location: ../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $query = "INSERT INTO accommodations (name, description, price, image_url) VALUES ('$name', '$description', $price, '$image_url')";
    if ($conn->query($query)) {
        echo "Alojamiento añadido correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!-- Formulario HTML -->
<div class="container mt-5">
    <h1 class="text-center">Añadir Alojamiento</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">URL de Imagen</label>
            <input type="text" class="form-control" id="image_url" name="image_url">
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
</div>
