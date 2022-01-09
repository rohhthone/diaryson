<?php 
ini_set('session.gc_maxlifetime', 33000);
ini_set('session.cookie_lifetime', 33000);
session_start();
require_once("connect.php");
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {die($conn->connect_error);}
if(empty($_SESSION["userid"])){
if (!empty($_COOKIE['userid'])){
$id=$_COOKIE['userid'];
if(isset($_GET['id'])){
$sid=$_GET['id'];
?>
<html>
<head>
<title>CC Profile</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="author" content="suicvairduCConstantinius">
<meta name="format-detection" content="telephone=no">
<script>
<?php 
$sql = "SELECT * FROM user WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$date=$row['birthtime'];
list($y, $m, $d) = split("-", $date);
$y=intval($y);
$m=intval($m);
$d=intval($d);
$m=$m-1;
?>
const user=[<?php echo $id; ?>,'<?php echo $row['name']; ?>','<?php echo $row['first']; ?>','<?php echo $row['last']; ?>',new Date(<?php echo "$y,$m,$d"; ?>),'<?php echo $row['birthplace']; ?>'];
<?php
}}
?>
<?php 
$ssql = "SELECT * FROM user WHERE id='$sid'";
$sresult = $conn->query($ssql);
if ($sresult->num_rows > 0) {
while($srow = $sresult->fetch_assoc()) {
$sdate=$srow['birthtime'];
list($ssy, $ssm, $ssd) = split("-", $sdate);
$sy=intval($ssy);
$ssm=intval($ssm);
$ssd=intval($ssd);
$ssm=$ssm-1;
?>
const selecteduser=[<?php echo $sid; ?>,'<?php echo $srow['name']; ?>','<?php echo $srow['first']; ?>','<?php echo $srow['last']; ?>',new Date(<?php echo "$ssy,$ssm,$ssd"; ?>),'<?php echo $srow['birthplace']; ?>'];
<?php
}}
?>
let now=new Date();
function nLimit(val, min, max) {return val < min ? min : (val > max ? max : val);}
var leftphoto=[<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='6' AND type='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '"';
echo $row['name'];
echo '",';
}}
?>],
rightphoto=[<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='6' AND type='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '"';
echo $row['name'];
echo '",';
}}
?>],
accounts=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='1' AND type='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], emails=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='1' AND type='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], locations=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='1' AND type='3'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], phones=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='1' AND type='4'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], education=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$start=$row['start'];
list($sy, $sm, $sd) = split("-", $start);
$sy=intval($sy);
$sm=intval($sm);
$sd=intval($sd);
$sm=$sm-1;
$end=$row['end'];
list($ey, $em, $ed) = split("-", $end);
$ey=intval($ey);
$em=intval($em);
$ed=intval($ed);
$em=$em-1;
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",start:new Date(';
echo "$sy,$sm,$sd";
echo '),end:new Date(';
echo "$ey,$em,$ed";
echo '),file:"';
echo $row['description'];
echo '"},';
}}
?>
], work=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='3'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$start=$row['start'];
list($sy, $sm, $sd) = split("-", $start);
$sy=intval($sy);
$sm=intval($sm);
$sd=intval($sd);
$sm=$sm-1;
$end=$row['end'];
list($ey, $em, $ed) = split("-", $end);
$ey=intval($ey);
$em=intval($em);
$ed=intval($ed);
$em=$em-1;
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",start:new Date(';
echo "$sy,$sm,$sd";
echo '),end:new Date(';
echo "$ey,$em,$ed";
echo '),position:"';
echo $row['description'];
echo '",salary:"';
echo $row['value'];
echo '"},';
}}
?>
], skill=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='4'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",etype:';
echo $row['etype'];
echo ',time:';
echo $row['value'];
echo ',skill:';
echo $row['link'];
echo ',logo:"';
echo $row['description'];
echo '"},';
}}
?>
], portfolio=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='5'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",file:"';
echo $row['value'];
echo '",description:"';
echo $row['description'];
echo '",text:"';
echo $row['description'];
echo '",cover:"';
echo $row['etype'];
echo '"},';
}}
?>
];
var selectedleftphoto=[<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='6' AND type='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '"';
echo $row['name'];
echo '",';
}}
?>],
selectedrightphoto=[<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='6' AND type='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '"';
echo $row['name'];
echo '",';
}}
?>],
selectedaccounts=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='1' AND type='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], selectedemails=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='1' AND type='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], selectedlocations=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='1' AND type='3'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], selectedphones=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='1' AND type='4'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], selectededucation=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$start=$row['start'];
list($sy, $sm, $sd) = split("-", $start);
$sy=intval($sy);
$sm=intval($sm);
$sd=intval($sd);
$sm=$sm-1;
$end=$row['end'];
list($ey, $em, $ed) = split("-", $end);
$ey=intval($ey);
$em=intval($em);
$ed=intval($ed);
$em=$em-1;
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",start:new Date(';
echo "$sy,$sm,$sd";
echo '),end:new Date(';
echo "$ey,$em,$ed";
echo '),file:"';
echo $row['description'];
echo '"},';
}}
?>
], selectedwork=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='3'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$start=$row['start'];
list($sy, $sm, $sd) = split("-", $start);
$sy=intval($sy);
$sm=intval($sm);
$sd=intval($sd);
$sm=$sm-1;
$end=$row['end'];
list($ey, $em, $ed) = split("-", $end);
$ey=intval($ey);
$em=intval($em);
$ed=intval($ed);
$em=$em-1;
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",start:new Date(';
echo "$sy,$sm,$sd";
echo '),end:new Date(';
echo "$ey,$em,$ed";
echo '),position:"';
echo $row['description'];
echo '",salary:"';
echo $row['value'];
echo '"},';
}}
?>
], selectedskill=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='4'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",etype:';
echo $row['etype'];
echo ',time:';
echo $row['value'];
echo ',skill:';
echo $row['link'];
echo ',logo:"';
echo $row['description'];
echo '"},';
}}
?>
], selectedportfolio=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$sid' AND kind='5'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",file:"';
echo $row['value'];
echo '",description:"';
echo $row['description'];
echo '",text:"';
echo $row['description'];
echo '",cover:"';
echo $row['etype'];
echo '"},';
}}
?>
];
var contactes=[accounts,emails,locations,phones];
var selectedcontactes=[selectedaccounts,selectedemails,selectedlocations,selectedphones];
function loadContent(){

for(let i=2;i<6;i++){
ul.getElementsByClassName('info')[0].innerHTML+='<div class="block">'+selecteduser[i]+'</div>';
}
for(let i=0;i<selectedcontactes.length;i++){
let type='';
if(i==0){type=''}
else if(i==1){type='mailto:'}
else if(i==3){type='tel:'}
else if(i==2){type='https://www.google.com/search?q='}
var ule=ul.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];
if(!selectedcontactes[i].length==0){
if(selectedcontactes[i].length==1){
ule.getElementsByClassName('action')[0].getElementsByClassName('move')[0].removeChild(ule.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('button')[0]);
ule.getElementsByClassName('action')[0].getElementsByClassName('move')[0].removeChild(ule.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('button')[0]);
ule.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('c')[0].getElementsByClassName('roll')[0].remove();
ule.getElementsByClassName('body')[0].innerHTML='<img src="file/'+selectedcontactes[i][0].logo+'">';
ule.getElementsByClassName('action')[0].getElementsByTagName('input')[0].value=selectedcontactes[i][0].logo;ule.getElementsByClassName('action')[0].getElementsByTagName('a')[0].href=type+''+selectedcontactes[i][0].value;
ule.getElementsByClassName('action')[0].getElementsByTagName('a')[0].innerHTML=selectedcontactes[i][0].value;}
else{ule.getElementsByClassName('action')[0].getElementsByTagName('input')[1].value=selectedcontactes[i][0].logo;ule.getElementsByClassName('action')[0].getElementsByTagName('input')[0].max=selectedcontactes[i].length;ule.getElementsByClassName('action')[0].getElementsByTagName('a')[0].href=type+''+selectedcontactes[i][0].value;ule.getElementsByClassName('action')[0].getElementsByTagName('a')[0].innerHTML=selectedcontactes[i][0].value;ule.getElementsByClassName('body')[0].innerHTML='<img src="file/'+selectedcontactes[i][0].logo+'">';}}
else{ule.getElementsByClassName('body')[0].innerHTML='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><rect class="b" y="0.002" width="100%" height="100%"/><path class="a" d="M192.31,1.412a170.2,170.2,0,0,0-190.9,190.9c9,71.008,75.43,137.44,146.438,146.438a170.2,170.2,0,0,0,190.9-190.9C329.75,76.842,263.318,10.41,192.31,1.412ZM169.79,40C241.4,39.887,300.113,98.6,300,170.21a129.477,129.477,0,0,1-12.064,54.551,17.964,17.964,0,0,1-28.988,5.127L110.112,81.052a17.964,17.964,0,0,1,5.127-28.988A129.477,129.477,0,0,1,169.79,40ZM159.15,299.559A130.046,130.046,0,0,1,52.614,114.066a17.973,17.973,0,0,1,28.932-5.01l149.4,149.4a17.973,17.973,0,0,1-5.01,28.932A129.988,129.988,0,0,1,159.15,299.559Z"/></svg>';ule.getElementsByClassName('action')[0].parentNode.removeChild(ule.getElementsByClassName('action')[0])}
}
for(let e=0;e<selectededucation.length;e++){
let zero=selecteduser[4].getTime(),starttime=selectededucation[e].start.getTime(),endtime=selectededucation[e].end.getTime(),nowg;
nowg=now.getTime();zero=zero/1000/60/60/24;starttime=starttime/1000/60/60/24;endtime=endtime/1000/60/60/24;nowg=nowg/1000/60/60/24;
zero=zero.toFixed(0);starttime=starttime.toFixed(0);endtime=endtime.toFixed(0);nog=nowg.toFixed(0);
let alllength=nowg-zero, beforestart=starttime-zero, afterend=nowg-endtime, allfill=alllength-(beforestart+afterend), type="", file="",bsshort="",aeshort="",fshort="";afterend=afterend.toFixed()
if(selectededucation[e].type==1){type='institute.svg'}else if(selectededucation[e].type==2){type='course.svg'}else if(selectededucation[e].type==3){type='profile.svg'}
if(selectededucation[e].file==""){file='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><rect class="a" y="0.002" width="100%" height="100%"/><path class="b" d="M192.31,1.412a170.2,170.2,0,0,0-190.9,190.9c9,71.008,75.43,137.44,146.438,146.438a170.2,170.2,0,0,0,190.9-190.9C329.75,76.842,263.318,10.41,192.31,1.412ZM169.79,40C241.4,39.887,300.113,98.6,300,170.21a129.477,129.477,0,0,1-12.064,54.551,17.964,17.964,0,0,1-28.988,5.127L110.112,81.052a17.964,17.964,0,0,1,5.127-28.988A129.477,129.477,0,0,1,169.79,40ZM159.15,299.559A130.046,130.046,0,0,1,52.614,114.066a17.973,17.973,0,0,1,28.932-5.01l149.4,149.4a17.973,17.973,0,0,1-5.01,28.932A129.988,129.988,0,0,1,159.15,299.559Z"/></svg>'}else{file='<a href="'+selectededucation[e].file+'" style="background-image:url(file/download.svg);"></a>'}
bsshort=(beforestart/365).toFixed(1);aeshort=(afterend/365).toFixed(1);fshort=(allfill/365).toFixed(1);
selectededulist.innerHTML+='<div class="item"><div class="left" style="background-image:url(file/'+type+');"></div><div class="mid"><div class="top">'+selectededucation[e].name+' ( Start : '+new Intl.DateTimeFormat('en', { year: 'numeric' }).format(selectededucation[e].start)+' | End : '+new Intl.DateTimeFormat('en', { year: 'numeric' }).format(selectededucation[e].end)+' )</div><div class="bottom"><div class="line"><div class="empty" title="'+beforestart+' days">'+bsshort+'</div><div class="fill" title="'+allfill+' days">'+fshort+'</div><div class="empty" title="'+afterend+' days">'+aeshort+'</div></div></div></div><div class="right">'+file+'</div></div>';
selectededulist.getElementsByClassName('item')[e].getElementsByClassName('empty')[0].style.width=(beforestart/alllength)*100+'%';
selectededulist.getElementsByClassName('item')[e].getElementsByClassName('empty')[1].style.width=(afterend/alllength)*100+'%';
selectededulist.getElementsByClassName('item')[e].getElementsByClassName('fill')[0].style.width=(allfill/alllength)*100+'%';
}
for(let w=0;w<selectedwork.length;w++){
let type="",salary=0,zero=selecteduser[4].getTime(),starttime=selectedwork[w].start.getTime(),endtime=selectedwork[w].end.getTime(),nowg;
nowg=now.getTime();zero=zero/1000/60/60/24;starttime=starttime/1000/60/60/24;endtime=endtime/1000/60/60/24;nowg=nowg/1000/60/60/24;
zero=zero.toFixed(0);starttime=starttime.toFixed(0);endtime=endtime.toFixed(0);nowg=nowg.toFixed(0);
let alllength=nowg-zero, beforestart=starttime-zero, afterend=nowg-endtime, allfill=alllength-(beforestart+afterend),bsshort="",aeshort="",fshort="",perday="";
if(selectedwork[w].type==1){type='official.svg';typetext="Official"}else if(selectedwork[w].type==2){type='unofficial.svg';typetext="Unofficial"}else if(selectedwork[w].type==3){type='parttime.svg';typetext="Part-time"}
if(selectedwork[w].salary==0){salary="<span class='value'>Free</span>"}else{salary='<div>'+selectedwork[w].salary +'$ </div> <span class="prevalue">'+perday+'$/day</span>'}
selectedworlist.innerHTML+='<div class="item"><div class="title">'+selectedwork[w].name+' - '+typetext+' - '+selectedwork[w].position+'</div><div class="content"><div class="logo" style="background-image:url(file/'+type+');"></div><div class="set"><div class="timeline"><div class="empty"></div><div class="fill" title="'+allfill+' days"></div><div class="empty"></div></div><div class="value"><span class="prevalue">'+allfill+' days for </span>'+salary+'</div></div></div></div>'
selectedworlist.getElementsByClassName('item')[w].getElementsByClassName('empty')[0].style.width=(beforestart/alllength)*100+'%';
selectedworlist.getElementsByClassName('item')[w].getElementsByClassName('empty')[1].style.width=(afterend/alllength)*100+'%';
selectedworlist.getElementsByClassName('item')[w].getElementsByClassName('fill')[0].style.width=(allfill/alllength)*100+'%';
}
let ss10=0;
for(let st=0;st<selectedskill.length;st++){ss10+=selectedskill[st].time}
for(let s=0;s<selectedskill.length;s++){
let type=selectedskill[s].type,time=selectedskill[s].time,selectedskill1=selectedskill[s].skill,etype=selectedskill[s].etype,s1,s2,s3,s4,s5,s6,s7,s8,s9;
s7=(((now.getTime()/1000/60/60-selecteduser[4].getTime()/1000/60/60)-26298).toFixed())*0.612;
if(ss10>s7){
s8=((Math.sqrt(s7)*2)/(Math.cbrt(s7)*2))*1234.56789;
skil=selectedskill1*Math.cbrt(((time/ss10)*s7)/s8);
skil=nLimit(skil,0.01,99.99);
s1=Math.floor(skil/10);s2=(skil/10)-s1;s3=(s2*10).toFixed(0);
s4=(10/(skil/100));s5=(s3/(skil/100));
s9=(skil+(33*((100-skil)/100 )))/100*88;
}else{
s8=((Math.sqrt(s7)*2)/(Math.cbrt(s7)*2))*1234.56789;
skil=selectedskill1*Math.cbrt(time/s8);
skil=nLimit(skil,0.01,99.99);
s1=Math.floor(skil/10);s2=(skil/10)-s1;s3=(s2*10).toFixed(0);
s4=(10/(skil/100));s5=(s3/(skil/100));
s9=(skil+(33*((100-skil)/100 )))/100*88;
}
selectedskilist.innerHTML+='<div class="item" title="'+selectedskill[s].name+'"><div class="logo" style="background-image:url(file/'+selectedskill[s].logo+')"></div><div class="line"><div class="fill" style="width:'+skil+'%;height:'+s9+'%"></div></div><div class="value"><div class="skill" title="Skill">'+selectedskill1+'%</div><div class="time">'+time+' hours</div></div></div>';
for(let g=0;g<s1;g++){
let g1=(9-g);
selectedskilist.getElementsByClassName('item')[s].getElementsByClassName('fill')[0].innerHTML+='<div class="selection" style="min-width:'+s4+'%; background-color: rgba(244, 244, 244, 0.'+g1+');"></div>';
}
let g2=10-(selectedskilist.getElementsByClassName('item')[s].getElementsByClassName('selection').length);
if(!s3==0){selectedskilist.getElementsByClassName('item')[s].getElementsByClassName('fill')[0].innerHTML+='<div class="selection" style="width:100%; background-color: rgba(244, 244, 244, 0.'+(g2-1)+');"></div>';}
}
for(let p=0;p<selectedportfolio.length;p++){
if(selectedportfolio[p].type==1){type='text.svg';}else if(selectedportfolio[p].type==2){type='document.svg';}else if(selectedportfolio[p].type==3){type='photo.svg';}else if(selectedportfolio[p].type==4){type='video.svg';}else if(selectedportfolio[p].type==5){type='music.svg';}
selectedporlist.innerHTML+='<div class="item"><div class="logo" style="background-image: url(file/'+type+');"></div><form action="" method="POST"><input type="text" value="'+selectedportfolio[p].file+'" name="type" readonly><input type="text" value="'+selectedportfolio[p].name+'" name="file" readonly><div class="action"><input type="submit" name="openfile" value="Open"></div></form></div>';
}
ulpl.src='file/'+selectedleftphoto[0];
ul.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+1+'" class="u" onmouseenter="sLeftPhoto();">';
for(let l=1;l<selectedleftphoto.length;l++){
var ln=l+1;
ul.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+ln+'" onmouseenter="sLeftPhoto();">';
}
ulpr.src='file/'+selectedrightphoto[0];
ul.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+1+'" class="u" onmouseenter="sRightPhoto();">';
for(let r=1;r<selectedrightphoto.length;r++){
var rn=r+1;
ul.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+rn+'" onmouseenter="sRightPhoto();">';
}




for(let i=2;i<6;i++){
um.getElementsByClassName('info')[0].innerHTML+='<div class="block">'+user[i]+'</div>';
}
for(let i=0;i<contactes.length;i++){
var ume=um.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];
if(!contactes[i].length==0){
if(contactes[i].length==1){
ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].removeChild(ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('button')[0]);
ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].removeChild(ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('button')[0]);
ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('c')[0].getElementsByClassName('roll')[0].remove();
ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';
ume.getElementsByClassName('action')[0].getElementsByTagName('input')[1].value=contactes[i][0].logo;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[0].value=contactes[i][0].value;}
else{ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[1].max=contactes[i].length;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[0].value=contactes[i][0].value;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';}}
else{ume.getElementsByClassName('body')[0].innerHTML='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><rect class="b" y="0.002" width="100%" height="100%"/><path class="a" d="M192.31,1.412a170.2,170.2,0,0,0-190.9,190.9c9,71.008,75.43,137.44,146.438,146.438a170.2,170.2,0,0,0,190.9-190.9C329.75,76.842,263.318,10.41,192.31,1.412ZM169.79,40C241.4,39.887,300.113,98.6,300,170.21a129.477,129.477,0,0,1-12.064,54.551,17.964,17.964,0,0,1-28.988,5.127L110.112,81.052a17.964,17.964,0,0,1,5.127-28.988A129.477,129.477,0,0,1,169.79,40ZM159.15,299.559A130.046,130.046,0,0,1,52.614,114.066a17.973,17.973,0,0,1,28.932-5.01l149.4,149.4a17.973,17.973,0,0,1-5.01,28.932A129.988,129.988,0,0,1,159.15,299.559Z"/></svg>';ume.getElementsByClassName('action')[0].parentNode.removeChild(ume.getElementsByClassName('action')[0])}
}
for(let e=0;e<education.length;e++){
let zero=user[4].getTime(),starttime=education[e].start.getTime(),endtime=education[e].end.getTime(),nowg;
nowg=now.getTime();zero=zero/1000/60/60/24;starttime=starttime/1000/60/60/24;endtime=endtime/1000/60/60/24;nowg=nowg/1000/60/60/24;
zero=zero.toFixed(0);starttime=starttime.toFixed(0);endtime=endtime.toFixed(0);nog=nowg.toFixed(0);
let alllength=nowg-zero, beforestart=starttime-zero, afterend=nowg-endtime, allfill=alllength-(beforestart+afterend), type="", file="",bsshort="",aeshort="",fshort="";afterend=afterend.toFixed()
if(education[e].type==1){type='institute.svg'}else if(education[e].type==2){type='course.svg'}else if(education[e].type==3){type='profile.svg'}
if(education[e].file==""){file='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><rect class="a" y="0.002" width="100%" height="100%"/><path class="b" d="M192.31,1.412a170.2,170.2,0,0,0-190.9,190.9c9,71.008,75.43,137.44,146.438,146.438a170.2,170.2,0,0,0,190.9-190.9C329.75,76.842,263.318,10.41,192.31,1.412ZM169.79,40C241.4,39.887,300.113,98.6,300,170.21a129.477,129.477,0,0,1-12.064,54.551,17.964,17.964,0,0,1-28.988,5.127L110.112,81.052a17.964,17.964,0,0,1,5.127-28.988A129.477,129.477,0,0,1,169.79,40ZM159.15,299.559A130.046,130.046,0,0,1,52.614,114.066a17.973,17.973,0,0,1,28.932-5.01l149.4,149.4a17.973,17.973,0,0,1-5.01,28.932A129.988,129.988,0,0,1,159.15,299.559Z"/></svg>'}else{file='<a href="'+education[e].file+'" style="background-image:url(file/download.svg);"></a>'}
bsshort=(beforestart/365).toFixed(1);aeshort=(afterend/365).toFixed(1);fshort=(allfill/365).toFixed(1);
edulist.innerHTML+='<div class="item"><div class="left" style="background-image:url(file/'+type+');"></div><div class="mid"><div class="top">'+education[e].name+' ( Start : '+new Intl.DateTimeFormat('en', { year: 'numeric' }).format(education[e].start)+' | End : '+new Intl.DateTimeFormat('en', { year: 'numeric' }).format(education[e].end)+' )</div><div class="bottom"><div class="line"><div class="empty" title="'+beforestart+' days">'+bsshort+'</div><div class="fill" title="'+allfill+' days">'+fshort+'</div><div class="empty" title="'+afterend+' days">'+aeshort+'</div></div></div></div><div class="right">'+file+'</div></div>';
edulist.getElementsByClassName('item')[e].getElementsByClassName('empty')[0].style.width=(beforestart/alllength)*100+'%';
edulist.getElementsByClassName('item')[e].getElementsByClassName('empty')[1].style.width=(afterend/alllength)*100+'%';
edulist.getElementsByClassName('item')[e].getElementsByClassName('fill')[0].style.width=(allfill/alllength)*100+'%';
}
for(let w=0;w<work.length;w++){
let type="",salary=0,zero=user[4].getTime(),starttime=work[w].start.getTime(),endtime=work[w].end.getTime(),nowg;
nowg=now.getTime();zero=zero/1000/60/60/24;starttime=starttime/1000/60/60/24;endtime=endtime/1000/60/60/24;nowg=nowg/1000/60/60/24;
zero=zero.toFixed(0);starttime=starttime.toFixed(0);endtime=endtime.toFixed(0);nowg=nowg.toFixed(0);
let alllength=nowg-zero, beforestart=starttime-zero, afterend=nowg-endtime, allfill=alllength-(beforestart+afterend),bsshort="",aeshort="",fshort="",perday="";
if(work[w].type==1){type='official.svg';typetext="Official"}else if(work[w].type==2){type='unofficial.svg';typetext="Unofficial"}else if(work[w].type==3){type='parttime.svg';typetext="Part-time"}
if(work[w].salary==0){salary="<span class='value'>Free</span>"}else{salary='<div>'+work[w].salary +'$ </div> <span class="prevalue">'+perday+'$/day</span>'}
worlist.innerHTML+='<div class="item"><div class="title">'+work[w].name+' - '+typetext+' - '+work[w].position+'</div><div class="content"><div class="logo" style="background-image:url(file/'+type+');"></div><div class="set"><div class="timeline"><div class="empty"></div><div class="fill" title="'+allfill+' days"></div><div class="empty"></div></div><div class="value"><span class="prevalue">'+allfill+' days for </span>'+salary+'</div></div></div></div>'
worlist.getElementsByClassName('item')[w].getElementsByClassName('empty')[0].style.width=(beforestart/alllength)*100+'%';
worlist.getElementsByClassName('item')[w].getElementsByClassName('empty')[1].style.width=(afterend/alllength)*100+'%';
worlist.getElementsByClassName('item')[w].getElementsByClassName('fill')[0].style.width=(allfill/alllength)*100+'%';
}
let s10=0;
for(let st=0;st<skill.length;st++){s10+=skill[st].time}
for(let s=0;s<skill.length;s++){
let type=skill[s].type,time=skill[s].time,skill1=skill[s].skill,etype=skill[s].etype,s1,s2,s3,s4,s5,s6,s7,s8,s9;
s7=(((now.getTime()/1000/60/60-user[4].getTime()/1000/60/60)-26298).toFixed())*0.612;
if(s10>s7){
s8=((Math.sqrt(s7)*2)/(Math.cbrt(s7)*2))*1234.56789;
skil=skill1*Math.cbrt(((time/s10)*s7)/s8);
skil=nLimit(skil,0.01,99.99);
s1=Math.floor(skil/10);s2=(skil/10)-s1;s3=(s2*10).toFixed(0);
s4=(10/(skil/100));s5=(s3/(skil/100));
s9=(skil+(33*((100-skil)/100 )))/100*88;
}else{
s8=((Math.sqrt(s7)*2)/(Math.cbrt(s7)*2))*1234.56789;
skil=skill1*Math.cbrt(time/s8);
skil=nLimit(skil,0.01,99.99);
s1=Math.floor(skil/10);s2=(skil/10)-s1;s3=(s2*10).toFixed(0);
s4=(10/(skil/100));s5=(s3/(skil/100));
s9=(skil+(33*((100-skil)/100 )))/100*88;
}
skilist.innerHTML+='<div class="item" title="'+skill[s].name+'"><div class="logo" style="background-image:url(file/'+skill[s].logo+')"></div><div class="line"><div class="fill" style="width:'+skil+'%;height:'+s9+'%"></div></div><div class="value"><div class="skill" title="Skill">'+skill1+'%</div><div class="time">'+time+' hours</div></div></div>';
for(let g=0;g<s1;g++){
let g1=(9-g);
skilist.getElementsByClassName('item')[s].getElementsByClassName('fill')[0].innerHTML+='<div class="selection" style="min-width:'+s4+'%; background-color: rgba(244, 244, 244, 0.'+g1+');"></div>';
}
let g2=10-(skilist.getElementsByClassName('item')[s].getElementsByClassName('selection').length);
if(!s3==0){skilist.getElementsByClassName('item')[s].getElementsByClassName('fill')[0].innerHTML+='<div class="selection" style="width:100%; background-color: rgba(244, 244, 244, 0.'+(g2-1)+');"></div>';}
}
for(let p=0;p<portfolio.length;p++){
if(portfolio[p].type==1){type='text.svg';}else if(portfolio[p].type==2){type='document.svg';}else if(portfolio[p].type==3){type='photo.svg';}else if(portfolio[p].type==4){type='video.svg';}else if(portfolio[p].type==5){type='music.svg';}
porlist.innerHTML+='<div class="item"><div class="logo" style="background-image: url(file/'+type+');"></div><form action="" method="POST"><input type="text" value="'+portfolio[p].file+'" name="type" readonly><input type="text" value="'+portfolio[p].name+'" name="file" readonly><div class="action"><input type="submit" name="openfile" value="Open"><input type="submit" name="deletefile" value="Delete"></div></form></div>';
}
umpl.src='file/'+leftphoto[0];
um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+1+'" class="u" onmouseenter="leftPhoto();">';
for(let l=1;l<leftphoto.length;l++){
var ln=l+1;
um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+ln+'" onmouseenter="leftPhoto();">';
}
umpr.src='file/'+rightphoto[0];
um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+1+'" class="u" onmouseenter="rightPhoto();">';
for(let r=1;r<rightphoto.length;r++){
var rn=r+1;
um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+rn+'" onmouseenter="rightPhoto();">';
}



userid.value=user[0];
username.value=user[1];
usermidname.value=user[2];
usersurname.value=user[3];
userbirthtime.value=user[4];
userbirthplace.value=user[5];
for(let n=0;n<leftphoto.length;n++){let p=n+1;photo.getElementsByClassName('left')[0].innerHTML+='<label for="changepl'+p+'"><input type="checkbox" name="leftphoto[]" id="changepl'+p+'" value="'+leftphoto[n]+'"><div class="photo" style="background-image:url(file/'+leftphoto[n]+');"></div></label>'}
for(let n=0;n<rightphoto.length;n++){let p=n+1;photo.getElementsByClassName('right')[0].innerHTML+='<label for="changepr'+p+'"><input type="checkbox" name="rightphoto[]" id="changepr'+p+'" value="'+rightphoto[n]+'"><div class="photo" style="background-image:url(file/'+rightphoto[n]+') ;"></div></label>'}
photo.getElementsByClassName('right')[0].innerHTML+='<input type="submit" value="Remove">';
photo.getElementsByClassName('left')[0].innerHTML+='<input type="submit" value="Remove">';

