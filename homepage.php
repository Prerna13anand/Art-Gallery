<?php
session_start();
if (!isset($_SESSION["logged_in_user"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    scroll-behavior: smooth;
}

/* Body Styling */
body {
    background-color: #f0f0f0;
    color: #333;
}

/* Header Styling */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 60px;
    background: linear-gradient(to right, #ff99cc, #ff6699);
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Logo */
.logo {
    font-size: 28px;
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

/* Navigation */
nav a {
    color: white;
    text-decoration: none;
    margin: 0 20px;
    font-size: 16px;
    font-weight: 500;
    transition: color 0.3s ease-in-out;
}

nav a:hover,
nav a.active {
    color: #ffebee;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
}

/* Hero Section */
.hero {
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    background: url('https://images.pexels.com/photos/11056596/pexels-photo-11056596.jpeg?auto=compress&cs=tinysrgb&w=600') no-repeat center center/cover;
    position: relative;
    z-index: 1;
    padding: 20px;
}

/* Hero Overlay */
.hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    z-index: -1;
}

/* Hero Text */
.hero h1 {
    font-size: 56px;
    color: white;
    text-shadow: 2px 2px 10px rgba(63, 58, 58, 0.4);
    margin-bottom: 20px;
    animation: fadeIn 1s ease-in-out;
}
.hero h3{
    color: white;
}

/* Hero Button */
.explore-btn {
    margin-top: 20px;
    padding: 12px 25px;
    font-size: 18px;
    border: none;
    background: linear-gradient(to right, #ff6699, #ff3366);
    color: white;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.explore-btn:hover {
    background: linear-gradient(to right, #ff3366, #ff6699);
    transform: scale(1.05);
}

/* Fade-in Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Slider */
.slider-container {
    width: 80%;
    margin: 60px auto;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

/* Slides */
.slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    min-width: 100%;
    box-sizing: border-box;
    text-align: center;
}

/* Slide Images */
.slide img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

/* Slider Controls */
.slider-controls {
    display: flex;
    justify-content: space-between;
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
}

.slider-controls button {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    font-size: 24px;
    transition: 0.3s;
    border-radius: 5px;
}

.slider-controls button:hover {
    background-color: #ff4081;
}

/* Responsive Design */
@media (max-width: 768px) {
    header {
        padding: 15px 30px;
    }

    .logo {
        font-size: 22px;
    }

    nav a {
        font-size: 14px;
        margin: 0 15px;
    }

    .hero h1 {
        font-size: 40px;
        
    }
   

    .explore-btn {
        font-size: 16px;
    }

    .slider-container {
        width: 90%;
    }
}
.about {
        padding: 60px;
        text-align: center;
        background: white;
    }

    .about h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .about p {
        font-size: 18px;
        color: #666;
        max-width: 800px;
        margin: 0 auto;
    }

    .social-icons {
        margin-top: 20px;
    }

    .social-icons a {
        display: inline-block;
        margin: 0 10px;
        color: #ff6699;
        font-size: 24px;
        transition: 0.3s;
    }

    .social-icons a:hover {
        color: #ff3366;
    }
    footer {
    background: linear-gradient(to right, #ff99cc, #ff6699);
    color: white;
    text-align: center;
    padding: 30px 10px;
    margin-top: 40px;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: auto;
}

.footer-section {
    flex: 1;
    min-width: 250px;
    margin: 10px;
}

.footer-section h3 {
    font-size: 20px;
    margin-bottom: 10px;
    border-bottom: 2px solid white;
    display: inline-block;
    padding-bottom: 5px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin: 8px 0;
}

.footer-section ul li a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: #ffebee;
}

.social-icons {
    margin-top: 10px;
}

.social-icons a {
    display: inline-block;
    margin: 0 8px;
    color: white;
    font-size: 22px;
    transition: 0.3s ease;
}

.social-icons a:hover {
    color: #ffebee;
}

.footer-bottom {
    margin-top: 20px;
    padding-top: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    font-size: 14px;
}

</style>
</head>
<body>
    <header>
        <div class="logo">Art Gallery</div>
        <nav>
            
            <a href="gallerypage.php">Gallery</a>
            <a href="artistpage.php">Artists</a>
            <a href="contact.php">Contact</a>
            <a href="cart.php">Cart</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    
    <section class="hero">
        <h1>Showcase, Buy, and Sell Your Art—Turn Creativity into Opportunity</h1>
      
        <h3 >If you're interested in selling your own art, contact us today!</h3>
        <button class="explore-btn" onclick="window.location.href='gallerypage.php'">Explore More</button>
    </section>
    
    <div class="slider-container">
        <div class="slides">
            <div class="slide"><img src="https://cdn.pixabay.com/photo/2019/03/02/16/26/man-4030112_1280.jpg" alt="Artwork 1"></div>
            <div class="slide"><img src="https://cdn.pixabay.com/photo/2016/07/10/13/13/angel-1507747_1280.jpg" alt="Artwork 2"></div>
            <div class="slide"><img src="https://cdn.pixabay.com/photo/2018/10/08/14/46/bird-3732867_1280.jpg" alt="Artwork 3"></div>
        </div>
        <div class="slider-controls">
            <button onclick="prevSlide()">&#10094;</button>
            <button onclick="nextSlide()">&#10095;</button>
        </div>
    </div>

    <section class="about">
    <h2>About Us</h2>
    <p>Welcome to our Art Gallery, a place where artists and art lovers unite. Our mission is to provide a platform for talented individuals to showcase and sell their work while allowing art enthusiasts to discover unique and inspiring pieces. Join us in celebrating creativity and passion for art.</p>
    <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
    </div>
</section>
    
    <script>
        let currentIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slide').length;

        function updateSlide() {
            slides.style.transform = `translateX(${-currentIndex * 100}%)`;
        }

        function prevSlide() {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalSlides - 1;
            updateSlide();
        }

        function nextSlide() {
            currentIndex = (currentIndex < totalSlides - 1) ? currentIndex + 1 : 0;
            updateSlide();
        }
        // Auto-slide every 3 seconds
setInterval(nextSlide, 3000);
    </script>
    <footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Email: support@artgallery.com</p>
            <p>Phone: + +91 8765136894</p>
            <p>Address: 522, Eldeco Greeens, Gomti Nagar, Lucknow, Uttar Pradesh</p>
        </div>
        
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="gallerypage.php">Gallery</a></li>
                <li><a href="artistpage.php">Artists</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2025 Art Gallery. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>


