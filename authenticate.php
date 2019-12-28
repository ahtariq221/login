<?php
$connection = mysqli_connect('127.0.0.1','root','');
if (!$connection){
    die("Database connection Failed" .mysqli_error($connection));
}
$select_db = mysqli_select_db($connection,'database');
if (!$select_db){
    die("database connection failed".mysqli_error($connection));
}
if (isset($_POST['username']) and 
isset($_POST['password'])){
    // Assigning $post values to username and password
$username = $_POST['username'];
$password = $_POST['password'];
// check for the record from table
$query = "select * from `credentials` where username='$username' and Password='$password'";
$result = mysqli_query($connection,$query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
    echo'login credentials are correct';
    header("Refresh:0; url=admin.php");
}else
{
    echo"invalid login credentials";
}

}


?>