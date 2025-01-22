<?php
include 'db.php';

// Get the shop ID from the query string
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid shop ID.");
}
$shop_id = $_GET['id'];

// Fetch shop details
$sql = "SELECT * FROM shops WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $shop_id);
$stmt->execute();
$shop = $stmt->fetch();

if (!$shop) {
    die("Shop not found.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shop_name = $_POST['shop_name'];
    $location = $_POST['location'];
    $contact_number = $_POST['contact_number'];
    $google_map_link = $_POST['google_map_link'];

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image_sql = ", image = :image";
        } else {
            echo "Failed to upload new image.";
            $image_sql = "";
        }
    } else {
        $image_sql = "";
    }

    // Update shop details
    $update_sql = "UPDATE shops 
                   SET shop_name = :shop_name, location = :location, contact_number = :contact_number, google_map_link = :google_map_link $image_sql 
                   WHERE id = :id";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bindParam(':shop_name', $shop_name);
    $update_stmt->bindParam(':location', $location);
    $update_stmt->bindParam(':contact_number', $contact_number);
    $update_stmt->bindParam(':google_map_link', $google_map_link);
    $update_stmt->bindParam(':id', $shop_id);

    if (!empty($image_sql)) {
        $update_stmt->bindParam(':image', $image);
    }

    if ($update_stmt->execute()) {
        echo "Shop details updated successfully!";
        header("Location: manage_shop.php");
        exit;
    } else {
        echo "Error updating shop details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shop Details</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="manage_shops">
        <h1>Edit Shop Details</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="forms">
                <label for="shop_name">Shop Name:</label>
                <input type="text" id="shop_name" name="shop_name" value="<?= htmlspecialchars($shop['shop_name']) ?>" required>
            </div>

            <div class="forms">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?= htmlspecialchars($shop['location']) ?>" required>
            </div>

            <div class="forms">
                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" value="<?= htmlspecialchars($shop['contact_number']) ?>" required>
            </div>

            <div class="forms">
                <label for="google_map_link">Google Map Link:</label>
                <input type="url" id="google_map_link" name="google_map_link" value="<?= htmlspecialchars($shop['google_map_link']) ?>" required>
            </div>

            <div class="forms">
                <label for="image">Shop Image:</label>
                <input type="file" id="image" name="image" accept="image/*">
                <p>Current Image: <img src="uploads/<?= htmlspecialchars($shop['image']) ?>" alt="Shop Image" width="100"></p>
            </div>

            <div class="forms">
                <button type="submit">Update Shop</button>
            </div>
        </form>
    </div>
</body>

</html>
