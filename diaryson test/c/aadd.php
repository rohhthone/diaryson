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

$titlename=$_POST['addname'];
$url=$_POST['addurl'];
$n="SELECT * FROM info ORDER BY n DESC LIMIT 1;";
$rn = $conn->query($n);
if ($rn->num_rows>0){while($rrn=$rn->fetch_assoc()){$nl=$rrn['n'];}}
else{$nl=0;}
$nl+=1;
$nl=(string)$nl;

$title=$nl.".".$titlename;

$logoname = $_FILES['addlogo']['name'];
$logo=$nl.".".$logoname;
$dir="../file/";
$logopath=$dir.$logo;
move_uploaded_file($_FILES["addlogo"]["tmp_name"],$logopath);

$sql = "INSERT INTO info(ID,kind,type,name,description,link,time) VALUES ('$id','1','1','$title','$logo','$url',NOW())";

if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
} else {
echo "Error: " . $sql;
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
}
?>