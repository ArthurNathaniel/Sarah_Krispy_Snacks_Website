<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Sarah Krispy Snacks & Catering Services</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
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

        
    </div>
    </section>




    <?php include 'footer.php' ?>
    <script src="./js/swiper.js"></script>
</body>

</html>