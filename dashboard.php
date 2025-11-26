<head>
    <title>Pizza Shop</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['user']; ?> 🍕</h2>

<form>
<label>Select Pizza:</label>
<select>
<?php
$result = mysqli_query($conn, "SELECT * FROM menu");
while($row = mysqli_fetch_assoc($result)){
    echo "<option>".$row['pizza_name']." - ".$row['price']."</option>";
}
?>
</select>
</form>

<a href="logout.php">Logout</a>
