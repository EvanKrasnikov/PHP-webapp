<?php
include "session.php";
include "path.php";
?>
<script src="/assets/js/script.js"></script>

<header>
    <h1>
        <a class="header-logo" href="<?php echo BASE_URL; ?>">News Portal</a>
    </h1>
    <?php if (isset($_SESSION["email"])): ?>
        <div class="header-login-group">
            <p class="username">
                <?php echo "Hello, " . $_SESSION["first_name"] ?>
            </p>
            <button onclick="load(PAGES.LOGOUT)">
                Logout
            </button>
        </div>
    <?php else: ?>
        <div class="header-login-group">
            <button onclick="load(PAGES.LOGIN);">
                Sign In
            </button>
            <button onclick="load(PAGES.REGISTRATION);">
                Sign Up
            </button>
        </div>
    <?php endif; ?>
</header>