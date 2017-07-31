<?php
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials");
?>
<HTML>
<HEAD>
<TITLE>Individual Statistics</TITLE>
<link rel="stylesheet" href="style2.css" media="all"/>
</HEAD>
<BODY>
<br>
<br>
<div id="tem">
<p align="right">
<a href="recordstatistics.php"> Go Back </a></p>
<h2 align="center"><b>Record Statistics:</b></h2>
<br>
<br>
<h3 align= "center">
Individual Stats:
</h3>
<br><br><br>
<form action="userstatistics.php" method="post" align="center">
Please select an user:<br><br>
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
<input type="submit" id="submit" name="submit" value="View"/>
</form>
</div>
</BODY>
</HTML>