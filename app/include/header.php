<?php include "app/include/session.php"; ?>

<header>
    <div class="shadow">
        <h1>
            <a class="nav-left" href="<?php echo BASE_URL; ?>">
                News Portal
            </a>
        </h1>
        <?php if (isset($_SESSION["email"])): ?>
            <div class="login-group">
                <p class="username">
                    <?php echo "Hello, " . $_SESSION["first_name"] ?>
                </p>
                <a href="<?php echo LOGOUT_PAGE; ?>">
                    <button class="nav-right">Logout</button>
                </a>
            </div>
        <?php else: ?>
            <div class="login-group">
                <a href="<?php echo LOGIN_PAGE; ?>">
                    <button class="nav-right">Sign In</button>
                </a>
                <a href="<?php echo REGISTRATION_PAGE; ?>">
                    <button class="nav-right">Sign Up</button>
                </a>
            </div>
        <?php endif; ?>
    </div>
    <div class="line" />
</header>