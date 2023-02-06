<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>Login Page</title>
</head>

<body>
<?php include "app/include/header.php"; ?>

<div class="container">
    <h3>Sign in to News Portal</h3>
    <?php include "app/include/error.php"; ?>
    <form action="app/controllers/UserController.php" method="post">
        <div class="form-container">
            <div class="input-group">
                <label for="login-email">Email</label>
                <input type="email" name="login-email" id="login-email" placeholder="Email">
            </div>
            <div class="input-group">
                <label for="login-password">Password</label>
                <input type="password" name="login-password" id="login-password" placeholder="Password">
            </div>
            <button type="submit" name="login-submit" id="login-submit">Sign in</button>
            <div class="input-group">
                New to News Portal?
                <button type="button" onclick="load(PAGES.REGISTRATION);">
                    Create an account
                </button>
            </div>
        </div>
    </form>
</div>

<?php include "app/include/footer.php"; ?>
</body>
</html>