for(let m=0;m<contactes.length;m++){
for(let n=0;n<contactes[m].length;n++){
let v=contactes[m][n];
contacts.getElementsByClassName('roll')[m].innerHTML+='<label for="change'+m+n+'"><input type="radio" name="change'+m+'" id="change'+m+n+'" value="'+n+'" onchange="contactChoosen();"><div class="text">'+v.title+' - '+v.value+'</div></label>';
}
}
for(let n=0;n<education.length;n++){
if(education[n].type==1){type='institute.svg'} else if(education[n].type==2){type='course.svg'} else if(education[n].type==3){type='profile.svg'}
ceducation.getElementsByClassName('roll')[0].innerHTML+='<label for="changei'+n+'e"><input type="radio" name="changeid" id="changei'+n+'e" value="'+n+'" onchange="educationChoosen();"><div class="text">'+education[n].name+'</div><div class="type" style="background-image:url(file/'+type+');"></div></label>';
}
for(let n=0;n<work.length;n++){
if(work[n].type==1){type='official.svg'} else if(work[n].type==2){type='unofficial.svg'} else if(work[n].type==3){type='parttime.svg'}
cwork.getElementsByClassName('roll')[0].innerHTML+='<label for="changei'+n+'w"><input type="radio" name="changeid" id="changei'+n+'w" value="'+n+'" onchange="workChoosen();"><div class="text">'+work[n].name+'</div><div class="type" style="background-image:url(file/'+type+');"></div></label>';
}
for(let n=0;n<skill.length;n++){
cskill.getElementsByClassName('roll')[0].innerHTML+='<label for="changei'+n+'s"><input type="radio" name="changeid" id="changei'+n+'s" value="'+n+'" onchange="skillChoosen();"><div class="text">'+skill[n].name+'</div><div class="type" style="background-image:url(file/'+skill[n].logo+');"></div></label>';
}
for(let n=0;n<portfolio.length;n++){
if(portfolio[n].type==1){type='text.svg'} else if(portfolio[n].type==2){type='document.svg'} else if(portfolio[n].type==3){type='video.svg'} else if(portfolio[n].type==4){type='photo.svg'} else if(portfolio[n].type==5){type='music.svg'}
cportfolio.getElementsByClassName('roll')[0].innerHTML+='<label for="changei'+n+'p"><input type="radio" name="changeid" id="changei'+n+'p" value="'+n+'" onchange="portfolioChoosen();"><div class="text">'+portfolio[n].name+'</div><div class="type" style="background-image:url(file/'+type+');"></div></label>';
}
}
</script>
<style>
*{margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 1.4vmax;}
.f1x{display: flex; justify-content: space-around; align-items: center;}.fdc{flex-direction: column;}.fdrc{flex-direction: column-reverse;}
.h1d{display: none;}
.a{fill:#f4f4f4;}.b{fill:#0c0c0c;}

.functions>div{position: fixed;display: flex; justify-content: space-around; align-items: center;}
.functions>.left{left: 0;top: 0; height: 100vh; width: 10vmin;}
.functions>.right{right: 0;top: 0; height: 100vh; width: 10vmin;}
.functions>.top{left: 0;top: 0; height: 10vmin; width: 100%;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type{height: 100%; width: 80%;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type>.option{width: 50%; height: 100%; cursor: pointer;}
.functions>.top>.type>.option>.logo{width: 100%; height: 5vmin; background-color: #f4f4f4;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type>.option>.logo>svg{width: 4.7vmin; height: 4.7vmin;}
.functions>.top>.type>.option>.title{width: 100%; height: 3vmin; background-color: #f4f4f4;display: flex; justify-content: space-around; align-items: center; font-size: 100%;}
.functions>.top>.type>.option.s>.title{font-weight: 500;}
.functions>.top>.type>.option>.selection{width: 100%; height: 0.2vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option.s>.selection{width: 100%; height: 0.8vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option.s{cursor: default;}
.functions>.top>.type>.option:hover>.selection{width: 100%; height: 0.8vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option:hover>.title{font-weight: 500;}

body{display: flex; flex-direction: column; align-items: center;}
.content{display: none;}
.content.s#u{margin-top: 10vmin;width: 80vw; display: flex; flex-direction: column;}
.downpick>.button{width: 100%; height: 6vmin; display: flex; justify-content: space-around;align-items: center; background-color: #0c0c0c;}
.downpick>.button:hover{font-weight: 500; opacity: 0.9; cursor: pointer; height:7vmin;}
.downpick>.button.o{ font-weight: 500; opacity: 0.9; cursor: default; height:7vmin;}
.content.s#u>.sign{width:auto; height: 100%; display: flex;flex-direction: column;}
.content.s#u>.type{width: 100%; height: 36vmin; display: flex; justify-content: space-between; align-items: center; background-color: #4d4d4d;}
.content.s#u>.sign>.form{display: none; width: 100%; height: auto; margin-top: 5vmin;}
.content.s#u>.sign.o>.form{display: flex; align-items: center;flex-direction: column; height: auto; margin-top: 5vmin; justify-content: space-around;}
.content.s#u>.sign>.form>form{display: flex;flex-direction: column; width: auto;}
.content.s#u>.sign>.form>form>input{ width: 80vw; border: none; outline: none;margin-top: 1vmin;}
.content.s#u>.sign>.form>form>label{margin-top: 1vmax;}
.content.s#u>.sign>.form>form>div>input[type="submit"]{ width: 100%; border: none; outline: none;cursor: pointer; background-color: #0c0c0c; color: #f4f4f4; margin-top: 0; padding: 0.5vmin;} 
.content.s#u>.sign>.form>form>div>input[type="submit"]:hover{background-color: #0c0c0ccc; font-weight: 500;} 
.content.s#u>.sign>.form>form>input[type="text"],.content.s#u>.sign>.form>form>input[type="password"],.content.s#u>.sign>.form>form>input[type="date"]{border-bottom: 0.2vmin solid #0c0c0c;}
.content.s#u>.sign>.form>form>input[type="text"]:focus,.content.s#u>div>.form>form>input[type="password"]:focus,.content.s#u>.sign>.form>form>input[type="date"]:focus{border-bottom: 0.3vmin solid #0c0c0ccc;font-weight: 500;}
.content.s#u>.sign>.form>form>input[type="text"]:hover,.content.s#u>div>.form>form>input[type="password"]:hover,.content.s#u>.sign>.form>form>input[type="date"]:hover{border-bottom: 0.2vmin solid #0c0c0caa; }
.downpick{display: flex; position: fixed; bottom: 0; left: 10vw; width: 80%; height: auto;color: #f4f4f4;
align-items: flex-end;}
.content.s#u>.sign>.image{display: none;margin-top: 5vmin;}
.content.s#u>.sign.o>.image{width: 100%; height: 20vh; display: flex; align-items: center;flex-direction: column;}
.content.s#u>.sign.o.in>.image>svg{height: 100%;}
.content.s#u>.sign.o.in>.image:hover>svg{transition: 1s;}
.content.s#u>.sign.o.in>.image>svg>.g{transform: translateX(25vw);transition: 1s; fill: rgb(222, 222, 77);}
.content.s#u>.sign.o.in>.image>svg>.b{transform: translateX(25vw);transition: 1s; fill: rgb(77, 77, 222);}
.content.s#u>.sign.o.in>.image>svg>.c{transform: translateX(25vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.in>.image>svg:hover>.g{transform: translateX(10vw); fill: #0c0c0c;}
.content.s#u>.sign.o.in>.image>svg:hover>.b{transform: translateX(40vw); fill: #0c0c0c;}
.content.s#u>.sign.o.in>.image>svg:hover>.c{transform: translateX(25vw); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg{height: 100%;}
.content.s#u>.sign.o.up>.image:hover>svg{transition: 1s;}
.content.s#u>.sign.o.up>.image>svg>.g{transform: translateX(20vw);transition: 1s; fill: rgb(222, 222, 77);}
.content.s#u>.sign.o.up>.image>svg>.b{transform: translateX(20vw);transition: 1s; fill: rgb(77, 77, 222);}
.content.s#u>.sign.o.up>.image>svg>.c{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg>.c1{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg>.c2{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg:hover>.g{transform: translateX(20vw) translateY(2vmin); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg:hover>.b{transform: translateX(20vw); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg:hover>.c{transform: translateX(20vw);}
.content.s#u>.sign.o.up>.image>svg:hover>.c1{transform: translateX(20vw) translateY(2vmin);}
.content.s#u>.sign.o.up>.image>svg:hover>.c2{transform: translateX(20vw) translateY(2vmin);}

.content.s#d{margin-top: 10vmin;width: 80vw; display: flex; flex-direction: column;}
.content.s#d>.image{width: 80vw ; height: auto; background-color: #0c0c0c;}
.content.s#d>.image>svg>#text{transition: 2s;}
.content.s#d>.image>svg:hover>#text{transform: translateY(30vmin) rotate(-30deg);}
.content.s#d>.image>svg>#click>.a{transform: translate(77%, 1%) scale(0.7); fill: transparent; transition: 1s;}
.content.s#d>.image>svg:hover>#click>.a{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h1{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h2{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h3{fill: #0c0c0c;}
.content.s#d>.image>svg>#zone:hover~#h0{fill: #4d4d4d;transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover~#h1{fill: #4d4d4d;transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover~#h1~#h2{fill: #4d4d4d;}
.content.s#d>.image>svg>#zone:hover~#h1~#h2~#h3{transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover{cursor: pointer;}
.content.s#d>.type{width: 100%; height: 36vmin; display: flex; justify-content: space-between; align-items: center; background-color: #4d4d4d;}
.content.s#d>.typelist{width: 100%; height: 15vmin; display: flex; justify-content: space-between; align-items: center; background-color: #4d4d4d;}
.content.s#d>.typelist>.icon{width: 32.3%; height: 100%; display: flex; justify-content: space-around; align-items: center; background-color: #212121;}
.content.s#d>.typelist>.icon:nth-child(2){background-color: transparent;}
.content.s#d>.type>.text{width: 32.3%; height: 100%; display: flex; flex-direction: column; align-items: center;background-color: #212121; font-weight: 400;}
.content.s#d>.type>.text:nth-child(2){background-color: transparent;}
.content.s#d>.type>.text>.title{width: 100%; height: 34%; display: flex; justify-content: space-around; align-items: center; font-weight: 600; color: #f4f4f4;}
.content.s#d>.type>.text>.description{width: 90%; height:auto; display: flex; align-items: center; color: #f4f4f4;text-align: justify;}
.content.s#d>.typelist>.icon>svg{width: 90%; height: 90%; display: flex;}
.content.s#d>.setup>.logo{width: 100%; height: 35vmin;display: flex; align-items: center; justify-content: space-around;}
.content.s#d>.setup>.logo>svg{display: block; height: 30vmin;}
.content.s#d>.setup>.container{width: auto; height: 20vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
.content.s#d>.setup>.container>.text{width: auto; height: auto;}
.content.s#d>.setup>.container>.line{width: 100%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; margin-top: 1vmin;}
.content.s#d>.setup>.container>.line>.button{width: 35%; height: 90%; display: flex; justify-content: space-around; align-items: center; background-color: #4d4d4d; color: #f4f4f4; cursor: pointer;}
.content.s#d>.setup>.container>.line>.button:hover{background-color: #212121; font-weight: 500;}
.author{width: 100%; height: 2vmax;text-align: center;}

.content.s#u>.contents{display: none;}
.content.s#u>.contents.o{width: 100%; height: auto;  margin-bottom: 10vmin; display: block;}
.content.s#u>.contents>.list{display: flex; flex-wrap: wrap; justify-content: space-around; width: 100%; height: auto; background-color: #0c0c0c;}

.content.s#u>#ul>.photo{width: 100%; height: 40vh; background-color: #366ce1; display: flex;}
.content.s#u>#ul>.photo>div{height: 100%; width: 50%; display: flex; flex-direction: column; background-color: #0c0c0c;}
.content.s#u>#ul>.photo>div>.image{width: 100%; height: 80%;display: flex; justify-content: space-around; align-items: center; border-bottom: 0.3vmin solid #f4f4f4;}
.content.s#u>#ul>.photo>div>.image>img{height: 100%;}
.content.s#u>#ul>.photo>div>.list{width: 100%; height: 20%; background-color: #0c0c0c;display: flex; justify-content: space-around; align-items: flex-start;}
.content.s#u>#ul>.photo>div>.list>input{width: 5%; height: 70%; border: none; background-color: #f4f4f4;}
.content.s#u>#ul>.photo>div>.list>input.u{outline: solid #f4f4f4; height: 100%; font-weight: 500; box-shadow: 0 0 0 0.3vmin  #0c0c0c inset;}
.content.s#u>#ul>.photo>div>.list>input:hover{width: 5%; height: 100%; cursor: pointer; font-weight: 500;}

.content.s#u>#ul>.info{width: 100%; height: auto; display: flex; flex-wrap: wrap;background-color: #0c0c0c;}
.content.s#u>#ul>.info>.block{width: 50%; height: auto; color: #f4f4f4; padding-top: 0.3vh; padding-bottom: 0.3vh; text-align: center;}

.content.s#u>#ul>.contact{width: 100%; height: auto; display: flex; border-top: 0.3vmin solid #f4f4f4; border-bottom: 0.3vmin solid #f4f4f4;}
.content.s#u>#ul>.contact>.block{width: 25%; height: 30vmin; background-color: #0c0c0c; border-right: 0.1vmin solid #f4f4f4; display: flex; flex-direction: column; align-items: center;}
.content.s#u>#ul>.contact>.block:last-child{border: none;}
.content.s#u>#ul>.contact>.block>.title{width: 100%; min-height: 5vmin;background-color: #366ce1;display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#ul>.contact>.block>.title>svg{width: auto; height: 4vmin;}
.content.s#u>#ul>.contact>.block>.body{width: 100%; height: 100%;display: flex;justify-content: space-around; align-items: center;}
.content.s#u>#ul>.contact>.block>.body>img{height: 90%;}
.content.s#u>#ul>.contact>.block>.body>svg{height: 15vmin ; width: 15vmin; display: block;}
.content.s#u>#ul>.contact>.block>.action{width: 100%; min-height: 5vmin; background-color: #f4f4f4;display: flex;justify-content: space-around; align-items: center;}
.content.s#u>#ul>.contact>.block>.action>.move{display: flex; width: 80%; height: 100%;}
.content.s#u>#ul>.contact>.block>.action>.move>div.button{width: 10%; height: 100%; border: none; background-color: #0c0c0c; color: #f4f4f4; font-weight: 300; display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#ul>.contact>.block>.action>.move>div.c>input{border: none; outline: none; background-color: #0c0c0c; color: #f4f4f4; font-weight: 400; text-align: center;}
.content.s#u>#ul>.contact>.block>.action>.move>div.button:hover{font-weight: 600; cursor: pointer;}
.content.s#u>#ul>.contact>.block>.action>.move>div.c{width: 80%; height: 100%; display: flex; flex-direction: column;}
.content.s#u>#ul>.contact>.block>.action>.move>div.c>input{width: auto; height: 45%; font-size: 1.2vmax; text-indent: 1vmin; z-index: 4;} 
.content.s#u>#ul>.contact>.block>.action>.move>div.c>a{width: auto; height: 45%; font-size: 1.2vmax; text-indent: 1vmin; z-index: 4; overflow-x: scroll; background-color: #0c0c0c; color: #f4f4f4;}
.content.s#u>#ul>.contact>.block>.action>.move>div.c>a::-webkit-scrollbar{width: 0; height: 0; opacity: 0;} 
.content.s#u>#ul>.contact>.block>.action>.move>div.c>input[type="range"]{height: 10%; z-index: 5;}
.content.s#u>#ul>.contact>.block>.action>.remove{display: flex; justify-content: space-around; align-items: center; width: 20%; height: 100%;}
.content.s#u>#ul>.contact>.block>.action>.remove>label{width:100%; height: 100%;display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#ul>.contact>.block>.action>.remove>label:hover>svg{height: 80%; cursor: pointer;}
.content.s#u>#ul>.contact>.block>.action>.remove>label>svg{height: 90%; width: 100%;}
.content.s#u>#ul>.contact>.block>.action>.remove>input{height: 0; width: 0; opacity: 0;}

.titleson{width: 100%; height: 5vmin; background-color: #0c0c0c; color: #f4f4f4; border-top: 0.3vmin solid #f4f4f4; display: flex; justify-content: space-around; align-items: center; font-weight: 500;}
#selectededulist{width: 100%; height: auto; display: flex; flex-direction: column;}
#selectededulist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; align-items: center; justify-content: space-between;}
#selectededulist>.item>.left{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around; background-position: center; background-size: contain; background-repeat: no-repeat; }
#selectededulist>.item>.mid{width: 100%; height: 15vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#selectededulist>.item>.mid>.top{width: 100%; height: 5vmin;text-align: center;}
#selectededulist>.item>.mid>.bottom{width: 100%; height: 100%;display: flex; align-items: center; justify-content: space-around;}
#selectededulist>.item>.mid>.bottom>.line{width: 90%; height: 8vmin;display: flex; justify-content: space-around; align-items: center;}
#selectededulist>.item>.mid>.bottom>.line>div{display: flex;height: 3vmin;  align-items: center; justify-content: space-around;}
#selectededulist>.item>.mid>.bottom>.line>.empty{background-color: #0c0c0c; color: #f4f4f4;}
#selectededulist>.item>.mid>.bottom>.line>.empty:last-child{border-bottom-right-radius: 50%;border-top-right-radius: 50%;}
#selectededulist>.item>.mid>.bottom>.line>.empty:first-child{border-bottom-left-radius: 50%;border-top-left-radius: 50%;}
#selectededulist>.item>.mid>.bottom>.line>.fill{background-color: #366ce1; color: #eadc36;}
#selectededulist>.item>.right{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around;}
#selectededulist>.item>.right>svg{width: 100%; height: 100%;}
#selectededulist>.item>.right>a{width: 100%; height: 100%;background-position: center; background-size: contain; background-repeat: no-repeat;}
#selectedworlist{width: 100%; height: auto; display: flex; flex-direction: column;}
#selectedworlist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.3vmin; padding-bottom: 0.3vmin; flex-direction: column;}
#selectedworlist>.item>.title{width: 100%; height: auto; text-align: center; border-top: 0.3vmin solid #0c0c0c; color: #0c0c0c; margin-bottom: 0.2vmin; padding-bottom: 0.1vmin;}
#selectedworlist>.item:first-child>.title{border: none;}
#selectedworlist>.item>.content{width: 100%; height: 100%;display: flex; justify-content: space-between; align-items: center;}
#selectedworlist>.item>.content>.logo{width: 12vmin; height: 8vmin; background-repeat: no-repeat; background-position: center;}
#selectedworlist>.item>.content>.set{width: 80%; height: 12vmin;}
#selectedworlist>.item>.content>.set>.timeline{width: 100%; height: 8vmin;display: flex;justify-content: space-between; align-items: center;}
#selectedworlist>.item>.content>.set>.timeline>div{height: 3vmin;display: flex;justify-content: space-between; align-items: center;}
#selectedworlist>.item>.content>.set>.timeline>.empty{background-color: #0c0c0c; color: #f4f4f4;}
#selectedworlist>.item>.content>.set>.timeline>.empty:last-child{border-bottom-right-radius: 50%;border-top-right-radius: 50%;}
#selectedworlist>.item>.content>.set>.timeline>.empty:first-child{border-bottom-left-radius: 50%;border-top-left-radius: 50%;}
#selectedworlist>.item>.content>.set>.timeline>.fill{background-color: #366ce1; color: #eadc36;}
#selectedworlist>.item>.content>.set>.value{width: 100%; height: 50%;display: flex;justify-content: space-between; align-items: center;}
#selectedskilist{width: 100%; height: auto; display: flex; flex-direction: column;}
#selectedskilist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; flex-direction: row;justify-content: space-between; align-items: center; }
#selectedskilist>.item>.logo{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around; background-position: center; background-size: contain; background-repeat: no-repeat;}
#selectedskilist>.item>.value{width: 15vmin; height: 15vmin; display: flex; align-items: center; justify-content: space-around; flex-direction: column;}
#selectedskilist>.item>.value>div{width: 100%; height: 50%;display: flex; justify-content: space-around; align-items: center;}
#selectedskilist>.item>.value>div:first-child{align-items: flex-end;}
#selectedskilist>.item>.value>div:last-child{align-items: flex-start;}
#selectedskilist>.item>.line{width: 70%; height: 7vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#selectedskilist>.item>.line>.fill{width: 100%; height: 15vmin; background-color: #366ce1;display: flex;}
#selectedskilist>.item>.line>.fill>.selection{height: 100%;}
#selectedporlist{width: 100%; height: auto; display: flex; flex-direction: column;}
#selectedporlist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; flex-direction: row;justify-content: space-between; align-items: center; margin-bottom: 1vmin;}
#selectedporlist>.item>.logo{width: 15vmin; height: 10vmin; background-size: contain; background-repeat: no-repeat; background-position: center;}
#selectedporlist>.item>form{width: 80%; height: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center;}
#selectedporlist>.item>form>.action{height: 10vmin; width: 15vmin;display: flex; flex-direction: column;justify-content: space-between; align-items: center;}
#selectedporlist>.item>form>.action>input{height: 5vmin; width: 100%; display: flex; justify-content: space-around;align-items: center;background-color: #0c0c0c; color: #f4f4f4; border: none;margin: 0.3vmin;}
#selectedporlist>.item>form>.action>input:hover{font-weight: 500; outline: solid #0c0c0c; box-shadow: 0 0 0 0.3vmin  #f4f4f4 inset; cursor: pointer;}
#selectedporlist>.item>form>input{height: 5vmin; width: 90%; border: none;}
#selectedporlist>.item>form>input:first-child{opacity: 0; cursor: default;width: 10%;}

a.icon{width: 5vmin; height: 5vmin;display: flex; justify-content: space-around; align-items: center; background-color: #f4f4f4;}
a.icon>svg{width: 4vmin; height: 4vmin;}
a.icon:hover>svg{width: 3.5vmin; height: 3.5vmin;}

.content.s#u>#um>.photo{width: 100%; height: 40vh; background-color: #366ce1; display: flex;}
.content.s#u>#um>.photo>div{height: 100%; width: 50%; display: flex; flex-direction: column; background-color: #0c0c0c;}
.content.s#u>#um>.photo>div>.image{width: 100%; height: 80%;display: flex; justify-content: space-around; align-items: center; border-bottom: 0.3vmin solid #f4f4f4;}
.content.s#u>#um>.photo>div>.image>img{height: 100%;}
.content.s#u>#um>.photo>div>.list{width: 100%; height: 20%; background-color: #0c0c0c;display: flex; justify-content: space-around; align-items: flex-start;}
.content.s#u>#um>.photo>div>.list>input{width: 5%; height: 70%; border: none; background-color: #f4f4f4;}
.content.s#u>#um>.photo>div>.list>input.u{outline: solid #f4f4f4; height: 100%; font-weight: 500; box-shadow: 0 0 0 0.3vmin  #0c0c0c inset;}
.content.s#u>#um>.photo>div>.list>input:hover{width: 5%; height: 100%; cursor: pointer; font-weight: 500;}

.content.s#u>#um>.info{width: 100%; height: auto; display: flex; flex-wrap: wrap;background-color: #0c0c0c;}
.content.s#u>#um>.info>.block{width: 50%; height: auto; color: #f4f4f4; padding-top: 0.3vh; padding-bottom: 0.3vh; text-align: center;}

.content.s#u>#um>.contact{width: 100%; height: auto; display: flex; border-top: 0.3vmin solid #f4f4f4; border-bottom: 0.3vmin solid #f4f4f4;}
.content.s#u>#um>.contact>.block{width: 25%; height: auto; background-color: #0c0c0c; border-right: 0.3vmin solid #f4f4f4; display: flex; flex-direction: column;}
.content.s#u>#um>.contact>.block:last-child{border: none;}
.content.s#u>#um>.contact>.block>.title{width: 100%; min-height: 5vmin;background-color: #366ce1;display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.title>svg{width: 100%; height: 4vmin;}
.content.s#u>#um>.contact>.block>.body{width: 100%; height: 100%;display: flex;justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.body>img{height: 90%;}
.content.s#u>#um>.contact>.block>.body>svg{height: 15vmin ; width: 15vmin; display: block;}
.content.s#u>#um>.contact>.block>.action{width: 100%; min-height: 5vmin; background-color: #f4f4f4;display: flex;justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.action>.move{display: flex; width: 80%; height: 100%;}
.content.s#u>#um>.contact>.block>.action>.move>div.button{width: 10%; height: 100%; border: none; background-color: #0c0c0c; color: #f4f4f4; font-weight: 300; display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input{border: none; outline: none; background-color: #0c0c0c; color: #f4f4f4; font-weight: 400; text-align: center;}
.content.s#u>#um>.contact>.block>.action>.move>div.button:hover{font-weight: 600; cursor: pointer;}
.content.s#u>#um>.contact>.block>.action>.move>div.c{width: 100%; height: 100%; display: flex; flex-direction: column;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input{width: 100%; height: 45%; font-size: 1.2vmax; text-indent: 1vmin; z-index: 4;} 
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]{height: 10%; z-index: 5;}
.content.s#u>#um>.contact>.block>.action>.remove{display: flex; justify-content: space-around; align-items: center; width: 20%; height: 100%;}
.content.s#u>#um>.contact>.block>.action>.remove>label{width:100%; height: 100%;display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.action>.remove>label:hover>svg{height: 80%; cursor: pointer;}
.content.s#u>#um>.contact>.block>.action>.remove>label>svg{height: 90%; width: 100%;}
.content.s#u>#um>.contact>.block>.action>.remove>input{height: 0; width: 0; opacity: 0;}

#d>.userinfo{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4; }
#d>.userinfo>.data>form>input{ color: #f4f4f4;}
#d>.userinfo>.title{width: 100%; height: auto;padding: 1vmin; font-size: 3vmin; display: flex; justify-content: space-around; align-items: center; font-weight: 500;}
#d>.userinfo>.data{padding: 1vmin;}
#d>.userinfo>.data>form{width: 100%; display: flex; align-items: center;}
#d>.userinfo>.data>form>input{width: auto; border: none; background-color: transparent; text-align: left; margin-left: 1vmin;}
.space>div>.titleson{justify-content: space-between; text-indent: 1vmin;}
.space>div>.titleson>button{height: 100%; width: auto; display: flex; flex-direction: row-reverse; align-items: center; justify-content: center; background-color: transparent; border: none; color: transparent; cursor: pointer;}
.space>div>.titleson>button:hover{color: #f4f4f4;}
.space>div>.titleson>button>svg{width: 4vmin; height: 4vmin; margin: 1vmin;}
#photo{background-color: #0c0c0c;}
#photo>.change{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4;display: flex;}
#photo>.add{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4;display: flex;}
#photo>.change>form{width: 50%; height: auto; display: flex; justify-content: space-around; align-items: center;flex-wrap: wrap;} 
#photo>.change>form>label>input[type="checkbox"]{width: 5vmin; height: 5vmin; cursor: pointer;}
#photo>.change>form>label{width: 15vmin; height: 15vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#photo>.change>form>label>.photo{width: 8vmin; height: 8vmin; background-repeat: no-repeat; background-size: contain; background-position: center; cursor: pointer; margin: 1vmin;}
#photo>.change>form>label>input[type="checkbox"]:checked ~ .photo{box-shadow: 0 0 0 0.5vmin #366ce1 inset;}
#photo>.change>form>input[type="submit"]{width: 100%; margin: 5%; cursor: pointer;}
#photo>.add>form{width: 50%; height: auto; display: flex; justify-content: space-around; align-items: center;flex-direction: column;}
#photo>.add>form>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 15vmin; height: 15vmin;}
#photo>.add>form>input[type="submit"]{width: 90%; margin: 5%; cursor: pointer;}
#contacts{background-color: #0c0c0c;}
#contacts>div>.change{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4;display: flex; justify-content: space-around; flex-direction: column; align-items: center;} 
#contacts>div>.add{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4;display: flex;}
#contacts>div>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#contacts>div>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#contacts>div>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#contacts>div>.change>div{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#contacts>div>.change>div>input{width: 90%; }
#contacts>div>.change>div>div>img{width: auto ; height: 10vmin;}
#contacts>div>.add{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#contacts>div>.add>input{width: 90%;}
#contacts>div>.add>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 10vmin;}

#ceducation,#cwork,#cskill,#cportfolio{background-color: #0c0c0c; color: #f4f4f4;}
#ceducation>.change>div{display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#ceducation>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#ceducation>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#ceducation>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#ceducation>.change>.roll>label>.type{width: 5vmin; height: 5vmin; background-position: center; background-repeat: no-repeat; background-size: 80%; background-color: #f4f4f4;}
#ceducation>.change>div>input{width: 90%; }
#ceducation>.change>div>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#ceducation>.change>div>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#ceducation>.change>div>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#ceducation>.change>div>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#ceducation>.change>div>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#ceducation>.change>div>.type>label>.text{font-size: 1.5vmin;}
#ceducation>.change>div>div>img{width: auto ; height: 10vmin;}
#ceducation>.add{display: flex; flex-direction: column; align-items: center; justify-content: space-around;}
#ceducation>.add>div{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#ceducation>.add>.title,#ceducation>.add>.start,#ceducation>.add>.end,#ceducation>.add>.file{width: 100%;}
#ceducation>.add>div>input{width: 90%;}
#ceducation>.add>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#ceducation>.add>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#ceducation>.add>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#ceducation>.add>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#ceducation>.add>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#ceducation>.add>.type>label>.text{font-size: 1.5vmin;}
#ceducation>.add>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 10vmin;}

#cwork>.change>div{display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cwork>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#cwork>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#cwork>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#cwork>.change>.roll>label>.type{min-width: 5vmin; height: 5vmin; background-position: center; background-repeat: no-repeat; background-size: 80%; background-color: #f4f4f4;}
#cwork>.change>div>input{width: 90%; }
#cwork>.change>div>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cwork>.change>div>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cwork>.change>div>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cwork>.change>div>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cwork>.change>div>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cwork>.change>div>.type>label>.text{font-size: 1.5vmin;}
#cwork>.change>div>div>img{width: auto; height: 10vmin;}
#cwork>.add{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#cwork>.add>input{width: 90%;}
#cwork>.add>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cwork>.add>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cwork>.add>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cwork>.add>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cwork>.add>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cwork>.add>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 10vmin;}
#cwork>.add>.type>label>.text{font-size: 1.5vmin;}

#cskill>.change>div{display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#cskill>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#cskill>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#cskill>.change>.roll>label>.type{width: 5vmin; height: 5vmin; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f4f4f4;}
#cskill>.change>div>input{width: 90%; }
#cskill>.change>div>div>img{width: auto ; height: 10vmin;}
#cskill>.change>div>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cskill>.change>div>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.change>div>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cskill>.change>div>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cskill>.change>div>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cskill>.change>div>.type>label>.text{font-size: 1.5vmin;}
#cskill>.change>div>.etype{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cskill>.change>div>.etype>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.change>div>.etype>label>input{width: 1.5vmin; height: 1.5vmin;}
#cskill>.change>div>.etype>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cskill>.change>div>.etype>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cskill>.change>div>.etype>label>.text{font-size: 1.5vmin;}
#cskill>.change>div>input[type="submit"]{width: 90%; margin: 1%; cursor: pointer;}
#cskill>.add{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#cskill>.add>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cskill>.add>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.add>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cskill>.add>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cskill>.add>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cskill>.add>.type>label>.text{font-size: 1.5vmin;}
#cskill>.add>.etype{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cskill>.add>.etype>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.add>.etype>label>input{width: 1.5vmin; height: 1.5vmin;}
#cskill>.add>.etype>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cskill>.add>.etype>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cskill>.add>.etype>label>.text{font-size: 1.5vmin;}
#cskill>.add>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 10vmin;}
#cskill>.add>input{width: 90%;}

#cportfolio>.change>div{display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cportfolio>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#cportfolio>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#cportfolio>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#cportfolio>.change>.roll>label>.type{width: 5vmin; height: 5vmin; background-position: center; background-repeat: no-repeat;  background-size: 80%; background-color: #f4f4f4;}
#cportfolio>.change>div>input{width: 90%; }
#cportfolio>.change>div>textarea{width: 90%; resize: vertical; min-height: 10vmin;}
#cportfolio>.change>div>div>img{width: 10vmin ; height: 10vmin;}
#cportfolio>.change>div>input[type="submit"]{width: 90%; margin: 1%; cursor: pointer;}
#cportfolio>.add>div{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#cportfolio>.add>div>input{width: 90%;}
#cportfolio>.add>div>textarea{width: 90%; resize: vertical; min-height: 10vmin;}
#cportfolio>.add>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cportfolio>.add>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cportfolio>.add>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cportfolio>.add>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cportfolio>.add>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cportfolio>.add>.type>label>.text{font-size: 1.5vmin;}
#cportfolio>.add>div>div>img{width: auto ; height: 10vmin;}

.titleson{width: 100%; height: 5vmin; background-color: #0c0c0c; color: #f4f4f4; border-top: 0.3vmin solid #f4f4f4; display: flex; justify-content: space-around; align-items: center; font-weight: 500;}
#edulist{width: 100%; height: auto; display: flex; flex-direction: column;}
#edulist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; align-items: center; justify-content: space-between;}
#edulist>.item>.left{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around; background-position: center; background-size: contain; background-repeat: no-repeat; }
#edulist>.item>.mid{width: 100%; height: 15vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#edulist>.item>.mid>.top{width: 100%; height: 5vmin;text-align: center;}
#edulist>.item>.mid>.bottom{width: 100%; height: 100%;display: flex; align-items: center; justify-content: space-around;}
#edulist>.item>.mid>.bottom>.line{width: 90%; height: 8vmin;display: flex; justify-content: space-around; align-items: center;}
#edulist>.item>.mid>.bottom>.line>div{display: flex;height: 3vmin;  align-items: center; justify-content: space-around;}
#edulist>.item>.mid>.bottom>.line>.empty{background-color: #0c0c0c; color: #f4f4f4;}
#edulist>.item>.mid>.bottom>.line>.empty:last-child{border-bottom-right-radius: 50%;border-top-right-radius: 50%;}
#edulist>.item>.mid>.bottom>.line>.empty:first-child{border-bottom-left-radius: 50%;border-top-left-radius: 50%;}
#edulist>.item>.mid>.bottom>.line>.fill{background-color: #366ce1; color: #eadc36;}
#edulist>.item>.right{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around;}
#edulist>.item>.right>svg{width: 100%; height: 100%;}
#edulist>.item>.right>a{width: 100%; height: 100%;background-position: center; background-size: contain; background-repeat: no-repeat;}
#worlist{width: 100%; height: auto; display: flex; flex-direction: column;}
#worlist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.3vmin; padding-bottom: 0.3vmin; flex-direction: column;}
#worlist>.item>.title{width: 100%; height: auto; text-align: center; border-top: 0.3vmin solid #0c0c0c; color: #0c0c0c; margin-bottom: 0.2vmin; padding-bottom: 0.1vmin;}
#worlist>.item:first-child>.title{border: none;}
#worlist>.item>.content{width: 100%; height: 100%;display: flex; justify-content: space-between; align-items: center;}
#worlist>.item>.content>.logo{width: 12vmin; height: 8vmin; background-repeat: no-repeat; background-position: center;}
#worlist>.item>.content>.set{width: 80%; height: 12vmin;}
#worlist>.item>.content>.set>.timeline{width: 100%; height: 8vmin;display: flex;justify-content: space-between; align-items: center;}
#worlist>.item>.content>.set>.timeline>div{height: 3vmin;display: flex;justify-content: space-between; align-items: center;}
#worlist>.item>.content>.set>.timeline>.empty{background-color: #0c0c0c; color: #f4f4f4;}
#worlist>.item>.content>.set>.timeline>.empty:last-child{border-bottom-right-radius: 50%;border-top-right-radius: 50%;}
#worlist>.item>.content>.set>.timeline>.empty:first-child{border-bottom-left-radius: 50%;border-top-left-radius: 50%;}
#worlist>.item>.content>.set>.timeline>.fill{background-color: #366ce1; color: #eadc36;}
#worlist>.item>.content>.set>.value{width: 100%; height: 50%;display: flex;justify-content: space-between; align-items: center;}
#skilist{width: 100%; height: auto; display: flex; flex-direction: column;}
#skilist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; flex-direction: row;justify-content: space-between; align-items: center; }
#skilist>.item>.logo{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around; background-position: center; background-size: contain; background-repeat: no-repeat;}
#skilist>.item>.value{width: 15vmin; height: 15vmin; display: flex; align-items: center; justify-content: space-around; flex-direction: column;}
#skilist>.item>.value>div{width: 100%; height: 50%;display: flex; justify-content: space-around; align-items: center;}
#skilist>.item>.value>div:first-child{align-items: flex-end;}
#skilist>.item>.value>div:last-child{align-items: flex-start;}
#skilist>.item>.line{width: 70%; height: 7vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#skilist>.item>.line>.fill{width: 100%; height: 15vmin; background-color: #366ce1;display: flex;}
#skilist>.item>.line>.fill>.selection{height: 100%;}
#porlist{width: 100%; height: auto; display: flex; flex-direction: column;}
#porlist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; flex-direction: row;justify-content: space-between; align-items: center; margin-bottom: 1vmin;}
#porlist>.item>.logo{width: 15vmin; height: 10vmin; background-size: contain; background-repeat: no-repeat; background-position: center;}
#porlist>.item>form{width: 80%; height: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center;}
#porlist>.item>form>.action{height: 10vmin; width: 15vmin;display: flex; flex-direction: column;justify-content: space-between; align-items: center;}
#porlist>.item>form>.action>input{height: 5vmin; width: 100%; display: flex; justify-content: space-around;align-items: center;background-color: #0c0c0c; color: #f4f4f4; border: none;margin: 0.3vmin;}
#porlist>.item>form>.action>input:hover{font-weight: 500; outline: solid #0c0c0c; box-shadow: 0 0 0 0.3vmin  #f4f4f4 inset; cursor: pointer;}
#porlist>.item>form>input{height: 5vmin; width: 90%; border: none;}
#porlist>.item>form>input:first-child{opacity: 0; cursor: default;width: 10%;}

.function{display: flex; justify-content: space-around; align-items: center; width: 8vw; height: 8vw; left: 46vw; top: 0; position: fixed;}
.function>button{width: 100%; height: 100%; cursor: pointer;}
.function>button>.title{color: transparent;}
.contents#um>.function>button>.logo{padding: 1vmin;}
.contents#ul>.function>button>.logo>svg{width: 100%; height: 100%;}
.contents>.function>button:hover>.title{color: #f4f4f4;}

.tit{width: 100%; height: auto; text-align: center;}
.maintitle{width: 100%; background-color: #0c0c0c; display: flex; justify-content: space-around; align-items: center; height: 5vmin;padding-bottom: 2vmin;margin-top: 1vmin; color: #f4f4f4;border-top: 0.1vmin solid #366ce1;}
input[value="Add"]{width: 90%; margin: 1vmin; cursor: pointer;}
input[value="Remove"]{width: 90%; margin: 1vmin; cursor: pointer;}
input[value="Change"]{width: 90%; margin: 1vmin; cursor: pointer;}
input[value="Delete"]{width: 90%; margin: 1vmin; cursor: pointer;}
.fortitle{width: 100%; height: 5vmin; background-color: #0c0c0c; color: #f4f4f4; display: flex; justify-content: space-around; align-items: center; font-weight: 500; border-top: 0.1vmin solid #f4f4f4;}
.titleson{width: 100%; height: 5vmin; background-color: #0c0c0c; color: #f4f4f4; border-top: 0.3vmin solid #f4f4f4; display: flex; justify-content: space-around; align-items: center; font-weight: 500;}
input:focus{outline: solid #f4f4f4; box-shadow: 0 0 0 0.3vmin  #0c0c0c inset;}
#h1,#h2,#h3{fill: transparent;transition: 1s;}#h0{transition: 1s;}
.a1{fill:#366ce1;}.b1{fill:#4d4d4d;}.c1{fill:#0c0c0c;}.d1{fill:#212121;}.e{fill:#eadc36;}.f{opacity:0.15;}
</style>
</head>
<body onload="loadContent();">
<div class="functions">
<div class="top">
<div class="type" onclick="changeType();">
<div class="option s" id="userpage">
<div class="logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Profile</title><circle class="a" cx="170.079" cy="170.079" r="170.079"/><path class="b" d="M275.519,303.527a170.07,170.07,0,0,1-210.88,0A105.474,105.474,0,0,1,140.5,203.308a65.2,65.2,0,1,1,59.16,0A105.474,105.474,0,0,1,275.519,303.527Z"/></svg></div>
<div class="title">User</div>
<div class="selection"></div>
</div>
<div class="option" id="developerpage">
<div class="logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Developer</title><circle class="a" cx="170" cy="170" r="170"/><path class="b" d="M295,170.111c-30-33.333-55-66.666-85-100h40c30.052,33.36,55.105,66.719,85.157,100.079C305.105,203.5,280.052,236.8,250,270.111H210C240,236.778,265,203.445,295,170.111Z"/><path class="b" d="M207.935,4.222q-22.216,167.9-44.451,335.81a169.964,169.964,0,0,1-32.459-4.39q21.523-167.8,43.04-335.6A170.114,170.114,0,0,1,207.935,4.222Z"/><path class="b" d="M45.157,170.111c30,33.334,55,66.667,85,100h-40C60.105,236.752,35.052,203.392,5,170.032c30.052-33.307,55.105-66.614,85.157-99.921h40C100.157,103.445,75.157,136.778,45.157,170.111Z"/></svg></div>
<div class="title">Developer</div>
<div class="selection"></div>
</div>
</div>
</div>
<!-- <div class="left"></div>
<div class="right"></div> -->
</div>
<div class="content" id="d">
<form class="function" action="" method="POST"><button name="quitaccount"><div class="logo">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="b" y="295.39" width="0.53" height="44.61"/><rect class="b" x="340" y="295.39" width="0.53" height="44.61"/><path class="b" d="M340,191.775V340H.53V191.775A22.3,22.3,0,0,1,22.835,169.47h0A22.3,22.3,0,0,1,45.14,191.775V295.39H295.92V191.775a22.3,22.3,0,0,1,22.305-22.305h0A22.3,22.3,0,0,1,340,191.775Z"/><path class="b" d="M245.4,106.42a22.3,22.3,0,0,1-31.54,0L192.99,85.55v97.62a42.915,42.915,0,0,1-22.42,79.48h-.04a42.916,42.916,0,0,1-22.15-79.67V85.24L127.2,106.42A22.306,22.306,0,0,1,95.65,74.88L170.53,0l74.88,74.88A22.292,22.292,0,0,1,245.4,106.42Z"/></svg></div><div class="title">Quit from account</div></button></form>
<div class="userinfo">
<div class="title">User information</div>
<div class="data">
<form action="#"><label>ID: </label><input type="number" id="userid" readonly></form>
<form action="#"><label>Name: </label><input type="text" name="name" id="username" readonly></form>
<form action="#"><label>Middle name: </label><input type="text" name="username" id="usermidname" readonly></form>
<form action="#"><label>Surname: </label><input type="text" name="usersurname" id="usersurname" readonly></form>
<form action="#"><label>Birthtime: </label><input type="text" name="userbithtime" id="userbirthtime" readonly></form>
<form action="#"><label>Birthplace: </label><input type="text" name="userbirthplace" id="userbirthplace" readonly></form>
</div>
</div>
<div class="space">
<div id="photo"><div class="titleson">Photo<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<div class="change">
<form action="i/lremove.php" method="POST" class="left">
</form>
<form action="i/rremove.php" method="POST" class="right">
</form>
</div>
<div class="maintitle">Add</div>
<div class="add">
<form action="i/ladd.php" method="POST" class="left" enctype="multipart/form-data">
<div id="addedpl"></div>
<input type="file" name="leftfile" id="addpl" accept="image/jpeg" onchange="fileImage();" required>
<input type="submit" value="Add">
</form>
<form action="i/radd.php" method="POST" class="right" enctype="multipart/form-data">
<div id="addedpr"></div>
<input type="file" name="rightfile" id="addpr" accept="image/jpeg" onchange="fileImage();" required>
<input type="submit" value="Add">
</form>
</div>
</div>
<div id="contacts"><div class="titleson">Contact<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="account">
<div class="fortitle">Account</div>
<div class="maintitle">Change</div>
<form action="c/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="roll">
</div>
<div id="changeaccount"></div>
</form>
<div class="maintitle">Add</div>
<form action="c/aadd.php" method="POST" class="add"  enctype="multipart/form-data">
<div class="tit">Name</div>
<input type="text" name="addname" id="addan" minlength="4" maxlength="123" placeholder="min - 4, max-123" required >
<div class="tit">Hyperlink</div>
<input type="url" name="addurl" id="addau" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Logotype</div>
<input type="file" name="addlogo" id="addal" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedal"></div>
<input type="submit" value="Add">
</form>
</div>
<div class="email">
<div class="fortitle">Email</div>
<div class="maintitle">Change</div>
<form action="c/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="roll">
</div>
<div id="changeemail"></div>
</form>
<div class="maintitle">Add</div>
<form action="c/eadd.php" method="POST" class="add"  enctype="multipart/form-data">
<div class="tit">Name</div>
<input type="text" name="addname" id="adden" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">E-mail</div>
<input type="email" name="addurl" id="addeu" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Logotype</div>
<input type="file" name="addlogo" id="addel" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedel"></div>
<input type="submit" value="Add">
</form>
</div>
<div class="location">
<div class="fortitle">Location</div>
<div class="maintitle">Change</div>
<form action="c/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="roll">
</div>
<div id="changelocation"></div>
</form>
<div class="maintitle">Add</div>
<form action="c/ladd.php" method="POST" class="add"  enctype="multipart/form-data">
<div class="tit">Name</div>
<input type="text" name="addname" id="addln" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Location</div>
<input type="text" name="addurl" id="addlu" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Logotype</div>
<input type="file" name="addlogo" id="addll" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedll"></div>
<input type="submit" value="Add">
</form>
</div>
<div class="phone">
<div class="fortitle">Phone</div>
<div class="maintitle">Change</div>
<form action="c/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="roll">
</div>
<div id="changephone"></div>
</form>
<div class="maintitle">Add</div>
<form action="c/padd.php" method="POST" class="add" enctype="multipart/form-data">
<div class="tit">Name</div>
<input type="text" name="addname" id="addpn" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Phone</div>
<input type="tel" name="addurl" id="addpu" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Logotype</div>
<input type="file" name="addlogo" id="addpl" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedpl"></div>
<input type="submit" value="Add">
</form>
</div>
</div>
<div id="ceducation"><div class="titleson">Education<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<form action="e/change.php" method="POST" class="change">
<div class="tit">List</div>
<div class="roll">
</div>
<div id="changeeducation"></div>
</form>
<div class="maintitle">Add</div>
<form action="e/add.php" method="POST" class="add">
<div class="type"><div class="tit">Type</div>
<label for="addt1e"><input type="radio" name="addtype" id="addt1e" value="1" required><div class="type" style="background-image:url(file/institute.svg)"></div><div class="text">Institute</div></label>
<label for="addt2e"><input type="radio" name="addtype" id="addt2e" value="2"><div class="type" style="background-image:url(file/course.svg)"></div><div class="text">Course</div></label>
<label for="addt3e"><input type="radio" name="addtype" id="addt3e" value="3"><div class="type" style="background-image:url(file/profile.svg)"></div><div class="text">Profile</div></label>
</div>
<div class="title"><div class="tit">Title</div><input type="text" name="addtitle" id="addt" minlength="4" maxlength="123" placeholder="min - 4, max-123" required></div>
<div class="start"><div class="tit">Start date</div><input type="date" name="addstart" id="adds" required></div>
<div class="end"><div class="tit">End date</div><input type="date" name="addend" id="adde" required></div>
<div class="file"><div class="tit">File</div><input type="file" name="addfile" id="addf" onchange="fileDocument();" required></div>
<input type="submit" value="Add">
</form>
</div>
<div id="cwork"><div class="titleson">Work<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<form action="w/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="tit">List</div>
<div class="roll">
</div>
<div id="changework">
</div>
</form>
<div class="maintitle">Add</div>
<form action="w/add.php" method="POST" class="add" enctype="multipart/form-data">
<div class="tit">Type</div>
<div class="type">
<label for="addt1w"><input type="radio" name="addtype" id="addt1w" value="1" required><div class="type"  style="background-image:url(file/official.svg);"></div><div class="text">Official</div></label>
<label for="addt2w"><input type="radio" name="addtype" id="addt2w" value="2"><div class="type"  style="background-image:url(file/unofficial.svg);"></div><div class="text">Unofficial</div></label>
<label for="addt3w"><input type="radio" name="addtype" id="addt3w" value="3"><div class="type"  style="background-image:url(file/parttime.svg);"></div><div class="text">Part-time</div></label>
</div>
<div class="tit">Title</div>
<input type="text" name="addtitle" id="addwti" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Start</div>
<input type="date" name="addstart" id="addwst" required>
<div class="tit">End</div>
<input type="date" name="addend" id="addwen" required>
<div class="tit">Position</div>
<input type="text" name="addposition" id="addwpo" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Salary</div>
<input type="number" name="addsalary" id="addwsa" min="0" max="999999999" placeholder="$" required>
<input type="submit" value="Add">
</form>
</div>
<div id="cskill"><div class="titleson">Skill<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<form action="s/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="tit">List</div>
<div class="roll">
</div>
<div id="changeskill">
</div>
</form>
<div class="maintitle">Add</div>
<form action="s/add.php" method="POST" class="add" enctype="multipart/form-data">
<div class="tit">Type</div>
<div class="type">
<label for="addt1s"><input type="radio" name="addtype" id="addt1s" value="1" required><div class="type" style="background-image:url(file/object.svg);"></div><div class="text">Object</div></label>
<label for="addt2s"><input type="radio" name="addtype" id="addt2s" value="2"><div class="type" style="background-image:url(file/relate.svg);"></div><div class="text">Relate</div></label>
<label for="addt3s"><input type="radio" name="addtype" id="addt3s" value="3"><div class="type" style="background-image:url(file/environment.svg);"></div><div class="text">Environment</div></label>
</div>
<div class="tit">Title</div>
<input type="text" name="addtitle" id="addsti" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">E-Type</div>
<div class="etype">
<label for="adde1s"><input type="radio" name="addetype" id="adde1s" value="1" required><div class="type" style="background-image:url(file/text.svg);"></div><div class="text">Text</div></label>
<label for="adde2s"><input type="radio" name="addetype" id="adde2s" value="2"><div class="type" style="background-image:url(file/document.svg);"></div><div class="text">Document</div></label>
<label for="adde3s"><input type="radio" name="addetype" id="adde3s" value="3"><div class="type" style="background-image:url(file/video.svg);"></div><div class="text">Video</div></label>
<label for="adde4s"><input type="radio" name="addetype" id="adde4s" value="4"><div class="type" style="background-image:url(file/photo.svg);"></div><div class="text">Photo</div></label>
<label for="adde5s"><input type="radio" name="addetype" id="adde5s" value="5"><div class="type" style="background-image:url(file/music.svg);"></div><div class="text">Music</div></label>
</div>
<div class="tit">Skill</div>
<input type="number" name="addskill" id="addssk" min="1" max="100" placeholder="%" required>
<div class="tit">Time</div>
<input type="number" name="addtime" id="addstime" min="1" placeholder="hours" required>
<div class="tit">Logo</div>
<input type="file" name="addlogo" id="addslo" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedslo"></div>
<input type="submit" value="Add">
</form>
</div>
<div id="cportfolio"><div class="titleson">Portfolio<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<form action="p/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="tit">List</div>
<div class="roll">
</div>
<div id="changeportfolio"></div>
</form>
<div class="maintitle">Add</div>
<form action="p/add.php" method="POST" class="add" enctype="multipart/form-data">
<div class="tit">Type</div>
<div class="type">
<label for="addt1p"><input type="radio" name="addtype" id="addt1p" value="1" required onchange="addPortFile()"><div class="type" style="background-image:url(file/text.svg);"></div><div class="text">Text</div></label>
<label for="addt2p"><input type="radio" name="addtype" id="addt2p" value="2" onchange="addPortFile()"><div class="type" style="background-image:url(file/document.svg);"></div><div class="text">Document</div></label>
<label for="addt3p"><input type="radio" name="addtype" id="addt3p" value="3" onchange="addPortFile()"><div class="type" style="background-image:url(file/video.svg);"></div><div class="text">Video</div></label>
<label for="addt4p"><input type="radio" name="addtype" id="addt4p" value="4" onchange="addPortFile()"><div class="type" style="background-image:url(file/photo.svg);"></div><div class="text">Photo</div></label>
<label for="addt5p"><input type="radio" name="addtype" id="addt5p" value="5" onchange="addPortFile()"><div class="type" style="background-image:url(file/music.svg);"></div><div class="text">Music</div></label>
</div>
<div id="addportfolio">

</div>
</form>
</div>
</div>
</div>
</div>
<div class="content s" id="u">
<div class="downpick" onclick="changeSign();"><div class="button o">You</div><div class="button">Me</div></div>
<div id="ul" class="contents o">
<form method="POST" class="function"><button name="reloadselected"><div class="logo">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 171.63"><path class="b" d="M86.56,163.03a10.4,10.4,0,0,1-.22-2.18,10.639,10.639,0,0,1,.12-1.59c.03-.21.06-.41.1-.62.04.21.07.42.1.63A10.51,10.51,0,0,1,86.56,163.03Z"/><path class="b" d="M340.16,85.83v85.8H267.07a10.759,10.759,0,0,1-10.73-10.74v-.04a10.639,10.639,0,0,1,.12-1.59C262.47,118.33,297.82,86.41,340.16,85.83Z"/><path class="b" d="M340.16.01v85.8a42.916,42.916,0,0,1,0-85.8Z"/><path class="b" d="M86.34,160.85a10.4,10.4,0,0,0,.22,2.18v.01a10.768,10.768,0,0,1-8.93,8.47,10.408,10.408,0,0,1-1.58.12H0V85.84c.59-.01,1.18-.02,1.78-.02h.04c42.62.02,78.41,31.82,84.74,72.82-.04.21-.07.41-.1.62A10.639,10.639,0,0,0,86.34,160.85Z"/><path class="b" d="M44.69,42.91A42.906,42.906,0,0,1,1.82,85.82H1.78c-.6,0-1.19-.01-1.78-.04V.04C.59.01,1.18,0,1.78,0A42.908,42.908,0,0,1,44.69,42.91Z"/><path class="b" d="M1.78,85.82c-.6,0-1.19.01-1.78.02v-.06C.59,85.81,1.18,85.82,1.78,85.82Z"/><path class="b" d="M256.34,160.85v.04a10.759,10.759,0,0,1-9.15,10.62,10.408,10.408,0,0,1-1.58.12H97.07a10.756,10.756,0,0,1-10.51-8.59v-.01a10.51,10.51,0,0,0,.1-3.76c-.03-.21-.06-.42-.1-.63,6.33-41.01,42.14-72.82,84.78-72.82h.04c42.85.02,78.78,32.15,84.84,73.45A10.708,10.708,0,0,1,256.34,160.85Z"/><path class="b" d="M86.46,159.26c.03-.21.06-.41.1-.62.04.21.07.42.1.63a10.51,10.51,0,0,1-.1,3.76,10.4,10.4,0,0,1-.22-2.18A10.639,10.639,0,0,1,86.46,159.26Z"/><path class="b" d="M214.25,42.91a42.906,42.906,0,0,1-42.87,42.91h-.04a42.91,42.91,0,1,1,42.91-42.91Z"/></svg></div><div class="title">Back to users</div></button></form>
<script>
</script>
<div class="photo">
<div class="left">
<div class="image"><img src="" id="ulpl"></div>
<div class="list"></div>
</div>
<div class="right">
<div class="image"><img src="" id="ulpr"></div>
<div class="list"></div>
</div>
</div>
<div class="info"></div>
<div class="contact">
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Profile</title><path class="b" d="M317.205,340H22.955A21.308,21.308,0,0,1,1.941,315.494C13.952,233.638,85.225,169.96,170.16,170c84.875.04,156.058,63.7,168.06,145.5A21.308,21.308,0,0,1,317.205,340Z"/><circle class="b" cx="170.079" cy="85" r="85"/></svg></div>
<div class="body"></div>
<form class="action" action="#" method="POST"><div class="move"><div class="button" id="selectedcountal"><</div><div class="c"><a></a><input class="roll" type="range" id="selectedscrolla" step="1" value="1" min="1"><input type="text" name="selectedcount" id="selectedcounta" readonly></div><div class="button" id="selectedcountar">></div></div><div class="remove"><label for="selecteddeletea">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="selecteddeletea"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><path class="b" d="M269.7,162.18c-.146-1.9-.4-4.519-.881-7.612a114.18,114.18,0,0,0-3.529-14.978,100.038,100.038,0,1,0-27.44,103.86,55.506,55.506,0,0,0,21.96,20.59A55.08,55.08,0,0,0,339.94,220c.15-1.62.22-3.26.22-4.92v-45A170.08,170.08,0,1,0,170.08,340.16a20.08,20.08,0,0,0,0-40.16A129.92,129.92,0,1,1,299.75,161.98a2.335,2.335,0,0,1,.25.07V215a15,15,0,0,1-14.61,14.99c-.13.01-.26.01-.39.01a15.015,15.015,0,0,1-14.84-12.8A17.1,17.1,0,0,1,270,215a14.673,14.673,0,0,1,.16-2.2C270.347,211.5,270.279,198.17,269.7,162.18ZM170,230a60,60,0,1,1,60-60A60,60,0,0,1,170,230Z"/></svg></div>
<div class="body"></div>
<form class="action" action="#" method="POST"><div class="move"><div class="button" id="selectedcountml"><</div><div class="c"><a></a><input class="roll" type="range" id="selectedscrollm" step="1" value="1" min="1"><input type="text" name="selectedcount" id="selectedcountm" readonly></div><div class="button" id="selectedcountmr">></div></div><div class="remove"><label for="selecteddeletem">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="selecteddeletem"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.157 340"><path class="b" d="M3.443,96.473,142.822,326.016c11.193,18.434,43.138,18.439,54.34.008q69.774-114.8,139.547-229.607C351.9,71.427,313.454,47.853,288.731,67L190.8,142.822c-11.7,9.058-29.938,9.055-41.632-.008L51.437,67.069C26.723,47.916-11.734,71.478,3.443,96.473Z"/><circle class="b" cx="170.079" cy="65.079" r="65.079"/></svg></div>
<div class="body"></div>
<form class="action" action="#" method="POST"><div class="move"><div class="button" id="selectedcountll"><</div><div class="c"><a></a><input class="roll" type="range" id="selectedscrolll" step="1" value="1" min="1"><input type="text" name="selectedcount" id="selectedcountl" readonly></div><div class="button" id="selectedcountlr">></div></div><div class="remove"><label for="selecteddeletel">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="selecteddeletel"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 339.97 339.97"><path class="b" d="M339.606,60.291a21.835,21.835,0,0,1-5.149,17.249,245.444,245.444,0,0,1-34.432,32.485,244.761,244.761,0,0,1-41.276,25.884,21.607,21.607,0,0,1-18.878.166,72.091,72.091,0,0,1-29.846-26.05c-.113-.176-.225-.353-.336-.529a21.856,21.856,0,0,0-33.375-4.525q-18,16.692-36.289,35.054-18.291,18.4-34.883,36.533a21.884,21.884,0,0,0,4.607,33.291l.276.176a72.091,72.091,0,0,1,26.05,29.846,21.607,21.607,0,0,1-.166,18.878,244.761,244.761,0,0,1-25.884,41.276A245.444,245.444,0,0,1,77.54,334.457a21.835,21.835,0,0,1-17.249,5.149,69.344,69.344,0,0,1-40.266-19.581c-20.47-20.54-20.13-46.23-20-50.55l.45-.45A533.114,533.114,0,0,1,269.025.475l.45-.45c4.32-.13,30.01-.47,50.55,20A69.344,69.344,0,0,1,339.606,60.291Z"/></svg></div>
<div class="body"></div>
<form class="action" action="#" method="POST"><div class="move"><div class="button" id="selectedcountpl"><</div><div class="c"><a></a><input class="roll" type="range" id="selectedscrollp" step="1" value="1" min="1"><input type="text" name="selectedcount" id="selectedcountp" readonly></div><div class="button" id="selectedcountpr">></div></div><div class="remove"><label for="selecteddeletep">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="selecteddeletep"></div></form>
</div>
</div>
<div class="education">
<div class="titleson">Education</div>
<div class="list" id="selectededustate"><div id="selectededulist" class="content"></div></div>
</div>
<div class="work">
<div class="titleson">Work</div>
<div class="list" id="selectedworstate"><div id="selectedworlist" class="content"></div></div>
</div>
<div class="skill">
<div class="titleson">Skill</div>
<div class="list" id="selectedskistate"><div id="selectedskilist" class="content"></div></div>
</div>
<div class="portfolio">
<div class="titleson">Portfolio</div>
<div class="list" id="selectedporstate"><div id="selectedporlist" class="content">
</div></div>
</div>
</div>
<div id="um" class="contents">
<form class="function" action="" method="POST"><button name="quitaccount"><div class="logo">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 341.06 340"><rect class="b" y="295.39" width="0.53" height="44.61"/><rect class="b" x="340.53" y="295.39" width="0.53" height="44.61"/><path class="b" d="M340.53,191.775V340H.53V191.775A22.3,22.3,0,0,1,22.835,169.47h0A22.3,22.3,0,0,1,45.14,191.775V295.39H295.92V191.775a22.3,22.3,0,0,1,22.305-22.305h0A22.3,22.3,0,0,1,340.53,191.775Z"/><path class="b" d="M245.4,106.42a22.3,22.3,0,0,1-31.54,0L192.99,85.55v97.62a42.915,42.915,0,0,1-22.42,79.48h-.04a42.916,42.916,0,0,1-22.15-79.67V85.24L127.2,106.42A22.306,22.306,0,0,1,95.65,74.88L170.53,0l74.88,74.88A22.292,22.292,0,0,1,245.4,106.42Z"/></svg></div><div class="title">Quit from account</div></button></form>
<div class="photo">
<div class="left">
<div class="image"><img src="" id="umpl"></div>
<div class="list"></div>
</div>
<div class="right">
<div class="image"><img src="" id="umpr"></div>
<div class="list"></div>
</div>
</div>
<div class="info"></div>
<div class="contact">
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Profile</title><path class="b" d="M317.205,340H22.955A21.308,21.308,0,0,1,1.941,315.494C13.952,233.638,85.225,169.96,170.16,170c84.875.04,156.058,63.7,168.06,145.5A21.308,21.308,0,0,1,317.205,340Z"/><circle class="b" cx="170.079" cy="85" r="85"/></svg></div>
<div class="body"></div>
<form class="action" action="#" method="POST"><div class="move"><div class="button" id="countal"><</div><div class="c"><input type="text" name="hyperlink" id="hypera"><input class="roll" type="range" id="scrolla" step="1" value="1" min="1"><input type="text" name="count" id="counta" readonly></div><div class="button" id="countar">></div></div><div class="remove"><label for="deletea">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="deletea"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><path class="b" d="M269.7,162.18c-.146-1.9-.4-4.519-.881-7.612a114.18,114.18,0,0,0-3.529-14.978,100.038,100.038,0,1,0-27.44,103.86,55.506,55.506,0,0,0,21.96,20.59A55.08,55.08,0,0,0,339.94,220c.15-1.62.22-3.26.22-4.92v-45A170.08,170.08,0,1,0,170.08,340.16a20.08,20.08,0,0,0,0-40.16A129.92,129.92,0,1,1,299.75,161.98a2.335,2.335,0,0,1,.25.07V215a15,15,0,0,1-14.61,14.99c-.13.01-.26.01-.39.01a15.015,15.015,0,0,1-14.84-12.8A17.1,17.1,0,0,1,270,215a14.673,14.673,0,0,1,.16-2.2C270.347,211.5,270.279,198.17,269.7,162.18ZM170,230a60,60,0,1,1,60-60A60,60,0,0,1,170,230Z"/></svg></div>
<div class="body"></div>
<form class="action" action="#" method="POST"><div class="move"><div class="button" id="countml"><</div><div class="c"><input type="text" name="hyperlink" id="hyperm"><input class="roll" type="range" id="scrollm" step="1" value="1" min="1"><input type="text" name="count" id="countm" readonly></div><div class="button" id="countmr">></div></div><div class="remove"><label for="deletem">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="deletem"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.157 340"><path class="b" d="M3.443,96.473,142.822,326.016c11.193,18.434,43.138,18.439,54.34.008q69.774-114.8,139.547-229.607C351.9,71.427,313.454,47.853,288.731,67L190.8,142.822c-11.7,9.058-29.938,9.055-41.632-.008L51.437,67.069C26.723,47.916-11.734,71.478,3.443,96.473Z"/><circle class="b" cx="170.079" cy="65.079" r="65.079"/></svg></div>
<div class="body"></div>
<form class="action" action="#" method="POST"><div class="move"><div class="button" id="countll"><</div><div class="c"><input type="text" name="hyperlink" id="hyperl"><input class="roll" type="range" id="scrolll" step="1" value="1" min="1"><input type="text" name="count" id="countl" readonly></div><div class="button" id="countlr">></div></div><div class="remove"><label for="deletel">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="deletel"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 339.97 339.97"><path class="b" d="M339.606,60.291a21.835,21.835,0,0,1-5.149,17.249,245.444,245.444,0,0,1-34.432,32.485,244.761,244.761,0,0,1-41.276,25.884,21.607,21.607,0,0,1-18.878.166,72.091,72.091,0,0,1-29.846-26.05c-.113-.176-.225-.353-.336-.529a21.856,21.856,0,0,0-33.375-4.525q-18,16.692-36.289,35.054-18.291,18.4-34.883,36.533a21.884,21.884,0,0,0,4.607,33.291l.276.176a72.091,72.091,0,0,1,26.05,29.846,21.607,21.607,0,0,1-.166,18.878,244.761,244.761,0,0,1-25.884,41.276A245.444,245.444,0,0,1,77.54,334.457a21.835,21.835,0,0,1-17.249,5.149,69.344,69.344,0,0,1-40.266-19.581c-20.47-20.54-20.13-46.23-20-50.55l.45-.45A533.114,533.114,0,0,1,269.025.475l.45-.45c4.32-.13,30.01-.47,50.55,20A69.344,69.344,0,0,1,339.606,60.291Z"/></svg></div>
<div class="body"></div>
<form class="action" action="#" method="POST"><div class="move"><div class="button" id="countpl"><</div><div class="c"><input type="text" name="hyperlink" id="hyperp"><input class="roll" type="range" id="scrollp" step="1" value="1" min="1"><input type="text" name="count" id="countp" readonly></div><div class="button" id="countpr">></div></div><div class="remove"><label for="deletep">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="deletep"></div></form>
</div>
</div>
<div class="education">
<div class="titleson">Education</div>
<div class="list" id="edustate"><div id="edulist" class="content"></div></div>
</div>
<div class="work">
<div class="titleson">Work</div>
<div class="list" id="worstate"><div id="worlist" class="content"></div></div>
</div>
<div class="skill">
<div class="titleson">Skill</div>
<div class="list" id="skistate"><div id="skilist" class="content"></div></div>
</div>
<div class="portfolio">
<div class="titleson">Portfolio</div>
<div class="list" id="porstate"><div id="porlist" class="content">
</div></div>
</div>
</div>
</div>
</body>
<script>
function fileLogotype(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){
alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')
}else if(file.size/1024/1024<10){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else{file.value='';alert('Uploading error: maximum logotype size - 10MB, this file - '+file.name+' - '+(file.size/1024/1024)+'MB');}
if(el===document.getElementById('addal')){document.getElementById('addedal').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedal').style.height="10vmin"}
if(el===document.getElementById('addel')){document.getElementById('addedel').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedel').style.height="10vmin"}
if(el===document.getElementById('addll')){document.getElementById('addedll').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedll').style.height="10vmin"}
if(el===document.getElementById('addpl')){document.getElementById('addedpl').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedpl').style.height="10vmin"}
if(el===document.getElementById('addslo')){document.getElementById('addedslo').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedslo').style.height="10vmin"}
if(el===document.getElementById('changeslo')){document.getElementById('changedslo').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
if(el===document.getElementById('changeal')){document.getElementById('changedal').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
if(el===document.getElementById('changeel')){document.getElementById('changedel').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
if(el===document.getElementById('changell')){document.getElementById('changedll').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
if(el===document.getElementById('changepl')){document.getElementById('changedpl').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
}
function fileDocument(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')}else if(file.size/1024/1024<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else{file.value='';alert('Uploading error: maximum document size - 1024MB, this file - '+file.name+' - '+(file.size/1024/1024)+'MB');}
}
function fileVideo(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')}else if(file.size/1024/1024<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else if(file.size/1024/1024/1024<4){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024/1024).toFixed(2)+'GB')}else{file.value='';alert('Uploading error: maximum video size - 4GB, this file - '+file.name+' - '+(file.size/1024/1024/1024)+'GB');}
}
function fileImage(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')}else if(file.size/1024/1024<12){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else{file.value='';alert('Uploading error: maximum image size - 12MB, this file - '+file.name+' - '+(file.size/1024/1024)+'MB');}
if(el===document.getElementById('addpvco')){addedpvco.getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0])}
if(el===document.getElementById('addpmco')){addedpmco.getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0])}
if(el===document.getElementById('addpr')){document.getElementById('addedpr').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";}
if(el===document.getElementById('addpl')){document.getElementById('addedpl').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";}
if(el===document.getElementById('changepco')){document.getElementById('changedpco').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}

}
function fileAudio(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')}else if(file.size/1024/1024<12){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else{file.value='';alert('Uploading error: maximum audio size - 12MB, this file - '+file.name+' - '+(file.size/1024/1024)+'MB');}
}
addstime.max=(now.getTime()/1000/60/60-user[4].getTime()/1000/60/60).toFixed()-1234;
function addPortFile(e){var el=e ? e.target : window.event.srcElement;
if(el.value==1){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Text</div><textarea name="addtext" id="addpte" cols="30" rows="10" required minlength="9" maxlength="999999999"></textarea><input type="submit" value="Add">'
}
else if(el.value==2){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Description</div><input type="text" name="adddescription" id="addpde" required minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="addfile" id="addpfi" onchange="fileDocument();" required><input type="submit" value="Add">'
}
else if(el.value==3){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Description</div><input type="text" name="adddescription" id="addpde" required minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="addfile" id="addpfi" accept="video/mp4" onchange="fileVideo();" required><input type="submit" value="Add">'
}
else if(el.value==4){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Description</div><input type="text" name="adddescription" id="addpde" required minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="addfile" id="addpfi" accept="image/jpeg" onchange="fileImage();" required><div id="addedppco"></div><input type="submit" value="Add">'
}
else if(el.value==5){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">File</div><input type="file" name="addfile" id="addpfi" accept="music/mp3" onchange="fileAudio();" required><input type="submit" value="Add">'
}

}

function portfolioChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),fs=sign.substr(-2,1),fs=parseInt(fs,10),t1='',t2='',t3='',t4='',t5='';
if(portfolio[fs].type==1){
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Text</div><textarea name="changetext" id="changepte" cols="30" rows="10" minlength="9" maxlength="999999999">'+portfolio[fs].text+'</textarea><input type="submit" value="Change"><input type="submit" value="Delete">';
}
else if(portfolio[fs].type==2){t2='checked'
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Description</div><input type="text" name="changedescription" id="changepde" value="'+portfolio[fs].description+'" minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="changefile" id="changepfi" onchange="fileDocument();"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
else if(portfolio[fs].type==3){t3='checked'
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Description</div><input type="text" name="changedescription" id="changepde" value="'+portfolio[fs].description+'" minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="changefile" id="changepfi" accept="video/mp4" onchange="fileVideo();"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
else if(portfolio[fs].type==4){t4='checked'
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Description</div><input type="text" name="changedescription" id="changepde" value="'+portfolio[fs].description+'" minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="changefile" id="changepfi" accept="image/jpeg" onchange="fileImage();"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
else if(portfolio[fs].type==5){t5='checked'
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Description</div><input type="text" name="changedescription" id="changepde" value="'+portfolio[fs].description+'" minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="changefile" id="changepfi" accept="music/mp3" onchange="fileAudio();"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
}
function skillChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),fs=sign.substr(-2,1),fs=parseInt(fs,10),t1='',t2='',t3='',et1='',et2='',et3='',et4='',et5='';
if(skill[fs].type==1){t1='checked'}else if(skill[fs].type==2){t2='checked'}else if(skill[fs].type==3){t3='checked'}
if(skill[fs].etype==1){et1='checked'}else if(skill[fs].etype==2){et2='checked'}else if(skill[fs].etype==3){et3='checked'}else if(skill[fs].etype==4){et4='checked'}else if(skill[fs].etype==5){et5='checked'}
changeskill.innerHTML='<div class="tit">Type</div><div class="type"><label for="changet1s"><input type="radio" name="changetype" id="changet1s" value="1" '+t1+' required readonly><div class="type" style="background-image:url(file/object.svg);"></div><div class="text">Object</div></label><label for="changet2s"><input type="radio" name="changetype" id="changet2s" value="2" '+t2+' readonly><div class="type" style="background-image:url(file/relate.svg);"></div><div class="text">Relate</div></label><label for="changet3s"><input type="radio" name="changetype" id="changet3s" value="3" '+t3+' readonly><div class="type" style="background-image:url(file/environment.svg);"></div><div class="text">Environment</div></label></div><div class="tit">Title</div><input type="text" name="changetitle" id="changesti" value="'+skill[fs].name+'" readonly><div class="tit">E-Type</div><div class="etype"><label for="changee1s"><input type="radio" name="changeetype" id="changee1s" value="1" '+et1+' required><div class="type" style="background-image:url(file/text.svg);"></div><div class="text">Text</div></label><label for="changee2s"><input type="radio" name="changeetype" id="changee2s" value="2" '+et2+'><div class="type" style="background-image:url(file/document.svg);"></div><div class="text">Document</div></label><label for="changee3s"><input type="radio" name="changeetype" id="changee3s" value="3" '+et3+'><div class="type" style="background-image:url(file/video.svg);"></div><div class="text">Video</div></label><label for="changee4s"><input type="radio" name="changeetype" id="changee4s" value="4" '+et4+'><div class="type" style="background-image:url(file/photo.svg);"></div><div class="text">Photo</div></label><label for="changee5s"><input type="radio" name="changeetype" id="changee5s" value="5" '+et5+'><div class="type" style="background-image:url(file/music.svg);"></div><div class="text">Music</div></label></div><div class="tit">Skill</div><input type="number" name="changeskill" id="changessk" value="'+skill[fs].skill+'" min="0" max="100"><div class="tit">Time</div><input type="number" name="changetime" id="changestime" value="'+skill[fs].time+'" min="0"><div class="tit">Logo</div><input type="file" name="changelogo" id="changeslo" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedslo"><img src="file/'+skill[fs].logo+'"></div></div><input type="submit" value="Change"><input type="submit" value="Delete">';}
function workChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),fs=sign.substr(-2,1),fs=parseInt(fs,10),t1='',t2='',t3='';
if(work[fs].type==1){t1='checked'}else if(work[fs].type==2){t2='checked'}else if(work[fs].type==3){t3='checked'}
var times='',timee='',tsd=work[fs].start.getDate(),tsm=work[fs].start.getMonth(),tsy=work[fs].start.getFullYear(),ted=work[fs].end.getDate(),tem=work[fs].start.getMonth(),tey=work[fs].end.getFullYear();
if(tsd<10){tsd='0'+tsd}if(tsm<10){tsm='0'+tsm}
if(ted<10){ted='0'+ted}if(tem<10){tem='0'+tem}
timestart=tsy+'-'+tsm+'-'+tsd,timeend=tey+'-'+tem+'-'+ted;
changework.innerHTML='<div class="tit">Type</div><div class="type"><label for="changet1w"><input type="radio" name="changetype" id="changet1w" value="1" '+t1+' required readonly><div class="type"  style="background-image:url(file/official.svg);"></div><div class="text">Official</div></label><label for="changet2w"><input type="radio" name="changetype" id="changet2w" value="2" '+t2+' readonly><div class="type"  style="background-image:url(file/unofficial.svg);"></div><div class="text">Unofficial</div></label><label for="changet3w"><input type="radio" name="changetype" id="changet3w" value="3" '+t3+' readonly><div class="type"  style="background-image:url(file/parttime.svg);"></div><div class="text">Part-time</div></label></div><div class="tit">Title</div><input type="text" name="changetitle" id="changewti" value="'+work[fs].name+'" readonly><div class="tit">Start</div><input type="date" name="changestart" id="changewst" value="'+timestart+'"><div class="tit">End</div><input type="date" name="changeend" id="changewen" value="'+timeend+'"><div class="tit">Position</div><input type="text" name="changeposition" id="changewpo" value="'+work[fs].position+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Salary</div><input type="number" name="changesalary" id="changewsa" value="'+work[fs].salary+'" min="0" max="999999999" placeholder="$"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
function educationChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),fs=sign.substr(-2,1),fs=parseInt(fs,10),t1='',t2='',t3='';
if(education[fs].type==1){t1='checked'}else if(education[fs].type==2){t2='checked'}else if(education[fs].type==3){t3='checked'}
var times='',timee='',tsd=education[fs].start.getDate(),tsm=education[fs].start.getMonth(),tsy=education[fs].start.getFullYear(),ted=education[fs].end.getDate(),tem=education[fs].start.getMonth(),tey=education[fs].end.getFullYear();
if(tsd<10){tsd='0'+tsd}if(tsm<10){tsm='0'+tsm}
if(ted<10){ted='0'+ted}if(tem<10){tem='0'+tem}
timestart=tsy+'-'+tsm+'-'+tsd,timeend=tey+'-'+tem+'-'+ted;
changeeducation.innerHTML='<div class="type"><div class="tit">Type</div><label for="changet1e"><input type="radio" name="changetype" id="changet1e" value="1" '+t1+' required readonly><div class="type" style="background-image:url(file/institute.svg)"></div><div class="text">Institute</div></label><label for="changet2e"><input type="radio" name="changetype" id="changet2e" value="2" '+t2+' readonly><div class="type" style="background-image:url(file/course.svg)"></div><div class="text">Course</div></label><label for="changet3e"><input type="radio" name="changetype" id="changet3e" value="3" '+t3+' readonly><div class="type" style="background-image:url(file/profile.svg)"></div><div class="text">Profile</div></label></div><div class="tit">Title</div><input type="text" name="changetitle" id="changeeti" value="'+education[fs].name+'" readonly><div class="tit">Start date</div><input type="date" name="changestart" id="changeest" value="'+timestart+'"><div class="tit">End date</div><input type="date" name="changeend" id="changeeen" value="'+timeend+'"><div class="tit">File</div><input type="file" name="changefile" id="changeefi"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
function contactChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),ls=sign.substr(-1),fs=sign.substr(-2,1),ls=parseInt(ls,10),fs=parseInt(fs,10);if(fs==0){changeaccount.innerHTML='<div class="tit">Name</div><input type="text" name="changename" id="changean" value="'+contactes[fs][ls].title+'" readonly><div class="tit">Hyperlink</div><input type="url" name="changeurl" id="changeau" value="'+contactes[fs][ls].value+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Logotype</div><input type="file" name="changelogo" id="changeal" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedal"><img src="file/'+contactes[fs][ls].logo+'"></div><input type="submit" name="change" value="Change"><input type="submit" name="delete" value="Remove">';}
else if(fs==1){changeemail.innerHTML='<div class="tit">Name</div><input type="text" name="changename" id="changeen" value="'+contactes[fs][ls].title+'" readonly><div class="tit">E-mail</div><input type="email" name="changeurl" id="changeeu" value="'+contactes[fs][ls].value+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Logotype</div><input type="file" name="changelogo" id="changeel" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedel"><img src="file/'+contactes[fs][ls].logo+'"></div><input type="submit" name="change" value="Change"><input type="submit" name="delete" value="Remove">';}
else if(fs==2){changelocation.innerHTML='<div class="tit">Name</div><input type="text" name="changename" id="changeln" value="'+contactes[fs][ls].title+'" readonly><div class="tit">Location</div><input type="text" name="changeurl" id="changelu" value="'+contactes[fs][ls].value+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Logotype</div><input type="file" name="changelogo" id="changell" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedll"><img src="file/'+contactes[fs][ls].logo+'"></div><input type="submit" name="change" value="Change"><input type="submit" name="delete" value="Remove">';}
else if(fs==3){changephone.innerHTML='<div class="tit">Name</div><input type="text" name="changename" id="changepn" value="'+contactes[fs][ls].title+'" readonly><div class="tit">Phone</div><input type="tel" name="changeurl" id="changepu" value="'+contactes[fs][ls].value+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Logotype</div><input type="file" name="changelogo" id="changepl" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedpl"><img src="file/'+contactes[fs][ls].logo+'"></div><input type="submit" name="change" value="Change"><input type="submit" name="delete" value="Remove">';}
}
function changeType(){
userpage.classList.toggle('s');
developerpage.classList.toggle('s');
u.classList.toggle('s');
d.classList.toggle('s');
}
function changeSign(e){
var el=e ? e.target : window.event.srcElement;
el.parentNode.getElementsByClassName('button')[0].classList.toggle('o');
el.parentNode.getElementsByClassName('button')[1].classList.toggle('o');
el.parentNode.parentNode.getElementsByClassName('contents')[0].classList.toggle('o');
el.parentNode.parentNode.getElementsByClassName('contents')[1].classList.toggle('o');
}
countal.onclick=function(){
var v=scrolla.value, i=0, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v==1){x=x;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][x-1].logo+'">';scrolla.value=x;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][x-1].logo}else{v=v-1;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v-1].logo+'">';scrolla.value=v;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v-1].logo}
}
countar.onclick=function(){
var v=scrolla.value, i=0, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v<x){v=v;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v].logo+'">';ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v].logo;scrolla.value=v+1;}else if(v==x){ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';scrolla.value=1;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo}else{}
}
countml.onclick=function(){
var v=scrollm.value, i=1, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v==1){x=x;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][x-1].logo+'">';scrollm.value=x;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][x-1].logo}else{v=v-1;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v-1].logo+'">';scrollm.value=v;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v-1].logo}
}
countmr.onclick=function(){
var v=scrollm.value, i=1, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v<x){v=v;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v].logo+'">';ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v].logo;scrollm.value=v+1;}else if(v==x){ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';scrollm.value=1;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo}else{}
}
countll.onclick=function(){
var v=scrolll.value, i=2, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v==1){x=x;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][x-1].logo+'">';scrolll.value=x;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][x-1].logo}else{v=v-1;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v-1].logo+'">';scrolll.value=v;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v-1].logo}
}
countlr.onclick=function(){
var v=scrolll.value, i=2, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v<x){v=v;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v].logo+'">';ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v].logo;scrolll.value=v+1;}else if(v==x){ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';scrolll.value=1;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo}else{}
}
countpl.onclick=function(){
var v=scrollp.value, i=3, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v==1){x=x;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][x-1].logo+'">';scrollp.value=x;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][x-1].logo}else{v=v-1;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v-1].logo+'">';scrollp.value=v;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v-1].logo}
}
countpr.onclick=function(){
var v=scrollp.value, i=3, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v<x){v=v;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v].logo+'">';ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v].logo;scrollp.value=v+1;}else if(v==x){ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';scrollp.value=1;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo}else{}
}
function leftPhoto(e){var el=e ? e.target : window.event.srcElement;
var ev=el.value, ev=parseInt(ev,10), ev=ev-1;
for(let r=0;r<leftphoto.length;r++){
if(um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[r].classList.contains('u')){um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[r].classList.toggle('u')}
}
umpl.src='file/'+leftphoto[ev];
um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[ev].classList.toggle('u');
}
function rightPhoto(e){var el=e ? e.target : window.event.srcElement;
var ev=el.value, ev=parseInt(ev,10), ev=ev-1;
for(let r=0;r<rightphoto.length;r++){
if(um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[r].classList.contains('u')){um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[r].classList.toggle('u')}
}
umpr.src='file/'+rightphoto[ev];
um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[ev].classList.toggle('u');
}
function openNewtab(e){var el=e ? e.target : window.event.srcElement;
if(el.parentNode.parentNode===document.getElementById('cportfolio')){location.href='p/'}
if(el.parentNode.parentNode===document.getElementById('cskill')){location.href='s/'}
if(el.parentNode.parentNode===document.getElementById('cwork')){location.href='w/'}
if(el.parentNode.parentNode===document.getElementById('ceducation')){location.href='e/'}
if(el.parentNode.parentNode===document.getElementById('contacts')){location.href='c/'}
if(el.parentNode.parentNode===document.getElementById('photo')){}
}
</script>
</html>
<?php
}
else{
?>
<html>
<head>
<title>CC Profile</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="author" content="suicvairduCConstantinius">
<meta name="format-detection" content="telephone=no">
<script>
<?php 
$sql = "SELECT * FROM user WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$date=$row['birthtime'];
list($y, $m, $d) = split("-", $date);
$y=intval($y);
$m=intval($m);
$d=intval($d);
$m=$m-1;
?>
const user=[<?php echo $id; ?>,'<?php echo $row['name']; ?>','<?php echo $row['first']; ?>','<?php echo $row['last']; ?>',new Date(<?php echo "$y,$m,$d"; ?>),'<?php echo $row['birthplace']; ?>'];
<?php
}}
?>
let now=new Date();
function nLimit(val, min, max) {return val < min ? min : (val > max ? max : val);}

