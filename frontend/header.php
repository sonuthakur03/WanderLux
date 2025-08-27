<?php
session_start();
?>

<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">WanderLux</div>
        <ul class="nav-menu">
            <li><a href="../index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-compass w-4 h-4">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>Home</a></li>
            <li><a href="./frontend/hotels.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hotel w-4 h-4">
                        <path d="M18 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2Z"></path>
                        <path d="m9 16 .348-.24c1.465-1.013 3.84-1.013 5.304 0L15 16"></path>
                        <path d="M8 7h.01"></path>
                        <path d="M16 7h.01"></path>
                        <path d="M12 7h.01"></path>
                        <path d="M12 11h.01"></path>
                        <path d="M16 11h.01"></path>
                        <path d="M8 11h.01"></path>
                        <path d="M10 22v-6.5m4 0V22"></path>
                    </svg>Hotels</a></li>
            <li><a href="./frontend/destinations.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map w-4 h-4">
                        <polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"></polygon>
                        <line x1="9" x2="9" y1="3" y2="18"></line>
                        <line x1="15" x2="15" y1="6" y2="21"></line>
                    </svg>Destinations</a></li>
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <li><a href="dashboard.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" ...>
                            <path d="M3 13h18M12 3v18"></path>
                        </svg> Dashboard</a>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            <a href="logout.php" class="sign-in-btn">Logout</a>
        <?php else: ?>
            <a href="login.php" class="sign-in-btn">Sign In</a>
        <?php endif; ?>
    </div>
</nav>