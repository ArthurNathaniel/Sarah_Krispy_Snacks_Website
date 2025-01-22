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
            // echo "Shop details added successfully!";
            echo "<script>alert('Shop details added successfully!');</script>";
        } else {
            // echo "Error adding shop details.";
            echo "<script>alert('Error adding shop details.');</script>";
        }
    } else {
        // echo "Failed to upload image.";
        echo "<script>alert('Failed to upload image.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shop Details</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>

<body>
<?php include 'sidebar.php'; ?>
    <div class="add_blog_all">
        <div class="forms">
            <h1>Add Shop Details</h1>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="forms">
                <label for="shop_name">Shop Name:</label>
                <input type="text" id="shop_name" name="shop_name" required>
            </div>

            <div class="forms">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="forms">

                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" required>
            </div>

            <div class="forms">
                <label for="google_map_link">Google Map Link:</label>
                <input type="url" id="google_map_link" name="google_map_link" required>
            </div>

            <div class="forms">
                <label for="image">Shop Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <div class="forms">
                <button type="submit">Add Shop</button>
            </div>
        </form>
    </div>
</body>

</html>