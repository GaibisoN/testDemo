<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

include('header.php');
?>

<div class="container">
    <h2>Welcome to the website</h2>
    <p><a href="login.php">Login</a> or <a href="register.php">Register</a></p>
</div>

<?php include('footer.php'); ?>
