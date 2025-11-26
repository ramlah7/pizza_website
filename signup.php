<head>
    <title>Pizza Shop</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
include 'db.php';

if(isset($_POST['signup'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/', $password)){
        die("Password must contain 8 chars, 1 capital, 1 small & 1 special char");
    }

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        die("User already exists");
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (fullname,email,password) 
                         VALUES ('$name','$email','$hashed')");

    echo "Signup successful!";
}
?>

<form method="POST">
<input type="text" name="fullname" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="signup">Signup</button>
</form>
