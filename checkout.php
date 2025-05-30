<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Checkout - Art Gallery</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f5f5f5;
      color: #333;
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

    nav a:hover, nav a.active {
      color: #ffebee;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    }

    .main-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      width: 100%;
      flex-direction: column;
    }

    .checkout-container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      width: 50%;
      max-width: 500px;
      text-align: center;
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    .total {
      font-size: 20px;
      font-weight: bold;
      margin-top: 20px;
      color: #ff4081;
    }

    .payment-method {
      margin-top: 20px;
    }

    select, .payment-info {
      margin-top: 10px;
    }

    .payment-button-container {
      margin-top: 20px;
    }

    .hidden {
      display: none;
    }
    button {
  background-color: #ff4081;
  color: white;
  font-size: 16px;
  padding: 12px 30px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s, transform 0.2s;

  &:hover {
    background-color: #f48fb1;
  }

  &:active {
    background-color: #ec407a;
    transform: scale(0.98);
  }

  &:disabled {
    background-color: #bdbdbd;
    cursor: not-allowed;
  }
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

<div class="main-container">
  <div class="checkout-container">
    <h3>Your Order Summary</h3>
    <div id="cart-summary"></div>
    <div class="total">Total: $<span id="total-amount">0</span></div>

    <!-- Payment Method Dropdown -->
    <div class="payment-method">
      <label for="payment-option">Choose Payment Method:</label>
      <select id="payment-option">
        <option value="">Select Payment Method</option>
        <option value="cod">Cash on Delivery</option>
        <option value="upi">UPI / Razorpay</option>
      </select>
    </div>

    <!-- Payment Info Display -->
    <div id="payment-info" class="payment-info"></div>

    <!-- Payment Confirmation Button -->
    <div id="payment-button-container" class="payment-button-container hidden">
      <button id="payment-button" onclick="handlePayment()">Proceed to Payment</button>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let cartData = JSON.parse(sessionStorage.getItem("cartData") || "[]");
    let cartSummary = document.getElementById("cart-summary");
    let totalAmount = 0;

    if (cartData.length === 0) {
      cartSummary.innerHTML = "<p>Your cart is empty.</p>";
      return;
    }

    let cartHTML = "";
    cartData.forEach((item) => {
      let price = parseFloat(item.price);
      let quantity = parseInt(item.quantity);
      if (isNaN(price) || price <= 0) price = 0;
      if (isNaN(quantity) || quantity <= 0) quantity = 1;

      let itemTotal = price * quantity;
      totalAmount += itemTotal;

      cartHTML += `
        <div class="cart-item">
          <span>${item.name} (x${quantity})</span>
          <span>$${itemTotal.toFixed(2)}</span>
        </div>
      `;
    });

    cartSummary.innerHTML = cartHTML;
    document.getElementById("total-amount").textContent = totalAmount.toFixed(2);

    // Dropdown behavior for payment options
    const paymentOption = document.getElementById("payment-option");
    const paymentInfo = document.getElementById("payment-info");
    const paymentButtonContainer = document.getElementById("payment-button-container");

    paymentOption.addEventListener("change", function () {
      const option = this.value;
      paymentInfo.innerHTML = "";
      paymentButtonContainer.classList.add("hidden");

      if (option === "cod") {
        paymentInfo.innerHTML = "<p><strong>Cash on Delivery:</strong> You will pay when the item is delivered to your address.</p>";
        paymentButtonContainer.classList.remove("hidden");
      } else if (option === "upi") {
        paymentInfo.innerHTML = "<p><strong>UPI:</strong> Please scan the Razorpay QR code or enter your UPI ID at checkout (feature coming soon!).</p>";
        paymentButtonContainer.classList.remove("hidden");
      }
    });
  });

  function handlePayment() {
    // Assuming payment is successful, redirect to success page
    window.location.href = "success.php";
  }
</script>

</body>
</html>
