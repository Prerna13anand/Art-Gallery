
<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username already exists
    $check = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists!'); window.location.href='register.php';</script>";
    } else {
        // Hash and store the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
        $stmt->execute();
        echo "<script>alert('Registration successful! You can now login.'); window.location.href='login.php';</script>";
    }
}


?>
<!-- Include your HTML form here -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Art Gallery</title>
    
   <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://images.pexels.com/photos/4457896/pexels-photo-4457896.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2') no-repeat center center/cover;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
            animation: fadeIn 1s ease-in-out;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            margin-bottom: 20px;
            color: #ff4081;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.2);
            color: black;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }
        input::placeholder {
            color: rgba(10, 9, 9, 0.7);
        }
        input:focus {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 5px rgba(255, 64, 129, 0.5);
        }
        button {
            width: 100%;
            padding: 12px;
            background: rgba(255, 0, 150, 0.7);
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: rgba(255, 0, 150, 1);
            box-shadow: 0 4px 10px rgba(255, 0, 150, 0.5);
        }
        p {
            margin-top: 15px;
            color: black;
        }
        a {
            color: #ff4081;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>
