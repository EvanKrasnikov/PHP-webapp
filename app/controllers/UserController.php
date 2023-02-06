<?php
require __DIR__ . "/../include/path.php";
require __DIR__ . "/../include/session.php";
require __DIR__ . "/../services/ValidationService.php";
require __DIR__ . "/../dao/UserDAO.php";


$errors = [];
if (isset($_SESSION["errors"]))
{
    unset($_SESSION["errors"]);
}
$validationService = new ValidationService();
$userDao = new UserDAO();

if (isset($_POST["registration-submit"]))
{
    $email = $validationService->validate($_POST["registration-email"]);
    $firstname = $validationService->validate($_POST["registration-firstname"]);
    $lastname = $validationService->validate($_POST["registration-lastname"]);
    $password = $validationService->validate($_POST["registration-password"]);
    $password2 = $validationService->validate($_POST["registration-password2"]);

    if (empty($email) || empty($firstname) || empty($lastname) || empty($password) || empty($password2))
    {
        $errors[] = "Field can't be empty";
    }
    else
    {
        $user = $userDao->findByEmail($email);
        if ($user !== null)
        {
            $errors[] = "Email is occupied";
        }
        if ($password !== $password2)
        {
            $errors[] = "Passwords doesn't match";
        }
        if (strlen($password) < 8 || strlen($password2) < 8)
        {
            $errors[] = "Password could not be shorter then 8 symbols";
        }
    }

    if (sizeof($errors) > 0)
    {
        $_SESSION["errors"] = $errors;
        header("Location: " . REGISTRATION_PAGE);
    }
    else
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $userDao->save($email, $passwordHash, $firstname, $lastname);

        $_SESSION["email"] = $email;
        $_SESSION["first_name"] = $firstname;
        header("Location: " . INDEX_PAGE);
    }
}

if (isset($_POST["login-submit"]))
{
    $email = $validationService->validate($_POST["login-email"]);
    $password = $validationService->validate($_POST["login-password"]);
    $user = $userDao->findByEmail($email);

    if (empty($email) || empty($password))
    {
        $errors[] = "Field can't be empty";
    }
    else
    {
        if (!password_verify($password, $user->getPasswordHash()))
        {
            $errors[] = "Incorrect email or password";
        }
    }

    if (sizeof($errors) > 0)
    {
        $_SESSION["errors"] = $errors;
        header("Location: " . LOGIN_PAGE);
    }
    else
    {
        $_SESSION["email"] = $user->getEmail();
        $_SESSION["first_name"] = $user->getFirstName();
        header("Location: " . INDEX_PAGE);
    }
}

?>