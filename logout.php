<?php
include "app/include/path.php";

session_start();
session_destroy();
header("Location:" . INDEX_PAGE);
?>
