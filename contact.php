
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Art Gallery</title>
    <style>
      
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
    background: linear-gradient(135deg, rgba(255, 64, 129, 0.9), rgba(255, 0, 150, 0.8));
    padding: 15px 40px;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 10px rgba(255, 64, 129, 0.4);
}

.logo {
    font-size: 28px;
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

nav {
    display: flex;
    gap: 20px;
}
nav a {
    color: white;
    text-decoration: none;
    margin: 0 50px;
    font-size: 16px;
    font-weight: 500;
    transition: color 0.3s ease-in-out;
}
nav a:hover,
nav a.active {
    color: #ffebee;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
}
        .contact-container {
            max-width: 800px;
            margin: 120px auto 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .contact-container h1 {
            color: #ff4081;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form button {
            background: #ff4081;
            color: white;
            border: none;
            padding: 12px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }
        .contact-form button:hover {
            background: #e60073;
        }
        footer {
            text-align: center;
            padding: 15px;
            background: #333;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            background:linear-gradient(135deg, rgba(255, 64, 129, 0.9), rgba(255, 0, 150, 0.8));
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Art Gallery</div>
        <nav>
            <a href="homepage.php">Home</a>
            <a href="gallerypage.php">Gallery</a>
            <a href="cart.php">Cart</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="contact-container">
        <h1>Contact Us</h1>
        <p><strong>📍 Address:</strong> 522, Eldeco Greeens, Gomti Nagar, Lucknow, Uttar Pradesh</p>
        <p><strong>📞 Phone:</strong> +91 8765136894</p>
        <p><strong>📧 Email:</strong> contact@artgallery.com</p>

        <h2>Send Us a Message</h2>
      
        <form class="contact-form" action="contact_process.php" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <input type="tel" name="phone" placeholder="Your Contact Number" required>
    <input type="file" name="file" accept="image/*, .pdf, .doc, .docx">
    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
    <button type="submit">Send Message</button>
</form>

    </div>
    <div class="footer-bottom">
    <footer>
        &copy; 2025 Art Gallery. All rights reserved.
    </footer>
    </div>
    <script>
        function showAlert(event) {
            event.preventDefault(); 
            alert("Thank you for reaching out! We will get back to you soon.");
            document.querySelector('.contact-form').reset(); 
        }
    </script>
</body>
</html>
