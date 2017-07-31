<?php 

$con =mysql_connect('localhost','root','') or die('error: '.mysqli_error());
$db =mysql_select_db('adrec1');
if($db){
	//echo 'success';
}else

{
	echo 'ERROR:'.mysql_error();
}

 ?>