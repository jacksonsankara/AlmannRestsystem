<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'almanncoffeehouse');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get email and password from form submission
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username and password match a user in the database
$sql = "SELECT * FROM administration WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // If user exists, fetch the user's role from the database
    $user = $result->fetch_assoc();
    $role = $user['role'];
    
    // Set session variables for username and role
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    // Redirect to the appropriate page based on the user's role
    if ($role === 'admin') {
        header("Location: index.html");
        exit();
    } elseif ($role === 'manager') {
        header("Location: manager/index.html");
        exit();
    } else {
        // Handle other roles or redirect to a generic dashboard
        header("Location: dashboard.php");
        exit();
    }
} else {
    // If user does not exist, display error message
    $message = "Invalid username and password, please try again!";
    echo '<script>alert("' . $message . '"); window.location.href = "login.php";</script>';
}

$conn->close();
?>
