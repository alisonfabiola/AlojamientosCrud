<?php
include 'includes/db.php';

$query = "SELECT * FROM accommodations";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Alojamientos Disponibles</h1>
    <div class="row">
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><strong>Precio: $<?php echo $row['price']; ?></strong></p>
                    </div>
                </div>
            </div>
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
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</html>
