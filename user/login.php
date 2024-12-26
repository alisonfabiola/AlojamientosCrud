<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['id_role'] = $row['id_role'];
            header('Location: account.php');
        } else {
            echo "Credenciales incorrectas.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Iniciar Sesión</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
</html>
