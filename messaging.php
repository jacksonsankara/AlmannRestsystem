<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'phpmailer/src/Exception.php';
    require_once 'phpmailer/src/PHPMailer.php';
    require_once 'phpmailer/src/SMTP.php';

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];


        $mail = new PHPMailer(true);
        
        // Rest of your code..
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username= 'jacksonsankara@gmail.com';
        $mail->Password = 'yrjofevmvyrjawmq';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($email);

        //receiver email1

        $email1 = "sanson.group2023@gmail.com";


        $mail->addAddress($email1);

        $mail->isHTML(true);

        $html = "
  <html>
    <head>
      <style>
        body {
          font-family: Arial, sans-serif;
          font-size: 16px;
          line-height: 1.6;
          color: #333;
        }
        h1 {
          font-size: 24px;
          font-weight: bold;
          margin-bottom: 20px;
        }
        .container {
          max-width: 600px;
          margin: 0 auto;
          padding: 20px;
          background-color: #f7f7f7;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
          background-color: #28a745;
          color: white;
          text-align: center;
          padding: 10px;
          border-radius: 5px 5px 0 0;
        }
        .header h1 {
          margin: 0;
        }
        .content {
          padding: 20px;
        }
        .content p {
          margin-bottom: 20px;
        }
        .label {
          font-weight: bold;
        }
        .footer {
          text-align: center;
          margin-top: 20px;
          color: #666;
        }
      </style>
    </head>
    <body>
      <div class='container'>
        <div class='header'>
          <h1>New Message from Al Mann and Ran Coffee House</h1>
        </div>
        <div class='content'>
          <p><span class='label'>Name:</span> {$name}</p>
          <p><span class='label'>Email:</span> {$email}</p>
           <p><span class='label'>subject:</span> {$subject}</p>
          <p><span class='label'>Message:</span> {$message}</p>
        </div>
        <div class='footer'>
          <p>&copy; " .date("Y-m-d") . "  Rwanda | All Rights Reserved</p>
        </div>
      </div>
    </body>
  </html>
";


        $mail->Subject = 'New Message from '.$name;
        $mail->Body = $html;

        if ($mail->send()) {
            // Email sent successfully
            echo "<script>alert('Reservation sent successfully. We will contact you soon.')</script>";
        } else {
            // Email sending failed
            echo "<script>alert('Failed to send reservation. Please try again later.')</script>";
        }

        header("Location: contact.html?#contact_form");
    }
?>
<?php

include'config.php';

  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']); // escape special characters
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
   
    
    /*if ($password != $confirm_password) { // check if passwords match
      echo '<script type ="text/JavaScript">';  
echo 'alert("Passwords do not match")';  
echo '</script>'; */
    } else {
      $query = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email','$subject','$message')"; // insert data into database
      
      if (mysqli_query($conn, $query)) {
        echo '<script type ="text/JavaScript">';  
echo 'alert("Registration successful")';  
echo '</script>';  
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
    header("Location: contact.html?#contact_form");
    
    mysqli_close($conn); // close database connection.0
?>