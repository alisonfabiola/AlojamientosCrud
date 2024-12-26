<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];

// Lógica para eliminar un alojamiento
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id_accommodation = $_POST['id_accommodation'];
    $query = "DELETE FROM user_accommodation WHERE id_user = $id_user AND id_accommodation = $id_accommodation";
    $conn->query($query);
    header('Location: account.php');
}

// Consulta para recuperar los alojamientos del usuario
$query = "SELECT a.* FROM accommodations a
        JOIN user_accommodation ua ON a.id_accommodation = ua.id_accommodation
        WHERE ua.id_user = $id_user";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Mis Alojamientos</h1>
    <div class="row">
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><strong>Precio: $<?php echo $row['price']; ?></strong></p>
                        
                        <!-- Botón para eliminar el alojamiento -->
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="id_accommodation" value="<?php echo $row['id_accommodation']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
</html>
