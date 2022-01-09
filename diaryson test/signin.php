<html>
<style>
*{margin: 0; padding: 0;}
body{width:100%;height:100%;display: flex; justify-content: space-around; align-items: center;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size: 3vmax}
</style>
<body>
<?php
ini_set('session.gc_maxlifetime', 33000);
ini_set('session.cookie_lifetime', 33000);
session_start(); 
require_once("connect.php");
// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {die($conn->connect_error);}
$nn=$conn -> real_escape_string($_POST['nn']);
$pass=$conn -> real_escape_string($_POST['pass']);
$sql = "SELECT id, name, pass FROM user WHERE name='$nn' AND pass='$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$_SESSION["userid"] =$row['id'];
setcookie("userid", $row['id'], time()+2592000);
echo $row['id'];
echo "Successfuly connected!";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
}
} else {
echo "No results";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
}
?>