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

<?php
include "app/include/path.php";
include "app/services/ValidationService.php";
include "app/dao/UserDAO.php";

include "app/include/header.php";

$errorMsg = "";

if (isset($_POST["submit"]))
{
    $validationService = new ValidationService();
    $email = $validationService->validate($_POST["email"]);
    $firstname = $validationService->validate($_POST["firstname"]);
    $lastname = $validationService->validate($_POST["lastname"]);
    $password = $validationService->validate($_POST["password"]);
    $password2 = $validationService->validate($_POST["password2"]);

    if ($email === "" || $firstname === "" || $password === "")
    {
        $errorMsg = "Incorrect email or password";
    }
    else
    {
        $userDao = new UserDAO();
        $user = $userDao->findByEmail($email);

        if (password_verify($password, $user->getPasswordHash()))
        {
            $errorMsg = "Incorrect email or password";
        }
        else
        {
            session_start();
            $_SESSION["email"] = $user->getEmail();
            $_SESSION["first_name"] = $user->getFirstName();
            header("Location: " . BASE_URL);
        }
    }
}
?>

<div class="container">
    <h2>Create Account</h2>
    <?php if ($errorMsg != ""): ?>
        <div class="form-warning">;
            <?php echo $errorMsg; ?>
        </div>
    <?php endif; ?>

    <form action="registration.php" method="post">
        <div class="form-container">
            <div class="input-group">
                <label for="registration-email">Email</label>
                <input type="email" name="registration-email" id="registration-email" placeholder="Email">
            </div>
            <div class="input-group">
                <label for="registration-firstname">First name</label>
                <input type="email" name="registration-firstname" id="registration-firstname" placeholder="First name">
            </div>
            <div class="input-group">
                <label for="registration-lastname">Last name</label>
                <input type="email" name="registration-lastname" id="registration-lastname" placeholder="Last name">
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
                <button onclick="load(PAGES.LOGIN)">
                    Sign in
                </button>
            </div>
        </div>
    </form>
</div>

<?php include("app/include/footer.php"); ?>
</body>
</html>

