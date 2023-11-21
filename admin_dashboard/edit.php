<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style type="text/css">
   .signup-form {
  width: 50%;
  margin-top: 70px;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
  box-shadow: 8px 15px 10px 15px rgb(255, 160, 122);
}

h2 {
  text-align: center;
}

input[type=text], input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

button[type=submit]:hover {
  background-color: #45a049;
}

 </style>
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/alman_logo.png" style="margin-top: -10px;" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php"><button class="btn btn-primary" style="margin-top: 12px;">Logout</button></a>
                   

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

 <li >
                        <a href="index.html" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                   

                    <li>
                        <a href="ui.html"><i class="fa fa-table "></i>UI Elements  <span class="badge">Included</span></a>
                    </li>
                    <li class="active-link">
                        <a href="blank.html"><i class="fa fa-edit "></i>Blank Page  <span class="badge">Included</span></a>
                    </li>



                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h3>Update USER</h3>
  <center>
  <?php 

include'config.php';
$User_ID=$_GET['user_id'];
 $select=$conn->query("SELECT * FROM administration where user_id='$User_ID'");
 $row=mysqli_fetch_assoc($select);
?>


<div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4 class="mb-0">Update User</h4>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="<?php echo $row['username'];?>" name="username" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="<?php echo $row['email'];?>" name="email" required>
              </div>
              <div class="form-group">
                <label for="Role">Role</label>
                <input type="text" class="form-control" value="<?php echo $row['role'];?>" name="role" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" value="<?php echo $row['password'];?>" name="password" required>
              </div>
              
              <button type="submit" name="Update" class="btn btn-primary mr-2">Update</button>
              <a href="users.php" class="btn btn-secondary">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php 
 include'config.php';
 ?>

 <?php 

 $User_ID=$_GET['user_id'];
 $select=$conn->query("SELECT * FROM administration where user_id='$User_ID'");
 $row=mysqli_fetch_assoc($select);
?>

<?php  

if (isset($_POST['Update'])) {
    
    $name = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $pass = $_POST["password"];
    
    $update=$conn->query("UPDATE  administration set username='$name',email='$email',role='$role',password='$pass' where user_id ='$User_ID'");
    if ($update) {
        $message = "You have successfully updating!";
echo '<script>alert("' . $message . '"); window.location.href = "users.php";</script>';

        header("Location: users.php");
    }

 
   else{
    echo 'not';
   }
}

   
?></center>
  </main>

 


                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              
                 <!-- /. ROW  -->           
    </div>
            
            </div>
         <!-- /. PAGE WRAPPER  -->

        </div>
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;"  target="_blank">www.binarytheme.com</a>
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
