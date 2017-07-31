<?php

$epr=0;
$conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials");
?>

<?php
if(isset($_GET['epr'])){
    $epr=$_GET['epr'];

if ($epr =='block') {
	$id=$_GET['id'];
	
$updatequery ="UPDATE credentials SET access='b' WHERE id='$id'";
$update=mysqli_query($conn,$updatequery);

}
if ($epr =='unblock') {
	$id=$_GET['id'];
	
$updatequery1 ="UPDATE credentials SET access='u' WHERE id='$id'";
$update1=mysqli_query($conn,$updatequery1);

}

if ($epr =='delete') {
	$name=$_GET['name'];
	
           
        $con = mysqli_connect("localhost","root","","adrec1");  
$query ="SELECT * FROM credentials where name ='$name'";
$run  = $con->query($query);
     while($row = $run->fetch_array()) 

       {
             $sel ="SELECT *FROM credentials";
             $d="DELETE FROM credentials where name ='$name' ";
            $del=mysqli_query($con,$d) or die("failed");
             // $count = $count-1;
 
              
     }


    $query1 ="SELECT * FROM contact where name ='$name'";
    $run1  = $con->query($query1);
     while($row1 = $run1->fetch_array()) 

       {
             $sel1 ="SELECT *FROM contact";
             $d1="DELETE FROM contact where name ='$name' ";
            $del1=mysqli_query($con,$d1) or die("failed");
             // $count = $count-1;
 
              
     }


     $query2 ="SELECT * FROM contact where user ='$name'";
    $run2  = $con->query($query2);
     while($row2 = $run2->fetch_array()) 

       {
             $sel2 ="SELECT *FROM contact";
             $d2="DELETE FROM contact where user ='$name' ";
            $del2=mysqli_query($con,$d2) or die("failed");
             // $count = $count-1;
 
              
     }

    $query3 ="SELECT * FROM infobase where sender ='$name'";
    $run3  = $con->query($query3);
     while($row3 = $run3->fetch_array()) 

       {
             $sel3 ="SELECT *FROM infobase";
             $d3="DELETE FROM infobase where sender ='$name' ";
            $del3=mysqli_query($con,$d3) or die("failed");
             // $count = $count-1;
 
              
       }

      
    $query4 ="SELECT * FROM infobase where receiver ='$name'";
    $run4  = $con->query($query4);
     while($row4 = $run4->fetch_array()) 

       {
             $sel4 ="SELECT *FROM infobase";
             $d4="DELETE FROM infobase where receiver ='$name' ";
            $del4=mysqli_query($con,$d4) or die("failed");
             // $count = $count-1;
 
              
       }

 



}
}
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
<th>ID no</th>
<th>Name</th>
<th>Email</th>
<th>status</th>
<th>access</th>
<th>action</th>
<th>delete</th>
</tr>
<?php
if($result->num_rows !=0)
{
while($ans=$result->fetch_assoc())
{
		$id=$ans['id'];
		$name=$ans['name'];
		$mail_id=$ans['mail_id'];
		$no=$ans['status'];
		$access=$ans['access'];
		if($access=="u" || $access=="b"){
		switch ($no){
			case 0: $no = "offline <img src='blue.png' style=' width:9px; height:9px;'>"; break;
			case 1: $no = "avaliable <img src='green.png' style=' width:10px; height:10px;'>"; break;
			case 2: $no = "busy <img src='orange.png' style=' width:10px; height:10px;'>"; break;
			case 3: $no = "idle <img src='purple.jpg' style=' width:9px; height:9px;'>"; break;
			}
			echo "<br>";
		echo "
		<tr>
			<td>$id</td>
			<td>$name</td>
			<td>$mail_id</td>
			<td>$no</td>
			<td>$access</td>
			<td>
             <a href ='dbase1.php?epr=block&id=".$ans['id']."'>block</a>/
             <a href ='dbase1.php?epr=unblock&id=".$ans['id']."'>unblock</a>
            </td>
            <td>
              <a href ='dbase1.php?epr=delete&name=".$ans['name']."'>delete</a>
            </td>
		</tr>";
		}
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