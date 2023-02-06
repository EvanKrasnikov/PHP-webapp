<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>Registration Page</title>
</head>

<body>
<?php include "app/include/header.php"; ?>

<div class="container">
    <h2>Create Account</h2>
    <?php include "app/include/error.php"?>
    <form action="app/controllers/UserController.php" method="post">
        <div class="form-container">
            <div class="input-group">
                <label for="registration-email">Email</label>
                <input type="email" name="registration-email" id="registration-email" placeholder="Email">
            </div>
            <div class="input-group">
                <label for="registration-firstname">First name</label>
                <input type="text" name="registration-firstname" id="registration-firstname" placeholder="First name">
            </div>
            <div class="input-group">
                <label for="registration-lastname">Last name</label>
                <input type="text" name="registration-lastname" id="registration-lastname" placeholder="Last name">
            </div>
            <div class="input-group">
                <label for="registration-password">Password</label>
                <input type="password" name="registration-password" id="registration-password" placeholder="Password">
            </div>
            <div class="input-group">
                <label for="registration-password2">Confirm password</label>
                <input type="password" name="registration-password2" id="registration-password2" placeholder="Confirm password">
            </div>
            <button type="submit" name="registration-submit" id="registration-submit">Sign up</button>
            <div class="input-group">
                Already have an account?
                <button type="button" onclick="load(PAGES.LOGIN);">
                    Sign in
                </button>
            </div>
        </div>
    </form>
</div>

<?php include("app/include/footer.php"); ?>
</body>
</html>

