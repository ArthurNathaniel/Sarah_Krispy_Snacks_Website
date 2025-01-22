<?php
// Start the session to access session variables
session_start();

// Assuming the admin's id is stored in the session after login
// For example: $_SESSION['admin_id'] = 1;
if (!isset($_SESSION['admin_id'])) {
    // Redirect to login page if admin is not logged in
    header("Location: login.php");
    exit();
}

// Database connection
include 'db.php';

// Get the admin's ID from the session
$adminId = $_SESSION['admin_id'];

// Query the database to get the admin's username
$sql = "SELECT username FROM admins WHERE id = :adminId LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':adminId', $adminId);
$stmt->execute();

$admin = $stmt->fetch(PDO::FETCH_ASSOC);
$adminUsername = $admin['username'] ?? 'Admin'; // Default to 'Admin' if not found

// Get the current hour and date
$currentHour = date("H");
$currentDate = date("l, F j, Y");  // Day, Month, Date, Year
$currentTime = date("h:i A");  // Hour:Minute AM/PM

// Determine the greeting
if ($currentHour < 12) {
    $greeting = "Good Morning";
} elseif ($currentHour < 18) {
    $greeting = "Good Afternoon";
} else {
    $greeting = "Good Evening";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<style>
    .dashboard{
        background-color: #fff;
        margin: 0 10%;
        margin-top: 50px;
        padding: 0 5%;
        padding-block: 35px;
    }
</style>
    <div class="dashboard">
        <h1><?= $greeting ?>, <?= htmlspecialchars($adminUsername) ?>!</h1>
        <p>Today is <?= $currentDate ?>, and the time is <?= $currentTime ?>.</p>
    </div>

</body>
</html>