var leftphoto=[<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='6' AND type='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '"';
echo $row['name'];
echo '",';
}}
?>],
rightphoto=[<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='6' AND type='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '"';
echo $row['name'];
echo '",';
}}
?>],
accounts=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='1' AND type='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], emails=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='1' AND type='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], locations=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='1' AND type='3'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], phones=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='1' AND type='4'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'title:"';
echo $row['name'];
echo '",value:"';
echo $row['link'];
echo '",logo:"';
echo $row['description'];
echo '"},';
}}
?>
], education=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$start=$row['start'];
list($sy, $sm, $sd) = split("-", $start);
$sy=intval($sy);
$sm=intval($sm);
$sd=intval($sd);
$sm=$sm-1;
$end=$row['end'];
list($ey, $em, $ed) = split("-", $end);
$ey=intval($ey);
$em=intval($em);
$ed=intval($ed);
$em=$em-1;
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",start:new Date(';
echo "$sy,$sm,$sd";
echo '),end:new Date(';
echo "$ey,$em,$ed";
echo '),file:"';
echo $row['description'];
echo '"},';
}}
?>
], work=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='3'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$start=$row['start'];
list($sy, $sm, $sd) = split("-", $start);
$sy=intval($sy);
$sm=intval($sm);
$sd=intval($sd);
$sm=$sm-1;
$end=$row['end'];
list($ey, $em, $ed) = split("-", $end);
$ey=intval($ey);
$em=intval($em);
$ed=intval($ed);
$em=$em-1;
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",start:new Date(';
echo "$sy,$sm,$sd";
echo '),end:new Date(';
echo "$ey,$em,$ed";
echo '),position:"';
echo $row['description'];
echo '",salary:"';
echo $row['value'];
echo '"},';
}}
?>
], skill=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='4'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",etype:';
echo $row['etype'];
echo ',time:';
echo $row['value'];
echo ',skill:';
echo $row['link'];
echo ',logo:"';
echo $row['description'];
echo '"},';
}}
?>
], portfolio=[
<?php 
$sql = "SELECT * FROM info WHERE ID='$id' AND kind='5'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo '{';
echo 'type:';
echo $row['type'];
echo ',name:"';
echo $row['name'];
echo '",file:"';
echo $row['value'];
echo '",description:"';
echo $row['description'];
echo '",text:"';
echo $row['description'];
echo '",cover:"';
echo $row['etype'];
echo '"},';
}}
?>
];
var contactes=[accounts,emails,locations,phones];
function loadContent(){

for(let i=2;i<6;i++){
um.getElementsByClassName('info')[0].innerHTML+='<div class="block">'+user[i]+'</div>';
}
for(let i=0;i<contactes.length;i++){
var ume=um.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];
if(!contactes[i].length==0){
if(contactes[i].length==1){
ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].removeChild(ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('button')[0]);
ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].removeChild(ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('button')[0]);
ume.getElementsByClassName('action')[0].getElementsByClassName('move')[0].getElementsByClassName('c')[0].getElementsByClassName('roll')[0].remove();
ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';
ume.getElementsByClassName('action')[0].getElementsByTagName('input')[1].value=contactes[i][0].logo;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[0].value=contactes[i][0].value;}
else{ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[1].max=contactes[i].length;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[0].value=contactes[i][0].value;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';}}
else{ume.getElementsByClassName('body')[0].innerHTML='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><rect class="b" y="0.002" width="100%" height="100%"/><path class="a" d="M192.31,1.412a170.2,170.2,0,0,0-190.9,190.9c9,71.008,75.43,137.44,146.438,146.438a170.2,170.2,0,0,0,190.9-190.9C329.75,76.842,263.318,10.41,192.31,1.412ZM169.79,40C241.4,39.887,300.113,98.6,300,170.21a129.477,129.477,0,0,1-12.064,54.551,17.964,17.964,0,0,1-28.988,5.127L110.112,81.052a17.964,17.964,0,0,1,5.127-28.988A129.477,129.477,0,0,1,169.79,40ZM159.15,299.559A130.046,130.046,0,0,1,52.614,114.066a17.973,17.973,0,0,1,28.932-5.01l149.4,149.4a17.973,17.973,0,0,1-5.01,28.932A129.988,129.988,0,0,1,159.15,299.559Z"/></svg>';ume.getElementsByClassName('action')[0].parentNode.removeChild(ume.getElementsByClassName('action')[0])}
}
for(let e=0;e<education.length;e++){
let zero=user[4].getTime(),starttime=education[e].start.getTime(),endtime=education[e].end.getTime(),nowg;
nowg=now.getTime();zero=zero/1000/60/60/24;starttime=starttime/1000/60/60/24;endtime=endtime/1000/60/60/24;nowg=nowg/1000/60/60/24;
zero=zero.toFixed(0);starttime=starttime.toFixed(0);endtime=endtime.toFixed(0);nog=nowg.toFixed(0);
let alllength=nowg-zero, beforestart=starttime-zero, afterend=nowg-endtime, allfill=alllength-(beforestart+afterend), type="", file="",bsshort="",aeshort="",fshort="";afterend=afterend.toFixed()
if(education[e].type==1){type='institute.svg'}else if(education[e].type==2){type='course.svg'}else if(education[e].type==3){type='profile.svg'}
if(education[e].file==""){file='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><rect class="a" y="0.002" width="100%" height="100%"/><path class="b" d="M192.31,1.412a170.2,170.2,0,0,0-190.9,190.9c9,71.008,75.43,137.44,146.438,146.438a170.2,170.2,0,0,0,190.9-190.9C329.75,76.842,263.318,10.41,192.31,1.412ZM169.79,40C241.4,39.887,300.113,98.6,300,170.21a129.477,129.477,0,0,1-12.064,54.551,17.964,17.964,0,0,1-28.988,5.127L110.112,81.052a17.964,17.964,0,0,1,5.127-28.988A129.477,129.477,0,0,1,169.79,40ZM159.15,299.559A130.046,130.046,0,0,1,52.614,114.066a17.973,17.973,0,0,1,28.932-5.01l149.4,149.4a17.973,17.973,0,0,1-5.01,28.932A129.988,129.988,0,0,1,159.15,299.559Z"/></svg>'}else{file='<a href="'+education[e].file+'" style="background-image:url(file/download.svg);"></a>'}
bsshort=(beforestart/365).toFixed(1);aeshort=(afterend/365).toFixed(1);fshort=(allfill/365).toFixed(1);
edulist.innerHTML+='<div class="item"><div class="left" style="background-image:url(file/'+type+');"></div><div class="mid"><div class="top">'+education[e].name+' ( Start : '+new Intl.DateTimeFormat('en', { year: 'numeric' }).format(education[e].start)+' | End : '+new Intl.DateTimeFormat('en', { year: 'numeric' }).format(education[e].end)+' )</div><div class="bottom"><div class="line"><div class="empty" title="'+beforestart+' days">'+bsshort+'</div><div class="fill" title="'+allfill+' days">'+fshort+'</div><div class="empty" title="'+afterend+' days">'+aeshort+'</div></div></div></div><div class="right">'+file+'</div></div>';
edulist.getElementsByClassName('item')[e].getElementsByClassName('empty')[0].style.width=(beforestart/alllength)*100+'%';
edulist.getElementsByClassName('item')[e].getElementsByClassName('empty')[1].style.width=(afterend/alllength)*100+'%';
edulist.getElementsByClassName('item')[e].getElementsByClassName('fill')[0].style.width=(allfill/alllength)*100+'%';
}
for(let w=0;w<work.length;w++){
let type="",salary=0,zero=user[4].getTime(),starttime=work[w].start.getTime(),endtime=work[w].end.getTime(),nowg;
nowg=now.getTime();zero=zero/1000/60/60/24;starttime=starttime/1000/60/60/24;endtime=endtime/1000/60/60/24;nowg=nowg/1000/60/60/24;
zero=zero.toFixed(0);starttime=starttime.toFixed(0);endtime=endtime.toFixed(0);nowg=nowg.toFixed(0);
let alllength=nowg-zero, beforestart=starttime-zero, afterend=nowg-endtime, allfill=alllength-(beforestart+afterend),bsshort="",aeshort="",fshort="",perday="";
perday=work[w].salary/allfill;perday=perday.toFixed(2);
if(work[w].type==1){type='official.svg';typetext="Official"}else if(work[w].type==2){type='unofficial.svg';typetext="Unofficial"}else if(work[w].type==3){type='parttime.svg';typetext="Part-time"}
if(work[w].salary==0){salary="<span class='value'>Free</span>"}else{salary='<div>'+work[w].salary +'$ </div> <span class="prevalue">'+perday+'$/day</span>'}
worlist.innerHTML+='<div class="item"><div class="title">'+work[w].name+' - '+typetext+' - '+work[w].position+'</div><div class="content"><div class="logo" style="background-image:url(file/'+type+');"></div><div class="set"><div class="timeline"><div class="empty"></div><div class="fill" title="'+allfill+' days"></div><div class="empty"></div></div><div class="value"><span class="prevalue">'+allfill+' days for </span>'+salary+'</div></div></div></div>'
worlist.getElementsByClassName('item')[w].getElementsByClassName('empty')[0].style.width=(beforestart/alllength)*100+'%';
worlist.getElementsByClassName('item')[w].getElementsByClassName('empty')[1].style.width=(afterend/alllength)*100+'%';
worlist.getElementsByClassName('item')[w].getElementsByClassName('fill')[0].style.width=(allfill/alllength)*100+'%';
}
let s10=0;
for(let st=0;st<skill.length;st++){s10+=skill[st].time}
for(let s=0;s<skill.length;s++){
let type=skill[s].type,time=skill[s].time,skill1=skill[s].skill,etype=skill[s].etype,s1,s2,s3,s4,s5,s6,s7,s8,s9;
s7=(((now.getTime()/1000/60/60-user[4].getTime()/1000/60/60)-26298).toFixed())*0.612;
if(s10>s7){
s8=((Math.sqrt(s7)*2)/(Math.cbrt(s7)*2))*1234.56789;
skil=skill1*Math.cbrt(((time/s10)*s7)/s8);
skil=nLimit(skil,0.01,99.99);
s1=Math.floor(skil/10);s2=(skil/10)-s1;s3=(s2*10).toFixed(0);
s4=(10/(skil/100));s5=(s3/(skil/100));
s9=(skil+(33*((100-skil)/100 )))/100*88;
}else{
s8=((Math.sqrt(s7)*2)/(Math.cbrt(s7)*2))*1234.56789;
skil=skill1*Math.cbrt(time/s8);
skil=nLimit(skil,0.01,99.99);
s1=Math.floor(skil/10);s2=(skil/10)-s1;s3=(s2*10).toFixed(0);
s4=(10/(skil/100));s5=(s3/(skil/100));
s9=(skil+(33*((100-skil)/100 )))/100*88;
}
skilist.innerHTML+='<div class="item" title="'+skill[s].name+'"><div class="logo" style="background-image:url(file/'+skill[s].logo+')"></div><div class="line"><div class="fill" style="width:'+skil+'%;height:'+s9+'%"></div></div><div class="value"><div class="skill" title="Skill">'+skill1+'%</div><div class="time">'+time+' hours</div></div></div>';
for(let g=0;g<s1;g++){
let g1=(9-g);
skilist.getElementsByClassName('item')[s].getElementsByClassName('fill')[0].innerHTML+='<div class="selection" style="min-width:'+s4+'%; background-color: rgba(244, 244, 244, 0.'+g1+');"></div>';
}
let g2=10-(skilist.getElementsByClassName('item')[s].getElementsByClassName('selection').length);
if(!s3==0){skilist.getElementsByClassName('item')[s].getElementsByClassName('fill')[0].innerHTML+='<div class="selection" style="width:100%; background-color: rgba(244, 244, 244, 0.'+(g2-1)+');"></div>';}
}
for(let p=0;p<portfolio.length;p++){
if(portfolio[p].type==1){type='text.svg';}else if(portfolio[p].type==2){type='document.svg';}else if(portfolio[p].type==3){type='photo.svg';}else if(portfolio[p].type==4){type='video.svg';}else if(portfolio[p].type==5){type='music.svg';}
porlist.innerHTML+='<div class="item"><div class="logo" style="background-image: url(file/'+type+');"></div><form action="" method="POST"><input type="text" value="'+portfolio[p].file+'" name="type" readonly><input type="text" value="'+portfolio[p].name+'" name="file" readonly><div class="action"><input type="submit" name="openfile" value="Open"><input type="submit" name="deletefile" value="Delete"></div></form></div>';
}
umpl.src='file/'+leftphoto[0];
um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+1+'" class="u" onmouseenter="leftPhoto();">';
for(let l=1;l<leftphoto.length;l++){
var ln=l+1;
um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+ln+'" onmouseenter="leftPhoto();">';
}
umpr.src='file/'+rightphoto[0];
um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+1+'" class="u" onmouseenter="rightPhoto();">';
for(let r=1;r<rightphoto.length;r++){
var rn=r+1;
um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].innerHTML+='<input type="button" value="'+rn+'" onmouseenter="rightPhoto();">';
}


