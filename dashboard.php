<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include('header.php');
?>

<div class="container">
    <h2>Welcome to the Dashboard</h2>
    <p><a href="logout.php">Logout</a></p>
</div>

<?php include('footer.php'); ?>
