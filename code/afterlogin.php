<?php
SESSION_START();
$m_id = $_SESSION['m_id'];
include ('get.php');

$ques = ("SELECT * FROM credentials WHERE  mail_id='$m_id'");
$ans = mysqli_query($get, $ques);


while($r = mysqli_fetch_assoc($ans)){

$name = $r['name'];
$updatequery ="UPDATE credentials SET status='1' WHERE name='$name'";
$update=mysqli_query($get,$updatequery);

}

$fish=$name;
?>
<script>

var IDLE_TIMEOUT = 1*60; //seconds
var a = 0;

document.onclick = function() {
    a = 0;
};
document.onmousemove = function() {
    a = 0;
};
document.onkeypress = function() {
    a = 0;
};
window.setInterval(CheckIdleTime, 1000);

function CheckIdleTime() {
    a++;
    if (a >= IDLE_TIMEOUT) {
         window.location.href="idle.php";
    }
}
</script>

<html>
<head>
<title>CHAT</title>
</head>
<body>
<form method="POST" action="index.php" align="right">
<input type="submit" name="signoff" value="signoff" />
</form>
<?php echo"Hello $name,<br />"; ?>
<form action="?" method="post" align="right" name="manage">
Manage your status:<br><br>
<select name="var1">
<option value='aval'>avaliable</option>
<option value='busy'>busy</option>
</select>
<input type="submit" id="submit" name="change" value="change"/>
</form>
<?php
if(isset($_POST['var1']))
{
$var1=$_POST['var1'];
$ques = ("SELECT * FROM credentials WHERE  mail_id='$m_id'");
$ans = mysqli_query($get, $ques);
if($var1 == "aval")
{$var1='1';}
else
{$var1='2';}
while($r = mysqli_fetch_assoc($ans)){
$name = $r['name'];
$updatequery ="UPDATE credentials SET status='$var1' WHERE name='$name'";
$update=mysqli_query($get,$updatequery);

}
}
?>
<p align="right">
<?php
$ques = ("SELECT * FROM credentials WHERE name='$name'");
$ans = mysqli_query($get, $ques);

while($r = mysqli_fetch_assoc($ans)){
echo "$name is ";
$status=$r['status'];
switch ($status){
			case 0: echo "offline <img src='blue.png' style=' width:9px; height:9px;'>"; break;
			case 1: echo "avaliable <img src='green.png' style=' width:10px; height:10px;'>"; break;
			case 2: echo "busy <img src='orange.png' style=' width:10px; height:10px;'>"; break;
			case 3: echo "idle <img src='purple.jpg' style=' width:9px; height:9px;'>"; break;
			}
			echo "<br>";

}
?>
<form action="configure.php" method="post" align="right" name="manage">
<input type="submit" id="config" name="configure" value="configure your account"/>
</form>
<form action="deleteaccount.php" method="post" align="right" name="delac">
<input type="submit" id="del" name="delec" value="delete your account"/>
</form>
<form action="nik/index.php" method="post" align="left" name="form1">
Please select an user to chat:<br><br>
<select name="recep">
<?php
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM contact");
if($result->num_rows !=0)
{
while($ans=$result->fetch_assoc())
{
		$id=$ans['id'];
		$recp=$ans['name'];
    $use=$ans['user'];
		//$mail_id=$ans['mail_id'];
		//$no=$ans['status'];
		/*switch ($no){
			case 0: $no = "offline"; break;
			case 1: $no = "avaliable"; break;
			case 2: $no = "busy"; break;
			case 3: $no = "idle"; break;
			} */
			if($name != $recp && $fish == $use )
			{echo "<option value='$recp'> $recp</option>";}
}
}
else
{
echo "No result.";
}
?>
</select>
<input type="submit" id="submit" name="submit" value="Chat"/>
<? $_SESSION['name']=$fish; if(isset($_POST['recep'])){$_SESSION['recep']=$recep;}?>
</form>


</p>
</body>	
</html>


 <?php

 include('connect.php');
$sql=mysql_query("SELECT *FROM credentials");

$epr='';

if(isset($_GET['epr']))
    $epr=$_GET['epr'];

if (isset($_POST['add'])) {
	$name=$_POST['username'];
if ($name!=$fish){
     $sql1=mysqli_query($get,"SELECT *FROM credentials where name='$name' and access!='b' ");
    $r = mysqli_num_rows($sql1);
    echo $r;
    echo "   result found,";
    ?>
    <html><br><html>
    <?php

    if($r==0)
      echo "check the username";
    ?>
     
<html><br><html>
   <?php

   $sql2=mysqli_query($get,"SELECT *FROM contact where name='$name' and user='$fish' ");
    $r2 = mysqli_num_rows($sql2);
     $st=0;


       if($r==1 && $r2==0){
        $st=0;
     $asql=mysqli_query($get,"INSERT INTO contact (name,user,unread) values ('$name','$fish','$st') ");
       echo "user added successfully";
      }else 
       echo " sorry couldnt be added,user may be blocked by admin or doesnt exists ";



     }
}

if ($epr =='block') {
	$id=$_GET['id'];
	$delete=mysql_query("DELETE  FROM contact where id=$id")  ;

}

 ?>
 
<html>
<head>
	<title></title>
    <script type="text/javascript"
       src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
       <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
 

       <h2>add user </h2>
      <form method="post" action="" autocomplete="off" size="10" style="font-size:10pt;height:100px;width:600px;"> 
          Name:<input type="text" id="username" name="username" />
           <input type="submit" name="add" value ="add"/>
      </form>
          <style>
            input[type="text"] {
            width: 200px;
            height: 30px;
}
          </style>
          <style>
table {
    border-collapse: collapse;
    width: 70%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #FFB6C1;
    color: black;
}
</style>
    
        <script type="text/javascript">
                $(document).ready(function(){
                    $("#username").autocomplete({
                        source:'getautocomplete.php',
                        minLength:1
                    });
                });
        </script>

      <div id="auto"></div>
        <script>
          
          $(document).ready(function(){
          $('#auto').load('load.php');
           refresh();

      }) ;

          function refresh()
          {
            setTimeout( function()  {

              $('#auto').load('load.php');
               refresh();

                },200);
          } 
         </script>
</head>


</html> 