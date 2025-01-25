<div class="sidebar">
    <div class="logo"></div>
    <div class="links">
    <div class="dashed"></div>
    <a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>

    <div class="dashed"></div>
    <a href="add_blog.php"><i class="fas fa-plus-circle"></i> Add Blog</a>
    <div class="dashed"></div>
    <a href="manage_blog.php"><i class="fas fa-edit"></i> Manage Blog</a>
    <div class="dashed"></div>
    <a href="add_shop.php"><i class="fas fa-store"></i> Add Shop</a>
    <div class="dashed"></div>
    <a href="manage_shop.php"><i class="fas fa-cogs"></i> Manage Shop</a>
    <div class="dashed"></div>
    <a href="add_video_swiper.php"><i class="fas fa-plus-circle"></i> Add Endorsement</a>
    <div class="dashed"></div>
    <a href="manage_video_swipers.php"><i class="fas fa-tasks"></i> Manage Endorsement</a>
    <div class="dashed"></div>
    <a href="add_gallery.php"><i class="fas fa-plus-circle"></i> Add Gallery</a>
<div class="dashed"></div>
<a href="manage_gallery.php"><i class="fas fa-cogs"></i> Manage Gallery</a>
<div class="dashed"></div>

</div>


    <a href="logout.php">
        <div class="logout">
            <i class="fas fa-power-off"></i> Logout
        </div>
    </a>
</div>

<div class="toggle_btn">
    <p><i class="fas fa-bars"></i></p>
</div>

<script>
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.querySelector('.toggle_btn');
    const toggleIcon = toggleBtn.querySelector('i');

    // Toggle sidebar visibility
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        toggleBtn.classList.toggle('collapsed');

        if (sidebar.classList.contains('hidden')) {
            toggleIcon.classList.replace('fa-bars', 'fa-xmark');
        } else {
            toggleIcon.classList.replace('fa-xmark', 'fa-bars');
        }
    });

    // Highlight the active link based on the current page
    const currentPage = window.location.pathname.split("/").pop();
    const links = document.querySelectorAll(".links a");

    links.forEach(link => {
        if (link.getAttribute("href") === currentPage) {
            link.classList.add("active");
        }
    });
</script>