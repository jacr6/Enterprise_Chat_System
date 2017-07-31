<?php
session_start();
include_once("get.php");
if (isset($_POST['submit']))
{
$a_name = $_POST['a_name'];
$a_pass = $_POST['a_pass'];
$a_mail =$_POST['a_mail'];
$key = $_POST['key'];
$rec=$a_mail;
$topic='Chat Express Admin';
$sender="From: sender@gmail.com";

$m_body=<<<EMAIL
Hi $a_name,

You have created an admin account in Chat Express. Your accout details are here as follows:

your login ID = $a_mail
your password = $a_pass

Thank you.  
EMAIL;

if ($key=="#$&*EdaSM13*")
{

$store="INSERT into credentials (id,name,password,mail_id,access) VALUES (NULL,'$a_name','$a_pass','$a_mail','a')";
$save=mysqli_query($get,$store) or die(mysql_error());
mail($rec,$topic,$m_body,$sender);
$txt="You have successfully registered";

}

else 
{
$txt="Authentication Error";
}

}
?>
<HTML>
<HEAD>
<TITLE>create admin acct</TITLE>
</HEAD>
<BODY bgcolor="#BF69D9">
<p> 
<font size = 6>A XXX Security Product </font>
<br><br>
<br><font size= 14><i><center>Chat Express - Administrator signup</i></center></font></p>
<p align="center"><b>This page is only meant for authorized users...</b></p>
<br>
<br>
<form action="?" method="post" align="right">
admin-name:
<input type="text" name="a_name" required/>
<br>
<br>
password:
<input type="password" name="a_pass" required/>
<br>
<br>
mail id:
<input type="mail" name="a_mail" required/>
<br>
<br>
Product secret key:
<input type="password" name="key" required/>
<br>
<br>
<input type="submit" name="submit" value="Submit" />
</form>
<p align="right">
<?php
if(isset($txt))
{
echo $txt;
}
?>
<p align="right">---or---</p>
<form align="right" action="adminpg.php">
<input type="submit" value="Sign-in as Admin">
</form>
</p>
<p align="right">---or---</p>
<form align="right" action="index.php">
<input type="submit" value="Already an User">
</form>
<p align="right">---or---</p>
<form align="right" action="signuppage.php">
<input type="submit" value="Create an Account">
</form>


<h4 align = "right">
 -created by team Invictus
</h4>
</BODY>
</HTML>