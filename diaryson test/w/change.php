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
require_once("../connect.php");
// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if (!$conn) {die("Connection ERROR: " . mysqli_connect_error());}
if(empty($_SESSION["userid"])){$id=$_COOKIE['userid'];}else{$id=$_SESSION["userid"];}

$name=$_POST['changetitle'];

if(isset($_POST['change'])){
$type=$_POST['changetype'];
$start=$_POST['changestart'];
$end=$_POST['changeend'];
$position=$_POST['changeposition'];
$salary=$_POST['changesalary'];
$update="UPDATE info SET type='$type',start='$start',end='$end',description='$position',value='$salary', WHERE name='$name'";
$uresult = $conn->query($update);
echo "Record changed successfully";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
}
if(isset($_POST['delete'])){
$fsql = "DELETE FROM info WHERE name='$name'";
$fresult = $conn->query($fsql);
echo "Record deleted successfully";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
}
echo "Error";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
?>