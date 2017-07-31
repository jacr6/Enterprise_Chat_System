

<?php

SESSION_START();
 $con = mysqli_connect("localhost","root","","adrec1");
$name=$_SESSION['name'];
if(isset($_POST['delec'])){
           
          
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

    header("Location: index.php");
?>

       ?>