<?php 
ini_set('session.gc_maxlifetime', 33000);
ini_set('session.cookie_lifetime', 33000);
session_start();
require_once("connect.php");
?>
<html>
<head>
<title>CC Profile</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="author" content="suicvairduCConstantinius">
<meta name="format-detection" content="telephone=no">
<script>
const userid=0;
const username='';

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