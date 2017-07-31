<?php

?>
<HTML>
<HEAD>
<TITLE>ADMIN</TITLE>
<link rel="stylesheet" href="style.css" media="all"/>
</HEAD>
<BODY bgcolor="#BF69D9">
<p> 
<font size = 6>A XXX Security Product </font>
<br><br>
<br><font size= 14><i><center>Logged in as Administrator</i></center></font></p>
<p align="center"><b>This page is only meant for authorized users...</b></p>
<div id="info"><p align="right"><a href="index.php"> Go Back </a></p>
<br>
<br>
<br>
<br>
<form action="broadcastmail.php" align="right">
<input type="submit" value="Send a Broadcast Mail" name="braodcastmail" />
</form>
<br>
<br>
<form action="chathistory.php" align="right">
<input type="submit" value=" View Chat History" name="chathistory"/>
</form>
<br><br>
<form action="record.php" align="right">
<input type="submit" value="View Records" name="viewrecord" />
</form>
<br><br>
<form action="recordstatistics.php" align="right">
<input type="submit" value="View Record Statistics" name="recordstatistics" />
</form>
<br><br>
<br><br><br><br><br>
</BODY>
</HTML>