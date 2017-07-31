<?php

SESSION_START();

$m_id = $_POST['m_id'];
$pass = $_POST['pass'];
include ('get.php');

$ques = ("SELECT * FROM credentials WHERE mail_id ='$m_id'");
$ans = mysqli_query($get, $ques);
$repeats = mysqli_affected_rows($get);

if($repeats < 1){

	echo"Please enter a correct username and password.";
	die("<br><a href='index.php'>login page</a>");


}


while($r = mysqli_fetch_assoc($ans)){

$password = $r['password'];
$a = $r['access'];
if($password != $pass)
{
	echo"Please enter a correct username and password.";
	die("<br><a href='index.php'>login page</a>");
}

else{
      if($a=="b" )
      {
       echo"sorry u are blocked by user.";
	   die("<br><a href='index.php'>login page</a>");
      }else
       $_SESSION['m_id'] = $m_id;
       header("location: afterlogin.php");
       die("");
}
}

?>