<head>
    <title>Pizza Shop</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
session_start();
session_destroy();
header("Location: login.php");
?>
