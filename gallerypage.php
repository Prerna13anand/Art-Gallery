<?php
session_start();

// Initialize cart count if not set
if (!isset($_SESSION['cartCount'])) {
    $_SESSION['cartCount'] = 0;

}
?>
<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Art Gallery</title>
    <style>
       
        body {
    font-family: 'Poppins', sans-serif;
    background: url('https://img.freepik.com/free-vector/gradient-background-vector-spring-colors_53876-117271.jpg?ga=GA1.1.1912997311.1743084949&semt=ais_hybrid') no-repeat center center/cover;
    color: #fff;
    margin: 0;
    padding: 0;
    text-align: center;
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

.cart-counter {
    font-size: 14px;
    background: white;
    color: #ff4081;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: bold;
    margin-left: 10px;
}


.gallery {
    margin-top: 100px;
    padding: 40px;
    color: black;
}

.filters {
    margin-bottom: 20px;
}

.filters button {
    padding: 12px 18px;
    margin: 5px;
    border: none;
    background: rgba(255, 64, 129, 0.8);
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    transition: 0.3s;
}

.filters button:hover {
    background: rgba(255, 64, 129, 1);
    box-shadow: 0 4px 10px rgba(255, 64, 129, 0.5);
}

.art-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    
}

.art-item {
    width: 280px;
    background: rgba(255, 255, 255, 0.1);
    padding: 15px;
    border-radius: 12px;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    text-align: center;
    position: relative;
    transition: 0.3s;
}

.art-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(255, 64, 129, 0.5);
}

.art-item img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    transition: 0.3s;
}

.art-item img:hover {
    filter: brightness(1.1);
}

.art-name {
    font-size: 20px;
    font-weight: bold;
    color: black;
    margin-top: 10px;
}

.price {
    font-size: 18px;
    color: #ff4081;
    margin-top: 5px;
    font-weight: bold;
}

.add-to-cart {
    display: block;
    margin: 15px auto 0;
    padding: 10px;
    background: rgba(255, 64, 129, 0.8);
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    text-align: center;
    width: 85%;
    font-size: 16px;
    font-weight: bold;
    transition: 0.3s;
}

.add-to-cart:hover {
    background: rgba(255, 64, 129, 1);
    box-shadow: 0 4px 10px rgba(255, 64, 129, 0.5);
}

    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let storedCartCount = <?php echo $_SESSION['cartCount']; ?>;
            document.getElementById('cart-counter').textContent = storedCartCount;
        });
    </script>
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let totalCount = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
            let cartCounter = document.getElementById('cart-counter');
            
            if (totalCount > 0) {
                cartCounter.textContent = totalCount;
                cartCounter.style.display = 'inline-block';
            } else {
                cartCounter.style.display = 'none';
            }
        });
    </script>
</head>
<body>
    <header>
        <div class="logo">Art Gallery</div>
        <nav>
            <a href="homepage.php">Home</a>
            <a href="artistpage.php">Artists</a>
            <a href="contact.php">Contact</a>
            <a href="cart.php">Cart <span id="cart-counter" class="cart-counter">0</span></a>
        </nav>
    </header>
    <section class="gallery">
        <h1>Gallery</h1>
        <div class="filters">
            <button onclick="filterArt('all')">All</button>
            <button onclick="filterArt('painting')">Paintings</button>
            <button onclick="filterArt('sculpture')">Sculptures</button>
            <button onclick="filterArt('digital')">Digital Art</button>
        </div>
        <div class="art-grid">
            <?php
            $artworks = [
                ["category" => "painting", "name" => "The Enigmatic Man", "price" => 200, "image" => "https://cdn.pixabay.com/photo/2019/03/02/16/26/man-4030112_1280.jpg"],
                ["category" => "painting", "name" => "Abstract Emotions", "price" => 250, "image" => "https://cdn.pixabay.com/photo/2021/08/18/19/26/background-6556413_1280.jpg"],
                ["category" => "sculpture", "name" => "Guardian Angel", "price" => 300, "image" => "https://cdn.pixabay.com/photo/2016/07/10/13/13/angel-1507747_1280.jpg"],
                ["category" => "sculpture", "name" => "Ethereal Beauty", "price" => 350, "image" => "https://cdn.pixabay.com/photo/2023/01/30/20/13/angel-7756537_1280.jpg"],
                ["category" => "digital", "name" => "Soaring Spirit", "price" => 130, "image" => "https://cdn.pixabay.com/photo/2018/10/08/14/46/bird-3732867_1280.jpg"],
                ["category" => "digital", "name" => "Futuristic Vision", "price" => 140, "image" => "https://cdn.pixabay.com/photo/2024/03/25/18/26/ai-generated-8655276_1280.jpg"],
                ["category" => "digital", "name" => "Mystical Night", "price" => 160, "image" => "https://cdn.pixabay.com/photo/2016/10/15/18/41/halloween-1743242_1280.jpg"],
                ["category" => "digital", "name" => "Wilderness Majesty", "price" => 175, "image" => "https://cdn.pixabay.com/photo/2018/03/30/15/11/deer-3275594_1280.jpg"]
            ];

            foreach ($artworks as $art) {
                echo "<div class='art-item {$art['category']}'>";
                echo "<img src='{$art['image']}' alt='{$art['name']}'>";
                echo "<div class='art-name'>{$art['name']}</div>";
                echo "<div class='price'>{$art['price']}</div>";
                echo "<button class='add-to-cart' onclick='addToCart(this)'>Add to Cart</button>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
    <script>
        function filterArt(type) {
            let items = document.querySelectorAll('.art-item');
            items.forEach(item => {
                item.style.display = (type === 'all' || item.classList.contains(type)) ? 'block' : 'none';
            });
        }

        function addToCart(button) {
            let item = button.closest('.art-item');
            let name = item.querySelector('.art-name').textContent.trim();
            let price = parseFloat(item.querySelector('.price').textContent);
            let image = item.querySelector('img').src;
            
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");
            let existingItem = cart.find(cartItem => cartItem.image === image);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ name, image, price, quantity: 1 });
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartCount();
        }

        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let totalCount = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
            document.getElementById('cart-counter').textContent = totalCount;
        }
    </script>
    <script>
        
    document.addEventListener("DOMContentLoaded", function () {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let totalCount = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
        let cartCounter = document.getElementById('cart-counter');
        
        // Always display the cart counter
        cartCounter.style.display = 'inline-block';  
        cartCounter.textContent = totalCount; // Show count or 0 if empty
    });
</script>

</body>
</html>
