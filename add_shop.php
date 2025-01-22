<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $shop_name = $_POST['shop_name'];
    $location = $_POST['location'];
    $contact_number = $_POST['contact_number'];
    $google_map_link = $_POST['google_map_link'];

    // Handle image upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    // Move the uploaded image to the target folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO shops (shop_name, location, contact_number, image, google_map_link) 
                VALUES (:shop_name, :location, :contact_number, :image, :google_map_link)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':shop_name', $shop_name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':contact_number', $contact_number);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':google_map_link', $google_map_link);
        
        if ($stmt->execute()) {
            echo "Shop details added successfully!";
        } else {
            echo "Error adding shop details.";
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shop Details</title>
</head>

<body>
    <h1>Add Shop Details</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="shop_name">Shop Name:</label>
        <input type="text" id="shop_name" name="shop_name" required><br><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br><br>

        <label for="google_map_link">Google Map Link:</label>
        <input type="url" id="google_map_link" name="google_map_link" required><br><br>

        <label for="image">Shop Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <input type="submit" value="Add Shop">
    </form>
</body>

</html>
