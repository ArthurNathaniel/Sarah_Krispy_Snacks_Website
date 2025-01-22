<?php
require 'db.php'; // Include database connection

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
    if ($stmt->execute([$delete_id])) {
        echo "<script>alert('Blog deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting blog.');</script>";
    }
}

// Fetch all blogs
$stmt = $conn->prepare("SELECT * FROM blogs ORDER BY date DESC");
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blogs</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<?php include 'sidebar.php'; ?>

<div class="manage_blog_all">
    <h1>Manage Blogs</h1>
    <table class="blogs_table">
        <thead>
            <tr>
            <th>Image</th>
                <th>Title</th>
               
                <th>Content</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog): ?>
                <tr>
                <td>
                        <?php if (!empty($blog['image_path'])): ?>
                            <img src="<?php echo htmlspecialchars($blog['image_path']); ?>" alt="Blog Image" style="width: 100px; height: auto;">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($blog['title']); ?></td>
                  
                    <td><?php echo htmlspecialchars(substr($blog['text_content'], 0, 50)) . '...'; ?></td>
                    <td><?php echo htmlspecialchars($blog['date']); ?></td>
                    <td>
                        <a href="edit_blog.php?id=<?php echo $blog['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="manage_blog.php?delete_id=<?php echo $blog['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
