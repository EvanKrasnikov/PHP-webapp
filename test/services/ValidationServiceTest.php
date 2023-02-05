<?php
include "app/services/ValidationService.php";

$validationService = new ValidationService();

assert(
    $validationService->validate("john doe") === "john doe",
    "Should return unchanged string"
);
?>