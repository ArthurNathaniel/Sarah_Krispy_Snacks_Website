<?php
include 'db.php';

// Initialize message variable
$message = '';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM video_swipers WHERE id = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        echo "<script>alert('Deleted successfully'); window.location.href = 'manage_video_swipers.php';</script>";
        exit;
    } else {
        $message = "Error deleting record.";
    }
}

// Fetch all video swipers
$stmt = $conn->prepare("SELECT * FROM video_swipers");
$stmt->execute();
$video_swipers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Video Swipers</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<?php include 'sidebar.php'; ?>

<div class="manage_blog_all">
    <h1>Manage Video Swipers</h1>

    <?php if (!empty($message)): ?>
        <script>alert("<?= htmlspecialchars($message) ?>");</script>
    <?php endif; ?>

    <?php if (empty($video_swipers)): ?>
        <p>No video swipers found.</p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Image</th>
                    <th>Alt Text</th>
                    <th>Video URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($video_swipers as $swiper): ?>
                    <tr>
                        <!-- <td><?= htmlspecialchars($swiper['id']) ?></td> -->
                        <td><img src="<?= htmlspecialchars($swiper['image_url']) ?>" alt="<?= htmlspecialchars($swiper['alt_text']) ?>" width="100"></td>
                        <td><?= htmlspecialchars($swiper['alt_text']) ?></td>
                        <td><a href="<?= htmlspecialchars($swiper['video_url']) ?>" target="_blank">View Video</a></td>
                        <td>
                            <a href="edit_video_swiper.php?id=<?= htmlspecialchars($swiper['id']) ?>">Edit</a>
                            |
                            <a href="manage_video_swipers.php?delete=<?= htmlspecialchars($swiper['id']) ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

 <div class="forms">
 <p><a href="add_video_swiper.php">Add New Video Swiper</a></p>
 </div>
</div>
</body>
</html>
