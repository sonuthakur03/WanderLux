<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanderLux - Discover Your Next Dream Destination</title>
    <link rel="stylesheet" href="./frontend/css/style.css">
</head>

<body>

    <?php
    include './frontend/header.php';
    ?>
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Discover Your Next<br><span class="highlight">Dream Destination</span></h1>
            <p>Experience luxury travel with curated hotels, expert guides, and unforgettable journeys around the world</p>
            <div class="hero-buttons">
                <a href="#" class="btn-primary">Explore Hotels</a>
                <a href="#" class="btn-secondary">View Destinations</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-container">
            <div class="stat-item animate-on-scroll">
                <div class="stat-number">50,000+</div>
                <div class="stat-label">Hotels Worldwide</div>
            </div>
            <div class="stat-item animate-on-scroll">
                <div class="stat-number">2M+</div>
                <div class="stat-label">Happy Travelers</div>
            </div>
            <div class="stat-item animate-on-scroll">
                <div class="stat-number">180+</div>
                <div class="stat-label">Countries Covered</div>
            </div>
            <div class="stat-item animate-on-scroll">
                <div class="stat-number">4.9/5</div>
                <div class="stat-label">Customer Rating</div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <h2>Why Choose WanderLux?</h2>
            <p class="features-subtitle">We're committed to making your travel dreams come true with unmatched service, exclusive access, and personalized experiences.</p>

            <div class="features-grid">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🌍</div>
                    <h3>Global Coverage</h3>
                    <p>Access to premium hotels and destinations worldwide with our extensive network of exclusive deals.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🔒</div>
                    <h3>Secure Booking</h3>
                    <p>Protected payments and guaranteed reservations for peace of mind on every journey.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">💎</div>
                    <h3>Personalized Service</h3>
                    <p>Tailored recommendations based on your preferences and travel history for unique experiences.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Destinations Section -->
    <?php
    include './frontend/card.php'
    ?>


    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-container">
            <h2>Ready to Start Your Adventure?</h2>
            <p>Join millions of travelers who trust WanderLux for their dream vacations. Book now and create memories that last a lifetime.</p>
            <div class="cta-buttons">
                <a href="#" class="btn-white">Find Hotels</a>
                <a href="#" class="btn-outline">Sign Up Free</a>
            </div>
        </div>
    </section>

    <?php
    include './frontend/footer.php'

    ?>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = 'none';
            }
        });


        // Counter animation for stats
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const startTime = Date.now();

            function updateCounter() {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);

                let current;
                if (target.includes('M')) {
                    current = Math.floor(progress * parseFloat(target) * 1000000);
                    if (current >= 1000000) {
                        element.textContent = (current / 1000000).toFixed(1) + 'M+';
                    } else {
                        element.textContent = Math.floor(current / 1000) + 'K+';
                    }
                } else if (target.includes('K') || target.includes(',')) {
                    const numTarget = parseInt(target.replace(/[^0-9]/g, ''));
                    current = Math.floor(progress * numTarget);
                    element.textContent = current.toLocaleString() + '+';
                } else if (target.includes('.')) {
                    current = (progress * parseFloat(target)).toFixed(1);
                    element.textContent = current + '/5';
                } else {
                    current = Math.floor(progress * parseInt(target));
                    element.textContent = current + '+';
                }

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                }
            }

            updateCounter();
        }

        // Start counter animation when stats section is visible
        const statsObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const target = stat.textContent;
                        animateCounter(stat, target);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
        // Add click handlers for buttons
        document.querySelectorAll('.btn-primary, .btn-secondary, .btn-white, .btn-outline').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                    // Add a subtle pulse effect
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                }
            });
        });

        // Mobile menu toggle (if needed)
        const signInBtn = document.querySelector('.sign-in-btn');
        signInBtn.addEventListener('click', function() {
            alert('Sign In functionality would be implemented here!');
        });
    </script>
</body>

</html>