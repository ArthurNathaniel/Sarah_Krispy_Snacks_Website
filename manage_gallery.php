<?php
require 'db.php';

// Fetch all images from the database for display
$stmt = $conn->prepare("SELECT * FROM gallery");
$stmt->execute();
$gallery_images = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare("SELECT image_url FROM gallery WHERE id = :id");
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($image) {
        // Delete the image file
        unlink($image['image_url']);
        // Delete the record from the database
        $stmt = $conn->prepare("DELETE FROM gallery WHERE id = :id");
        $stmt->bindParam(':id', $delete_id);
        if ($stmt->execute()) {
            echo "<script>alert('Image deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error deleting image.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
    <style>
        
    </style>
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="forms">

 </div>
 <div class="add_blog_all">

 <h1>Manage Gallery</h1>
    <!-- Gallery Table -->
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
        <thead>
            <tr>
                <th>Image</th>
                <th>Alt Text</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gallery_images as $image): ?>
                <tr>
                    <td><img src="<?php echo $image['image_url']; ?>" alt="<?php echo htmlspecialchars($image['alt_text']); ?>" width="150"></td>
                    <td><?php echo htmlspecialchars($image['alt_text']); ?></td>
                    <td>
                        <!-- Delete Button -->
                        <a href="?delete_id=<?php echo $image['id']; ?>" onclick="return confirm('Are you sure you want to delete this image?');">
                            <button>Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table th {
        background-color: #f2f2f2;
    }

    table td img {
        width: 100px;
        height: auto;
    }

    .gallery-actions button {
        padding: 5px 10px;
        background-color: red;
        color: white;
        border: none;
        cursor: pointer;
    }

    .gallery-actions button:hover {
        background-color: darkred;
    }
</style>
