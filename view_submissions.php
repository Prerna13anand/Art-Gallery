<?php
// Connect to MySQL
$host = "localhost";
$user = "root";
$password = "";
$database = "art_gallery";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, phone, message, file FROM contact_submissions ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submissions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #ff4081;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color: #ff4081;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h2>Contact Submissions</h2>

<?php if ($result->num_rows > 0): ?>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Message</th>
        <th>File</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td>
    <?php if ($row['file'] !== "No file uploaded"): ?>
        <!-- The download attribute forces a download rather than opening the file in the browser -->
        <a href="uploads/<?= $row['file'] ?>" download>Download File</a>
    <?php else: ?>
        No file
    <?php endif; ?>
</td>

    </tr>
    <?php endwhile; ?>
</table>
<?php else: ?>
    <p>No submissions yet.</p>
<?php endif;

$conn->close();
?>

</body>
</html>
