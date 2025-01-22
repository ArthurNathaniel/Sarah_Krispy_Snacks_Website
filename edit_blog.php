<?php
require 'db.php'; // Include database connection

// Fetch blog details for editing
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->execute([$blog_id]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        echo "<script>alert('Blog not found!'); window.location.href = 'manage_blog.php';</script>";
        exit;
    }
}

// Handle form submission for updates
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $text_content = $_POST['text_content'];
    $date = $_POST['date'];
    $image_path = $blog['image_path']; // Retain existing image by default

    // Handle image upload if a new image is provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/';
        $new_image_path = $upload_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $new_image_path)) {
            $image_path = $new_image_path; // Update the image path
        }
    }

    // Update the blog in the database
    $stmt = $conn->prepare("UPDATE blogs SET title = ?, image_path = ?, text_content = ?, date = ? WHERE id = ?");
    if ($stmt->execute([$title, $image_path, $text_content, $date, $blog_id])) {
        echo "<script>alert('Blog updated successfully!'); window.location.href = 'manage_blog.php';</script>";
    } else {
        echo "<script>alert('Error updating blog.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<?php include 'sidebar.php'; ?>

<div class="edit_blog_all">
    <h1>Edit Blog</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="forms">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($blog['title']); ?>" required>
        </div>
        <div class="forms">
            <label for="image">Image:</label>
            <?php if (!empty($blog['image_path'])): ?>
                <img src="<?php echo htmlspecialchars($blog['image_path']); ?>" alt="Blog Image" style="width: 100px; height: auto;">
            <?php endif; ?>
            <input type="file" id="image" name="image">
        </div>
        <div class="forms">
            <label for="text_content">Content:</label>
            <div id="quill-editor" class="quill-editor"><?php echo $blog['text_content']; ?></div>
            <input type="hidden" name="text_content" id="text_content">
        </div>
        <div class="forms">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($blog['date']); ?>" required>
        </div>
        <div class="forms">
            <button type="submit">Update Blog</button>
        </div>
    </form>
</div>

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    // Initialize Quill editor with existing content
    var quill = new Quill('#quill-editor', {
        theme: 'snow'
    });

    // Set existing content to Quill editor
    quill.root.innerHTML = `<?php echo $blog['text_content']; ?>`;

    // Update hidden input with Quill's content on form submission
    document.querySelector('form').onsubmit = function () {
        document.getElementById('text_content').value = quill.root.innerHTML;
    };
</script>
</body>
</html>
