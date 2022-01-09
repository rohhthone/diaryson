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

$name=$_POST['changename'];

if(isset($_POST['change'])){
if(isset($_POST['changelogo'])){
$url=$_POST['changeurl'];
$logoname = $_FILES['changelogo']['name'];
$nsql = "SELECT * FROM info WHERE name='$name'";
$n = $conn->query($nsql);
if ($n->num_rows>0){while($nnl=$n->fetch_assoc()){$nl=$nnl['n'];}}
$logo=$nl.".".$logoname;
echo $logo;
$dir="../file/";
$logopath=$dir.$logo;
move_uploaded_file($_FILES["addlogo"]["tmp_name"],$logopath);

$ssql = "SELECT * FROM info WHERE name='$name'";
$rs = $conn->query($ssql);
if ($rs->num_rows>0){while($rrs=$rs->fetch_assoc()){$selected=$rrs['description'];$filedir='../file/'.$selected;unlink($filelink);}}

$update="UPDATE info SET link='$url', description='$logo' WHERE name='$name'";
if ($conn->query($update) === TRUE) {
echo "New record changed successfully";
} else {
echo "Error updating record: " . $conn->error;
}
} else{
$url=$_POST['changeurl'];
$update="UPDATE info SET link='$url' WHERE name='$name'";
if ($conn->query($update) === TRUE) {
echo "New record changed successfully";

} else {
echo "Error updating record: " . $conn->error;
}
}
}
if(isset($_POST['delete'])){
$ssql = "SELECT * FROM info WHERE name='$name'";
$rs = $conn->query($ssql);
if ($rs->num_rows>0){while($rrs=$rs->fetch_assoc()){$selected=$rrs['description'];}}
$filedir='../file/'.$selected;unlink($filelink);

$delete = "DELETE FROM info WHERE name='$name'";
if ($conn->query($delete) === TRUE) {
echo "New record deleted successfully";
echo "<script>setTimeout(function(){window.history.back();},3000);</script>";
} else {
echo "Error updating record: " . $conn->error;
}
}
?>