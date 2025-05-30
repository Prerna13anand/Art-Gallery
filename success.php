<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order Success - Art Gallery</title>
  <style>
    body {
      text-align: center;
      font-family: Arial;
      padding: 100px;
      background: #e8f5e9;
    }
    h1 {
      color: #28a745;
    }
    a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: #28a745;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    a:hover {
      background: #218838;
    }
  </style>
</head>
<body>
  <h1>Thank you for your purchase!</h1>
  <p>Your order has been successfully placed.</p>
  <a href="homepage.php">Back to Home</a>
</body>
</html>
