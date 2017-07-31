
<?php   



SESSION_START();




 function formatDate($date){
 	return date( 'g:i a',strtotime($date));
 }

$_SESSION['su']=0;
$sender=$_SESSION['name'];
$receiver=$_SESSION['recep'];
if(isset($_SESSION['txt']))
{$txt=$_SESSION['txt'];}
include 'get.php';
   $query ="SELECT * FROM infobase ORDER BY content_id DESC";
    $run  = $get->query($query);
     while($row = $run->fetch_array()) :
 ?>  
     <div id ="chat";>
    
	      <!--  <span style="color:green;"><?php echo $row['name'];?></span>:-->
           <span style="color:green;"><?php
           $test=$row['sender'];
            $test2=$row['receiver'];
         //   if($test=='nikhil'){
          //  echo $test;

             if(($sender==$test || $sender==$test2) && ($receiver==$test || $receiver==$test2)){
            echo "$test"; echo " to ";
            echo "$test2";
            echo ":";   
            
          
            ?>
            </span>
	         <span style="color:black;"><?php
              
              if($row['msg']){
              echo $row['msg'];}
              
              ?></span>
               
            <span style="color:red;float:right";><?php 
             if ($row['msg'] ) {
             
             echo $row['date'];}
         }
             ?></span>
        
         

    </div>
        <?php endwhile;
   
        ?>


