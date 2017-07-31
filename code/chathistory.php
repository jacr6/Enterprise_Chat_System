<?php
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials");
?>
<html>
<head>
<title>Chat History
</title>
<link rel="stylesheet" href="style3.css" media="all"/>
</head>
<body>
<br><br><br><p align="right"><a href="adminaflg.php"> Go Back </a></p><br><br>
<font size= 6><i><center>Logged in as Administrator</i></center></font>
<p align="center"><b>This page is only meant for authorized users...</b></p><br><br>
<form action="chatdetails.php" method="post" align="center">
<div id="info">Please select any two users:<br><br><br>
<select name="var1">
<?php
if($result->num_rows !=0)
{
while($ans=$result->fetch_assoc())
{
		$id=$ans['id'];
		$name=$ans['name'];
		$mail_id=$ans['mail_id'];
		echo "<option value='$name'>$name</option>";
}
}
else
{
echo "No result.";
}
?>
</select>
<select name="var2">
<?php
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials");
if($result->num_rows !=0)
{
while($ans=$result->fetch_assoc())
{
		$id=$ans['id'];
		$name=$ans['name'];
		$mail_id=$ans['mail_id'];
		echo "<option value='$name'>$name</option>";
		
}
}
else
{
echo "No result.";
}
?>
</select>
<input type="submit" id="submit" name="submit" value="View"/>
</form>
</div>
</body>
</html>