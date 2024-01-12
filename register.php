<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

include('header.php');
include('functions.php');
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle registration form submission
    // Validate and sanitize input fields
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $file = $_FILES['file'];

    // Specify the directory where uploaded files will be stored
    $uploadDir = 'uploads/';

    // Upload file and get the filename
    $uploadedFileName = uploadFile($file, $uploadDir);

    // Insert user data into the database
    $query = "INSERT INTO users (username, password, profile_image) VALUES ('$username', '$password', '$uploadedFileName')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: login.php");
        exit();
    } else {
        echo "Registration failed!";
    }
}

?>

<div class="container">
    <h2>Register</h2>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <!-- Add your registration form fields here -->
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="file">Profile Image:</label>
        <input type="file" name="file" accept="image/*" required>

        <button type="submit">Register</button>
    </form>
</div>

<?php include('footer.php'); ?>
