<?php

include'config.php';

  if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']); // escape special characters
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    if ($password != $confirm_password) { // check if passwords match
      echo '<script type ="text/JavaScript">';  
echo 'alert("Passwords do not match")';  
echo '</script>'; 
    } else {
      $query = "INSERT INTO administration (username, email, role, password) VALUES ('$username', '$email','$role','$password')"; // insert data into database
      
      if (mysqli_query($conn, $query)) {
        echo '<script type ="text/JavaScript">';  
echo 'alert("Registration successful")';  
echo '</script>';  
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
    header("Location: users.php");
    
    mysqli_close($conn); // close database connection
  }
?>