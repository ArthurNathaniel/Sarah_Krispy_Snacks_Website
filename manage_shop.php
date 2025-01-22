<?php
include 'db.php';

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM shops WHERE id = :id";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bindParam(':id', $delete_id);

    if ($delete_stmt->execute()) {
       
        echo "<script>alert('Shop deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete shop.');</script>";

    }
}

// Fetch all shops
$sql = "SELECT * FROM shops";
$stmt = $conn->prepare($sql);
$stmt->execute();
$shops = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Shops</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="manage_shops"manage_shops">
        <h1>Manage Shops</h1>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Shop Name</th>
                    <th>Location</th>
                    <th>Contact</th>
                    <th>Google Map</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shops as $shop): ?>
                    <tr>
                        <td><img src="uploads/<?= htmlspecialchars($shop['image']) ?>" alt="Shop Image" width="50"></td>
                        <td><?= htmlspecialchars($shop['shop_name']) ?></td>
                        <td><?= htmlspecialchars($shop['location']) ?></td>
                        <td><?= htmlspecialchars($shop['contact_number']) ?></td>
                        <td><a href="<?= htmlspecialchars($shop['google_map_link']) ?>" target="_blank">View Map</a></td>
                        <td>
                            <a href="edit_shop.php?id=<?= $shop['id'] ?>">Edit</a> |
                            <a href="?delete_id=<?= $shop['id'] ?>" onclick="return confirm('Are you sure you want to delete this shop?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
