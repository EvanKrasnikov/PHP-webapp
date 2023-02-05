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

<?php
require_once "app/include/path.php";
require_once "app/services/ValidationService.php";
require_once "app/dao/UserDAO.php";

include "app/include/header.php";

$errorMsg = "";

if (isset($_POST["login-submit"]))
{
    $validationService = new ValidationService();
    $email = $validationService->validate($_POST["login-email"]);
    $password = $validationService->validate($_POST["login-password"]);

    if ($email === "" || $password === "")
    {
        $errorMsg = "Incorrect email or password";
    }
    else
    {
        $userDao = new UserDAO();
        $user = $userDao->findByEmail($email);

        if (!password_verify($password, $user->getPasswordHash()))
        {
            $errorMsg = "Incorrect email or password";
        }
        else
        {
            $_SESSION["email"] = $user->getEmail();
            $_SESSION["first_name"] = $user->getFirstName();

            header("Location: " . BASE_URL);
        }
    }
}
?>

<div class="container">
    <h3>Sign in to News Portal</h3>
    <?php if ($errorMsg != ""): ?>
        <div class="form-warning">;
            <?php echo $errorMsg; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">
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
                <button onclick="load(PAGES.REGISTRATION)">
                    Create an account
                </button>
            </div>
        </div>
    </form>
</div>

<?php include "app/include/footer.php"; ?>
</body>
</html>

