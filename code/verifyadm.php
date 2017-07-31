<?php

SESSION_START();

$m_id = $_POST['a_name'];
$pass = $_POST['a_pass'];
include ('get.php');

$ques = ("SELECT * FROM credentials WHERE mail_id ='$m_id'");
$ans = mysqli_query($get, $ques);
$repeats = mysqli_affected_rows($get);

if($repeats < 1){

	echo"Accessed Denied";
	die("<br><a href='adminpg.php'>admin page</a>");


}


while($r = mysqli_fetch_assoc($ans)){

$password = $r['password'];
$access = $r['access'];

if($password != $pass)
{
	echo"Accessed Denied";
	die("<br><a href='adminpg.php'>admin page</a>");
}
else{
if ($access != a)
{
	echo"Accessed Denied";
	die("<br><a href='adminpg.php'>admin page</a>");
}
else
{
$_SESSION['m_id'] = $m_id;
header("location:adminaflg.php");
die("");
}
}
}
?>