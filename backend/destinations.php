<?php

include './connection.php';

$sql = "CREATE TABLE IF NOT EXISTS destinations(
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        country VARCHAR(50) NOT NULL,
        description VARCHAR(400) NOT NULL,
        best_season VARCHAR(50) NOT NULL,
        price_range VARCHAR(50) NOT NULL,
        highlights VARCHAR(200) NOT NULL,
        image_url VARCHAR(400) NOT NULL
)";

if (!(mysqli_query($conn, $sql))) {
    echo "Error creating database table: " . mysqli_error($conn);
}

// handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $country = $_POST['country'];
    $description = $_POST['description'];
    $best_season = $_POST['best_season'];
    $price_range = $_POST['price_range'];
    $highlights = $_POST['highlights'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO destinations (title, country, description, best_season, price_range, highlights, image_url) 
            VALUES ('$title', '$country', '$description', '$best_season', '$price_range', '$highlights', '$image_url')";
}
if (!(mysqli_query($conn, $sql))) {
    echo "Error intserting data in table: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Destination</title>
    <link rel="stylesheet" href="../frontend/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 40px 0;
        }

        form {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            width: 80%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .dest {
            margin: 20px auto;
            display: block;
            width: 33%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #20c997;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #148865ff;
        }
    </style>
</head>

<body>
    <?php
    include '../frontend/header.php';
    ?>
    <div class="form-container">
        <div class="result"></div>
        <h2>Add Destination</h2>
        <form method="POST">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>

            <label for="country">Country</label>
            <input type="text" id="country" name="country" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3" required></textarea>

            <label for="best_season">Best Season</label>
            <input type="text" id="best_season" name="best_season" required>

            <label for="price_range">Price Range</label>
            <input type="text" id="price_range" name="price_range" required>

            <label for="highlights">Highlights</label>
            <input type="text" id="highlights" name="highlights" required>

            <label for="image_url">Image URL (e.g. bali.jpg)</label>
            <input type="text" id="image_url" name="image_url" required>

            <button id="btn" class="dest" type="submit">Add Destination</button>
        </form>
    </div>
    <?php
    include '../frontend/footer.php';
    ?>
    <script>
        const form = document.querySelector("form");
        form.addEventListener("submit", function(e) {
            e.preventDefault(); // stop page reload
            document.querySelector(".result").innerHTML =
                "<p style='color: green;'>New destination added successfully.</p>";
            form.submit(); // now submit form to PHP
        });
    </script>

</body>

</html>