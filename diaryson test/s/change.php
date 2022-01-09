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
if(isset($_POST['changelogo'])){
$type=$_POST['changetype'];
$etype=$_POST['changeetype'];
$skill=$_POST['changeskill'];
$time=$_POST['changetime'];
$logoname = $_FILES['changelogo']['name'];
$nsql = "SELECT * FROM info WHERE name='$name'";
$n = $conn->query($nsql);
if ($n->num_rows>0){while($nnl=$n->fetch_assoc()){$nl=$nnl['n'];}}
$logo=$nl.".".$logoname;
$dir="../file/";
$logopath=$dir.$logo;
move_uploaded_file($_FILES["addlogo"]["tmp_name"],$logopath);

$ssql = "SELECT description FROM info WHERE name='$name'";
$rs = $conn->query($ssql);
if ($rs->num_rows>0){while($rrs=$rs->fetch_assoc()){$selected=$rrs['description'];$filedir='../file/'.$selected;unlink($filelink);}}
$update="UPDATE info SET type='$type',etype='$etype',description='$logo',link='$skill',value='$time', WHERE name='$name'";
$uresult = $conn->query($update);
} else{
$type=$_POST['changetype'];
$etype=$_POST['changeetype'];
$skill=$_POST['changeskill'];
$update="UPDATE info SET type='$type',etype='$etype',link='$skill',value='$time', WHERE name='$name'";
$uresult = $conn->query($update);
}
echo "Record changed successfully";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
}
if(isset($_POST['delete'])){
$ssql = "SELECT description FROM info WHERE name='$name'";
$rs = $conn->query($ssql);
if ($rs->num_rows>0){while($rrs=$rs->fetch_assoc()){$selected=$rrs['description'];$filedir='../file/'.$selected;unlink($filelink);}}

$fsql = "DELETE FROM info WHERE name='$name'";
$fresult = $conn->query($fsql);
echo "Record deleted successfully";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
}
echo "Error";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
?>