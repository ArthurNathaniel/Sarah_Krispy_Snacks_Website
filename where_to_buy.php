<?php
require 'db.php';

// Fetch all shops from the database
$sql = "SELECT * FROM shops";
$stmt = $conn->prepare($sql);
$stmt->execute();
$shops = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Find out where you can buy Sarah Krispy Snacks & Catering Services' delicious plantain chips, coated peanuts, and event catering services. Visit our shop location, view the map, and contact us for more information.">
<meta name="keywords" content="Where to buy Sarah Krispy Snacks, Plantain Chips, Coated Peanuts, Snacks in Ghana, Event Catering, Shop Location, Contact Information">
<meta name="author" content="Sarah Krispy Snacks & Catering Services">
<meta name="robots" content="index, follow">
<title>Where to Buy | Sarah Krispy Snacks & Catering Services</title>

    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/where.css">
    <style>
        .no-shops {
            text-align: center;
            font-size: 18px;
            color: red;
        }
.shop_details p{
    display: flex;
    gap: 10px;
}

.shop_details a{
    display: flex;
    gap: 10px; 
    color: #000;
}
       .shop_details i{
            color: #cc1827;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <section>
        <div class="swiper_bg">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./images/slide_1.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./images/slide_2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="where_to_buy_all">
   <div class="forms">
    <h1>Where to Buy Sarah Krispy Products</h1>
   </div>
    <div class="forms">
    <input type="text" id="searchBar" placeholder="Search by shop name or location">
    </div>

        <!-- Shop List -->
        <div id="shopList">
            <?php foreach ($shops as $shop): ?>
                <div class="where_box_grid shop-item" data-name="<?php echo strtolower($shop['shop_name']); ?>" data-location="<?php echo strtolower($shop['location']); ?>">
                    <div class="shop_location">
                        <img src="uploads/<?php echo $shop['image']; ?>" alt="<?php echo $shop['shop_name']; ?>">
                    </div>
                    <div class="shop_details">
                        <h1><i class="fas fa-store"></i> <?php echo $shop['shop_name']; ?></h1>
                        <p><i class="fas fa-map-marker-alt"></i> <?php echo $shop['location']; ?></p>
                        <p><i class="fas fa-phone-alt"></i> <?php echo $shop['contact_number']; ?></p>
                        <p>
                            <a href="<?php echo $shop['google_map_link']; ?>" target="_blank"><i class="fas fa-map"></i> View on Google Map</a>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <p id="noShops" class="no-shops" style="display: none;">No shops found for your search query.</p>
    </div>
    <?php include 'footer.php'; ?>
    <script>
        // JavaScript for dynamic search
        document.getElementById('searchBar').addEventListener('input', function () {
            const searchQuery = this.value.toLowerCase();
            const shopItems = document.querySelectorAll('.shop-item');
            let hasVisibleItems = false;

            shopItems.forEach(item => {
                const name = item.getAttribute('data-name');
                const location = item.getAttribute('data-location');

                if (name.includes(searchQuery) || location.includes(searchQuery)) {
                    item.style.display = 'grid';
                    hasVisibleItems = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show or hide "No shops found" message
            document.getElementById('noShops').style.display = hasVisibleItems ? 'none' : 'block';
        });
    </script>
</body>

</html>
