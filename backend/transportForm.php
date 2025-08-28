<?php
include './connection.php';

$sql = "CREATE TABLE IF NOT EXISTS transport (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    from_location VARCHAR(100) NOT NULL,
    to_location VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    rating DECIMAL(2,1),
    reviews INT,
    type VARCHAR(50),
    duration VARCHAR(50),
    departure_time VARCHAR(20),
    image_url VARCHAR(255)
)";

if (!(mysqli_query($conn, $sql))) {
    echo "Error creating database table: " . mysqli_error($conn);
}

// handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $from_location = $_POST['from_location'];
    $to_location = $_POST['to_location'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $reviews = $_POST['reviews'];
    $type = $_POST['type'];
    $duration = $_POST['duration'];
    $departure_time = $_POST['departure_time'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO transport (name, from_location, to_location, description, price, rating, reviews, type, duration, departure_time, image_url) 
            VALUES ('$name', '$from_location', '$to_location', '$description', '$price', '$rating', '$reviews', '$type', '$duration', '$departure_time', '$image_url')";

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
    <title>Add Transport</title>
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

        .location-row {
            display: flex;
            gap: 15px;
        }

        .location-row>div {
            flex: 1;
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
        <h2>Add Transport</h2>
        <form method="POST">
            <label for="name">Transport Service Name</label>
            <input type="text" id="name" name="name" placeholder="e.g., Himalayan Express, Nepal Airlines" required>

            <div class="location-row">
                <div>
                    <label for="from_location">From</label>
                    <input type="text" id="from_location" name="from_location" placeholder="Departure location" required>
                </div>
                <div>
                    <label for="to_location">To</label>
                    <input type="text" id="to_location" name="to_location" placeholder="Destination location" required>
                </div>
            </div>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3" placeholder="Brief description of the service"></textarea>

            <label for="price">Price (NPR)</label>
            <input type="number" step="0.01" id="price" name="price" required>

            <label for="rating">Rating (e.g. 4.5)</label>
            <input type="number" step="0.1" id="rating" name="rating" min="0" max="5">

            <label for="reviews">Number of Reviews</label>
            <input type="number" id="reviews" name="reviews">

            <label for="type">Transport Type</label>
            <select id="type" name="type">
                <option value="">Select type</option>
                <option value="Bus">Bus</option>
                <option value="Car Rental">Car Rental</option>
                <option value="Taxi">Taxi</option>
                <option value="Motorcycle">Motorcycle</option>
                <option value="Jeep">Jeep</option>
            </select>

            <label for="duration">Duration</label>
            <input type="text" id="duration" name="duration" placeholder="e.g., 2 hours, 1.5 days">

            <label for="departure_time">Departure Time</label>
            <input type="text" id="departure_time" name="departure_time" placeholder="e.g., 08:00 AM, Daily">

            <label for="image_url">Image URL</label>
            <input type="text" id="image_url" name="image_url" placeholder="URL of transport image">

            <button id="btn" class="btn" type="submit">Add Transport</button>
        </form>
    </div>

    <?php include '../frontend/footer.php'; ?>

    <script>
        const form = document.querySelector("form");
        form.addEventListener("submit", function(e) {
            e.preventDefault(); // stop page reload
            document.querySelector(".result").innerHTML =
                "<p style='color: green;'>New transport option added successfully.</p>";
            form.submit(); // now submit form to PHP
        });
    </script>

</body>

</html>