<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodations App</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <nav>
        <a href="index.php">Inicio</a>
        <?php if (isset($_SESSION['id_user'])): ?>
            <a href="logout.php">Cerrar Sesión</a>
        <?php else: ?>
            <a href="register.php">Registrar</a>
            <a href="user/login.php">Iniciar Sesión</a>
        <?php endif; ?>
    </nav>

