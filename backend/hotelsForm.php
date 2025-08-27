<?php
include './connection.php';

$sql = "CREATE TABLE IF NOT EXISTS hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    rating DECIMAL(2,1),
    reviews INT,
    type VARCHAR(50),
    image_url VARCHAR(255)
)";

if (!(mysqli_query($conn, $sql))) {
    echo "Error creating database table: " . mysqli_error($conn);
}

// handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $reviews = $_POST['reviews'];
    $type = $_POST['type'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO hotels (name, location, description, price, rating, reviews, type, image_url) 
            VALUES ('$name', '$location', '$description', '$price', '$rating', '$reviews', '$type', '$image_url')";

    if (!(mysqli_query($conn, $sql))) {
        echo "Error inserting data in table: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel</title>
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

        .btn {
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

        .btn:hover {
            background: #148865ff;
        }
    </style>
</head>

<body>
    <?php include '../frontend/header.php'; ?>

    <div class="form-container">
        <div class="result"></div>
        <h2>Add Hotel</h2>
        <form method="POST">
            <label for="name">Hotel Name</label>
            <input type="text" id="name" name="name" required>

            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3"></textarea>

            <label for="price">Price (NPR)</label>
            <input type="number" step="0.01" id="price" name="price" required>

            <label for="rating">Rating (e.g. 4.5)</label>
            <input type="number" step="0.1" id="rating" name="rating">

            <label for="reviews">Number of Reviews</label>
            <input type="number" id="reviews" name="reviews">

            <label for="type">Type</label>
            <input type="text" id="type" name="type" placeholder="Luxury, Budget, Resort, etc.">

            <label for="image_url">Image URL</label>
            <input type="text" id="image_url" name="image_url">

            <button id="btn" class="btn" type="submit">Add Hotel</button>
        </form>
    </div>

    <?php include '../frontend/footer.php'; ?>

    <script>
        const form = document.querySelector("form");
        form.addEventListener("submit", function(e) {
            e.preventDefault(); // stop page reload
            document.querySelector(".result").innerHTML =
                "<p style='color: green;'>New hotel added successfully.</p>";
            form.submit(); // now submit form to PHP
        });
    </script>

</body>

</html>