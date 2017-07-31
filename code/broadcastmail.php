<?php
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials");
?>
<html>
<head>
<title>Broadcast Mail
</title>
<link rel="stylesheet" href="style1.css" media="all"/>
</head>
<body>
<div id="info"><p align="right"><a href="adminaflg.php"> Go Back </a></p>
<font size= 6><i><center>Logged in as Administrator</i></center></font>
<p align="center"><b>This page is only meant for authorized users...</b></p><br><br>
<p>Please enter the Broadcast message that must be sent to users through mail:</p>
<br><br>
<form method="POST" action="?">
<textarea name="sub" placeholder="Subject"></textarea><br><br>
<textarea name="msg" placeholder="Enter message"></textarea><br><br>
<input type="submit" name="submit" value="send mail"/>
</form>
<?php
if(isset($_POST['submit']))
{
$msg=$_POST['msg'];
$sub=$_POST['sub'];
$from="From: admin_xxx@gmail.com";
if ($msg=='' or $msg==NULL)
{
echo "Please enter message";
}
else{
if($result->num_rows !=0)
{
while($ans=$result->fetch_assoc())
{
		
		$name=$ans['name'];
		$to=$ans['mail_id'];
$msgbody=<<<EMAIL
Hi $name,

$msg

From Chat Express Admin.   
EMAIL;
		
		mail($to,$sub,$msgbody,$from);
}
echo "Mail has been sent to all users successfully...";
}
else
{
echo "No result.";
}
}
}
?>
</div>
</body>
</html>