<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        /* Hero */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url("https://i.pinimg.com/1200x/02/1b/ff/021bff44798638c0e0ce78b5aea86c0f.jpg") center/cover no-repeat;
            color: #fff;
            text-align: center;
            padding: 50px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 75vh;
            flex-direction: column;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .search-box {
            margin-top: 20px;
            padding: 12px;
            width: 60%;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
        }

        .destinations {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .destinations h2 {
            font-size: 2.2rem;
            color: #222;
            margin-top: 10px;
        }

        /* Cards */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 10px 20px;
        }

        .card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.48);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .badge {
            background: #e17055;
            color: #fff;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 0.8rem;
        }

        .explore-btn {
            display: inline-block;
            margin-top: 15px;
            background: #d63031;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }

        .explore-btn:hover {
            background: #b92b2b;
        }
    </style>
</head>

<body>

    <?php include "header.php" ?>

    <!-- Hero -->
    <section class="hero">
        <h2>Explore Top Destinations</h2>
        <p>From tropical beaches to cultural landmarks, discover the world’s most breathtaking places for your next trip.</p>
        <input type="text" class="search-box" placeholder="Search destinations, countries...">
    </section>

    <?php include "./destinationsCard.php" ?>

    <?php include "footer.php" ?>

</body>

</html>