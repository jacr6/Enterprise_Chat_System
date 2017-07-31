<?php
session_start();
$sender=$_SESSION['name'];

?>
<?php
if(isset($_GET['epr'])){
    $epr=$_GET['epr'];
if ($epr =='view') {
	$id=$_GET['id'];
	$receiver=$_GET['name'];
	echo "$receiver";
}
} 
if(isset($_GET['name'])){
    $epr=$_GET['name'];
   
	$id=$_GET['name'];
	}
	
if(isset($_GET['access'])){
    $b=$_GET['access'];

	echo $b;
	}
	
?>
<html>
<form name=<"form" id="form" action="" method="post" enctype="multipart/form-data">
File: <input type="file" name="bin" id="bin" title="Choose File" /><br />
<input type="submit" name="upload" id="upload" value="Upload" /><br />
<input type="submit" name="read" id="read" value="Read" />
</form>
</html>
<?

$link = mysqli_connect("localhost", "root","", "adrec1") or die ("Error".mysqli_error($link));


if(isset($_POST['upload']))
{
    $conn = mysqli_connect("localhost","root","","adrec1");
   $result=$conn->query("SELECT * FROM credentials WHERE  name='$epr'");
    
		
if($result->num_rows !=0)
{

$file_path=$_FILES['bin']['tmp_name'];
$file_type=$_FILES['bin']['type'];
$file_size=$_FILES['bin']['size'];
$file_name=$_FILES['bin']['name'];


if ($file_name != ""  && ($b=="u"||$b=="a") )
{
 $conn = mysqli_connect("localhost","root","","adrec1");
      $comm=$conn->query("SELECT * FROM contact where user= '$epr' and  name='$sender' ");
      if($comm->num_rows !=0)
       {
    
       

$data=mysqli_real_escape_string($link, file_get_contents($file_path));

$query="INSERT INTO table_name (field_name,sender,receiver,size) values('$data','$sender','$epr','$file_size') "; 

if($result)
{
$result=$link->query("SELECT * FROM table_name WHERE  sender='$sender' and receiver='$epr'");
if($result->num_rows !=0)
{
if($row=$result->fetch_assoc())
{
		$s=$row['file'];
}
	while($row=$result->fetch_assoc())
{
	
		$f=$s+1;
		echo $f;
		$q = "UPDATE table_name SET file='$f' WHERE sender='$sender' and receiver='$epr'";
        $update=mysqli_query($link,$q);}
		
		
}

}
echo "Success! Your file was successfully added!";

} else {
echo "sry cant upload bcoz the user may not added u as a contact";
}
}else echo "Not a file or the recepient may be blocked by admin";
}
}




if(isset($_GET['epr'])){
    $epr=$_GET['epr'];
if ($epr =='view') {
	$id=$_GET['id'];
	echo $id;
}


if($epr=="view")
{


$sql = "SELECT field_name FROM table_name where id=$id ";
$result2 = mysqli_query($link, $sql);    
$row = mysqli_fetch_object($result2);
$bin_content = $row->field_name; 
$fileName = time().".bin"; 
header("Content-disposition: attachment; filename=".$fileName);
print $bin_content;
}
}
?>


  <?php

 include('connect.php');
$sql=mysql_query("SELECT *FROM table_name where sender='$sender' and receiver='$epr'");
$sql1=mysql_query("SELECT *FROM table_name where sender='$epr' and receiver='$sender'");

?>

<html>
 <body>
<a href="afterlogin.php"> Go Back </a>

<h2>files</h2>
       <table  border="1" cellspacing="0" cellspacing="0" width="700">
       <thead>
       
            
              <th>sender</th> 
             <th>receiver</th>
             <th>field_name</th> 
              <th>action</th>
           
              </thead> 

            <?php



       while ($row = mysql_fetch_array($sql)) {

                  
                

                       echo "<tr>
                            <td>".$row['sender']."</td>
                            <td>".$row['receiver']."</td>
                             <td>".$row['field_name']."</td>
                             <td>
                             
                              <a href ='f.php?epr=view&id=".$row['id']."'>download</a>
                        </td>
                              </tr>";


                       }


             


                


                
           
             

            ?>
              <?php



       while ($rowa = mysql_fetch_array($sql1)) {

                  
                

                       echo "<tr>
                            <td>".$rowa['sender']."</td>
                            <td>".$rowa['receiver']."</td>
                             <td>".$rowa['field_name']."</td>
                             <td>
                             
                              <a href ='f.php?epr=view&id=".$rowa['id']."'>download</a>
                        </td>
                              </tr>";


                       }


             


                


                
           
             

            ?>
       </table>
</body>
</html>


  
