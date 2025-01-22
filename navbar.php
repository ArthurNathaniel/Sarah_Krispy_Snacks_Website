<div class="navbar_all">
    <div class="logo"></div>
    <div class="nav_links">
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <div class="dropdown" role="menu" aria-haspopup="true">
            <a href="#" aria-expanded="false">
                Products <span><i class="fa-solid fa-angle-down"></i></span>
            </a>
            <div class="dropdown-content">
            <a href="plantain_ripe.php">Krispy Plantain Chips (Ripe)</a>
                <a href="plantain_unripe.php">Krispy Plantain Chips (Unripe)</a>
                <a href="coated_peanuts.php">Krispy Coated Peanut</a>
            </div>
        </div>
        <a href="where_to_buy.php">Where to Buy</a>
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact Us</a>
    </div>

    <button id="mobile-button" aria-controls="mobile-links" aria-expanded="false">
        <i class="fa-solid fa-bars-staggered"></i>
    </button>
    <div class="mobile_links" id="mobile-links" role="menu" aria-hidden="true">
    <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <div class="dropdown" role="menu" aria-haspopup="true">
            <a href="#" aria-expanded="false">
                Products <span><i class="fa-solid fa-angle-down"></i></span>
            </a>
            <div class="dropdown-content">
                <a href="plantain_ripe.php">Krispy Plantain Chips (Ripe)</a>
                <a href="plantain_unripe.php">Krispy Plantain Chips (Unripe)</a>
                <a href="coated_peanuts.php">Krispy Coated Peanut</a>
            </div>
        </div>
        <a href="where_to_buy.php">Where to Buy</a>
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact Us</a>
    </div>
</div>

<div class="whatsapp_link">
    <a href="https://wa.link/enkdeh">
        <p>Chat Us</p>
        <i class="fa-brands fa-whatsapp"></i>
    </a>
</div>

<!-- JavaScript -->
<script>
 

        // Mobile menu toggle
        const button = document.getElementById('mobile-button');
        const mobileLinks = document.getElementById('mobile-links');

        button.addEventListener('click', () => {
            const isExpanded = mobileLinks.classList.toggle('active');
            button.setAttribute('aria-expanded', isExpanded);
            mobileLinks.setAttribute('aria-hidden', !isExpanded);

            const icon = button.querySelector('i');
            icon.classList.replace(
                isExpanded ? 'fa-bars-staggered' : 'fa-xmark',
                isExpanded ? 'fa-xmark' : 'fa-bars-staggered'
            );
        });

      

</script>

<!-- CSS (Optional: For smoother animations) -->
<style>
    #search-bar {
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }
    #search-bar.active {
        display: block;
        opacity: 1;
    }
    .mobile_links {
        position: fixed;
    top: 100px;
    width: 50%;
    right: 0;
    background-color: #f8f8f8;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
    overflow-y: auto;
    padding: 15px 3%;
    transform: translateX(100%);
    transition: transform 0.8s ease-in-out;
    z-index: 999;
    }
    .mobile_links.active {
        display: block;
    }
</style>