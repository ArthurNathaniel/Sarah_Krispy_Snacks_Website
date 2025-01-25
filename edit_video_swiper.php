<?php
include 'db.php';

// Initialize a message variable for JavaScript alerts
$message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch current data
    $stmt = $conn->prepare("SELECT * FROM video_swipers WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $swiper = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$swiper) {
        $message = "Video swiper not found.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $alt_text = $_POST['alt_text'];
    $video_url = $_POST['video_url'];

    // Handle file upload
    $image_url = $swiper['image_url']; // Default to the existing image
    if (!empty($_FILES['image_file']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image_file']['name']);
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $target_file)) {
            $image_url = $target_file;
        } else {
            $message = "Error uploading file.";
        }
    }

    // Update data
    $stmt = $conn->prepare("UPDATE video_swipers SET image_url = :image_url, alt_text = :alt_text, video_url = :video_url WHERE id = :id");
    $stmt->bindParam(':image_url', $image_url);
    $stmt->bindParam(':alt_text', $alt_text);
    $stmt->bindParam(':video_url', $video_url);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $message = "Video swiper updated successfully!";
        echo "<script>alert('$message'); window.location.href = 'manage_video_swipers.php';</script>";
        exit;
    } else {
        $message = "Error updating record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video Swiper</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<?php include 'sidebar.php'; ?>

<div class="manage_blog_all">
    <h1>Edit Video Swiper</h1>
    <?php if ($message): ?>
        <script>alert("<?= htmlspecialchars($message) ?>");</script>
    <?php endif; ?>
    <form method="POST" action="" enctype="multipart/form-data">
       <div class="forms">
       <input type="hidden" name="id" value="<?= htmlspecialchars($swiper['id']) ?>">

       </div>
       <div class="forms">
       <label for="image_file">Image File:</label>
        <input type="file" id="image_file" name="image_file">
        <p>Current Image:</p>
        <img src="<?= htmlspecialchars($swiper['image_url']) ?>" alt="<?= htmlspecialchars($swiper['alt_text']) ?>" width="100">

       </div>
    <div class="forms">
    <label for="alt_text">Alt Text:</label>
        <input type="text" id="alt_text" name="alt_text" value="<?= htmlspecialchars($swiper['alt_text']) ?>" required>

    </div>
      <div class="forms">
      <label for="video_url">Video URL:</label><br>
        <input type="text" id="video_url" name="video_url" value="<?= htmlspecialchars($swiper['video_url']) ?>" required>

      </div>
       <div class="forms">
       <button type="submit">Update Video Swiper</button>
       </div>
    </form>
</div>
</body>
</html>
