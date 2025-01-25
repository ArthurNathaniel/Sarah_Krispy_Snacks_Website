<?php
require 'db.php';

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
<meta name="description" content="Explore the delicious variety of Sarah Krispy Snacks through our gallery! Browse through images of our plantain chips, coated peanuts, and catering services. See the quality and freshness of our snacks in every photo.">
<meta name="keywords" content="Sarah Krispy Snacks, Catering Gallery, Plantain Chips Gallery, Coated Peanuts Gallery, Snacks Images, Event Catering, Ghana Snacks Gallery, Food Gallery, Snack Photography">
<meta name="author" content="Sarah Krispy Snacks & Catering Services">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Gallery | Sarah Krispy Snacks & Catering Services">
<meta property="og:description" content="Browse through our gallery and discover the wide range of snacks and catering services offered by Sarah Krispy Snacks. See the best plantain chips and coated peanuts in action!">
<meta property="og:url" content="https://sarahkrispysnacks.com/uploads/">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Gallery | Sarah Krispy Snacks & Catering Services">
<meta name="twitter:description" content="Explore our gallery of mouth-watering snacks including plantain chips and coated peanuts, alongside event catering photos.">

    <title>Photo Gallery | Sarah Krispy Snacks & Catering Services</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/gallery.css">

</head>
<body>
    <?php include 'navbar.php'; ?>
    <section>
        <div class="swiper_bg">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./images/slide_1.jpg" alt="Krispy Coated Peanut - Crunchy and Delicious">
                    </div>
                    <div class="swiper-slide">
                        <img src="./images/slide_2.jpg" alt="Sarah Krispy Snacks - Tasty Coated Peanuts">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="forms_title">
            <h1>PHOTO GALLERY</h1>
        </div>
        <div class="gallery_all">

                <?php foreach ($gallery_images as $image): ?>
                    <div class="gallery">
                    <a href="<?php echo $image['image_url']; ?>" data-fancybox="gallery">
                        <img src="<?php echo $image['image_url']; ?>" alt="<?php echo htmlspecialchars($image['alt_text']); ?>">
                    </a>
                    </div>
                <?php endforeach; ?>
          
        </div>
    </section>

    <?php include 'footer.php' ?>
    <script src="./js/swiper.js"></script>
</body>
</html>
