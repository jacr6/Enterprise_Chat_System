<?php
SESSION_START();
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials");
$value=$conn->query("SELECT * FROM infobase");
$v=$conn->query("SELECT * FROM table_name");
$maxsql = $conn->query( "SELECT MAX( id ) AS max FROM credentials" );
$max = mysqli_fetch_array( $maxsql );
$max = $max['max'];
$a=0;$b=0;$c=0;$d=0;$e=0;$f=0;
?>
<HTML>
<HEAD>
<TITLE>Integrated Statistics</TITLE>
<link rel="stylesheet" href="style2.css" />
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
Integrated Stats from database records:
</h3>
<br><br>
<?php
if($result->num_rows !=0)
{
while($answ=$result->fetch_assoc())
{
		$c_id=$answ['id'];
		$s=$max;
		while($s != 0)
		{
			if($c_id == $s)
			{
			$a=$a+1;
			}
			$s=$s-1;
		}
		$b=$max-$a;
}
}
else
{
echo "No result.";
}
?>
<?php
if($v->num_rows !=0)
{
while($aj=$v->fetch_assoc())
{
		$r=$aj['size'];
		$f=$f+$r;
		$i=$aj['id'];
		
}
}
else
{
echo "No result.";
}
if($value->num_rows !=0)
{
while($ans=$value->fetch_assoc())
{
		$c_id=$ans['content_id'];
		$receiver=$ans['receiver'];
		$msg_type=$ans['msg_type'];
		$msg=$ans['msg']; // Only message size is calculated but not binary files
		$e=$e+strlen($msg);
		
}
}
else
{
echo "No result.";
}
$e=$e+$f;
?>
<table with="600" border="1" cellpadding="1" cellspacing="1" align="center">
<tr><td>Number of users who have created account:</td><td><?php echo $max;?></td></tr>
<tr><td>Number of users who deleted their account:</td><td><?php echo $b;?></td></tr>
<tr><td>Number of existing Users:</td><td><?php echo $a;?></td></tr>
<tr><td>Number of messages exchanged:</td><td><?php echo $c_id;?></td></tr>
<tr><td>Exchanged Binary files:	</td><td><?php echo $i;?></td></tr>
<tr><td>Volume of traffic stored in database:</td><td><?php echo "$e byte/s";?></td></tr>
</table>
</div>
<?php
$pgload = $_SERVER['PHP_SELF'];
$time = "10";
header("Refresh: $time; url=$pgload");
?>
</BODY>
</HTML>