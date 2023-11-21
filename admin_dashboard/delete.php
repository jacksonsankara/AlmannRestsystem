<?php
include'config.php';

?>
<?php
$d=$_GET['user_id'];
$delete=mysqli_query($conn,"delete from administration where user_id='$d'");
if ($delete==true) {
    header("location:users.php");
    echo "deleted";
}
?>