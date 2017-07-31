<?php
session_start();
include_once("get.php");
if (isset($_POST['name']))
{
$name = $_POST['name'];
$pass = $_POST['pass'];
$m_id =$_POST['m_id'];
$key = $_POST['key'];
$rec=$m_id;
$topic='Account ownership details of Chat Express';
$sender="From: sender@gmail.com";

$m_body=<<<EMAIL
Hi $name,

You have created an account in Chat Express. Your accout details are here as follows:

your login ID = $m_id
your password = $pass

Validity period is 6 months. The adminstrator can increase or decrease your validity span.

From Chat Express Admin.   
EMAIL;
include_once("get.php");
if ($key=="12345")
{
$sql3=mysqli_query($get,"SELECT *FROM credentials where name='$name' ");
 $r3 = mysqli_num_rows($sql3);
 
 if($r3==0){
 $sql4=mysqli_query($get,"SELECT *FROM credentials where mail_id='$m_id' ");
 $r4 = mysqli_num_rows($sql4);
  if($r4==0){
$store="INSERT into credentials (id,name,password,mail_id) VALUES (NULL,'$name','$pass','$m_id')";
$save=mysqli_query($get,$store) or die(mysql_error());
mail($rec,$topic,$m_body,$sender);
$txt="You have successfully registered as a user";
}
}else{

     $txt= "user already exists with same username or email id, plz use other ";
    }


}
else 
{
$txt="The entered key is not valid. This page is only for XXX Security User";
}


}
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>chitchat</TITLE>
</HEAD>
<BODY bgcolor="#EE9837">
<p> 
<font size = 6>A XXX Security Product </font>
<br>
<font size= 14><i><center>Chat Express - Sign up page</i></center></font></p>
<br>
<br>
<form action="?" method="post" align="right">
enter your name :
<input type="text" name="name" required/>
<br>
<br>
enter your email : 
<input type="mail" name="m_id" required/>
<br>
<br>
enter your password:
<input type="password" name="pass" required/>
<br>
<br>
Product user key:
<input type="password" name="key" required/>
<br>
<br>
<input type="submit" value="Sign up" />
</form>
<p align="right">
<?php
if(isset($txt))
{
echo $txt;
}
?>
</p>
<p align="right">---or---</p>
<form align="right" action="index.php">
<input type="submit" value="Already an User">
</form>
<p align="right">---or---</p>
<form align="right" action="adminpg.php">
<input type="submit" value="Sign-in as Admin">
</form>
<br><br><br><br><br>

<h4 align = "right">
 -created by team Invictus
</h4>

</BODY>
</HTML>