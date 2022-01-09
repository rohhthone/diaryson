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

$photo = $_POST['leftphoto'];
$n = count($photo);
for($i=0; $i < $n; $i++)
{
$filedir='file/'.$photo[$i];unlink($filelink);
$remove = "DELETE FROM info WHERE name = '$photo[$i]' AND ID='$id'";
$result = $conn->query($remove);
}

echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
?>