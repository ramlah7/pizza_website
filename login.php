<head>
    <title>Pizza Shop</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php

session_start();
include 'db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])){
            $_SESSION['user'] = $user['fullname'];
            header("Location: dashboard.php");
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User not found";
    }
}
?>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>