userid.value=user[0];
username.value=user[1];
usermidname.value=user[2];
usersurname.value=user[3];
userbirthtime.value=user[4];
userbirthplace.value=user[5];
for(let n=0;n<leftphoto.length;n++){let p=n+1;photo.getElementsByClassName('left')[0].innerHTML+='<label for="changepl'+p+'"><input type="checkbox" name="leftphoto[]" id="changepl'+p+'" value="'+leftphoto[n]+'"><div class="photo" style="background-image:url(file/'+leftphoto[n]+');"></div></label>'}
for(let n=0;n<rightphoto.length;n++){let p=n+1;photo.getElementsByClassName('right')[0].innerHTML+='<label for="changepr'+p+'"><input type="checkbox" name="rightphoto[]" id="changepr'+p+'" value="'+rightphoto[n]+'"><div class="photo" style="background-image:url(file/'+rightphoto[n]+') ;"></div></label>'}
photo.getElementsByClassName('right')[0].innerHTML+='<input type="submit" value="Remove">';
photo.getElementsByClassName('left')[0].innerHTML+='<input type="submit" value="Remove">';

for(let m=0;m<contactes.length;m++){
for(let n=0;n<contactes[m].length;n++){
let v=contactes[m][n];
contacts.getElementsByClassName('roll')[m].innerHTML+='<label for="change'+m+n+'"><input type="radio" name="change'+m+'" id="change'+m+n+'" value="'+n+'" onchange="contactChoosen();"><div class="text">'+v.title+' - '+v.value+'</div></label>';
}
}
for(let n=0;n<education.length;n++){
if(education[n].type==1){type='institute.svg'} else if(education[n].type==2){type='course.svg'} else if(education[n].type==3){type='profile.svg'}
ceducation.getElementsByClassName('roll')[0].innerHTML+='<label for="changei'+n+'e"><input type="radio" name="changeid" id="changei'+n+'e" value="'+n+'" onchange="educationChoosen();"><div class="text">'+education[n].name+'</div><div class="type" style="background-image:url(file/'+type+');"></div></label>';
}
for(let n=0;n<work.length;n++){
if(work[n].type==1){type='official.svg'} else if(work[n].type==2){type='unofficial.svg'} else if(work[n].type==3){type='parttime.svg'}
cwork.getElementsByClassName('roll')[0].innerHTML+='<label for="changei'+n+'w"><input type="radio" name="changeid" id="changei'+n+'w" value="'+n+'" onchange="workChoosen();"><div class="text">'+work[n].name+'</div><div class="type" style="background-image:url(file/'+type+');"></div></label>';
}
for(let n=0;n<skill.length;n++){
cskill.getElementsByClassName('roll')[0].innerHTML+='<label for="changei'+n+'s"><input type="radio" name="changeid" id="changei'+n+'s" value="'+n+'" onchange="skillChoosen();"><div class="text">'+skill[n].name+'</div><div class="type" style="background-image:url(file/'+skill[n].logo+');"></div></label>';
}
for(let n=0;n<portfolio.length;n++){
if(portfolio[n].type==1){type='text.svg'} else if(portfolio[n].type==2){type='document.svg'} else if(portfolio[n].type==3){type='video.svg'} else if(portfolio[n].type==4){type='photo.svg'} else if(portfolio[n].type==5){type='music.svg'}
cportfolio.getElementsByClassName('roll')[0].innerHTML+='<label for="changei'+n+'p"><input type="radio" name="changeid" id="changei'+n+'p" value="'+n+'" onchange="portfolioChoosen();"><div class="text">'+portfolio[n].name+'</div><div class="type" style="background-image:url(file/'+type+');"></div></label>';
}
}
</script>
<style>
*{margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 1.4vmax;}
.f1x{display: flex; justify-content: space-around; align-items: center;}.fdc{flex-direction: column;}.fdrc{flex-direction: column-reverse;}
.h1d{display: none;}
.a{fill:#f4f4f4;}.b{fill:#0c0c0c;}

.functions>div{position: fixed;display: flex; justify-content: space-around; align-items: center;}
.functions>.left{left: 0;top: 0; height: 100vh; width: 10vmin;}
.functions>.right{right: 0;top: 0; height: 100vh; width: 10vmin;}
.functions>.top{left: 0;top: 0; height: 10vmin; width: 100%;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type{height: 100%; width: 80%;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type>.option{width: 50%; height: 100%; cursor: pointer;}
.functions>.top>.type>.option>.logo{width: 100%; height: 5vmin; background-color: #f4f4f4;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type>.option>.logo>svg{width: 4.7vmin; height: 4.7vmin;}
.functions>.top>.type>.option>.title{width: 100%; height: 3vmin; background-color: #f4f4f4;display: flex; justify-content: space-around; align-items: center; font-size: 100%;}
.functions>.top>.type>.option.s>.title{font-weight: 500;}
.functions>.top>.type>.option>.selection{width: 100%; height: 0.2vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option.s>.selection{width: 100%; height: 0.8vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option.s{cursor: default;}
.functions>.top>.type>.option:hover>.selection{width: 100%; height: 0.8vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option:hover>.title{font-weight: 500;}

body{display: flex; flex-direction: column; align-items: center; color: #0c0c0c;}
.content{display: none;}
.content.s#u{margin-top: 10vmin;width: 80vw; display: flex; flex-direction: column;}
.downpick>.button{width: 100%; height: 6vmin; display: flex; justify-content: space-around;align-items: center; background-color: #0c0c0c;}
.downpick>.button:hover{font-weight: 500; opacity: 0.9; cursor: pointer; height:7vmin;}
.downpick>.button.o{ font-weight: 500; opacity: 0.9; cursor: default; height:7vmin;}
.content.s#u>.sign{width:auto; height: 100%; display: flex;flex-direction: column;}
.content.s#u>.type{width: 100%; height: 36vmin; display: flex; justify-content: space-between; align-items: center; background-color: #4d4d4d;}
.content.s#u>.sign>.form{display: none; width: 100%; height: auto; margin-top: 5vmin;}
.content.s#u>.sign.o>.form{display: flex; align-items: center;flex-direction: column; height: auto; margin-top: 5vmin; justify-content: space-around;}
.content.s#u>.sign>.form>form{display: flex;flex-direction: column; width: auto;}
.content.s#u>.sign>.form>form>input{ width: 80vw; border: none; outline: none;margin-top: 1vmin;}
.content.s#u>.sign>.form>form>label{margin-top: 1vmax;}
.content.s#u>.sign>.form>form>div>input[type="submit"]{ width: 100%; border: none; outline: none;cursor: pointer; background-color: #0c0c0c; color: #f4f4f4; margin-top: 0; padding: 0.5vmin;} 
.content.s#u>.sign>.form>form>div>input[type="submit"]:hover{background-color: #0c0c0ccc; font-weight: 500;} 
.content.s#u>.sign>.form>form>input[type="text"],.content.s#u>.sign>.form>form>input[type="password"],.content.s#u>.sign>.form>form>input[type="date"]{border-bottom: 0.2vmin solid #0c0c0c;}
.content.s#u>.sign>.form>form>input[type="text"]:focus,.content.s#u>div>.form>form>input[type="password"]:focus,.content.s#u>.sign>.form>form>input[type="date"]:focus{border-bottom: 0.3vmin solid #0c0c0ccc;font-weight: 500;}
.content.s#u>.sign>.form>form>input[type="text"]:hover,.content.s#u>div>.form>form>input[type="password"]:hover,.content.s#u>.sign>.form>form>input[type="date"]:hover{border-bottom: 0.2vmin solid #0c0c0caa; }
.downpick{display: flex; position: fixed; bottom: 0; left: 10vw; width: 80%; height: auto;color: #f4f4f4;
align-items: flex-end;}
.content.s#u>.sign>.image{display: none;margin-top: 5vmin;}
.content.s#u>.sign.o>.image{width: 100%; height: 20vh; display: flex; align-items: center;flex-direction: column;}
.content.s#u>.sign.o.in>.image>svg{height: 100%;}
.content.s#u>.sign.o.in>.image:hover>svg{transition: 1s;}
.content.s#u>.sign.o.in>.image>svg>.g{transform: translateX(25vw);transition: 1s; fill: rgb(222, 222, 77);}
.content.s#u>.sign.o.in>.image>svg>.b{transform: translateX(25vw);transition: 1s; fill: rgb(77, 77, 222);}
.content.s#u>.sign.o.in>.image>svg>.c{transform: translateX(25vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.in>.image>svg:hover>.g{transform: translateX(10vw); fill: #0c0c0c;}
.content.s#u>.sign.o.in>.image>svg:hover>.b{transform: translateX(40vw); fill: #0c0c0c;}
.content.s#u>.sign.o.in>.image>svg:hover>.c{transform: translateX(25vw); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg{height: 100%;}
.content.s#u>.sign.o.up>.image:hover>svg{transition: 1s;}
.content.s#u>.sign.o.up>.image>svg>.g{transform: translateX(20vw);transition: 1s; fill: rgb(222, 222, 77);}
.content.s#u>.sign.o.up>.image>svg>.b{transform: translateX(20vw);transition: 1s; fill: rgb(77, 77, 222);}
.content.s#u>.sign.o.up>.image>svg>.c{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg>.c1{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg>.c2{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg:hover>.g{transform: translateX(20vw) translateY(2vmin); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg:hover>.b{transform: translateX(20vw); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg:hover>.c{transform: translateX(20vw);}
.content.s#u>.sign.o.up>.image>svg:hover>.c1{transform: translateX(20vw) translateY(2vmin);}
.content.s#u>.sign.o.up>.image>svg:hover>.c2{transform: translateX(20vw) translateY(2vmin);}

.content.s#d{margin-top: 10vmin;width: 80vw; display: flex; flex-direction: column;}
.content.s#d>.image{width: 80vw ; height: auto; background-color: #0c0c0c;}
.content.s#d>.image>svg>#text{transition: 2s;}
.content.s#d>.image>svg:hover>#text{transform: translateY(30vmin) rotate(-30deg);}
.content.s#d>.image>svg>#click>.a{transform: translate(77%, 1%) scale(0.7); fill: transparent; transition: 1s;}
.content.s#d>.image>svg:hover>#click>.a{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h1{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h2{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h3{fill: #0c0c0c;}
.content.s#d>.image>svg>#zone:hover~#h0{fill: #4d4d4d;transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover~#h1{fill: #4d4d4d;transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover~#h1~#h2{fill: #4d4d4d;}
.content.s#d>.image>svg>#zone:hover~#h1~#h2~#h3{transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover{cursor: pointer;}
.content.s#d>.type{width: 100%; height: 36vmin; display: flex; justify-content: space-between; align-items: center; background-color: #4d4d4d;}
.content.s#d>.typelist{width: 100%; height: 15vmin; display: flex; justify-content: space-between; align-items: center; background-color: #4d4d4d;}
.content.s#d>.typelist>.icon{width: 32.3%; height: 100%; display: flex; justify-content: space-around; align-items: center; background-color: #212121;}
.content.s#d>.typelist>.icon:nth-child(2){background-color: transparent;}
.content.s#d>.type>.text{width: 32.3%; height: 100%; display: flex; flex-direction: column; align-items: center;background-color: #212121; font-weight: 400;}
.content.s#d>.type>.text:nth-child(2){background-color: transparent;}
.content.s#d>.type>.text>.title{width: 100%; height: 34%; display: flex; justify-content: space-around; align-items: center; font-weight: 600; color: #f4f4f4;}
.content.s#d>.type>.text>.description{width: 90%; height:auto; display: flex; align-items: center; color: #f4f4f4;text-align: justify;}
.content.s#d>.typelist>.icon>svg{width: 90%; height: 90%; display: flex;}
.content.s#d>.setup>.logo{width: 100%; height: 35vmin;display: flex; align-items: center; justify-content: space-around;}
.content.s#d>.setup>.logo>svg{display: block; height: 30vmin;}
.content.s#d>.setup>.container{width: auto; height: 20vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
.content.s#d>.setup>.container>.text{width: auto; height: auto;}
.content.s#d>.setup>.container>.line{width: 100%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; margin-top: 1vmin;}
.content.s#d>.setup>.container>.line>.button{width: 35%; height: 90%; display: flex; justify-content: space-around; align-items: center; background-color: #4d4d4d; color: #f4f4f4; cursor: pointer;}
.content.s#d>.setup>.container>.line>.button:hover{background-color: #212121; font-weight: 500;}
.author{width: 100%; height: 2vmax;text-align: center;}

.content.s#u>.contents{display: none;}
.content.s#u>.contents.o{width: 100%; height: auto;  margin-bottom: 10vmin; display: block;}
.content.s#u>.contents>.list{display: flex; flex-wrap: wrap; justify-content: space-around; width: 100%; height: auto;}
.content.s#u>#ul>.list>form{width: 40%; height: 15vmin; margin-top: 5vmin; background-color: #f4f4f4; display: flex; justify-content: space-between; align-items: center; flex-direction: column; padding: 1vmin; border-radius: 0.3vmin; border: 0.1vmin solid #0c0c0c;}
.content.s#u>#ul>.list>form>input[type="number"]{width: 0; height: 0; opacity: 0;}
.content.s#u>#ul>.list>form>input[type="submit"]{width: 100%; height: auto; }
.content.s#u>#ul>.list>form>input[type="submit"]:hover{font-weight: 500; cursor: pointer;}
a.icon{width: 5vmin; height: 5vmin;display: flex; justify-content: space-around; align-items: center; background-color: #f4f4f4;}
a.icon>svg{width: 4vmin; height: 4vmin;}
a.icon:hover>svg{width: 3.5vmin; height: 3.5vmin;}

.content.s#u>#um>.photo{width: 100%; height: 40vh; background-color: #366ce1; display: flex;}
.content.s#u>#um>.photo>div{height: 100%; width: 50%; display: flex; flex-direction: column; background-color: #0c0c0c;}
.content.s#u>#um>.photo>div>.image{width: 100%; height: 80%;display: flex; justify-content: space-around; align-items: center; border-bottom: 0.3vmin solid #f4f4f4;}
.content.s#u>#um>.photo>div>.image>img{height: 100%;}
.content.s#u>#um>.photo>div>.list{width: 100%; height: 20%; background-color: #0c0c0c;display: flex; justify-content: space-around; align-items: flex-start;}
.content.s#u>#um>.photo>div>.list>input{width: 5%; height: 70%; border: none; background-color: #f4f4f4;}
.content.s#u>#um>.photo>div>.list>input.u{outline: solid #f4f4f4; height: 100%; font-weight: 500; box-shadow: 0 0 0 0.3vmin  #0c0c0c inset;}
.content.s#u>#um>.photo>div>.list>input:hover{width: 5%; height: 100%; cursor: pointer; font-weight: 500;}

.content.s#u>#um>.info{width: 100%; height: auto; display: flex; flex-wrap: wrap;background-color: #0c0c0c;}
.content.s#u>#um>.info>.block{width: 50%; height: auto; color: #f4f4f4; padding-top: 0.3vh; padding-bottom: 0.3vh; text-align: center;}

.content.s#u>#um>.contact{width: 100%; height: auto; display: flex; border-top: 0.3vmin solid #f4f4f4;}
.content.s#u>#um>.contact>.block{width: 25%; height: auto; background-color: #0c0c0c; border-right: 0.3vmin solid #f4f4f4; display: flex; flex-direction: column;}
.content.s#u>#um>.contact>.block:last-child{border: none;}
.content.s#u>#um>.contact>.block>.title{width: 100%; min-height: 5vmin;background-color: #366ce1;display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.title>svg{width: 100%; height: 4vmin;}
.content.s#u>#um>.contact>.block>.body{width: 100%; height: 100%;display: flex;justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.body>img{width: 90%;}
.content.s#u>#um>.contact>.block>.body>svg{height: 15vmin ; width: 15vmin; display: block;}
.content.s#u>#um>.contact>.block>.action{width: 100%; min-height: 5vmin; background-color: #f4f4f4;display: flex;justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.action>.move{display: flex; width: 80%; height: 100%;}
.content.s#u>#um>.contact>.block>.action>.move>div.button{width: 10%; height: 100%; border: none; background-color: #0c0c0c; color: #f4f4f4; font-weight: 300; display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input{border: none; outline: none; background-color: #0c0c0c; color: #f4f4f4; font-weight: 400; text-align: center;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]{-webkit-appearance: none;background: transparent;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]::-webkit-slider-thumb{-webkit-appearance: none;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]:focus{outline: none;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]::-ms-track{cursor: pointer;background: transparent;border-color: transparent;color: transparent;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]::-webkit-slider-thumb{-webkit-appearance: none;height: 100%;width: 10%;background: #0c0c0c;cursor: pointer;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]:focus::-webkit-slider-thumb{-webkit-appearance: none;width: 10%;background: #366ce1 ;cursor: pointer;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]::-moz-range-thumb{height: 100%;width: 10%;background: #0c0c0c;cursor: pointer;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]::-ms-thumb{height: 100%;width: 10%;background: #0c0c0c;cursor: pointer;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]::-webkit-slider-runnable-track{height: 100%;cursor: pointer;background: #f4f4f4;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]:focus::-webkit-slider-runnable-track {background: #0c0c0c;}
.content.s#u>#um>.contact>.block>.action>.move>div.button:hover{font-weight: 600; cursor: pointer;}
.content.s#u>#um>.contact>.block>.action>.move>div.c{width: 100%; height: 100%; display: flex; flex-direction: column;}
.content.s#u>#um>.contact>.block>.action>.move>div.c>input{width: 100%; height: 50%; font-size: 1.2vmax; text-indent: 1vmin;} 
.content.s#u>#um>.contact>.block>.action>.move>div.c>input[type="range"]{height: 10%;}
.content.s#u>#um>.contact>.block>.action>.remove{display: flex; justify-content: space-around; align-items: center; width: 20%; height: 100%;}
.content.s#u>#um>.contact>.block>.action>.remove>label{width:100%; height: 100%;display: flex; justify-content: space-around; align-items: center;}
.content.s#u>#um>.contact>.block>.action>.remove>label:hover>svg{height: 80%; cursor: pointer;}
.content.s#u>#um>.contact>.block>.action>.remove>label>svg{height: 90%; width: 100%;}
.content.s#u>#um>.contact>.block>.action>.remove>input{height: 0; width: 0; opacity: 0;}

#edulist{width: 100%; height: auto; display: flex; flex-direction: column;}
#edulist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; align-items: center; justify-content: space-between;}
#edulist>.item>.left{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around; background-position: center; background-size: contain; background-repeat: no-repeat; }
#edulist>.item>.mid{width: 100%; height: 15vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#edulist>.item>.mid>.top{width: 100%; height: 5vmin;text-align: center;}
#edulist>.item>.mid>.bottom{width: 100%; height: 100%;display: flex; align-items: center; justify-content: space-around;}
#edulist>.item>.mid>.bottom>.line{width: 90%; height: 8vmin;display: flex; justify-content: space-around; align-items: center;}
#edulist>.item>.mid>.bottom>.line>div{display: flex;height: 3vmin;  align-items: center; justify-content: space-around;}
#edulist>.item>.mid>.bottom>.line>.empty{background-color: #0c0c0c; color: #f4f4f4;}
#edulist>.item>.mid>.bottom>.line>.empty:last-child{border-bottom-right-radius: 50%;border-top-right-radius: 50%;}
#edulist>.item>.mid>.bottom>.line>.empty:first-child{border-bottom-left-radius: 50%;border-top-left-radius: 50%;}
#edulist>.item>.mid>.bottom>.line>.fill{background-color: #366ce1; color: #eadc36;}
#edulist>.item>.right{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around;}
#edulist>.item>.right>svg{width: 100%; height: 100%;}
#edulist>.item>.right>a{width: 100%; height: 100%;background-position: center; background-size: contain; background-repeat: no-repeat;}
#worlist{width: 100%; height: auto; display: flex; flex-direction: column;}
#worlist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.3vmin; padding-bottom: 0.3vmin; flex-direction: column;}
#worlist>.item>.title{width: 100%; height: auto; text-align: center; border-top: 0.3vmin solid #0c0c0c; color: #0c0c0c; margin-bottom: 0.2vmin; padding-bottom: 0.1vmin;}
#worlist>.item:first-child>.title{border: none;}
#worlist>.item>.content{width: 100%; height: 100%;display: flex; justify-content: space-between; align-items: center;}
#worlist>.item>.content>.logo{width: 12vmin; height: 8vmin; background-repeat: no-repeat; background-position: center;}
#worlist>.item>.content>.set{width: 80%; height: 12vmin;}
#worlist>.item>.content>.set>.timeline{width: 100%; height: 8vmin;display: flex;justify-content: space-between; align-items: center;}
#worlist>.item>.content>.set>.timeline>div{height: 3vmin;display: flex;justify-content: space-between; align-items: center;}
#worlist>.item>.content>.set>.timeline>.empty{background-color: #0c0c0c; color: #f4f4f4;}
#worlist>.item>.content>.set>.timeline>.empty:last-child{border-bottom-right-radius: 50%;border-top-right-radius: 50%;}
#worlist>.item>.content>.set>.timeline>.empty:first-child{border-bottom-left-radius: 50%;border-top-left-radius: 50%;}
#worlist>.item>.content>.set>.timeline>.fill{background-color: #366ce1; color: #eadc36;}
#worlist>.item>.content>.set>.value{width: 100%; height: 50%;display: flex;justify-content: space-between; align-items: center;}
#skilist{width: 100%; height: auto; display: flex; flex-direction: column;}
#skilist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; flex-direction: row;justify-content: space-between; align-items: center; }
#skilist>.item>.logo{width: 15vmin; height: 10vmin; display: flex; align-items: center; justify-content: space-around; background-position: center; background-size: contain; background-repeat: no-repeat;}
#skilist>.item>.value{width: 15vmin; height: 15vmin; display: flex; align-items: center; justify-content: space-around; flex-direction: column;}
#skilist>.item>.value>div{width: 100%; height: 50%;display: flex; justify-content: space-around; align-items: center;}
#skilist>.item>.value>div:first-child{align-items: flex-end;}
#skilist>.item>.value>div:last-child{align-items: flex-start;}
#skilist>.item>.line{width: 70%; height: 7vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#skilist>.item>.line>.fill{width: 100%; height: 15vmin; background-color: #366ce1;display: flex;}
#skilist>.item>.line>.fill>.selection{height: 100%;}
#porlist{width: 100%; height: auto; display: flex; flex-direction: column;}
#porlist>.item{width: 100%; height: 15vmin; display: flex; margin-top: 0.1vmin; flex-direction: row;justify-content: space-between; align-items: center; margin-bottom: 1vmin;}
#porlist>.item>.logo{width: 15vmin; height: 10vmin; background-size: contain; background-repeat: no-repeat; background-position: center;}
#porlist>.item>form{width: 80%; height: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center;}
#porlist>.item>form>.action{height: 10vmin; width: 15vmin;display: flex; flex-direction: column;justify-content: space-between; align-items: center;}
#porlist>.item>form>.action>input{height: 5vmin; width: 100%; display: flex; justify-content: space-around;align-items: center;background-color: #0c0c0c; color: #f4f4f4; border: none;margin: 0.3vmin;}
#porlist>.item>form>.action>input:hover{font-weight: 500; outline: solid #0c0c0c; box-shadow: 0 0 0 0.3vmin  #f4f4f4 inset; cursor: pointer;}
#porlist>.item>form>input{height: 5vmin; width: 90%; border: none;}
#porlist>.item>form>input:first-child{opacity: 0; cursor: default;width: 10%;}

.function{display: flex; justify-content: space-around; align-items: center; width: 8vw; height: 8vw; left: 46vw; top: 0; position: fixed;}
.function>button{width: 100%; height: 100%; cursor: pointer;}
.function>button>.title{color: transparent;}
.contents#um>.function>button>.logo{padding: 1vmin;}
.contents#ul>.function>button>.logo>svg{width: 100%; height: 100%;}
.contents>.function>button:hover>.title{color: #f4f4f4;}

#d>.userinfo{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4; }
#d>.userinfo>.data>form>input{ color: #f4f4f4;}
#d>.userinfo>.title{width: 100%; height: auto;padding: 1vmin; font-size: 3vmin; display: flex; justify-content: space-around; align-items: center; font-weight: 500;}
#d>.userinfo>.data{padding: 1vmin;}
#d>.userinfo>.data>form{width: 100%; display: flex; align-items: center;}
#d>.userinfo>.data>form>input{width: auto; border: none; background-color: transparent; text-align: left; margin-left: 1vmin;}
.space>div>.titleson{justify-content: space-between; text-indent: 1vmin;}
.space>div>.titleson>button{height: 100%; width: auto; display: flex; flex-direction: row-reverse; align-items: center; justify-content: center; background-color: transparent; border: none; color: transparent; cursor: pointer;}
.space>div>.titleson>button:hover{color: #f4f4f4;}
.space>div>.titleson>button>svg{width: 4vmin; height: 4vmin; margin: 1vmin;}
#photo{background-color: #0c0c0c;}
#photo>.change{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4;display: flex;}
#photo>.add{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4;display: flex;}
#photo>.change>form{width: 50%; height: auto; display: flex; justify-content: space-around; align-items: center;flex-wrap: wrap;} 
#photo>.change>form>label>input[type="checkbox"]{width: 5vmin; height: 5vmin; cursor: pointer;}
#photo>.change>form>label{width: 15vmin; height: 15vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#photo>.change>form>label>.photo{width: 8vmin; height: 8vmin; background-repeat: no-repeat; background-size: contain; background-position: center; cursor: pointer; margin: 1vmin;}
#photo>.change>form>label>input[type="checkbox"]:checked ~ .photo{box-shadow: 0 0 0 0.5vmin #366ce1 inset;}
#photo>.change>form>input[type="submit"]{width: 100%; margin: 5%; cursor: pointer;}
#photo>.add>form{width: 50%; height: auto; display: flex; justify-content: space-around; align-items: center;flex-direction: column;}
#photo>.add>form>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 15vmin; height: 15vmin;}
#photo>.add>form>input[type="submit"]{width: 90%; margin: 5%; cursor: pointer;}
#contacts{background-color: #0c0c0c;}
#contacts>div>.change{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4;display: flex; justify-content: space-around; flex-direction: column; align-items: center;} 
#contacts>div>.add{width: 100%; height: auto; background-color: #0c0c0c; color: #f4f4f4;display: flex;}
#contacts>div>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#contacts>div>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#contacts>div>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#contacts>div>.change>div{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#contacts>div>.change>div>input{width: 90%; }
#contacts>div>.change>div>div>img{width: auto ; height: 10vmin;}
#contacts>div>.add{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#contacts>div>.add>input{width: 90%;}
#contacts>div>.add>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 10vmin;}

#ceducation,#cwork,#cskill,#cportfolio{background-color: #0c0c0c; color: #f4f4f4;}
#ceducation>.change>div{display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#ceducation>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#ceducation>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#ceducation>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#ceducation>.change>.roll>label>.type{width: 5vmin; height: 5vmin; background-position: center; background-repeat: no-repeat; background-size: 80%; background-color: #f4f4f4;}
#ceducation>.change>div>input{width: 90%; }
#ceducation>.change>div>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#ceducation>.change>div>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#ceducation>.change>div>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#ceducation>.change>div>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#ceducation>.change>div>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#ceducation>.change>div>.type>label>.text{font-size: 1.5vmin;}
#ceducation>.change>div>div>img{width: auto ; height: 10vmin;}
#ceducation>.add{display: flex; flex-direction: column; align-items: center; justify-content: space-around;}
#ceducation>.add>div{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#ceducation>.add>.title,#ceducation>.add>.start,#ceducation>.add>.end,#ceducation>.add>.file{width: 100%;}
#ceducation>.add>div>input{width: 90%;}
#ceducation>.add>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#ceducation>.add>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#ceducation>.add>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#ceducation>.add>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#ceducation>.add>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#ceducation>.add>.type>label>.text{font-size: 1.5vmin;}
#ceducation>.add>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 10vmin;}

#cwork>.change>div{display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cwork>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#cwork>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#cwork>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#cwork>.change>.roll>label>.type{min-width: 5vmin; height: 5vmin; background-position: center; background-repeat: no-repeat; background-size: 80%; background-color: #f4f4f4;}
#cwork>.change>div>input{width: 90%; }
#cwork>.change>div>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cwork>.change>div>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cwork>.change>div>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cwork>.change>div>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cwork>.change>div>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cwork>.change>div>.type>label>.text{font-size: 1.5vmin;}
#cwork>.change>div>div>img{width: auto; height: 10vmin;}
#cwork>.add{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#cwork>.add>input{width: 90%;}
#cwork>.add>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cwork>.add>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cwork>.add>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cwork>.add>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cwork>.add>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cwork>.add>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 10vmin;}
#cwork>.add>.type>label>.text{font-size: 1.5vmin;}

#cskill>.change>div{display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#cskill>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#cskill>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#cskill>.change>.roll>label>.type{width: 5vmin; height: 5vmin; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f4f4f4;}
#cskill>.change>div>input{width: 90%; }
#cskill>.change>div>div>img{width: auto ; height: 10vmin;}
#cskill>.change>div>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cskill>.change>div>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.change>div>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cskill>.change>div>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cskill>.change>div>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cskill>.change>div>.type>label>.text{font-size: 1.5vmin;}
#cskill>.change>div>.etype{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cskill>.change>div>.etype>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.change>div>.etype>label>input{width: 1.5vmin; height: 1.5vmin;}
#cskill>.change>div>.etype>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cskill>.change>div>.etype>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cskill>.change>div>.etype>label>.text{font-size: 1.5vmin;}
#cskill>.change>div>input[type="submit"]{width: 90%; margin: 1%; cursor: pointer;}
#cskill>.add{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#cskill>.add>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cskill>.add>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.add>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cskill>.add>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cskill>.add>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cskill>.add>.type>label>.text{font-size: 1.5vmin;}
#cskill>.add>.etype{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cskill>.add>.etype>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cskill>.add>.etype>label>input{width: 1.5vmin; height: 1.5vmin;}
#cskill>.add>.etype>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cskill>.add>.etype>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cskill>.add>.etype>label>.text{font-size: 1.5vmin;}
#cskill>.add>div{background-position: center; background-repeat: no-repeat; background-size: contain; width: 10vmin;}
#cskill>.add>input{width: 90%;}

#cportfolio>.change>div{display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cportfolio>.change>.roll>label{width: 90%; height: 5vmin; margin: 1vmin; display: flex; justify-content: space-between; align-items: center;}
#cportfolio>.change>.roll>label>input[type="radio"]{width: 5vmin; height: 5vmin;}
#cportfolio>.change>.roll>label>.text{width: 100%; height: 5vmin;display: flex; justify-content: space-between; align-items: center; text-indent:1vmin}
#cportfolio>.change>.roll>label>.type{width: 5vmin; height: 5vmin; background-position: center; background-repeat: no-repeat;  background-size: 80%; background-color: #f4f4f4;}
#cportfolio>.change>div>input{width: 90%; }
#cportfolio>.change>div>textarea{width: 90%; resize: vertical; min-height: 10vmin;}
#cportfolio>.change>div>div>img{width: 10vmin ; height: 10vmin;}
#cportfolio>.change>div>input[type="submit"]{width: 90%; margin: 1%; cursor: pointer;}
#cportfolio>.add>div{width: 100%; height: auto; display: flex; flex-direction: column;  justify-content: space-around; align-items: center; }
#cportfolio>.add>div>input{width: 90%;}
#cportfolio>.add>div>textarea{width: 90%; resize: vertical; min-height: 10vmin;}
#cportfolio>.add>.type{width: 100%; height: auto; display: flex; justify-content: space-around; align-items: center; flex-direction: row; flex-wrap: wrap;}
#cportfolio>.add>.type>label{width: 33%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
#cportfolio>.add>.type>label>input{width: 1.5vmin; height: 1.5vmin;}
#cportfolio>.add>.type>label>input:checked~.type{box-shadow: 0 0 0 0.2vmin #366ce1 inset;}
#cportfolio>.add>.type>label>.type{width: 5vmin; height: 5vmin; display: block; background-color: #f4f4f4; background-size: 70%; background-position: center; background-repeat: no-repeat;}
#cportfolio>.add>.type>label>.text{font-size: 1.5vmin;}
#cportfolio>.add>div>div>img{width: auto ; height: 10vmin;}

.tit{width: 100%; height: auto; text-align: center;}
.maintitle{width: 100%; background-color: #0c0c0c; display: flex; justify-content: space-around; align-items: center; height: 5vmin;padding-bottom: 2vmin;margin-top: 1vmin; color: #f4f4f4;border-top: 0.1vmin solid #366ce1;}
input[value="Add"]{width: 90%; margin: 1vmin; cursor: pointer;}
input[value="Remove"]{width: 90%; margin: 1vmin; cursor: pointer;}
input[value="Change"]{width: 90%; margin: 1vmin; cursor: pointer;}
input[value="Delete"]{width: 90%; margin: 1vmin; cursor: pointer;}
.fortitle{width: 100%; height: 5vmin; background-color: #0c0c0c; color: #f4f4f4; display: flex; justify-content: space-around; align-items: center; font-weight: 500; border-top: 0.1vmin solid #f4f4f4;}
.titleson{width: 100%; height: 5vmin; background-color: #0c0c0c; color: #f4f4f4; border-top: 0.3vmin solid #f4f4f4; display: flex; justify-content: space-around; align-items: center; font-weight: 500;}
input:focus{outline: solid #f4f4f4; box-shadow: 0 0 0 0.3vmin  #0c0c0c inset;}
#h1,#h2,#h3{fill: transparent;transition: 1s;}#h0{transition: 1s;}
.a1{fill:#366ce1;}.b1{fill:#4d4d4d;}.c1{fill:#0c0c0c;}.d1{fill:#212121;}.e{fill:#eadc36;}.f{opacity:0.15;}
</style>
</head>
<body onload="loadContent();">
<div class="functions">
<div class="top">
<div class="type" onclick="changeType();">
<div class="option s" id="userpage">
<div class="logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Profile</title><circle class="a" cx="170.079" cy="170.079" r="170.079"/><path class="b" d="M275.519,303.527a170.07,170.07,0,0,1-210.88,0A105.474,105.474,0,0,1,140.5,203.308a65.2,65.2,0,1,1,59.16,0A105.474,105.474,0,0,1,275.519,303.527Z"/></svg></div>
<div class="title">User</div>
<div class="selection"></div>
</div>
<div class="option" id="developerpage">
<div class="logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Developer</title><circle class="a" cx="170" cy="170" r="170"/><path class="b" d="M295,170.111c-30-33.333-55-66.666-85-100h40c30.052,33.36,55.105,66.719,85.157,100.079C305.105,203.5,280.052,236.8,250,270.111H210C240,236.778,265,203.445,295,170.111Z"/><path class="b" d="M207.935,4.222q-22.216,167.9-44.451,335.81a169.964,169.964,0,0,1-32.459-4.39q21.523-167.8,43.04-335.6A170.114,170.114,0,0,1,207.935,4.222Z"/><path class="b" d="M45.157,170.111c30,33.334,55,66.667,85,100h-40C60.105,236.752,35.052,203.392,5,170.032c30.052-33.307,55.105-66.614,85.157-99.921h40C100.157,103.445,75.157,136.778,45.157,170.111Z"/></svg></div>
<div class="title">Developer</div>
<div class="selection"></div>
</div>
</div>
</div>
<!-- <div class="left"></div>
<div class="right"></div> -->
</div>
<div class="content" id="d">
<form class="function" action="" method="POST"><button name="quitaccount"><div class="logo">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="b" y="295.39" width="0.53" height="44.61"/><rect class="b" x="340" y="295.39" width="0.53" height="44.61"/><path class="b" d="M340,191.775V340H.53V191.775A22.3,22.3,0,0,1,22.835,169.47h0A22.3,22.3,0,0,1,45.14,191.775V295.39H295.92V191.775a22.3,22.3,0,0,1,22.305-22.305h0A22.3,22.3,0,0,1,340,191.775Z"/><path class="b" d="M245.4,106.42a22.3,22.3,0,0,1-31.54,0L192.99,85.55v97.62a42.915,42.915,0,0,1-22.42,79.48h-.04a42.916,42.916,0,0,1-22.15-79.67V85.24L127.2,106.42A22.306,22.306,0,0,1,95.65,74.88L170.53,0l74.88,74.88A22.292,22.292,0,0,1,245.4,106.42Z"/></svg></div><div class="title">Quit from account</div></button></form>
<div class="userinfo">
<div class="title">User information</div>
<div class="data">
<form action="#"><label>ID: </label><input type="number" id="userid" readonly></form>
<form action="#"><label>Name: </label><input type="text" name="name" id="username" readonly></form>
<form action="#"><label>Middle name: </label><input type="text" name="username" id="usermidname" readonly></form>
<form action="#"><label>Surname: </label><input type="text" name="usersurname" id="usersurname" readonly></form>
<form action="#"><label>Birthtime: </label><input type="text" name="userbithtime" id="userbirthtime" readonly></form>
<form action="#"><label>Birthplace: </label><input type="text" name="userbirthplace" id="userbirthplace" readonly></form>
</div>
</div>
<div class="space">
<div id="photo"><div class="titleson">Photo<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<div class="change">
<form action="i/lremove.php" method="POST" class="left">
</form>
<form action="i/rremove.php" method="POST" class="right">
</form>
</div>
<div class="maintitle">Add</div>
<div class="add">
<form action="i/ladd.php" method="POST" class="left" enctype="multipart/form-data">
<div id="addedpl"></div>
<input type="file" name="leftfile" id="addpl" accept="image/jpeg" onchange="fileImage();" required>
<input type="submit" value="Add">
</form>
<form action="i/radd.php" method="POST" class="right" enctype="multipart/form-data">
<div id="addedpr"></div>
<input type="file" name="rightfile" id="addpr" accept="image/jpeg" onchange="fileImage();" required>
<input type="submit" value="Add">
</form>
</div>
</div>
<div id="contacts"><div class="titleson">Contact<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="account">
<div class="fortitle">Account</div>
<div class="maintitle">Change</div>
<form action="c/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="roll">
</div>
<div id="changeaccount"></div>
</form>
<div class="maintitle">Add</div>
<form action="c/aadd.php" method="POST" class="add"  enctype="multipart/form-data">
<div class="tit">Name</div>
<input type="text" name="addname" id="addan" minlength="4" maxlength="123" placeholder="min - 4, max-123" required >
<div class="tit">Hyperlink</div>
<input type="url" name="addurl" id="addau" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Logotype</div>
<input type="file" name="addlogo" id="addal" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedal"></div>
<input type="submit" value="Add">
</form>
</div>
<div class="email">
<div class="fortitle">Email</div>
<div class="maintitle">Change</div>
<form action="c/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="roll">
</div>
<div id="changeemail"></div>
</form>
<div class="maintitle">Add</div>
<form action="c/eadd.php" method="POST" class="add"  enctype="multipart/form-data">
<div class="tit">Name</div>
<input type="text" name="addname" id="adden" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">E-mail</div>
<input type="email" name="addurl" id="addeu" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Logotype</div>
<input type="file" name="addlogo" id="addel" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedel"></div>
<input type="submit" value="Add">
</form>
</div>
<div class="location">
<div class="fortitle">Location</div>
<div class="maintitle">Change</div>
<form action="c/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="roll">
</div>
<div id="changelocation"></div>
</form>
<div class="maintitle">Add</div>
<form action="c/ladd.php" method="POST" class="add"  enctype="multipart/form-data">
<div class="tit">Name</div>
<input type="text" name="addname" id="addln" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Location</div>
<input type="text" name="addurl" id="addlu" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Logotype</div>
<input type="file" name="addlogo" id="addll" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedll"></div>
<input type="submit" value="Add">
</form>
</div>
<div class="phone">
<div class="fortitle">Phone</div>
<div class="maintitle">Change</div>
<form action="c/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="roll">
</div>
<div id="changephone"></div>
</form>
<div class="maintitle">Add</div>
<form action="c/padd.php" method="POST" class="add" enctype="multipart/form-data">
<div class="tit">Name</div>
<input type="text" name="addname" id="addpn" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Phone</div>
<input type="tel" name="addurl" id="addpu" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Logotype</div>
<input type="file" name="addlogo" id="addpl" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedpl"></div>
<input type="submit" value="Add">
</form>
</div>
</div>
<div id="ceducation"><div class="titleson">Education<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<form action="e/change.php" method="POST" class="change">
<div class="tit">List</div>
<div class="roll">
</div>
<div id="changeeducation"></div>
</form>
<div class="maintitle">Add</div>
<form action="e/add.php" method="POST" class="add">
<div class="type"><div class="tit">Type</div>
<label for="addt1e"><input type="radio" name="addtype" id="addt1e" value="1" required><div class="type" style="background-image:url(file/institute.svg)"></div><div class="text">Institute</div></label>
<label for="addt2e"><input type="radio" name="addtype" id="addt2e" value="2"><div class="type" style="background-image:url(file/course.svg)"></div><div class="text">Course</div></label>
<label for="addt3e"><input type="radio" name="addtype" id="addt3e" value="3"><div class="type" style="background-image:url(file/profile.svg)"></div><div class="text">Profile</div></label>
</div>
<div class="title"><div class="tit">Title</div><input type="text" name="addtitle" id="addt" minlength="4" maxlength="123" placeholder="min - 4, max-123" required></div>
<div class="start"><div class="tit">Start date</div><input type="date" name="addstart" id="adds" required></div>
<div class="end"><div class="tit">End date</div><input type="date" name="addend" id="adde" required></div>
<div class="file"><div class="tit">File</div><input type="file" name="addfile" id="addf" onchange="fileDocument();" required></div>
<input type="submit" value="Add">
</form>
</div>
<div id="cwork"><div class="titleson">Work<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<form action="w/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="tit">List</div>
<div class="roll">
</div>
<div id="changework">
</div>
</form>
<div class="maintitle">Add</div>
<form action="w/add.php" method="POST" class="add" enctype="multipart/form-data">
<div class="tit">Type</div>
<div class="type">
<label for="addt1w"><input type="radio" name="addtype" id="addt1w" value="1" required><div class="type"  style="background-image:url(file/official.svg);"></div><div class="text">Official</div></label>
<label for="addt2w"><input type="radio" name="addtype" id="addt2w" value="2"><div class="type"  style="background-image:url(file/unofficial.svg);"></div><div class="text">Unofficial</div></label>
<label for="addt3w"><input type="radio" name="addtype" id="addt3w" value="3"><div class="type"  style="background-image:url(file/parttime.svg);"></div><div class="text">Part-time</div></label>
</div>
<div class="tit">Title</div>
<input type="text" name="addtitle" id="addwti" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Start</div>
<input type="date" name="addstart" id="addwst" required>
<div class="tit">End</div>
<input type="date" name="addend" id="addwen" required>
<div class="tit">Position</div>
<input type="text" name="addposition" id="addwpo" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">Salary</div>
<input type="number" name="addsalary" id="addwsa" min="0" max="999999999" placeholder="$" required>
<input type="submit" value="Add">
</form>
</div>
<div id="cskill"><div class="titleson">Skill<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<form action="s/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="tit">List</div>
<div class="roll">
</div>
<div id="changeskill">
</div>
</form>
<div class="maintitle">Add</div>
<form action="s/add.php" method="POST" class="add" enctype="multipart/form-data">
<div class="tit">Type</div>
<div class="type">
<label for="addt1s"><input type="radio" name="addtype" id="addt1s" value="1" required><div class="type" style="background-image:url(file/object.svg);"></div><div class="text">Object</div></label>
<label for="addt2s"><input type="radio" name="addtype" id="addt2s" value="2"><div class="type" style="background-image:url(file/relate.svg);"></div><div class="text">Relate</div></label>
<label for="addt3s"><input type="radio" name="addtype" id="addt3s" value="3"><div class="type" style="background-image:url(file/environment.svg);"></div><div class="text">Environment</div></label>
</div>
<div class="tit">Title</div>
<input type="text" name="addtitle" id="addsti" minlength="4" maxlength="123" placeholder="min - 4, max-123" required>
<div class="tit">E-Type</div>
<div class="etype">
<label for="adde1s"><input type="radio" name="addetype" id="adde1s" value="1" required><div class="type" style="background-image:url(file/text.svg);"></div><div class="text">Text</div></label>
<label for="adde2s"><input type="radio" name="addetype" id="adde2s" value="2"><div class="type" style="background-image:url(file/document.svg);"></div><div class="text">Document</div></label>
<label for="adde3s"><input type="radio" name="addetype" id="adde3s" value="3"><div class="type" style="background-image:url(file/video.svg);"></div><div class="text">Video</div></label>
<label for="adde4s"><input type="radio" name="addetype" id="adde4s" value="4"><div class="type" style="background-image:url(file/photo.svg);"></div><div class="text">Photo</div></label>
<label for="adde5s"><input type="radio" name="addetype" id="adde5s" value="5"><div class="type" style="background-image:url(file/music.svg);"></div><div class="text">Music</div></label>
</div>
<div class="tit">Skill</div>
<input type="number" name="addskill" id="addssk" min="1" max="100" placeholder="%" required>
<div class="tit">Time</div>
<input type="number" name="addtime" id="addstime" min="1" placeholder="hours" required>
<div class="tit">Logo</div>
<input type="file" name="addlogo" id="addslo" accept="image/svg+xml" onchange="fileLogotype();" required>
<div id="addedslo"></div>
<input type="submit" value="Add">
</form>
</div>
<div id="cportfolio"><div class="titleson">Portfolio<button onclick="openNewtab();">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="a" y="295.39" width="0.53" height="44.61"/><rect class="a" x="340" y="295.39" width="0.53" height="44.61"/><path class="a" d="M340,191.77V340H.53V0H148.75a22.305,22.305,0,1,1,0,44.61H45.14V295.39H295.92V191.77a22.308,22.308,0,0,1,22.3-22.3h.01A22.308,22.308,0,0,1,340,191.77Z"/><path class="a" d="M340,0V105.73a22.31,22.31,0,0,1-22.3,22.31h-.01a22.31,22.31,0,0,1-22.3-22.31V76.15l-83.64,83.64a42.921,42.921,0,1,1-31.54-31.54l83.64-83.64H234.79a22.308,22.308,0,0,1-22.3-22.3V22.3A22.308,22.308,0,0,1,234.79,0Z"/></svg>New tab</button></div>
<div class="maintitle">Change</div>
<form action="p/change.php" method="POST" class="change" enctype="multipart/form-data">
<div class="tit">List</div>
<div class="roll">
</div>
<div id="changeportfolio"></div>
</form>
<div class="maintitle">Add</div>
<form action="p/add.php" method="POST" class="add" enctype="multipart/form-data">
<div class="tit">Type</div>
<div class="type">
<label for="addt1p"><input type="radio" name="addtype" id="addt1p" value="1" required onchange="addPortFile()"><div class="type" style="background-image:url(file/text.svg);"></div><div class="text">Text</div></label>
<label for="addt2p"><input type="radio" name="addtype" id="addt2p" value="2" onchange="addPortFile()"><div class="type" style="background-image:url(file/document.svg);"></div><div class="text">Document</div></label>
<label for="addt3p"><input type="radio" name="addtype" id="addt3p" value="3" onchange="addPortFile()"><div class="type" style="background-image:url(file/video.svg);"></div><div class="text">Video</div></label>
<label for="addt4p"><input type="radio" name="addtype" id="addt4p" value="4" onchange="addPortFile()"><div class="type" style="background-image:url(file/photo.svg);"></div><div class="text">Photo</div></label>
<label for="addt5p"><input type="radio" name="addtype" id="addt5p" value="5" onchange="addPortFile()"><div class="type" style="background-image:url(file/music.svg);"></div><div class="text">Music</div></label>
</div>
<div id="addportfolio">

</div>
</form>
</div>
</div>
</div>
</div>
<div class="content s" id="u">
<div class="downpick" onclick="changeSign();"><div class="button o">You</div><div class="button">Me</div></div>
<div id="ul" class="contents o">
<div class="list">
<?php
$sql = "SELECT * FROM user WHERE ID!='$id'";
$users = $conn->query($sql);
if ($users->num_rows > 0) {
while($raw = $users->fetch_assoc()) {
?>
<form action="" method="GET"><input type="number" name="id" class="id" value="<?php echo $raw['ID']; ?>" readonly><div class="name"><?php echo $raw['first']; ?></div><div class="midname"><?php echo $raw['name']; ?></div><div class="surname"><?php echo $raw['last']; ?></div><input type="submit" value="Open"></form>
<?php
}}
?>
</div>
</div>
<div id="um" class="contents">
<form class="function" action="" method="POST"><button name="quitaccount"><div class="logo">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><rect class="b" y="295.39" width="0.53" height="44.61"/><rect class="b" x="340" y="295.39" width="0.53" height="44.61"/><path class="b" d="M340,191.775V340H.53V191.775A22.3,22.3,0,0,1,22.835,169.47h0A22.3,22.3,0,0,1,45.14,191.775V295.39H295.92V191.775a22.3,22.3,0,0,1,22.305-22.305h0A22.3,22.3,0,0,1,340,191.775Z"/><path class="b" d="M245.4,106.42a22.3,22.3,0,0,1-31.54,0L192.99,85.55v97.62a42.915,42.915,0,0,1-22.42,79.48h-.04a42.916,42.916,0,0,1-22.15-79.67V85.24L127.2,106.42A22.306,22.306,0,0,1,95.65,74.88L170.53,0l74.88,74.88A22.292,22.292,0,0,1,245.4,106.42Z"/></svg></div><div class="title">Quit from account</div></button></form>
<div class="photo">
<div class="left">
<div class="image"><img src="" id="umpl"></div>
<div class="list"></div>
</div>
<div class="right">
<div class="image"><img src="" id="umpr"></div>
<div class="list"></div>
</div>
</div>
<div class="info"></div>
<div class="contact">
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Profile</title><path class="b" d="M317.205,340H22.955A21.308,21.308,0,0,1,1.941,315.494C13.952,233.638,85.225,169.96,170.16,170c84.875.04,156.058,63.7,168.06,145.5A21.308,21.308,0,0,1,317.205,340Z"/><circle class="b" cx="170.079" cy="85" r="85"/></svg></div>
<div class="body"></div>
<form class="action" action="" method="POST"><div class="move"><div class="button" id="countal"><</div><div class="c"><input type="text" name="hyperlink" id="hypera"><input class="roll" type="range" id="scrolla" step="1" value="1" min="1"><input type="text" name="count" id="counta" readonly></div><div class="button" id="countar">></div></div><div class="remove"><label for="deletea">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="deletea"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.16 340.16"><path class="b" d="M269.7,162.18c-.146-1.9-.4-4.519-.881-7.612a114.18,114.18,0,0,0-3.529-14.978,100.038,100.038,0,1,0-27.44,103.86,55.506,55.506,0,0,0,21.96,20.59A55.08,55.08,0,0,0,339.94,220c.15-1.62.22-3.26.22-4.92v-45A170.08,170.08,0,1,0,170.08,340.16a20.08,20.08,0,0,0,0-40.16A129.92,129.92,0,1,1,299.75,161.98a2.335,2.335,0,0,1,.25.07V215a15,15,0,0,1-14.61,14.99c-.13.01-.26.01-.39.01a15.015,15.015,0,0,1-14.84-12.8A17.1,17.1,0,0,1,270,215a14.673,14.673,0,0,1,.16-2.2C270.347,211.5,270.279,198.17,269.7,162.18ZM170,230a60,60,0,1,1,60-60A60,60,0,0,1,170,230Z"/></svg></div>
<div class="body"></div>
<form class="action" action="" method="POST"><div class="move"><div class="button" id="countml"><</div><div class="c"><input type="text" name="hyperlink" id="hyperm"><input class="roll" type="range" id="scrollm" step="1" value="1" min="1"><input type="text" name="count" id="countm" readonly></div><div class="button" id="countmr">></div></div><div class="remove"><label for="deletem">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="deletem"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340.157 340"><path class="b" d="M3.443,96.473,142.822,326.016c11.193,18.434,43.138,18.439,54.34.008q69.774-114.8,139.547-229.607C351.9,71.427,313.454,47.853,288.731,67L190.8,142.822c-11.7,9.058-29.938,9.055-41.632-.008L51.437,67.069C26.723,47.916-11.734,71.478,3.443,96.473Z"/><circle class="b" cx="170.079" cy="65.079" r="65.079"/></svg></div>
<div class="body"></div>
<form class="action" action="" method="POST"><div class="move"><div class="button" id="countll"><</div><div class="c"><input type="text" name="hyperlink" id="hyperl"><input class="roll" type="range" id="scrolll" step="1" value="1" min="1"><input type="text" name="count" id="countl" readonly></div><div class="button" id="countlr">></div></div><div class="remove"><label for="deletel">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="deletel"></div></form>
</div>
<div class="block">
<div class="title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 339.97 339.97"><path class="b" d="M339.606,60.291a21.835,21.835,0,0,1-5.149,17.249,245.444,245.444,0,0,1-34.432,32.485,244.761,244.761,0,0,1-41.276,25.884,21.607,21.607,0,0,1-18.878.166,72.091,72.091,0,0,1-29.846-26.05c-.113-.176-.225-.353-.336-.529a21.856,21.856,0,0,0-33.375-4.525q-18,16.692-36.289,35.054-18.291,18.4-34.883,36.533a21.884,21.884,0,0,0,4.607,33.291l.276.176a72.091,72.091,0,0,1,26.05,29.846,21.607,21.607,0,0,1-.166,18.878,244.761,244.761,0,0,1-25.884,41.276A245.444,245.444,0,0,1,77.54,334.457a21.835,21.835,0,0,1-17.249,5.149,69.344,69.344,0,0,1-40.266-19.581c-20.47-20.54-20.13-46.23-20-50.55l.45-.45A533.114,533.114,0,0,1,269.025.475l.45-.45c4.32-.13,30.01-.47,50.55,20A69.344,69.344,0,0,1,339.606,60.291Z"/></svg></div>
<div class="body"></div>
<form class="action" action="" method="POST"><div class="move"><div class="button" id="countpl"><</div><div class="c"><input type="text" name="hyperlink" id="hyperp"><input class="roll" type="range" id="scrollp" step="1" value="1" min="1"><input type="text" name="count" id="countp" readonly></div><div class="button" id="countpr">></div></div><div class="remove"><label for="deletep">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255.233 340.157"><path class="b" d="M183.075,340.157H72.315a28.347,28.347,0,0,1-28.062-24.339L9.114,69.706A8.5,8.5,0,0,1,17.533,60H237.857a8.5,8.5,0,0,1,8.419,9.706L211.137,315.818A28.346,28.346,0,0,1,183.075,340.157Z"/><path class="b" d="M246.725,50H8.508A8.5,8.5,0,0,1,.258,39.434l1.991-7.963A28.346,28.346,0,0,1,29.749,10H52.616L65.474,1.428A8.505,8.505,0,0,1,70.191,0H185.042a8.505,8.505,0,0,1,4.717,1.428L202.616,10h22.868a28.346,28.346,0,0,1,27.5,21.471l1.991,7.963A8.5,8.5,0,0,1,246.725,50Z"/></svg></label><input type="submit" id="deletep"></div></form>
</div>
</div>
<div class="education">
<div class="titleson">Education</div>
<div class="list" id="edustate"><div id="edulist" class="content"></div></div>
</div>
<div class="work">
<div class="titleson">Work</div>
<div class="list" id="worstate"><div id="worlist" class="content"></div></div>
</div>
<div class="skill">
<div class="titleson">Skill</div>
<div class="list" id="skistate"><div id="skilist" class="content"></div></div>
</div>
<div class="portfolio">
<div class="titleson">Portfolio</div>
<div class="list" id="porstate"><div id="porlist" class="content">
</div></div>
</div>
</div>
</div>
</body>
<script>
function fileLogotype(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){
alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')
}else if(file.size/1024/1024<10){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else{file.value='';alert('Uploading error: maximum logotype size - 10MB, this file - '+file.name+' - '+(file.size/1024/1024)+'MB');}
if(el===document.getElementById('addal')){document.getElementById('addedal').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedal').style.height="10vmin"}
if(el===document.getElementById('addel')){document.getElementById('addedel').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedel').style.height="10vmin"}
if(el===document.getElementById('addll')){document.getElementById('addedll').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedll').style.height="10vmin"}
if(el===document.getElementById('addpl')){document.getElementById('addedpl').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedpl').style.height="10vmin"}
if(el===document.getElementById('addslo')){document.getElementById('addedslo').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";document.getElementById('addedslo').style.height="10vmin"}
if(el===document.getElementById('changeslo')){document.getElementById('changedslo').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
if(el===document.getElementById('changeal')){document.getElementById('changedal').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
if(el===document.getElementById('changeel')){document.getElementById('changedel').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
if(el===document.getElementById('changell')){document.getElementById('changedll').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
if(el===document.getElementById('changepl')){document.getElementById('changedpl').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}
}
function fileDocument(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')}else if(file.size/1024/1024<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else{file.value='';alert('Uploading error: maximum document size - 1024MB, this file - '+file.name+' - '+(file.size/1024/1024)+'MB');}
}
function fileVideo(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')}else if(file.size/1024/1024<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else if(file.size/1024/1024/1024<4){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024/1024).toFixed(2)+'GB')}else{file.value='';alert('Uploading error: maximum video size - 4GB, this file - '+file.name+' - '+(file.size/1024/1024/1024)+'GB');}
}
function fileImage(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')}else if(file.size/1024/1024<12){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else{file.value='';alert('Uploading error: maximum image size - 12MB, this file - '+file.name+' - '+(file.size/1024/1024)+'MB');}
if(el===document.getElementById('addpvco')){addedpvco.getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0])}
if(el===document.getElementById('addpmco')){addedpmco.getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0])}
if(el===document.getElementById('addpr')){document.getElementById('addedpr').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";}
if(el===document.getElementById('addpl')){document.getElementById('addedpl').style.backgroundImage="url("+URL.createObjectURL(event.target.files[0])+")";}
if(el===document.getElementById('changepco')){document.getElementById('changedpco').getElementsByTagName('img')[0].src=URL.createObjectURL(event.target.files[0]);}

}
function fileAudio(e){var el=e ? e.target : window.event.srcElement;
var file = el.files[0],
ext = "Not detected",
parts = file.name.split('.');
if(parts.length > 1) ext = parts.pop();
if((file.size/1024)<1024){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024).toFixed(2)+'KB')}else if(file.size/1024/1024<12){alert(' Successfully uploaded: '+file.name+' - '+(file.size/1024/1024).toFixed(2)+'MB')}else{file.value='';alert('Uploading error: maximum audio size - 12MB, this file - '+file.name+' - '+(file.size/1024/1024)+'MB');}
}
addstime.max=(now.getTime()/1000/60/60-user[4].getTime()/1000/60/60).toFixed()-1234;
function addPortFile(e){var el=e ? e.target : window.event.srcElement;
if(el.value==1){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Text</div><textarea name="addtext" id="addpte" cols="30" rows="10" required minlength="9" maxlength="999999999"></textarea><input type="submit" value="Add">'
}
else if(el.value==2){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Description</div><input type="text" name="adddescription" id="addpde" required minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="addfile" id="addpfi" onchange="fileDocument();" required><input type="submit" value="Add">'
}
else if(el.value==3){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Description</div><input type="text" name="adddescription" id="addpde" required minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="addfile" id="addpfi" accept="video/mp4" onchange="fileVideo();" required><input type="submit" value="Add">'
}
else if(el.value==4){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Description</div><input type="text" name="adddescription" id="addpde" required minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="addfile" id="addpfi" accept="image/jpeg" onchange="fileImage();" required><div id="addedppco"></div><input type="submit" value="Add">'
}
else if(el.value==5){
addportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="addtitle" id="addpti" required minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">File</div><input type="file" name="addfile" id="addpfi" accept="music/mp3" onchange="fileAudio();" required><input type="submit" value="Add">'
}

}

function portfolioChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),fs=sign.substr(-2,1),fs=parseInt(fs,10),t1='',t2='',t3='',t4='',t5='';
if(portfolio[fs].type==1){
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Text</div><textarea name="changetext" id="changepte" cols="30" rows="10" minlength="9" maxlength="999999999">'+portfolio[fs].text+'</textarea><input type="submit" value="Change"><input type="submit" value="Delete">';
}
else if(portfolio[fs].type==2){t2='checked'
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Description</div><input type="text" name="changedescription" id="changepde" value="'+portfolio[fs].description+'" minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="changefile" id="changepfi" onchange="fileDocument();"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
else if(portfolio[fs].type==3){t3='checked'
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Description</div><input type="text" name="changedescription" id="changepde" value="'+portfolio[fs].description+'" minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="changefile" id="changepfi" accept="video/mp4" onchange="fileVideo();"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
else if(portfolio[fs].type==4){t4='checked'
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Description</div><input type="text" name="changedescription" id="changepde" value="'+portfolio[fs].description+'" minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="changefile" id="changepfi" accept="image/jpeg" onchange="fileImage();"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
else if(portfolio[fs].type==5){t5='checked'
changeportfolio.innerHTML='<div class="tit">Title</div><input type="text" name="changetitle" id="changepti" value="'+portfolio[fs].name+'" readonly><div class="tit">Description</div><input type="text" name="changedescription" id="changepde" value="'+portfolio[fs].description+'" minlength="9" maxlength="321" placeholder="min-9,max-321"><div class="tit">File</div><input type="file" name="changefile" id="changepfi" accept="music/mp3" onchange="fileAudio();"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
}
function skillChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),fs=sign.substr(-2,1),fs=parseInt(fs,10),t1='',t2='',t3='',et1='',et2='',et3='',et4='',et5='';
if(skill[fs].type==1){t1='checked'}else if(skill[fs].type==2){t2='checked'}else if(skill[fs].type==3){t3='checked'}
if(skill[fs].etype==1){et1='checked'}else if(skill[fs].etype==2){et2='checked'}else if(skill[fs].etype==3){et3='checked'}else if(skill[fs].etype==4){et4='checked'}else if(skill[fs].etype==5){et5='checked'}
changeskill.innerHTML='<div class="tit">Type</div><div class="type"><label for="changet1s"><input type="radio" name="changetype" id="changet1s" value="1" '+t1+' required readonly><div class="type" style="background-image:url(file/object.svg);"></div><div class="text">Object</div></label><label for="changet2s"><input type="radio" name="changetype" id="changet2s" value="2" '+t2+' readonly><div class="type" style="background-image:url(file/relate.svg);"></div><div class="text">Relate</div></label><label for="changet3s"><input type="radio" name="changetype" id="changet3s" value="3" '+t3+' readonly><div class="type" style="background-image:url(file/environment.svg);"></div><div class="text">Environment</div></label></div><div class="tit">Title</div><input type="text" name="changetitle" id="changesti" value="'+skill[fs].name+'" readonly><div class="tit">E-Type</div><div class="etype"><label for="changee1s"><input type="radio" name="changeetype" id="changee1s" value="1" '+et1+' required><div class="type" style="background-image:url(file/text.svg);"></div><div class="text">Text</div></label><label for="changee2s"><input type="radio" name="changeetype" id="changee2s" value="2" '+et2+'><div class="type" style="background-image:url(file/document.svg);"></div><div class="text">Document</div></label><label for="changee3s"><input type="radio" name="changeetype" id="changee3s" value="3" '+et3+'><div class="type" style="background-image:url(file/video.svg);"></div><div class="text">Video</div></label><label for="changee4s"><input type="radio" name="changeetype" id="changee4s" value="4" '+et4+'><div class="type" style="background-image:url(file/photo.svg);"></div><div class="text">Photo</div></label><label for="changee5s"><input type="radio" name="changeetype" id="changee5s" value="5" '+et5+'><div class="type" style="background-image:url(file/music.svg);"></div><div class="text">Music</div></label></div><div class="tit">Skill</div><input type="number" name="changeskill" id="changessk" value="'+skill[fs].skill+'" min="0" max="100"><div class="tit">Time</div><input type="number" name="changetime" id="changestime" value="'+skill[fs].time+'" min="0"><div class="tit">Logo</div><input type="file" name="changelogo" id="changeslo" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedslo"><img src="file/'+skill[fs].logo+'"></div></div><input type="submit" value="Change"><input type="submit" value="Delete">';}
function workChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),fs=sign.substr(-2,1),fs=parseInt(fs,10),t1='',t2='',t3='';
if(work[fs].type==1){t1='checked'}else if(work[fs].type==2){t2='checked'}else if(work[fs].type==3){t3='checked'}
var times='',timee='',tsd=work[fs].start.getDate(),tsm=work[fs].start.getMonth(),tsy=work[fs].start.getFullYear(),ted=work[fs].end.getDate(),tem=work[fs].start.getMonth(),tey=work[fs].end.getFullYear();
if(tsd<10){tsd='0'+tsd}if(tsm<10){tsm='0'+tsm}
if(ted<10){ted='0'+ted}if(tem<10){tem='0'+tem}
timestart=tsy+'-'+tsm+'-'+tsd,timeend=tey+'-'+tem+'-'+ted;
changework.innerHTML='<div class="tit">Type</div><div class="type"><label for="changet1w"><input type="radio" name="changetype" id="changet1w" value="1" '+t1+' required readonly><div class="type"  style="background-image:url(file/official.svg);"></div><div class="text">Official</div></label><label for="changet2w"><input type="radio" name="changetype" id="changet2w" value="2" '+t2+' readonly><div class="type"  style="background-image:url(file/unofficial.svg);"></div><div class="text">Unofficial</div></label><label for="changet3w"><input type="radio" name="changetype" id="changet3w" value="3" '+t3+' readonly><div class="type"  style="background-image:url(file/parttime.svg);"></div><div class="text">Part-time</div></label></div><div class="tit">Title</div><input type="text" name="changetitle" id="changewti" value="'+work[fs].name+'" readonly><div class="tit">Start</div><input type="date" name="changestart" id="changewst" value="'+timestart+'"><div class="tit">End</div><input type="date" name="changeend" id="changewen" value="'+timeend+'"><div class="tit">Position</div><input type="text" name="changeposition" id="changewpo" value="'+work[fs].position+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Salary</div><input type="number" name="changesalary" id="changewsa" value="'+work[fs].salary+'" min="0" max="999999999" placeholder="$"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
function educationChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),fs=sign.substr(-2,1),fs=parseInt(fs,10),t1='',t2='',t3='';
if(education[fs].type==1){t1='checked'}else if(education[fs].type==2){t2='checked'}else if(education[fs].type==3){t3='checked'}
var times='',timee='',tsd=education[fs].start.getDate(),tsm=education[fs].start.getMonth(),tsy=education[fs].start.getFullYear(),ted=education[fs].end.getDate(),tem=education[fs].start.getMonth(),tey=education[fs].end.getFullYear();
if(tsd<10){tsd='0'+tsd}if(tsm<10){tsm='0'+tsm}
if(ted<10){ted='0'+ted}if(tem<10){tem='0'+tem}
timestart=tsy+'-'+tsm+'-'+tsd,timeend=tey+'-'+tem+'-'+ted;
changeeducation.innerHTML='<div class="type"><div class="tit">Type</div><label for="changet1e"><input type="radio" name="changetype" id="changet1e" value="1" '+t1+' required readonly><div class="type" style="background-image:url(file/institute.svg)"></div><div class="text">Institute</div></label><label for="changet2e"><input type="radio" name="changetype" id="changet2e" value="2" '+t2+' readonly><div class="type" style="background-image:url(file/course.svg)"></div><div class="text">Course</div></label><label for="changet3e"><input type="radio" name="changetype" id="changet3e" value="3" '+t3+' readonly><div class="type" style="background-image:url(file/profile.svg)"></div><div class="text">Profile</div></label></div><div class="tit">Title</div><input type="text" name="changetitle" id="changeeti" value="'+education[fs].name+'" readonly><div class="tit">Start date</div><input type="date" name="changestart" id="changeest" value="'+timestart+'"><div class="tit">End date</div><input type="date" name="changeend" id="changeeen" value="'+timeend+'"><div class="tit">File</div><input type="file" name="changefile" id="changeefi"><input type="submit" value="Change"><input type="submit" value="Delete">';
}
function contactChoosen(e){var el=e ? e.target : window.event.srcElement;var sign=el.id.substr(-2),ls=sign.substr(-1),fs=sign.substr(-2,1),ls=parseInt(ls,10),fs=parseInt(fs,10);if(fs==0){changeaccount.innerHTML='<div class="tit">Name</div><input type="text" name="changename" id="changean" value="'+contactes[fs][ls].title+'" readonly><div class="tit">Hyperlink</div><input type="url" name="changeurl" id="changeau" value="'+contactes[fs][ls].value+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Logotype</div><input type="file" name="changelogo" id="changeal" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedal"><img src="file/'+contactes[fs][ls].logo+'"></div><input type="submit" name="change" value="Change"><input type="submit" name="delete" value="Remove">';}
else if(fs==1){changeemail.innerHTML='<div class="tit">Name</div><input type="text" name="changename" id="changeen" value="'+contactes[fs][ls].title+'" readonly><div class="tit">E-mail</div><input type="email" name="changeurl" id="changeeu" value="'+contactes[fs][ls].value+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Logotype</div><input type="file" name="changelogo" id="changeel" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedel"><img src="file/'+contactes[fs][ls].logo+'"></div><input type="submit" name="change" value="Change"><input type="submit" name="delete" value="Remove">';}
else if(fs==2){changelocation.innerHTML='<div class="tit">Name</div><input type="text" name="changename" id="changeln" value="'+contactes[fs][ls].title+'" readonly><div class="tit">Location</div><input type="text" name="changeurl" id="changelu" value="'+contactes[fs][ls].value+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Logotype</div><input type="file" name="changelogo" id="changell" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedll"><img src="file/'+contactes[fs][ls].logo+'"></div><input type="submit" name="change" value="Change"><input type="submit" name="delete" value="Remove">';}
else if(fs==3){changephone.innerHTML='<div class="tit">Name</div><input type="text" name="changename" id="changepn" value="'+contactes[fs][ls].title+'" readonly><div class="tit">Phone</div><input type="tel" name="changeurl" id="changepu" value="'+contactes[fs][ls].value+'" minlength="4" maxlength="123" placeholder="min - 4, max-123"><div class="tit">Logotype</div><input type="file" name="changelogo" id="changepl" accept="image/svg+xml" onchange="fileLogotype();"><div id="changedpl"><img src="file/'+contactes[fs][ls].logo+'"></div><input type="submit" name="change" value="Change"><input type="submit" name="delete" value="Remove">';}
}
function changeType(){
userpage.classList.toggle('s');
developerpage.classList.toggle('s');
u.classList.toggle('s');
d.classList.toggle('s');
}
function changeSign(e){
var el=e ? e.target : window.event.srcElement;
el.parentNode.getElementsByClassName('button')[0].classList.toggle('o');
el.parentNode.getElementsByClassName('button')[1].classList.toggle('o');
el.parentNode.parentNode.getElementsByClassName('contents')[0].classList.toggle('o');
el.parentNode.parentNode.getElementsByClassName('contents')[1].classList.toggle('o');
}
countal.onclick=function(){
var v=scrolla.value, i=0, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v==1){x=x;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][x-1].logo+'">';scrolla.value=x;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][x-1].logo}else{v=v-1;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v-1].logo+'">';scrolla.value=v;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v-1].logo}
}
countar.onclick=function(){
var v=scrolla.value, i=0, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v<x){v=v;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v].logo+'">';ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v].logo;scrolla.value=v+1;}else if(v==x){ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';scrolla.value=1;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo}else{}
}
countml.onclick=function(){
var v=scrollm.value, i=1, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v==1){x=x;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][x-1].logo+'">';scrollm.value=x;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][x-1].logo}else{v=v-1;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v-1].logo+'">';scrollm.value=v;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v-1].logo}
}
countmr.onclick=function(){
var v=scrollm.value, i=1, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v<x){v=v;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v].logo+'">';ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v].logo;scrollm.value=v+1;}else if(v==x){ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';scrollm.value=1;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo}else{}
}
countll.onclick=function(){
var v=scrolll.value, i=2, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v==1){x=x;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][x-1].logo+'">';scrolll.value=x;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][x-1].logo}else{v=v-1;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v-1].logo+'">';scrolll.value=v;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v-1].logo}
}
countlr.onclick=function(){
var v=scrolll.value, i=2, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v<x){v=v;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v].logo+'">';ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v].logo;scrolll.value=v+1;}else if(v==x){ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';scrolll.value=1;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo}else{}
}
countpl.onclick=function(){
var v=scrollp.value, i=3, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v==1){x=x;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][x-1].logo+'">';scrollp.value=x;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][x-1].logo}else{v=v-1;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v-1].logo+'">';scrollp.value=v;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v-1].logo}
}
countpr.onclick=function(){
var v=scrollp.value, i=3, x=contactes[i].length, ume=document.getElementsByClassName('contact')[0].getElementsByClassName('block')[i];v=parseInt(v,10);
if(v<x){v=v;ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][v].logo+'">';ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][v].logo;scrollp.value=v+1;}else if(v==x){ume.getElementsByClassName('body')[0].innerHTML='<img src="file/'+contactes[i][0].logo+'">';scrollp.value=1;ume.getElementsByClassName('action')[0].getElementsByTagName('input')[2].value=contactes[i][0].logo}else{}
}
function leftPhoto(e){var el=e ? e.target : window.event.srcElement;
var ev=el.value, ev=parseInt(ev,10), ev=ev-1;
for(let r=0;r<leftphoto.length;r++){
if(um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[r].classList.contains('u')){um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[r].classList.toggle('u')}
}
umpl.src='file/'+leftphoto[ev];
um.getElementsByClassName('photo')[0].getElementsByClassName('left')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[ev].classList.toggle('u');
}
function rightPhoto(e){var el=e ? e.target : window.event.srcElement;
var ev=el.value, ev=parseInt(ev,10), ev=ev-1;
for(let r=0;r<rightphoto.length;r++){
if(um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[r].classList.contains('u')){um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[r].classList.toggle('u')}
}
umpr.src='file/'+rightphoto[ev];
um.getElementsByClassName('photo')[0].getElementsByClassName('right')[0].getElementsByClassName('list')[0].getElementsByTagName('input')[ev].classList.toggle('u');
}
function openNewtab(e){var el=e ? e.target : window.event.srcElement;
if(el.parentNode.parentNode===document.getElementById('cportfolio')){location.href='p/'}
if(el.parentNode.parentNode===document.getElementById('cskill')){location.href='s/'}
if(el.parentNode.parentNode===document.getElementById('cwork')){location.href='w/'}
if(el.parentNode.parentNode===document.getElementById('ceducation')){location.href='e/'}
if(el.parentNode.parentNode===document.getElementById('contacts')){location.href='c/'}
if(el.parentNode.parentNode===document.getElementById('photo')){}
}
</script>
</html>
<?php
}} else{
?>
<html>
<head>
<title>CC Profile</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="author" content="suicvairduCConstantinius">
<meta name="format-detection" content="telephone=no">
<script>

// function loadContent();{}
</script>
<style>
*{margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 1.4vmax;}
.f1x{display: flex; justify-content: space-around; align-items: center;}.fdc{flex-direction: column;}.fdrc{flex-direction: column-reverse;}
.h1d{display: none;}
.a{fill:#f4f4f4;}.b{fill:#0c0c0c;}

.functions>div{position: fixed;display: flex; justify-content: space-around; align-items: center;}
.functions>.left{left: 0;top: 0; height: 100vh; width: 10vmin;}
.functions>.right{right: 0;top: 0; height: 100vh; width: 10vmin;}
.functions>.top{left: 0;top: 0; height: 10vmin; width: 100%;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type{height: 100%; width: 80%;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type>.option{width: 50%; height: 100%; cursor: pointer;}
.functions>.top>.type>.option>.logo{width: 100%; height: 5vmin; background-color: #f4f4f4;display: flex; justify-content: space-around; align-items: center;}
.functions>.top>.type>.option>.logo>svg{width: 4.7vmin; height: 4.7vmin;}
.functions>.top>.type>.option>.title{width: 100%; height: 3vmin; background-color: #f4f4f4;display: flex; justify-content: space-around; align-items: center; font-size: 100%;}
.functions>.top>.type>.option.s>.title{font-weight: 500;}
.functions>.top>.type>.option>.selection{width: 100%; height: 0.2vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option.s>.selection{width: 100%; height: 0.8vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option.s{cursor: default;}
.functions>.top>.type>.option:hover>.selection{width: 100%; height: 0.8vmin; background-color: #0c0c0c;}
.functions>.top>.type>.option:hover>.title{font-weight: 500;}

body{display: flex; flex-direction: column; align-items: center;}
.content{display: none;}
.content.s#u{margin-top: 10vmin;width: 80vw; display: flex;}
.downpick>.button{width: 100%; height: 6vmin; display: flex; justify-content: space-around;align-items: center; background-color: #0c0c0c;}
.downpick>.button:hover{font-weight: 500; opacity: 0.9; cursor: pointer; height:7vmin;}
.downpick>.button.o{ font-weight: 500; opacity: 0.9; cursor: default; height:7vmin;}
.content.s#u>.sign{width:auto; height: 100%; display: flex;flex-direction: column;}
.content.s#u>.sign>.form{display: none; width: 100%; height: auto; margin-top: 5vmin; margin-bottom: 5vmin;}
.content.s#u>.sign.o>.form{display: flex; align-items: center;flex-direction: column; height: auto; margin-top: 5vmin; justify-content: space-around;}
.content.s#u>.sign>.form>form{display: flex;flex-direction: column; width: auto;}
.content.s#u>.sign>.form>form>input{ width: 80vw; border: none; outline: none;margin-top: 1vmin;}
.content.s#u>.sign>.form>form>label{margin-top: 1vmax;}
.content.s#u>.sign>.form>form>div>input[type="submit"]{ width: 100%; border: none; outline: none;cursor: pointer; background-color: #0c0c0c; color: #f4f4f4; margin-top: 0; padding: 0.5vmin;} 
.content.s#u>.sign>.form>form>div>input[type="submit"]:hover{background-color: #0c0c0ccc; font-weight: 500;} 
.content.s#u>.sign>.form>form>input[type="text"],.content.s#u>.sign>.form>form>input[type="password"],.content.s#u>.sign>.form>form>input[type="date"]{border-bottom: 0.2vmin solid #0c0c0c;}
.content.s#u>.sign>.form>form>input[type="text"]:focus,.content.s#u>div>.form>form>input[type="password"]:focus,.content.s#u>.sign>.form>form>input[type="date"]:focus{border-bottom: 0.3vmin solid #0c0c0ccc;font-weight: 500;}
.content.s#u>.sign>.form>form>input[type="text"]:hover,.content.s#u>div>.form>form>input[type="password"]:hover,.content.s#u>.sign>.form>form>input[type="date"]:hover{border-bottom: 0.2vmin solid #0c0c0caa; }
.downpick{display: flex; position: fixed; bottom: 0; left: 10vw; width: 80vw; height: auto;color: #f4f4f4;
align-items: flex-end;}
.content.s#u>.sign>.image{display: none;margin-top: 5vmin;}
.content.s#u>.sign.o>.image{width: 100%; height: 20vh; display: flex; align-items: center;flex-direction: column;}
.content.s#u>.sign.o.in>.image>svg{height: 100%;}
.content.s#u>.sign.o.in>.image:hover>svg{transition: 1s;}
.content.s#u>.sign.o.in>.image>svg>.g{transform: translateX(25vw);transition: 1s; fill: rgb(222, 222, 77);}
.content.s#u>.sign.o.in>.image>svg>.b{transform: translateX(25vw);transition: 1s; fill: rgb(77, 77, 222);}
.content.s#u>.sign.o.in>.image>svg>.c{transform: translateX(25vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.in>.image>svg:hover>.g{transform: translateX(10vw); fill: #0c0c0c;}
.content.s#u>.sign.o.in>.image>svg:hover>.b{transform: translateX(40vw); fill: #0c0c0c;}
.content.s#u>.sign.o.in>.image>svg:hover>.c{transform: translateX(25vw); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg{height: 100%;}
.content.s#u>.sign.o.up>.image:hover>svg{transition: 1s;}
.content.s#u>.sign.o.up>.image>svg>.g{transform: translateX(20vw);transition: 1s; fill: rgb(222, 222, 77);}
.content.s#u>.sign.o.up>.image>svg>.b{transform: translateX(20vw);transition: 1s; fill: rgb(77, 77, 222);}
.content.s#u>.sign.o.up>.image>svg>.c{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg>.c1{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg>.c2{transform: translateX(20vw);transition: 1s; fill: rgb(222, 77, 77);}
.content.s#u>.sign.o.up>.image>svg:hover>.g{transform: translateX(20vw) translateY(2vmin); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg:hover>.b{transform: translateX(20vw); fill: #0c0c0c;}
.content.s#u>.sign.o.up>.image>svg:hover>.c{transform: translateX(20vw);}
.content.s#u>.sign.o.up>.image>svg:hover>.c1{transform: translateX(20vw) translateY(2vmin);}
.content.s#u>.sign.o.up>.image>svg:hover>.c2{transform: translateX(20vw) translateY(2vmin);}

.content.s#d{margin-top: 10vmin;width: 80vw; display: flex; flex-direction: column; margin-bottom: 5vmin;}
.content.s#d>.image{width: 80vw ; height: auto; background-color: #0c0c0c;}
.content.s#d>.image>svg>#text{transition: 2s;}
.content.s#d>.image>svg:hover>#text{transform: translateY(30vmin) rotate(-30deg);}
.content.s#d>.image>svg>#click>.a{transform: translate(77%, 1%) scale(0.7); fill: transparent; transition: 1s;}
.content.s#d>.image>svg:hover>#click>.a{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h1{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h2{fill: #0c0c0c;}
.content.s#d>.image>svg:hover>#h3{fill: #0c0c0c;}
.content.s#d>.image>svg>#zone:hover~#h0{fill: #4d4d4d;transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover~#h1{fill: #4d4d4d;transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover~#h1~#h2{fill: #4d4d4d;}
.content.s#d>.image>svg>#zone:hover~#h1~#h2~#h3{transform: translateY(-5vmin);}
.content.s#d>.image>svg>#zone:hover{cursor: pointer;}
.content.s#d>.type{width: 100%; height: 36vmin; display: flex; justify-content: space-between; align-items: center; background-color: #4d4d4d;}
.content.s#d>.typelist{width: 100%; height: 15vmin; display: flex; justify-content: space-between; align-items: center; background-color: #4d4d4d;}
.content.s#d>.typelist>.icon{width: 32.3%; height: 100%; display: flex; justify-content: space-around; align-items: center; background-color: #212121;}
.content.s#d>.typelist>.icon:nth-child(2){background-color: transparent;}
.content.s#d>.type>.text{width: 32.3%; height: 100%; display: flex; flex-direction: column; align-items: center;background-color: #212121; font-weight: 400;}
.content.s#d>.type>.text:nth-child(2){background-color: transparent;}
.content.s#d>.type>.text>.title{width: 100%; height: 34%; display: flex; justify-content: space-around; align-items: center; font-weight: 600; color: #f4f4f4;}
.content.s#d>.type>.text>.description{width: 90%; height:auto; display: flex; align-items: center; color: #f4f4f4;text-align: justify;}
.content.s#d>.typelist>.icon>svg{width: 90%; height: 90%; display: flex;}
.content.s#d>.setup>.logo{width: 100%; height: 35vmin;display: flex; align-items: center; justify-content: space-around;}
.content.s#d>.setup>.logo>svg{display: block; height: 30vmin;}
.content.s#d>.setup>.container{width: auto; height: 20vmin; display: flex; justify-content: space-around; align-items: center; flex-direction: column;}
.content.s#d>.setup>.container>.text{width: auto; height: auto;}
.content.s#d>.setup>.container>.line{width: 100%; height: 10vmin; display: flex; justify-content: space-around; align-items: center; margin-top: 1vmin;}
.content.s#d>.setup>.container>.line>.button{width: 35%; height: 90%; display: flex; justify-content: space-around; align-items: center; background-color: #4d4d4d; color: #f4f4f4; cursor: pointer;}
.content.s#d>.setup>.container>.line>.button:hover{background-color: #212121; font-weight: 500;}
.author{width: 100%; height: 2vmax;text-align: center;}
.icon{height: 100%; width: 5vmin; display: flex; justify-content: space-around; align-items: center;}
.icon>svg{height: 5vmin;}
a.private:any-link{text-decoration: none; color: #0c0c9c; cursor: pointer;}
a.private:hover{font-weight: 500;}

#h1,#h2,#h3{fill: transparent;transition: 1s;}#h0{transition: 1s;}
.a1{fill:#6464ff;}.b1{fill:#4d4d4d;}.c1{fill:#0c0c0c;}.d1{fill:#212121;}.e{fill:#f4f464;}.f{opacity:0.15;}
</style>
</head>
<body>
<div class="functions">
<div class="top">
<div class="type" onclick="changeType();">
<div class="option s" id="user">
<div class="logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Profile</title><circle class="a" cx="170.079" cy="170.079" r="170.079"/><path class="b" d="M275.519,303.527a170.07,170.07,0,0,1-210.88,0A105.474,105.474,0,0,1,140.5,203.308a65.2,65.2,0,1,1,59.16,0A105.474,105.474,0,0,1,275.519,303.527Z"/></svg></div>
<div class="title">User</div>
<div class="selection"></div>
</div>
<div class="option" id="developer">
<div class="logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340"><title>Developer</title><circle class="a" cx="170" cy="170" r="170"/><path class="b" d="M295,170.111c-30-33.333-55-66.666-85-100h40c30.052,33.36,55.105,66.719,85.157,100.079C305.105,203.5,280.052,236.8,250,270.111H210C240,236.778,265,203.445,295,170.111Z"/><path class="b" d="M207.935,4.222q-22.216,167.9-44.451,335.81a169.964,169.964,0,0,1-32.459-4.39q21.523-167.8,43.04-335.6A170.114,170.114,0,0,1,207.935,4.222Z"/><path class="b" d="M45.157,170.111c30,33.334,55,66.667,85,100h-40C60.105,236.752,35.052,203.392,5,170.032c30.052-33.307,55.105-66.614,85.157-99.921h40C100.157,103.445,75.157,136.778,45.157,170.111Z"/></svg></div>
<div class="title">Developer</div>
<div class="selection"></div>
</div>
</div>
</div>
<!-- <div class="left"></div>
<div class="right"></div> -->
</div>
<div class="content" id="d">
<div class="image"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1240 800"><rect class="a1" width="1240" height="800"/><path class="b1" d="M1205,540a993.8,993.8,0,0,1-179,167,991.849,991.849,0,0,1-157,93H256c-5.456-16.2-15.892-39.939-37-61-27.053-26.993-51-28.993-51-41-.006-16.39,44.6-25.048,132-56,62.074-21.984,93.509-33.336,113-51,30.111-27.288,17.568-35.917,67-94,0,0,39.991-44.744,74-68,11.86-8.11,15.04-9.18,41-26,21.37-13.84,54.36-36.61,59-40,41.79-30.48,89.07-153.71,96-172,17,6.72,31.05,11.66,41,15,15.72,5.28,21.74,6.76,33,12,13.05,6.07,14.68,8.61,24,12,15.68,5.7,22.92,2.83,34,5,7.65,1.5,13.48,4.69,58,54,13.791,15.275,19.833,24.016,30.542,32.784,11.852,9.7,14.371,8.948,23.675,17.647,16.6,15.518,11.582,20.734,27.783,36.569,10.743,10.5,17.512,12.667,29.322,27.122,4.125,5.049,5.581,7.487,8.678,11.878,7.06,10.01,14.18,17.07,40,39,3.7,3.149,17.276,14.171,42.436,34.852,15.926,13.092,21.791,18.105,36.564,30.148C1190.069,528.023,1199.146,535.316,1205,540Z"/><path class="c1" d="M750,191c-32.692,119.183-85.754,176.591-129,207-42.569,29.933-84.049,39.626-125,93-36.028,46.958-23.969,65.584-58,100-28.818,29.143-54.074,32.584-153,66-30.215,10.206-75.295,25.909-130.354,47L0,643c53.606-68.538,94.14-88.313,122-93,8.491-1.429,26.96-3.332,48-15,17.076-9.469,18.308-15.643,48-42,25.43-22.573,38.145-33.86,55-42,14.5-7,22.105-7.844,37-18,10.653-7.264,14.162-11.878,25-16,10.423-3.964,14.442-2.459,27-6,12.876-3.631,21.068-8.716,27-12,38.585-21.364,62.373-11.312,100-36,19.109-12.538,19.638-19.5,39-28,14.215-6.238,22.716-6.339,39-15,10.568-5.621,16.818-10.806,27-19,0,0,31.625-25.451,89-68,9.714-7.2,14.86-10.879,21-15A438.924,438.924,0,0,1,750,191Z"/><path class="d1" d="M400,800H0V643c24.769,7.079,40.586,11.8,51,15,10.1,3.1,13.853,4.369,21,6,11.554,2.636,14.118,2.139,21,5,8.874,3.69,10.355,5.812,16,8,12.479,4.837,23.746-.434,34-3,15.593-3.9,28.729-.934,55,5,28.921,6.533,32.853,17.031,70,36,57.008,29.11,82.479,22.121,111,53A118.948,118.948,0,0,1,400,800Z"/><path class="d1" d="M840,800h400V505a143.816,143.816,0,0,0-57,15c-13.651,6.934-15.261,10.684-33,22-34.62,22.084-40.5,15.46-66,33-24.669,16.965-22.469,25.43-50,43-16.924,10.8-20.52,9.366-41,20-13.575,7.048-20.11,11.892-76,56-41.91,33.075-48.238,38.124-56,50A140.684,140.684,0,0,0,840,800Z"/><circle class="e" id="zone" cx="1039" cy="172" r="83"><title>Download</title></circle><path class="f" id="h0" d="M960,163c-.283,15.183,9.608,26.217,13,30,19.548,21.8,53.028,22.88,55,18,1.588-3.928-18.266-9.16-22-26-2.428-10.948,2.459-24.54,13-32,12.495-8.843,28.853-6.872,39,1,9.435,7.32,11.505,18.174,12,21,2.916,16.632-7.275,28.587-5,30,2.5,1.551,18.377-10.558,20-27,1.662-16.837-12.726-29.666-10-32,2-1.712,11.187,3.579,18,12,14.149,17.487,9.759,39.794,13,40,2.546.162,7.7-13.378,6-28-1.791-15.415-10.481-25.875-14-30-21.931-25.71-69.621-39.32-105-20C988.672,122.363,960.471,137.763,960,163Z"/><path class="c1" id="h1" d="M1046.5,191h0a17.5,17.5,0,0,1,17.5,17.5V257a0,0,0,0,1,0,0h-35a0,0,0,0,1,0,0V208.5A17.5,17.5,0,0,1,1046.5,191Z"/><path class="c1" id="h2" d="M1117,255.675h0a70,70,0,0,1-70,70h0a70,70,0,0,1-70-70h35a35,35,0,0,0,35,35h0a35,35,0,0,0,35-35h35Z"/><path class="c1" id="h3" d="M1012,256h70a0,0,0,0,1,0,0v0a35,35,0,0,1-35,35h0a35,35,0,0,1-35-35v0a0,0,0,0,1,0,0Z"/><rect class="c1" x="193.145" y="97" width="11.566" height="84.598"/><rect class="c1" x="84.877" y="124.718" width="11.566" height="56.839"/><rect class="c1" x="101.069" y="130.666" width="11.566" height="11.566"/><rect class="c1" x="123.54" y="130.666" width="11.566" height="11.566"/><rect class="c1" x="90.495" y="136.284" width="10.905" height="11.566"/><rect class="c1" x="106.687" y="136.284" width="11.566" height="45.273"/><rect class="c1" x="112.635" y="136.284" width="11.236" height="11.566"/><rect class="c1" x="129.489" y="136.284" width="11.566" height="45.273"/><rect class="c1" x="149.412" y="124.759" width="29.411" height="11.566"/><rect class="c1" x="143.794" y="130.707" width="11.236" height="11.566"/><rect class="c1" x="149.412" y="148.882" width="29.411" height="11.566"/><rect class="c1" x="143.794" y="154.83" width="11.236" height="11.566"/><rect class="c1" x="149.412" y="170.031" width="29.411" height="11.566"/><rect class="c1" x="143.794" y="164.083" width="11.236" height="11.566"/><rect class="c1" x="172.874" y="130.707" width="11.566" height="45.273"/><rect class="c1" x="178.492" y="170.031" width="11.731" height="11.566"/><rect class="c1" x="316.624" y="124.759" width="29.411" height="11.566"/><rect class="c1" x="311.006" y="130.707" width="11.236" height="11.566"/><rect class="c1" x="316.624" y="148.882" width="29.411" height="11.566"/><rect class="c1" x="311.006" y="154.83" width="11.236" height="11.566"/><rect class="c1" x="316.624" y="170.031" width="29.411" height="11.566"/><rect class="c1" x="311.006" y="164.083" width="11.236" height="11.566"/><rect class="c1" x="340.087" y="130.707" width="11.566" height="45.273"/><rect class="c1" x="345.704" y="170.031" width="11.731" height="11.566"/><rect class="c1" x="246.842" y="170.031" width="29.411" height="11.566"/><rect class="c1" x="270.636" y="164.083" width="11.236" height="11.566"/><rect class="c1" x="246.842" y="145.908" width="29.411" height="11.566"/><rect class="c1" x="270.636" y="139.96" width="11.236" height="11.566"/><rect class="c1" x="246.842" y="124.759" width="29.411" height="11.566"/><rect class="c1" x="270.636" y="130.707" width="11.236" height="11.566"/><rect class="c1" x="241.225" y="130.376" width="11.566" height="45.273"/><rect class="c1" x="221.397" y="152.517" width="11.566" height="11.566"/><rect class="c1" x="204.544" y="146.899" width="22.471" height="11.566"/><rect class="c1" x="227.015" y="158.465" width="11.566" height="23.132"/><rect class="c1" x="227.015" y="123.767" width="11.566" height="23.132"/><g id="text"><rect class="c1" x="275.592" y="221.253" width="11.566" height="56.839"/><rect class="c1" x="281.21" y="227.201" width="11.566" height="11.566"/><rect class="c1" x="236.268" y="266.526" width="29.411" height="11.566"/><rect class="c1" x="260.061" y="260.577" width="11.236" height="11.566"/><rect class="c1" x="236.268" y="242.402" width="29.411" height="11.566"/><rect class="c1" x="260.061" y="236.454" width="11.236" height="11.566"/><rect class="c1" x="236.268" y="221.253" width="29.411" height="11.566"/><rect class="c1" x="260.061" y="227.201" width="11.236" height="11.566"/><rect class="c1" x="230.65" y="226.87" width="11.566" height="45.273"/><rect class="c1" x="461.971" y="266.856" width="29.411" height="11.566"/><rect class="c1" x="485.764" y="260.908" width="11.236" height="11.566"/><rect class="c1" x="461.971" y="242.732" width="29.411" height="11.566"/><rect class="c1" x="485.764" y="236.784" width="11.236" height="11.566"/><rect class="c1" x="461.971" y="221.583" width="29.411" height="11.566"/><rect class="c1" x="485.764" y="227.531" width="11.236" height="11.566"/><rect class="c1" x="456.354" y="227.201" width="11.566" height="45.273"/><rect class="c1" x="326.483" y="266.856" width="29.411" height="11.566"/><rect class="c1" x="350.276" y="260.908" width="11.236" height="11.566"/><rect class="c1" x="326.483" y="242.732" width="29.411" height="11.566"/><rect class="c1" x="350.276" y="236.784" width="11.236" height="11.566"/><rect class="c1" x="326.483" y="221.583" width="29.411" height="11.566"/><rect class="c1" x="350.276" y="227.531" width="11.236" height="11.566"/><rect class="c1" x="320.865" y="227.201" width="11.566" height="45.273"/><rect class="c1" x="416.698" y="266.856" width="29.411" height="11.566"/><rect class="c1" x="440.491" y="260.908" width="11.236" height="11.566"/><rect class="c1" x="416.698" y="221.583" width="29.411" height="11.566"/><rect class="c1" x="440.491" y="227.531" width="11.236" height="11.566"/><rect class="c1" x="411.081" y="227.201" width="11.566" height="45.273"/><rect class="c1" x="130.521" y="221.253" width="11.566" height="11.566"/><rect class="c1" x="163.567" y="193.494" width="18.506" height="11.566"/><rect class="c1" x="176.124" y="199.442" width="11.566" height="13.879"/><rect class="c1" x="90.535" y="266.526" width="29.411" height="11.566"/><rect class="c1" x="90.535" y="221.253" width="29.411" height="11.566"/><rect class="c1" x="84.917" y="226.87" width="11.566" height="45.273"/><rect class="c1" x="114.328" y="193.494" width="11.566" height="78.98"/><rect class="c1" x="157.618" y="199.442" width="11.566" height="78.649"/><rect class="c1" x="146.713" y="221.253" width="33.376" height="11.566"/><rect class="c1" x="206.526" y="193.494" width="18.506" height="11.566"/><rect class="c1" x="219.084" y="199.442" width="11.566" height="13.879"/><rect class="c1" x="200.578" y="199.442" width="11.566" height="78.649"/><rect class="c1" x="189.673" y="221.253" width="33.376" height="11.566"/><rect class="c1" x="130.521" y="238.106" width="11.566" height="39.655"/><rect class="c1" x="292.776" y="221.583" width="11.566" height="11.566"/><rect class="c1" x="304.673" y="227.201" width="11.566" height="11.566"/><rect class="c1" x="299.055" y="221.583" width="11.566" height="11.566"/><rect class="c1" x="366.138" y="221.583" width="11.566" height="56.839"/><rect class="c1" x="371.756" y="227.531" width="11.566" height="11.566"/><rect class="c1" x="383.322" y="221.583" width="11.566" height="11.566"/><rect class="c1" x="395.219" y="227.201" width="11.566" height="51.221"/><rect class="c1" x="389.601" y="221.583" width="11.566" height="11.566"/></g></svg></div>
<div class="typelist">
<div class="icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 372 372"><title>safety</title><rect class="b" width="372" height="336" rx="60"/><path class="b" d="M276,372a36.172,36.172,0,0,1-36-36,36.136,36.136,0,0,1,72,0A36.172,36.172,0,0,1,276,372Z"/><path class="b" d="M92,372a36.172,36.172,0,0,1-36-36,37.138,37.138,0,0,1,72,0A36.172,36.172,0,0,1,92,372Z"/><polygon class="a" points="272 95.03 262 217.97 185.5 275.47 109 217.97 99 95.03 99.03 95 185.5 47.53 271.97 95 272 95.03"/><polygon class="b" points="247.18 148.1 177.5 200.47 132.37 166.55 143.79 155.13 177.5 180.47 235.76 136.68 247.18 148.1"/></svg></div>
<div class="icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 284.572 370.9"><title>knowledge</title><path class="b" d="M203.572,213.24V309.4a61.5,61.5,0,0,1-61.5,61.5h0a61.5,61.5,0,0,1-61.5-61.5V213.24a30,30,0,0,1,30-30h63A30,30,0,0,1,203.572,213.24Z"/><path class="b" d="M181.311,93.65a25.211,25.211,0,0,1-39.239,27.524A25.22,25.22,0,0,1,102.833,93.65a31.268,31.268,0,0,1,3.559-60.733,24.8,24.8,0,0,1-.615-5.505,25.2,25.2,0,0,1,36.3-22.634,25.188,25.188,0,0,1,35.68,28.139,31.268,31.268,0,0,1,3.559,60.733Z"/><path class="b" d="M259.572,66.24l-53-2.993,53-3.007Z"/><circle class="b" cx="266.572" cy="63.24" r="18"/><path class="b" d="M255.161,22.714l-62.4,10.508,60.845-16.3Z"/><circle class="b" cx="261.146" cy="18.004" r="18"/><path class="b" d="M255.741,102.613,194.273,92.354l59.915,16.054Z"/><circle class="b" cx="261.726" cy="107.322" r="18"/><path class="b" d="M25,66.24,77.572,63.2,25,60.24Z"/><circle class="b" cx="18" cy="63.24" r="18"/><path class="b" d="M29.411,22.714l62,10.4-60.445-16.2Z"/><circle class="b" cx="23.426" cy="18.004" r="18"/><path class="b" d="M28.831,102.613,90.149,92.394,30.384,108.408Z"/><circle class="b" cx="22.846" cy="107.322" r="18"/><path class="a" d="M145.092,57.19V86.02c0,7.37,9,13.77,22.18,16.97v6.09c-9.39-2.21-17.17-5.99-22.18-10.72v24.76a23.234,23.234,0,0,1-3.02-1.95,23.234,23.234,0,0,1-3.02,1.95V98.36c-5.01,4.73-12.79,8.51-22.18,10.72v-6.09c13.18-3.2,22.18-9.6,22.18-16.97V57.19c-19.83.34-36.94,4.18-46.15,9.72a25.608,25.608,0,0,1-2.11-5.02c10.75-6.21,28.27-10.37,48.26-10.75V40.52c0-7.37-9-13.77-22.18-16.97V17.46c9.39,2.21,17.17,5.99,22.18,10.72V3.53a25.9,25.9,0,0,1,3.02,1.25,25.9,25.9,0,0,1,3.02-1.25V28.18c5.01-4.73,12.79-8.51,22.18-10.72v6.09c-13.18,3.2-22.18,9.6-22.18,16.97V51.14c19.99.38,37.51,4.54,48.26,10.75a25.608,25.608,0,0,1-2.11,5.02C182.032,61.37,164.922,57.53,145.092,57.19Z"/></svg></div>
<div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 209.546 372"><title>community</title><path class="a" d="M73.555,331.63,42.421,362.763,6.943,327.286l58.8-9.215a9.878,9.878,0,0,0-.074,1.257C65.671,323.957,68.609,328.227,73.555,331.63Z"/><path class="b" d="M73.216,303.476A194.494,194.494,0,0,0,28.2,317.532l-9.924,1.553a194.952,194.952,0,0,1,51.605-16.909h.01Z"/><path class="a" d="M76.979,304.945a26.424,26.424,0,0,0-8.064,6.214L28.2,317.532a194.494,194.494,0,0,1,45.02-14.056Z"/><path class="b" d="M94.205,299.365v.37a64.164,64.164,0,0,0-6.383,1.215q-1.475.128-2.917.285l-2.346-.919C86.405,299.883,90.3,299.566,94.205,299.365Z"/><path class="a" d="M87.822,300.95c-.74.18-1.459.381-2.167.581l-.75-.3Q86.346,301.078,87.822,300.95Z"/><path class="a" d="M161.059,365.659H48.487l30.838-30.838a61.416,61.416,0,0,0,24.56,4.745c9.934,0,18.981-2.018,25.776-5.3Z"/><path class="b" d="M125.508,300.168l-2.917,1.141c-.666-.074-1.332-.137-2.008-.19a59.387,59.387,0,0,0-7.355-1.427v-.433Q119.426,299.513,125.508,300.168Z"/><path class="a" d="M122.591,301.309l-.518.2h-.01c-.487-.137-.983-.275-1.48-.391C121.259,301.172,121.925,301.235,122.591,301.309Z"/><path class="b" d="M193.673,320.29,183.3,318.662A194.593,194.593,0,0,0,134.66,303.4l3.72-1.459h.01A194.959,194.959,0,0,1,193.673,320.29Z"/><path class="a" d="M183.3,318.662l-43.943-6.88a25.559,25.559,0,0,0-8.613-6.848l3.921-1.532A194.593,194.593,0,0,1,183.3,318.662Z"/><path class="a" d="M201.9,327.994l-34.77,34.769-31.884-31.884c4.312-3.276,6.848-7.26,6.848-11.551,0-.232-.01-.465-.021-.7Z"/><ellipse class="b" cx="103.716" cy="190.756" rx="64.466" ry="64.994"/><path class="b" d="M161.841,61.3h6.341a0,0,0,0,1,0,0V188.284a3,3,0,0,1-3,3h-.341a3,3,0,0,1-3-3V61.3A0,0,0,0,1,161.841,61.3Z" transform="translate(330.023 252.58) rotate(180)"/><path class="b" d="M209.313,329.157l-7.418-1.163-59.827-9.363a12.764,12.764,0,0,0-2.716-6.849l54.321,8.508q5.247,2.662,10.293,5.633C205.773,326.969,207.549,328.047,209.313,329.157Z"/><path class="b" d="M68.915,311.159a13.053,13.053,0,0,0-3.16,6.912h-.01l-58.8,9.215-4.935.771c1.184-.729,2.378-1.447,3.572-2.134q6.2-3.646,12.692-6.838Z"/><path class="b" d="M209.546,329.305,166.85,372H42.7L0,329.305c.666-.423,1.342-.846,2.008-1.248l4.935-.771,35.478,35.477L73.555,331.63a34.334,34.334,0,0,0,5.77,3.191L48.487,365.659H161.059l-31.4-31.4a32.983,32.983,0,0,0,5.58-3.382l31.884,31.884,34.77-34.769,7.418,1.163.022.01A1.207,1.207,0,0,1,209.546,329.305Z"/><path class="b" d="M138.38,301.943l-7.641,2.991a45.633,45.633,0,0,0-8.666-3.424l3.435-1.342h.01C129.851,300.612,134.142,301.214,138.38,301.943Z"/><path class="b" d="M85.655,301.531a46.434,46.434,0,0,0-8.676,3.414l-7.092-2.769q6.262-1.141,12.661-1.86h.011Z"/><path class="b" d="M100.546,0h6.341a0,0,0,0,1,0,0V126.989a3,3,0,0,1-3,3h-.341a3,3,0,0,1-3-3V0A0,0,0,0,1,100.546,0Z" transform="translate(207.432 129.989) rotate(180)"/><path class="b" d="M142.089,319.328c0,4.291-2.536,8.275-6.848,11.551a32.983,32.983,0,0,1-5.58,3.382c-6.8,3.287-15.842,5.3-25.776,5.3a61.416,61.416,0,0,1-24.56-4.745,34.334,34.334,0,0,1-5.77-3.191c-4.946-3.4-7.884-7.673-7.884-12.3a9.878,9.878,0,0,1,.074-1.257h.01a13.053,13.053,0,0,1,3.16-6.912,26.424,26.424,0,0,1,8.064-6.214,46.434,46.434,0,0,1,8.676-3.414,60.51,60.51,0,0,1,8.55-1.8v9.913a9.512,9.512,0,0,0,19.023,0v-9.956a61.22,61.22,0,0,1,8.835,1.818h.01a45.633,45.633,0,0,1,8.666,3.424,25.559,25.559,0,0,1,8.613,6.848,12.764,12.764,0,0,1,2.716,6.849C142.079,318.863,142.089,319.1,142.089,319.328Z"/><rect class="b" x="94.205" y="237.784" width="19.023" height="82.432" rx="8.455"/><path class="b" d="M39.25,61.3h6.341a0,0,0,0,1,0,0V188.284a3,3,0,0,1-3,3H42.25a3,3,0,0,1-3-3V61.3a0,0,0,0,1,0,0Z" transform="translate(84.841 252.58) rotate(180)"/></svg></div>
</div>
<div class="type">
<div class="text">
<div class="title">Safeness</div>
<div class="description">Create your personal independent. Be on your own. Build what you want on your personal hosting. All safety depends only on you. Create everything you wanted for everything you needed.</div>
</div>
<div class="text">
<div class="title">Knowledge</div>
<div class="description">Exchange your own possibilities. Determine experiences primarily for yourself. Find out kind with same interest to reach new goals. Count your state and share with others. Be curious to things that you are doing.</div>
</div>
<div class="text">
<div class="title">Community</div>
<div class="description">Communicate with kind. Create community for improving the world and conquer new heights. Communicate to make progress faster and better. Create new connections and make each one of the human kind stronger. Be friendly and lovely for everyone to explain hapiness.</div>
</div>
</div>
<div class="setup">
<div class="logo">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1719.776 734.752"><path class="b" d="M1708.8,291.208h-36.692l25.947-25.964a10.98,10.98,0,0,0,0-15.524l-46.575-46.575a10.979,10.979,0,0,0-15.524,0l-25.964,25.947V192.4a10.979,10.979,0,0,0-10.979-10.979h-65.873a10.979,10.979,0,0,0-10.978,10.979v36.691l-25.964-25.947a10.979,10.979,0,0,0-15.524,0l-46.575,46.575a10.979,10.979,0,0,0,0,15.524l25.947,25.964h-36.691a10.979,10.979,0,0,0-10.979,10.978v65.873a10.979,10.979,0,0,0,10.979,10.979h36.691L1434.091,405a10.979,10.979,0,0,0,0,15.524l46.575,46.575a10.98,10.98,0,0,0,15.524,0l25.964-25.947v36.692a10.979,10.979,0,0,0,10.978,10.979h65.873a10.979,10.979,0,0,0,10.979-10.979V441.156l25.964,25.947a10.98,10.98,0,0,0,15.524,0l46.575-46.575a10.98,10.98,0,0,0,0-15.524l-25.947-25.964H1708.8a10.979,10.979,0,0,0,10.979-10.979V302.186A10.979,10.979,0,0,0,1708.8,291.208Zm-78.781,73.138-34.721,34.72a6.587,6.587,0,0,1-4.658,1.93h-49.13a6.587,6.587,0,0,1-4.658-1.93l-34.721-34.72a6.59,6.59,0,0,1-1.929-4.658v-49.13a6.588,6.588,0,0,1,1.929-4.658l34.721-34.721a6.59,6.59,0,0,1,4.658-1.929h49.13a6.59,6.59,0,0,1,4.658,1.929l34.721,34.721a6.588,6.588,0,0,1,1.929,4.658v49.13A6.59,6.59,0,0,1,1630.016,364.346Z"/><path class="b1" d="M1675.86,294.2V376.05a10.979,10.979,0,0,1-3.215,7.763l-62.658,62.657V712.8a21.957,21.957,0,0,1-21.957,21.957h-43.916a21.956,21.956,0,0,1-21.957-21.957V446.47L1459.5,383.813a10.979,10.979,0,0,1-3.215-7.763V294.2a10.977,10.977,0,0,1,3.215-7.763l41.8-41.8a6.335,6.335,0,0,1,8.959,0l37.613,37.614a6.335,6.335,0,0,1,0,8.959h0l-23.783,23.782a6.59,6.59,0,0,0-1.929,4.658V350.6a6.588,6.588,0,0,0,1.929,4.658l21.854,21.854a6.588,6.588,0,0,0,4.658,1.929h30.948a6.588,6.588,0,0,0,4.658-1.929l21.854-21.854a6.588,6.588,0,0,0,1.929-4.658V319.648a6.586,6.586,0,0,0-1.929-4.657l-23.783-23.783h0a6.335,6.335,0,0,1,0-8.959l37.613-37.614a6.335,6.335,0,0,1,8.959,0l41.8,41.8A10.977,10.977,0,0,1,1675.86,294.2Z"/><path class="b" d="M1603.4,323.719v22.807a9.822,9.822,0,0,1-2.877,6.946l-16.1,16.1a9.822,9.822,0,0,1-6.946,2.877h-22.807a9.826,9.826,0,0,1-6.946-2.877l-16.1-16.1a9.822,9.822,0,0,1-2.877-6.946V323.719a9.824,9.824,0,0,1,2.877-6.946l16.1-16.1a9.826,9.826,0,0,1,6.946-2.877h22.807a9.822,9.822,0,0,1,6.946,2.877l16.1,16.1A9.824,9.824,0,0,1,1603.4,323.719Z"/><rect class="b" x="349.779" y="477.977" width="192.488" height="75.698"/><rect class="b" x="505.5" y="439.047" width="73.535" height="75.698"/><rect class="b" x="349.779" y="320.093" width="192.488" height="75.698"/><rect class="b" x="505.5" y="281.163" width="73.535" height="75.698"/><rect class="b" x="349.779" y="181.674" width="192.488" height="75.698"/><rect class="b" x="505.5" y="220.605" width="73.535" height="75.698"/><rect class="b" x="313.012" y="218.442" width="75.698" height="296.302"/><rect class="b" x="37.779" y="477.977" width="192.488" height="75.698"/><rect class="b" x="193.5" y="439.047" width="73.535" height="75.698"/><rect class="b" x="37.779" y="329.093" width="192.488" height="75.698"/><rect class="b" x="193.5" y="367.163" width="73.535" height="75.698"/><rect class="b" x="37.779" y="181.674" width="192.488" height="75.698"/><rect class="b" x="193.5" y="220.605" width="73.535" height="75.698"/><rect class="b" y="440.105" width="73.535" height="75.698"/><rect class="b" x="1.5" y="290.163" width="73.535" height="75.698"/><rect class="b" x="1.5" y="220.605" width="73.535" height="75.698"/><rect class="b" x="661.57" y="477.977" width="121.116" height="75.698"/><rect class="b" x="624.802" y="440.752" width="75.698" height="73.992" transform="translate(1325.302 955.497) rotate(180)"/><rect class="b" x="745.919" width="75.698" height="514.744" transform="translate(1567.535 514.744) rotate(180)"/><rect class="b" x="674.547" y="180.302" width="218.442" height="75.698"/><rect class="b" x="1300.36" y="181.837" width="75.698" height="372"/><rect class="b" x="1262.593" y="439.209" width="75.698" height="75.698"/><rect class="b" x="1187.895" y="478.14" width="75.698" height="75.698"/><rect class="b" x="1110.035" y="181.837" width="75.698" height="335.233"/><rect class="b" x="1146.802" y="478.14" width="75.698" height="75.698"/></svg></div>
<div class="container">
<div class="text">
<h1>Set up introduction:</h1>
1) Download file .rar | .zip<br>
2) Put out all files to folder. <br>
3) Use instructions from setup.txt
</div>
<div class="line">
<div class="button">Download .rar</div>
<div class="button">Download .zip</div>
</div>
<div class="author">This product was madden by cc from <a href="http://mysteria.space/imagine/">imagine_</a></div>
</div>

</div>
</div>
<div class="content s" id="u">
<div class="downpick" onclick="changeSign();"><div class="button o">Log In</div><div class="button">Reg In</div></div>
<div class="sign o in">
<div class="image"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 340"><title>Sign In</title><circle class="g" cx="83" cy="64" r="64"/><rect class="b" x="18" y="198" width="129" height="129"/><polygon class="c" points="167 230 0 230 83 85 167 230"/></svg></div>
<div class="form"><form action="signin.php" method="POST"><label for="nnl"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210.9 330"><path class="b" d="M210.9,224.55A105.45,105.45,0,1,1,75.87,123.31a65.19,65.19,0,1,1,59.16,0A105.484,105.484,0,0,1,210.9,224.55Z"/></svg></div>Nickname: <span id="nnll"></span></label><input type="text" name="nn" id="nnl" placeholder="Fill In_(A-z, 0-9) from 2 to 49 letters" minlength="2" maxlength="49"><label for="passl"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210.9 330"><path class="b" d="M170.65,141.67V65.2a65.2,65.2,0,0,0-130.4,0v76.47a105.45,105.45,0,1,0,130.4,0ZM65.16,127.07V65.2a40.29,40.29,0,0,1,80.58,0v61.87a105.822,105.822,0,0,0-80.58,0Z"/><polygon class="a" points="65.159 197.028 145.742 197.028 105.45 266.812 65.159 197.028"/></svg></div>Password: <span id="passll"></span></label><input type="password" name="pass" id="passl" placeholder="Fill In_(A-z, 0-9) from 5 to 49 letters" minlength="5" maxlength="49"><div id="submitlogin"></div></form></div>
</div>
<div class="sign up">
<div class="image">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 340"><title>Sign Up</title><polygon class="g" points="325.759 206.427 180.101 206.427 252.93 80.288 325.759 206.427"/><rect class="b" x="196.528" y="215.412" width="112.805" height="112.805"/><path class="c" d="M.11,80.29V49.62L49.61,0H129.9Q235.035,24.81,340.15,49.62V80.29Z"/><rect class="c1" x="246.993" y="46.103" width="11.915" height="115.606"/><circle class="c2" cx="252.93" cy="161.709" r="17.408"/><path class="b" d="M148.85,328.38H0q24.81-24.81,49.61-49.62V80.29H99.23V278.76Z"/></svg></div>
<div class="form"><form action="signup.php" method="POST"><label for="nnr">Nickname: <span id="nnrl"></span></label><input type="text" name="nn" id="nnr" placeholder="Create_(A-z, 0-9) from 2 to 49 letters" minlength="2" maxlength="49"><label for="passr">Password: <span id="passrl"></span></label><input type="text" name="pass" id="passr" placeholder="Create_(A-z, 0-9) from 5 to 49 letters" minlength="5" maxlength="49"><label for="namer">Name: <span id="namerl"></span></label><input type="text" name="name" id="namer" placeholder="Fill In_(A-z, 0-9) from 2 to 33 letters" minlength="2" maxlength="33"><label for="surnamer">Surname: <span id="surnamerl"></span></label><input type="text" name="surname" id="surnamer" placeholder="Fill In_(A-z, 0-9) from 2 to 33 letters" minlength="2" maxlength="33"><label for="birthdater">Birthdate: <span id="birthdaterl"></span></label><input type="date" name="date" id="birthdater"><label for="birthplacer">Birthplace: <span id="birthplacerl"></span></label><input type="text" name="place" id="birthplacer" placeholder="Fill In_(A-z, 0-9) from 9 to 99 letters" minlength="9" maxlength="99"><div id="submitregin"></div><p>By signing up, you agree to our <a class="private" href="term/">Terms, Data Policy and Cookies Policy</a>.</p></form></div>
</div>
</div>
</body>
<script>
function changeType(){
user.classList.toggle('s');
developer.classList.toggle('s');
u.classList.toggle('s');
d.classList.toggle('s');
}
function changeSign(e){
var el=e ? e.target : window.event.srcElement;
el.parentNode.getElementsByClassName('button')[0].classList.toggle('o');
el.parentNode.getElementsByClassName('button')[1].classList.toggle('o');
el.parentNode.parentNode.getElementsByClassName('sign')[0].classList.toggle('o');
el.parentNode.parentNode.getElementsByClassName('sign')[1].classList.toggle('o');
}
nnl.onchange=function(){
if(!nnl.value==''){if(nnl.value.length>0&nnl.value.length<50){nnll.innerHTML=nnl.value}else{if(nnl.value.length<0){nnll.innerHTML='minimum nickname length 5 letters'}else{nnll.innerHTML='maximum nickname length 49 letters'}}
if(!passl.value==''){if(passl.value.length>4&passl.value.length<50){passll.innerHTML=passl.value;submitlogin.innerHTML='<input type="submit" value="Sign In">'}
}else{submitlogin.innerHTML=''}}else{submitlogin.innerHTML=''}}
passl.onchange=function(){
if(!passl.value==''){if(passl.value.length>4&passl.value.length<50){passll.innerHTML=passl.value
if(!nnl.value==''){
submitlogin.innerHTML='<input type="submit" value="Sign In">'}else{submitlogin.innerHTML=''}}else{submitlogin.innerHTML='';if(passl.value.length<5){passll.innerHTML='minimum password length 5 letters'}else{passll.innerHTML='maximum password length 49 letters'}}
}else{}}
nnl.onkeypress=function(){
if(!nnl.value==''){if(nnl.value.length>0&nnl.value.length<50){nnll.innerHTML=nnl.value}else{if(nnl.value.length<0){nnll.innerHTML='minimum nickname length 5 letters'}else{nnll.innerHTML='maximum nickname length 49 letters'}}
if(!passl.value==''){if(passl.value.length>4&passl.value.length<50){passll.innerHTML=passl.value;submitlogin.innerHTML='<input type="submit" value="Sign In">'}
}else{submitlogin.innerHTML=''}}else{submitlogin.innerHTML=''}}
passl.onkeypress=function(){
if(!passl.value==''){if(passl.value.length>4&passl.value.length<50){passll.innerHTML=passl.value
if(!nnl.value==''){
submitlogin.innerHTML='<input type="submit" value="Sign In">'}else{submitlogin.innerHTML=''}}else{submitlogin.innerHTML='';if(passl.value.length<5){passll.innerHTML='minimum password length 5 letters'}else{passll.innerHTML='maximum password length 49 letters'}}
}else{}}


passr.onkeypress=function(){
if(passr.value.length>4&passr.value.length<50){passrl.innerHTML=passr.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(passr.value.length<5){passrl.innerHTML='minimum password length 5 letters';submitregin.innerHTML=''}if(passr.value.length>49){passrl.innerHTML='maximum password length 49 letters';submitregin.innerHTML=''}}
nnr.onkeypress=function(){
if(nnr.value.length>1&nnr.value.length<50){nnrl.innerHTML=nnr.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(nnr.value.length<2){nnrl.innerHTML='minimum nickname length 2 letters';submitregin.innerHTML=''}if(nnr.value.length>49){nnrl.innerHTML='maximum nickname length 49 letters';submitregin.innerHTML=''}}
namer.onkeypress=function(){
if(namer.value.length>1&namer.value.length<34){namerl.innerHTML=namer.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(namer.value.length<2){namerl.innerHTML='minimum name length 2 letters';submitregin.innerHTML=''}if(namer.value.length>33){namerl.innerHTML='maximum name length 33 letters';submitregin.innerHTML=''}}
surnamer.onkeypress=function(){
if(surnamer.value.length>1&surnamer.value.length<34){surnamerl.innerHTML=surnamer.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(surnamer.value.length<2){surnamerl.innerHTML='minimum surname length 2 letters';submitregin.innerHTML=''}if(surnamer.value.length>33){surnamerl.innerHTML='maximum surname length 33 letters';submitregin.innerHTML=''}}
birthdater.onkeypress=function(){
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}
birthplacer.onkeypress=function(){
if(birthplacer.value.length>9&birthplacer.value.length<99){birthplacerl.innerHTML=birthplacer.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(birthplacer.value.length<10){birthplacerl.innerHTML='minimum birthplace length 10 letters';submitregin.innerHTML=''}if(birthplacer.value.length>99){birthplacerl.innerHTML='maximum birthplace length 99 letters';submitregin.innerHTML=''}}
passr.onchange=function(){
if(passr.value.length>4&passr.value.length<50){passrl.innerHTML=passr.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(passr.value.length<5){passrl.innerHTML='minimum password length 5 letters';submitregin.innerHTML=''}if(passr.value.length>49){passrl.innerHTML='maximum password length 49 letters';submitregin.innerHTML=''}}
nnr.onchange=function(){
if(nnr.value.length>1&nnr.value.length<50){nnrl.innerHTML=nnr.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(nnr.value.length<2){nnrl.innerHTML='minimum nickname length 2 letters';submitregin.innerHTML=''}if(nnr.value.length>49){nnrl.innerHTML='maximum nickname length 49 letters';submitregin.innerHTML=''}}
namer.onchange=function(){
if(namer.value.length>1&namer.value.length<34){namerl.innerHTML=namer.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(namer.value.length<2){namerl.innerHTML='minimum name length 2 letters';submitregin.innerHTML=''}if(namer.value.length>33){namerl.innerHTML='maximum name length 33 letters';submitregin.innerHTML=''}}
surnamer.onchange=function(){
if(surnamer.value.length>1&surnamer.value.length<34){surnamerl.innerHTML=surnamer.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(surnamer.value.length<2){surnamerl.innerHTML='minimum surname length 2 letters';submitregin.innerHTML=''}if(surnamer.value.length>33){surnamerl.innerHTML='maximum surname length 33 letters';submitregin.innerHTML=''}}
birthdater.onchange=function(){
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}
birthplacer.onchange=function(){
if(birthplacer.value.length>9&birthplacer.value.length<99){birthplacerl.innerHTML=birthplacer.value;
if(!nnr.value==''){
if(!passr.value==''){
if(!namer.value==''){
if(!surnamer.value==''){
if(!birthdater.value==''){
if(!birthplacer.value==''){
submitregin.innerHTML='<input type="submit" value="Sign Up">'}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}else{submitregin.innerHTML=''}}if(birthplacer.value.length<10){birthplacerl.innerHTML='minimum birthplace length 10 letters';submitregin.innerHTML=''}if(birthplacer.value.length>99){birthplacerl.innerHTML='maximum birthplace length 99 letters';submitregin.innerHTML=''}}


checklog.onchange=function(){checklog.parentNode.parentNode.parentNode.classList.toggle('o')}
checkreg.onchange=function(){checkreg.parentNode.parentNode.parentNode.classList.toggle('o')}
</script>
</html>
<?php
}}
if(isset($_POST['quitaccount'])){unset($_SESSION['userid']);unset($_COOKIE['userid']);}
if(isset($_POST['openfile'])){$file=$_POST['type'];$str='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];$url=preg_replace('~(?<=\?)id=\d+&|&id=\d+|\?id=\d+$~', '', $str);$url.='file/';echo '<script>location.href="'.$url.$file.'"</script>';}
if(isset($_POST['deletefile'])){$file=$_POST['type'];$filedir='file/'.$file;unlink($filelink);
$fsql = "DELETE FROM info WHERE ID='$id' AND etype='$file'";
$fresult = $conn->query($fsql);}
if(isset($_POST['reloadselected'])){$str='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];$url=preg_replace('~(?<=\?)id=\d+&|&id=\d+|\?id=\d+$~', '', $str);echo '<script>location.href="'.$url.'"</script>';}
?>