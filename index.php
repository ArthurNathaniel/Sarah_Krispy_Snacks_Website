<?php
require 'db.php';
$query = "SELECT * FROM blogs ORDER BY date DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover Sarah Krispy Snacks & Catering Services! We offer the best plantain chips (ripe and unripe), coated peanuts, and catering for all your events. Quality and freshness guaranteed!">
    <meta name="keywords" content="Sarah Krispy Snacks, Catering Services, Plantain Chips, Coated Peanuts, Ripe Plantain Chips, Unripe Plantain Chips, Snacks in Ghana, Quality Snacks, Event Catering">
    <meta name="author" content="Sarah Krispy Snacks & Catering Services">
    <meta name="robots" content="index, follow">
    <title>Home | Sarah Krispy Snacks & Catering Services - Quality Snacks & Catering</title>
    <?php include 'cdn.php' ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <?php include 'navbar.php' ?>
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

    <section>
        <div class="products_all">
            <div class="product_title">
                <h1>OUR <br> PRODUCTS</h1>
            </div>

            <div class="products_grid">

                <div class="product_card">
                    <div class="product_image" style="background-image: url(./images/krispy_plantain_chips_ripe.jpg);"></div>
                    <div class="product_details">
                        <h2>KRISPY PLANTAIN CHIP (RIPE) - 60g </h2>
                        <div class="read_more">
                            <a href="plantain_ripe.php">
                                <button>READ MORE ...</button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="product_card">
                    <div class="product_image" style="background-image: url(./images/krispy_plantain_chips_unripe.jpg);"></div>
                    <div class="product_details">
                        <h2>KRISPY PLANTAIN CHIP (UNRIPE) - 60g </h2>
                        <div class="read_more">
                            <a href="plantain_unripe.php">
                                <button>READ MORE ...</button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="product_card">
                    <div class="product_image" style="background-image: url(./images/krispy_peanut_coated.jpg);"></div>
                    <div class="product_details">
                        <h2>KRISPY PEANUT COATED - 60g </h2>
                        <div class="read_more">
                            <a href="coated_peanuts.php">
                                <button>READ MORE ...</button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="product_card">
                    <div class="product_image" style="background-image: url(./images/krispy_plantain_chips_ripe_400g.jpg);"></div>
                    <div class="product_details">
                        <h2>KRISPY PLANTAIN CHIP (RIPE) - 400g</h2>
                        <div class="read_more">
                            <a href="plantain_ripe.php">
                                <button>READ MORE ...</button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="product_card">
                    <div class="product_image" style="background-image: url(./images/krispy_plantain_chips_unripe_400g.jpg);"></div>
                    <div class="product_details">
                        <h2>KRISPY PLANTAIN CHIP (UNRIPE) - 400g</h2>
                        <div class="read_more">
                            <a href="plantain_unripe.php">
                                <button>READ MORE ...</button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="product_card">
                    <div class="product_image" style="background-image: url(./images/all.jpg);"></div>
                    <div class="product_details">
                        <h2>ALL OUR PRODUCTS</h2>
                        <div class="read_more">
                            <a href="plantain_ripe.php">
                                <button>READ MORE ...</button>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <section>
        <div class="about_all">
            <div class="about_grid">
                <div class="about_swiper">
                    <div class="swiper mySwiper3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="./images/krispy_peanut_coated.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="./images/krispy_plantain_chips_ripe.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="./images/krispy_plantain_chips_ripe_400g.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="./images/krispy_plantain_chips_unripe.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="./images/krispy_plantain_chips_unripe_400g.jpg" />
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="about_text">
                    <h1>About Us – Sarah Krispy Snacks</h1>
                    <div class="ab_text">
                        <p>
                            At Sarah Krispy Snacks, we are passionate about delivering a unique snacking experience that blends
                            tradition with modern tastes. Rooted in the rich heritage of plantain chips, we craft artisanal snacks
                            that celebrate authentic flavors while meeting the highest standards of quality.
                        </p>
                        <p>
                            Our journey began with a vision: to create snacks that not only satisfy cravings but also tell a story of
                            culture, craftsmanship, and care. Each bite of our plantain chips is a tribute to the vibrant traditions
                            and timeless recipes that inspire us.
                        </p>
                        <p>
                            We believe in using only the finest ingredients, ensuring that every bag of Sarah Krispy Snacks reflects
                            our commitment to excellence. From sourcing premium plantains to perfecting the crispy texture and bold
                            flavors, we strive to provide a snack that feels like a connection to something special.
                        </p>
                        <p>
                            Our mission is to bring joy to your everyday moments with snacks that are as authentic as they are
                            delicious. Whether you’re enjoying a quick treat or sharing with loved ones, Sarah Krispy Snacks is
                            here to make every occasion memorable.
                        </p>
                        <p>
                            Join us in celebrating the rich flavors and cultural heritage of plantain chips—because at Sarah Krispy
                            Snacks, we don’t just make snacks; we create a taste worth savoring.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="blog_all">
            <div class="blog_title">
                <h1>Latest Blogs</h1>
            </div>

            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <?php foreach ($blogs as $blog): ?>
                        <div class="swiper-slide">
                            <a href="view_blog.php?blog_id=<?php echo $blog['id']; ?>">
                                <div class="blog-card">
                                    <img src="<?php echo htmlspecialchars($blog['image_path'], ENT_QUOTES); ?>" alt="<?php echo htmlspecialchars($blog['title'], ENT_QUOTES); ?>">
                                    <div class="blog-card-content">
                                        <h3><?php echo htmlspecialchars(substr(strip_tags($blog['title']), 0, 30)) . '...'; ?></h3>
                                        <p><?php echo htmlspecialchars(substr(strip_tags($blog['text_content']), 0, 60)) . '...'; ?></p>
                                        <hr style="color: #000;">
                                        <div class="card_below">
                                            <p><strong>Sarah-Krispy Snacks</strong></p>
                                            <p><strong>Date:</strong> <?php echo htmlspecialchars($blog['date'], ENT_QUOTES); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="paginations">
                    <div class="swiper-pagination"></div>
                </div>
                <div class="arrows">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <section>
    <div class="video_all">
        <div class="video_title">
            <h1>ENDORSEMENT</h1>
        </div>
        <div class="video_grid">
            
        <div class="video_swiper">
                <img src="./images/yaw_tog.webp" alt="Yaw Tog Endorses Sarah Krispy Plantain">
                <button class="video_button"
                    onclick="window.open('https://www.tiktok.com/@sarah.krispy.snacks/photo/7448545058824948997?is_from_webapp=1&sender_device=pc', '_blank')">
                    ▶
                </button>
            </div>


            <div class="video_swiper">
                <img src="./images/kwaku_darlington.jpeg" alt="Kwaku Darlington Endorses Sarah Krispy Plantain">
                <button class="video_button"
                    onclick="window.open('https://www.tiktok.com/@sarah.krispy.snacks/photo/7448545058824948997?is_from_webapp=1&sender_device=pc', '_blank')">
                    ▶
                </button>
            </div>


            <div class="video_swiper">
                <img src="./images/y_pee.jpg" alt="Y Pee Endorses Sarah Krispy Plantain">
                <button class="video_button"
                    onclick="window.open('https://www.tiktok.com/@sarah.krispy.snacks/photo/7448545058824948997?is_from_webapp=1&sender_device=pc', '_blank')">
                    ▶
                </button>
            </div>


            <div class="video_swiper">
                <img src="./images/brother_sammy.jpeg" alt="Brother Sammy Endorses Sarah Krispy Plantain">
                <button class="video_button"
                    onclick="window.open('https://www.tiktok.com/@sarah.krispy.snacks/photo/7448545831520619782?is_from_webapp=1&sender_device=pc')">
                    ▶
                </button>
            </div>

            <div class="video_swiper">
                <img src="./images/vincent.jpeg" alt="Hon Vincent Ekow Assafuah  Endorses Sarah Krispy Plantain">
                <button class="video_button"
                onclick="window.open('https://www.tiktok.com/@sarah.krispy.snacks/photo/7448545831520619782?is_from_webapp=1&sender_device=pc')">
                ▶
                </button>
            </div>

            <div class="video_swiper">
                <img src="./images/ampong.jpg" alt="Great Ampong Endorses Sarah Krispy Plantain">
                <button class="video_button"
                onclick="window.open('https://www.tiktok.com/@sarah.krispy.snacks/photo/7448545831520619782?is_from_webapp=1&sender_device=pc')">
                ▶
                </button>
            </div>

        </div>
    </div>
</section>

<section>
<div class="contact_us_all">
        <div class="contact_title">
            <h1>Get In Touch</h1>
        </div>
        <div class="contact_grid">
        <div class="ct_box">
                <h3>VISIT US</h3>
                <h1><i class="fa-solid fa-location-arrow"></i></h1>
                <p>
                    Kumasi - Ghana
                </p>
            </div>

            <div class="ct_box">
                <h3>CALL US</h3>
                <h1><i class="fa-solid fa-phone"></i></h1>
                <p>
                <a href="tel:+233  538 254 229">+233 (0) 538 254 229</a>
                </p>
            </div>

            <div class="ct_box">
                <h3>EMAIL</h3>
                <h1><i class="fa-solid fa-envelope"></i></h1>
                <p>
                    <a href="mailto:info@sarah-krispy-snacks.com">info@sarah-krispy-snacks.com</a>
                </p>
            </div>

        </div>

        <div class="contact_two_all">
            <div class="map"></div>
        </div>
    </div>
</section>




    <?php include 'footer.php' ?>
    <script src="./js/swiper.js"></script>
</body>

</html>