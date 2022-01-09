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

$n= "SELECT * FROM info ORDER BY n DESC LIMIT 1;";
$rn = $conn->query($n);
if ($rn->num_rows>0){while($rrn=$rn->fetch_assoc()){$nl=$rrn['n'];}}
else{$nl=0;}
$nl+=1;
$nl=(string)$nl;

$type=$_POST['addtype'];
$titlename=$_POST['addtitle'];
$start=$_POST['addstart'];
$end=$_POST['addend'];
$position=$_POST['addposition'];
$salary=$_POST['addsalary'];
$title=$nl.".".$titlename;
$sql = "INSERT INTO info(ID,kind,type,name,start,end,description,value,time) VALUES ('$id','3','$type','$title','$start','$end','$position','$salary',NOW())";

if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
} else {
echo "Error: " . $sql;
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
}
?>