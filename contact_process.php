<?php
session_start(); // Start the session to access $_SESSION variables

// Connect to MySQL (Consider using require 'config.php'; instead)
$host = "localhost";
$user = "root";
$password = "";
$database = "art_gallery";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    // Using die() is okay for simple scripts, but consider more graceful error handling
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // --- Get User ID if logged in ---
    $userId = null; // Default to NULL if user is not logged in
    if (isset($_SESSION["logged_in_user"])) {
        $username = $_SESSION["logged_in_user"];
        // Prepare statement to get user ID based on username
        $stmt_user = $conn->prepare("SELECT id FROM users WHERE username = ?"); // Ensure 'id' is your user table's PK
        if ($stmt_user) {
            $stmt_user->bind_param("s", $username);
            $stmt_user->execute();
            $result_user = $stmt_user->get_result();
            if ($user_row = $result_user->fetch_assoc()) {
                $userId = $user_row['id']; // Assign the fetched user ID
            }
            $stmt_user->close();
        } else {
            // Log error if prepare fails, but don't stop the submission
            error_log("Failed to prepare user ID statement: " . $conn->error);
        }
    }
    // $userId will be NULL if not logged in or if user lookup failed

    // --- File Upload Handling ---
    $fileName = "No file uploaded"; // Default value
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK && !empty($_FILES["file"]["name"])) {
        $allowedExtensions = ["jpg", "jpeg", "png", "gif", "pdf", "doc", "docx"];
        $fileInfo = pathinfo($_FILES["file"]["name"]);
        $fileExt = isset($fileInfo['extension']) ? strtolower($fileInfo['extension']) : '';

        if (in_array($fileExt, $allowedExtensions)) {
            // Sanitize filename (basic example - more robust sanitization recommended)
            $safeBaseName = preg_replace("/[^a-zA-Z0-9._-]/", "_", basename($_FILES["file"]["name"]));
            // Ensure unique filename
            $fileName = time() . "_" . uniqid('', true) . "_" . $safeBaseName;
            $fileTmpName = $_FILES["file"]["tmp_name"];
            $fileDestination = "uploads/" . $fileName;

            // Ensure uploads directory exists
            if (!is_dir("uploads")) {
                if (!mkdir("uploads", 0777, true)) {
                    // Failed to create directory
                    echo "<script>alert('Error: Could not create upload directory.'); window.history.back();</script>";
                    exit;
                }
            }

            // Move the uploaded file
            if (!move_uploaded_file($fileTmpName, $fileDestination)) {
                // Failed to move file
                echo "<script>alert('Error: Failed to upload file.'); window.history.back();</script>";
                exit;
            }
        } else {
            // Invalid file type
            echo "<script>alert('Invalid file type! Allowed types: " . implode(', ', $allowedExtensions) . "'); window.history.back();</script>";
            exit;
        }
    } elseif (isset($_FILES["file"]) && $_FILES["file"]["error"] != UPLOAD_ERR_NO_FILE) {
        // Handle other upload errors
        echo "<script>alert('File upload error: code " . $_FILES["file"]["error"] . "'); window.history.back();</script>";
        exit;
    }
    // If no file was uploaded or there was an error other than NO_FILE, $fileName remains "No file uploaded" or the error message above exits.


    // --- Insert into MySQL database (including userId) ---
    // Updated query to include the userId column
    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, phone, message, userId, file) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        // Prepare failed
        error_log("Prepare failed (insert submission): (" . $conn->errno . ") " . $conn->error);
        echo "<script>alert('Error: Could not prepare submission.'); window.history.back();</script>";
        exit;
    }

    // Updated bind_param: added 'i' for integer userId
    // Note: If userId is NULL, bind_param handles it correctly for nullable integer columns.
    $stmt->bind_param("ssssis", $name, $email, $phone, $message, $userId, $fileName);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you for reaching out!'); window.location.href='contact.php';</script>"; // Redirect back to contact page on success
    } else {
        // Execute failed
        error_log("Execute failed (insert submission): (" . $stmt->errno . ") " . $stmt->error);
        echo "<script>alert('Error: Failed to submit contact form.'); window.history.back();</script>"; // Go back on failure
    }

    $stmt->close(); // Close statement
    $conn->close(); // Close connection
    exit(); // Exit after processing POST request

} else {
    // If not a POST request, potentially display the contact form HTML here
    // or redirect if this script is only for processing.
    // For now, just indicate it wasn't a POST request if accessed directly.
    // echo "This page processes form submissions.";
}

// If the script reaches here without exiting (e.g., not a POST request),
// ensure the connection is closed if it wasn't already.
if ($conn && $conn->ping()) {
    $conn->close();
}

?>


