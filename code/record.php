<?php
$conn = mysqli_connect("localhost","root","","adrec1");
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
<p align="right"><a href="adminaflg.php"> Go Back </a></p><br><br>
<font size= 6><i><center>Logged in as Administrator</i></center></font>
<p align="center"><b>This page is only meant for authorized users...</b></p><br><br>
<p align="center">Please select a database:</p>
<form action="dbase1.php" method="POST" align="center">
<input type="submit" value="table1" name="database_1"/>
</form>
<form action="dbase2.php" method="POST" align="center">
<input type="submit" value="table2" name="database_2"/>
</form>


<form action="dbase3.php" method="POST" align="center">
<input type="submit" value="table3" name="database_3"/>
</form>
</div>
</BODY>
</HTML>