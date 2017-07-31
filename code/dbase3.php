<?php
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM contact");
?>
<HTML>
<HEAD>
<TITLE>Records</TITLE>
<link rel="stylesheet" href="style4.css" media="all"/>
</HEAD>
<BODY>
<br><br>
<br>
<br>
<div id="tem">
<p align="right">
<a href="record.php"> Go Back </a></p><br>
<font size= 6><i><center>Logged in as Administrator</i></center></font>
<p align="center"><b>This page is only meant for authorized users...</b></p><br><br>
<h3 align="center"><b>Record list from database:</b></h3>
<br>
<table with="600" border="1" cellpadding="1" cellspacing="1" align="center">
<tr>
<th>name</th>
<th>user</th>
<th>unread</th>
<th>last seen by user </th>
</tr>
<?php
if($result->num_rows !=0)
{
while($ans=$result->fetch_assoc())
{
		$name=$ans['name'];
		$user=$ans['user'];
		$unread=$ans['unread'];
		$date=$ans['date1'];
		
			echo "<br>";
		echo "
		<tr>
			<td>$name</td>
			<td>$user</td>
			<td>$unread</td>
			<td>$date</td>
		</tr>";
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