<?php

include '../backend/connection.php';

$sql = "SELECT title, country, description, best_season, price_range, highlights, image_url FROM destinations LIMIT 3";
$destinations = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<body>

    <div class="container">
        <h2>Favorite Destinations</h2>
        <?php foreach ($destinations as $dest): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($dest['image_url']); ?>" alt="<?php echo htmlspecialchars($dest['title']); ?>">
                <div class="card-body">
                    <div class="card-title"><?php echo htmlspecialchars($dest['title']); ?></div>
                    <div class="card-location"><?php echo htmlspecialchars($dest['country']); ?></div>
                    <div class="card-description"><?php echo htmlspecialchars($dest['description']); ?></div>
                    <div class="card-info">
                        Best Season: <?php echo htmlspecialchars($dest['best_season']); ?><br>
                        Price Range: <?php echo htmlspecialchars($dest['price_range']); ?>
                    </div>
                    <div class="card-highlights">
                        Highlights: <?php echo htmlspecialchars($dest['highlights']); ?>
                    </div>
                    <a href="#" class="explore-btn">Explore Destination</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>