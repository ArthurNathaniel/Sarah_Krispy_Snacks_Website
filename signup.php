<?php
require 'db.php';

$message = "";
$redirect = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        // Check for duplicate email and username using PDO
        $checkStmt = $conn->prepare("SELECT email, username FROM admins WHERE email = :email OR username = :username");
        $checkStmt->bindParam(':email', $email);
        $checkStmt->bindParam(':username', $username);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            $message = "Error: Email or Username already exists.";
        } else {
            // Insert new admin if no duplicates found
            $stmt = $conn->prepare("INSERT INTO admins (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                $message = "Admin registered successfully. Redirecting to login page...";
                $redirect = true; // Set flag for redirection
            } else {
                $message = "Error: Unable to register admin.";
            }
        }
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/signup.css">
    <script>
        function showAlertAndRedirect(message, redirect) {
            if (message) {
                alert(message);
                if (redirect) {
                    window.location.href = 'login.php'; // Redirect to login page
                }
            }
        }
    </script>
</head>

<body onload="showAlertAndRedirect('<?php echo htmlspecialchars($message, ENT_QUOTES); ?>', <?php echo $redirect ? 'true' : 'false'; ?>)">
    <div class="signup_all">
        <div class="signup_box">
            <div class="signup_title">
                <div class="logo"></div>
                <h1>Signup</h1>
            </div>
            <form method="POST">
                <div class="forms">
                    <label for="username">Username:</label>
                    <input type="text" id="username" placeholder="Enter your username" name="username" required>
                </div>
                <div class="forms">
                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Enter your email address" name="email" required>
                </div>
                <div class="forms">
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Enter your password" name="password" required>
                </div>
                <div class="forms">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
