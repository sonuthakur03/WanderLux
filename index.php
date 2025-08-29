<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WanderLux - Discover Your Next Dream Destination</title>
        <link rel="stylesheet" href="./frontend/css/style.css">
    </head>
    <?php
    include './frontend/header.php';
    ?>
    <?php
    // Simple routing logic
    $page = $_GET['page'] ?? 'home';

    switch ($page) {
        case 'home':
            include './frontend/home.php';
            break;
        case 'hotels':
            include './frontend/hotels.php';
            break;
        case 'destinations':
            include './frontend/destinations.php';
            break;
        case 'transport':
            include './frontend/transport.php';
            break;
        default:
            echo "<h1>404 Page Not Found</h1>";
            break;
    }
    ?>

    <?php
    include './frontend/footer.php'

    ?>

    <script src="./frontend/js/index.js"></script>
</body>

</html>