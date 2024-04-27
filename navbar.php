<nav class="navbar">
    <div class="navbar-container">
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="Thistle & Quill" class="logo-img"></a>
        </div>
        <div>
            <a href="basket.php" class="navbar-btn">Basket</a>
            <a href="contact.php" class="navbar-btn">Contact</a>
            <?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true): ?>
                <a href="login.php" class="navbar-btn">Sign In</a>
            <?php else: ?>
                <a href="logout.php" class="navbar-btn">Sign Out</a>
            <?php endif; ?>
        </div>
        <form class="search-form" action="index.php" method="get">
            <input type="text" name="search" class="search-input" placeholder="Search...">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </div>
</nav>