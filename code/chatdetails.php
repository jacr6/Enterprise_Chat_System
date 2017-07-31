<?php    
SESSION_START();
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials");
$value=$conn->query("SELECT * FROM infobase");
$var1=$_POST['var1'];
$var2=$_POST['var2'];
if($var1 == $var2 )
{
       echo '<script>alert("Please enter two different users");window.location= "chathistory.php";</script>';
       }
?>
<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>chat details</TITLE>
<link rel="stylesheet" href="style4.css" media="all"/>
</HEAD>
<BODY>
<br>
<br>
<div id="tem">
<p align="right">
<a href="chathistory.php"> Go Back </a><br>
<font size= 6><i><center>Logged in as Administrator</i></center></font>
<p align="center"><b>This page is only meant for authorized users...</b></p><br><br>
<h2 align="center"><b>Chat Details:</b></h2>
<br>
<br>
<table with="600" border="1" cellpadding="1" cellspacing="1" align="center">
<tr><th>sender</th><th>receiver</th><th>message</th><th>timestamp</th></tr>
<?php
if($value->num_rows !=0)
{
while($ans=$value->fetch_assoc())
{
		$sender=$ans['sender'];
		$receiver=$ans['receiver'];
		$datentime=$ans['datentime'];
		$msg=$ans['msg'];
		if(($var1 == $sender || $var2 == $sender) && ($var1 == $receiver || $var2 == $receiver))
		{ 
			echo "<tr><td>$sender</td><td>$receiver</td><td>$msg</td><td>$datentime</td></tr>";
		}
}
}
else
{
echo "No result.";
}
?>
</table>
</div>
</BODY>
</HTML>