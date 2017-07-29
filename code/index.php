<?php
SESSION_START();
if(isset($_SESSION['m_id']))
{
$m_id = $_SESSION['m_id'];
include ('get.php');

$ques = ("SELECT * FROM credentials WHERE  mail_id='$m_id'");
$ans = mysqli_query($get, $ques);
	while($r = mysqli_fetch_assoc($ans)){

	$name = $r['name'];
	$updatequery ="UPDATE credentials SET status='0' WHERE name='$name'";
	$update=mysqli_query($get,$updatequery);

	}
	}
?>
<HTML>
<HEAD>
<TITLE>chitchat</TITLE>
</HEAD>

<style >
	#nav {
    line-height:30px;
    background-color:yellow;
    height:300px;
    width:550px;
    float:left;
    padding:5px;	      
}

</style>



<BODY bgcolor="white">



<!--<font size= 8><center><span style="color:#40E0D0"><B>WELCOME TO XXX SECURITY COMMUNITY</B></center></font></p> -->


<div style="background-color:#DB7093; color:white; padding:20px" align="center">

<h2>WELCOME TO XXX SECURITY COMMUNITY
</h2>


</div> 
<br><br>


<div  id ="nav" style="background-color:white; color:black; padding:20px" align="left">

<h3>ABOUT XXX SECURITY COMPANY
</h3>


<nav>
The company XXXSecurity has grown tremendously in the last five years expanding its points of presence throughout the world. XXXSecurity acts <br>a contractor for a large number of governmental and military organizations. <br>The company has a large number of officies located in many countries. 
</nav>
<br><br>

</div>

<div align="right">
<form action="index_api_verifylogin.php" method="get" align="right">
user email:
<input type="mail" name="m_id" placeholder="enter your email" required="required"/>
<br>
<br>
password:
<input type="password" name="pass"  placeholder="enter your password" required="required" autocomplete="off" />
<br>
<br>

<input type="submit" value="login">

</form>
admin log in
<form align="right" action="adminpg.php">
<input type="submit" value="Sign-in as Admin">
</form>
<br>
<p align="right">click here to sign up</p>
<form align="right" action="signuppage.php">
<input type="submit" value="Create an Account">
</form>
</div>
<br><br>



<h4 align = "right"> -Developed by team  <span style="color:#40E0D0" >  
<font size="5"></em>INVICTUS</em> </font>  </span> 
<span style="color:red"> Blekinge Institute of Technology 2016.</span>
</h4>

</BODY>
</HTML>
<html>
<style style="text/css">
.scroll-slow {
 height: 50px;	
 overflow: hidden;
 position: relative;
 background: white;
 color: bllack;
 border: 1px ;
}
.scroll-slow p {
 position: absolute;
 width: 100%;
 height: 100%;
 margin: 0;
 line-height: 50px;
 text-align: center;
 /* Starting position */
 -moz-transform:translateX(100%);
 -webkit-transform:translateX(100%);	
 transform:translateX(100%);
 /* Apply animation to this element */	
 -moz-animation: scroll-slow 25s linear infinite;
 -webkit-animation: scroll-slow 25s linear infinite;
 animation: scroll-slow 25s linear infinite;
}
/* Move it (define the animation) */
@-moz-keyframes scroll-slow {
 0%   { -moz-transform: translateX(100%); }
 100% { -moz-transform: translateX(-100%); }
}
@-webkit-keyframes scroll-slow {
 0%   { -webkit-transform: translateX(100%); }
 100% { -webkit-transform: translateX(-100%); }
}
@keyframes scroll-slow {
 0%   { 
 -moz-transform: translateX(100%); /* Browser bug fix */
 -webkit-transform: translateX(100%); /* Browser bug fix */
 transform: translateX(100%); 		
 }
 100% { 
 -moz-transform: translateX(-100%); /* Browser bug fix */
 -webkit-transform: translateX(-100%); /* Browser bug fix */
 transform: translateX(-100%); 
 }
}
</style>

<div class="scroll-slow">

<p><font color="#191970">contact us at XXXSECURITY@gmail.com  </font>
 </p>
</div>

<html>

