<?php
include 'includes/header.php';
include 'includes/db.php';

// Consulta para obtener los alojamientos
$query = "SELECT * FROM accommodations";
$result = $conn->query($query);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Bienvenidos a Accommodations App</h1>
    <p class="text-center">Explora nuestros alojamientos y encuentra el lugar perfecto para tu próxima estancia.</p>
    <div class="row">
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        <p class="card-text"><strong>Precio: $<?php echo number_format($row['price'], 2); ?></strong></p>
                        <a href="#" class="btn btn-primary w-100">Reservar Ahora</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
