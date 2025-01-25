<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alt_text = $_POST['alt_text'];

    // Handle image upload
    $target_dir = "uploads/"; // Directory to store uploaded images
    $target_file = $target_dir . basename($_FILES['image_file']['name']);
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image type
    $check = getimagesize($_FILES['image_file']['tmp_name']);
    if ($check === false) {
        echo "<script>alert('File is not an image.');</script>";
        $upload_ok = 0;
    }

    // Allow only certain file formats
    if (!in_array($image_file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "<script>alert('Only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        $upload_ok = 0;
    }

    // Move the uploaded file to the target directory
    if ($upload_ok && move_uploaded_file($_FILES['image_file']['tmp_name'], $target_file)) {
        // Insert the image path and alt text into the database
        $stmt = $conn->prepare("INSERT INTO gallery (image_url, alt_text) VALUES (:image_url, :alt_text)");
        $stmt->bindParam(':image_url', $target_file);
        $stmt->bindParam(':alt_text', $alt_text);

        if ($stmt->execute()) {
            echo "<script>alert('Image added successfully!');</script>";
        } else {
            echo "<script>alert('Error adding image.');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }
}

// Fetch all images from the database for display
$stmt = $conn->prepare("SELECT * FROM gallery");
$stmt->execute();
$gallery_images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image to Gallery</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="add_blog_all">
<div class="forms">
    <h1>Add Photo Gallery</h1>
</div>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="forms">
            <label for="image_file">Upload Image:</label>
            <input type="file" id="image_file" name="image_file" accept="image/*" required>
        </div>
        <div class="forms">
            <label for="alt_text">Alt Text:</label>
            <input type="text" id="alt_text" name="alt_text" required>
        </div>
        <div class="forms">
            <button type="submit">Add Image</button>
        </div>
    </form>

</div>
</body>
</html>
