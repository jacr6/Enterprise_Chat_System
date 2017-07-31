<?php
SESSION_START();

$name=$_SESSION['name'];

include ('get.php');

$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials WHERE name ='$name'");
if($result->num_rows !=0)
{
while($answ=$result->fetch_assoc())
{
		$user_id=$answ['id'];
		//echo "$user_id";
		
		
}
}

if (isset($_POST['confi']))
{
$nname = $_POST['nname'];
$npass = $_POST['npass'];
$nmail =$_POST['nmail'];
$rpass = $_POST['rpass'];
//$store="INSERT into credentials (id,name,password,mail_id) VALUES (NULL,'$name','$pass','$m_id')";
//$save=mysqli_query($get,$store) or die(mysql_error());
if($rpass==$npass)
{
$del="DELETE FROM credentials WHERE id = $user_id";
$dele=mysqli_query($get,$del);
$store="INSERT into credentials (id,name,password,mail_id) VALUES ($user_id,'$nname','$npass','$nmail')";
$save=mysqli_query($get,$store);
echo "<script>
window.alert('You have successfully changed your details. Login with your new details.');
</script>";
echo "<script>
    window.location = 'index.php';
</script>
";
}
else
{$txt="Password entered mismatch";}

}


?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>chitchat</TITLE>
</HEAD>
<BODY bgcolor="#48EC12">
<p> 
<font size = 6>A XXX Security Product </font>
<br>
<font size= 14><i><center>Chat Express - Configure settings</i></center></font></p>
<br>
<br>
<?php echo "Hi <b>$name</b>. You have enter to configure your account detail. Please fill in the new details";?>
<form action="?" method="post" align="right">
enter name :
<input type="text" name="nname" required/>
<br>
<br>
enter email : 
<input type="mail" name="nmail" required/>
<br>
<br>
enter password:
<input type="password" name="npass" required/>
<br>
<br>
re-enter password:
<input type="password" name="rpass" required/>
<br>
<br>
<input type="submit" name="confi" id="confi" value="Change details" />
</form>
<p align="right">
<?php
if(isset($txt))
{
echo $txt;
}
?>

<br><br><br><br><br><br><br>
<h4 align = "right">
 -created by team Invictus
</h4>

</BODY>
</HTML>

