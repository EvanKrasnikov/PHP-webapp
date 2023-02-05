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
    <h3 class="text-primary">Create Account</h3>
    <form action="registration.php" method="post">
        <div class="input-group mb-3">
            <label for="email-field"></label>
            <input type="email" class="form-control" name="email" id="email-field" placeholder="Email">
        </div>
        <div class="input-group mb-3">
            <label for="firstname-field"></label>
            <input type="email" class="form-control" name="firstname" id="firstname-field" placeholder="First name">
        </div>
        <div class="input-group mb-3">
            <label for="lastname-field"></label>
            <input type="email" class="form-control" name="lastname" id="lastname-field" placeholder="Last name">
        </div>
        <div class="input-group mb-3">
            <label for="password-field"></label>
            <input type="password" class="form-control" name="password" id="password-field" placeholder="Password">
        </div>
        <div class="input-group mb-3">
            <label for="password2-field"></label>
            <input type="password" class="form-control" name="password2" id="password2-field" placeholder="Confirm password">
        </div>
        <div class="input-group mb-3">
            <input type="submit" class="form-control btn btn-primary" name="submit" id="submit-button" value="Sign up">
        </div
        <p class="text-center">
            Already have an account?
            <a href="<?php echo LOGIN_PAGE; ?>">Sign in</a>
        </p>
    </form>
</div>

<?php include("app/include/footer.php"); ?>
</body>
</html>

