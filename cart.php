<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Art Gallery</title>
    
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f5f5f5; text-align: center; }
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

.checkout-btn {
    background-color: #28a745; /* Green color */
    color: white;
    font-size: 16px;
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    display: block; /* Centers the button */
    margin: 15px auto; /* Adjust margin for spacing */
    width: auto; /* Keep it compact */
  
}

.checkout-btn:hover {
    background-color: #218838; /* Darker green on hover */
}
.heading {
    margin-top: 100px;
    padding: 40px;
}

        .cart-container { width: 80%; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); }
        .cart-item { display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #ddd; }
        .cart-item img { width: 100px; height: auto; border-radius: 10px; }
        .quantity { display: flex; align-items: center; }
        .quantity button { background: #ff4081; color: white; border: none; padding: 5px; cursor: pointer; margin: 0 5px; }
        .remove-btn { background: red; color: white; border: none; padding: 5px 10px; cursor: pointer; }
    </style>

    
    <script>
        function loadCart() {
            let cartContainer = document.getElementById("cart-items");
            let checkoutButton = document.getElementById("checkout-btn");
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");

            if (cart.length === 0) {
                cartContainer.innerHTML = "<p>Your cart is empty.</p>";
                checkoutButton.style.display = "none"; 
                return;
            }

            let cartHTML = "";
            cart.forEach((item, index) => {
                cartHTML += `
                    <div class="cart-item">
                        <img src="${item.image}" alt="Art">
                        <div><strong>${item.name || "Unnamed Art"}</strong></div> 
                        <div>${item.price}</div>
                        <div class="quantity">
                            <button onclick="updateQuantity(${index}, -1)">-</button>
                            <span id="qty-${index}">${item.quantity || 1}</span>
                            <button onclick="updateQuantity(${index}, 1)">+</button>
                        </div>
                        <button class="remove-btn" onclick="removeItem(${index})">Remove</button>
                    </div>
                `;
            });

            cartContainer.innerHTML = cartHTML;
            checkoutButton.style.display = "block";
        }

        function updateQuantity(index, change) {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");

            cart[index].quantity = (cart[index].quantity || 1) + change;

            if (cart[index].quantity <= 0) {
                removeItem(index);
                return;
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            document.getElementById(`qty-${index}`).textContent = cart[index].quantity;

            updateCartCount();
        }

        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");

            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));

            let cartItems = document.querySelectorAll(".cart-item");
            if (cartItems[index]) {
                cartItems[index].remove();
            }
            loadCart();
            updateCartCount();

            if (cart.length === 0) {
                document.getElementById("cart-items").innerHTML = "<p>Your cart is empty.</p>";
            }
        }

        function proceedToCheckout() {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");

            cart.forEach(item => {
                if (!item.name) item.name = "Unnamed Art";
                if (!item.quantity) item.quantity = 1;
                if (!item.price || isNaN(item.price)) item.price = 0;
            });

            sessionStorage.setItem("cartData", JSON.stringify(cart));
            window.location.href = "checkout.php";
        }

        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");
            let totalCount = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
            let cartCounter = document.getElementById('cart-counter');

            if (totalCount > 0) {
                cartCounter.textContent = totalCount;
                cartCounter.style.display = 'inline-block';
            } else {
                cartCounter.style.display = 'none';
            }
        }

        window.onload = loadCart;
    </script>
</head>
<body>

<header>
    <div class="logo">Art Gallery</div>
    <nav>
        <a href="homepage.php">Home</a>
        <a href="gallerypage.php">Gallery</a>
        <a href="artistpage.php">Artists</a>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Logout</a>
       
    </nav>
</header>

<h1 class="heading">Your Cart</h1>
<div class="cart-container">
    <div id="cart-items"></div>
    <button id="checkout-btn" onclick="proceedToCheckout()" class="checkout-btn" style="display: none;">Next</button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        updateCartCount();
    });
</script>

</body>
</html>
