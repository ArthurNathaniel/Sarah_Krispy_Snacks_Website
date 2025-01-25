<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alt_text = $_POST['alt_text'];
    $video_url = $_POST['video_url'];

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
        echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
        $upload_ok = 0;
    }

    // Move the uploaded file to the target directory
    if ($upload_ok && move_uploaded_file($_FILES['image_file']['tmp_name'], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO video_swipers (image_url, alt_text, video_url) VALUES (:image_url, :alt_text, :video_url)");
        $stmt->bindParam(':image_url', $target_file); // Save the file path
        $stmt->bindParam(':alt_text', $alt_text);
        $stmt->bindParam(':video_url', $video_url);

        if ($stmt->execute()) {
            echo "<script>alert('Video swiper added successfully!'); window.location.href = 'manage_video_swipers.php';</script>";
        } else {
            echo "<script>alert('Error adding video swiper.');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Video Swiper</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>

<body>
<?php include 'sidebar.php'; ?>

<div class="add_blog_all">
    <div class="forms">
        <h1>Add Endorsement</h1>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="forms">
            <label for="image_file">Image File:</label>
            <input type="file" id="image_file" name="image_file" accept="image/*" required>
        </div>

        <div class="forms">
            <label for="alt_text">Alt Text:</label>
            <input type="text" id="alt_text" name="alt_text" required>
        </div>

        <div class="forms">
            <label for="video_url">Video URL:</label>
            <input type="text" id="video_url" name="video_url" required>
        </div>

        <div class="forms">
            <button type="submit">Add Video Swiper</button>
        </div>
    </form>
</div>
</body>

</html>
