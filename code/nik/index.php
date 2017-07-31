<?php 
SESSION_START();


$name=$_SESSION['name'];
$_SESSION['name']=$name; 
if(isset($_POST['recep']))
{
$_SESSION['recep']=$_POST['recep'];
}
$recep=$_SESSION['recep'];
if(isset($_POST['txt']))
{
$_SESSION['txt']=$_POST['txt'];
}
if(isset($_SESSION['txt']))
{$txt=$_SESSION['txt'];}

$m_id=$_SESSION['m_id'];
include ('get.php');
$updatequery ="UPDATE credentials SET status='2' WHERE name='$name'";
$update=mysqli_query($get,$updatequery);


	

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


<?php
 

if(isset($_POST['submit'])){

 $conu = mysqli_connect("localhost","root","","adrec1");
 $comu=$conu->query("SELECT * FROM contact where name ='$name' and user='$recep'");
  if($comu->num_rows !=0)
       {
           
       while($rowu=$comu->fetch_assoc())
       {
           $time = date('Y-m-d G:i:s');   
              
        $updatequery ="UPDATE contact SET unread='0'  where name ='$name' and user='$recep'";
        $update=mysqli_query($get,$updatequery);   
       
         $updatequery1 ="UPDATE contact SET date1='$time'  where name ='$recep' and user='$name'";
                             $update1=mysqli_query($get,$updatequery1);   


              
       // $updatequery1 ="UPDATE contact SET date1='$time'  where name ='$name' and user='$recep'";
        //$update1=mysqli_query($get,$updatequery1);   
       
     
        
       }
}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="magic.css" media="all"/>
<script>
	
     function ajax(){

     var req = new XMLHttpRequest();

     req.onreadystatechange = function(){

     	if(req.readyState == 4 && req.status == 200){

     		document.getElementById('repeat').innerHTML=req.responseText
          }

          }

          req.open('POST','box.php',true)
          req.send();
     }
     setInterval(function(){ajax()},1000);
</script>

</head>
<body onload="ajax();">
<div  align="right">
<form method="POST" action="../index.php" align="right">
<input type="submit" id="signoff" name="signoff" value="signoff" />
</form></div>
<br>
<div id="info"><p align="right"><a href="../afterlogin.php"> Go Back </a></p>

<div id ="container">
	<? 
  echo"<p>$name <----> $recep</p>"?>
      <div id ="chatbox">
	    <div id ="repeat"<div style="overflow: auto; border:1px solid black;background-color: #F0F8FF;width: 350px;height: 380px ">
>
	       
      </div>   
      </div>

      <form method="post" action="?">
      	
       <textarea name="txt" placeholder="enter message here.." required/></textarea>
        <input type="submit" name="send" value="send" />
      </form>

       <form method="post" action="?">
        <input type="submit" name="delete" value="delete" />
      </form>


       <?php
         
        
        if(isset($_POST['send'])){
          

	  	                $sender=$_SESSION['name'];
		                $receiver=$_SESSION['recep'];
	                    $txt =$_POST['txt'];
	                    $ip=$_SERVER['REMOTE_ADDR'];
       
         
             $connect = mysqli_connect("localhost","root","","adrec1");
             $block=$connect->query("SELECT * FROM credentials where name='$receiver'");
      if($block->num_rows !=0)
       {
           $m=0;
            while($rowb=$block->fetch_assoc())
             {
       
          
           $p=$rowb['access'];}}
  
if($p=="a" || $p="u" ){

      $conx = mysqli_connect("localhost","root","","adrec1");
      $comm=$conx->query("SELECT * FROM contact");
      if($comm->num_rows !=0)
       {
           $m=0;
       while($rowy=$comm->fetch_assoc())
       {
       
           $user=$rowy['user'];
           $name=$rowy['name'];
             
             if($sender== $name  && $receiver== $user) {
 //
 
            
        $query = "INSERT INTO infobase (sender,receiver,msg,ip_sender) values('$sender','$receiver','$txt','$ip')";
        $run  = $get->query($query) ;
        $_SESSION['ip']=$ip;
     	  if(isset($_SESSION['ip'])){$i=$_SESSION['ip'];
     	
          $q = "UPDATE infobase SET ip_receiver='$i' WHERE receiver='$sender' AND ip_receiver=''";
           $update=mysqli_query($get,$q);}

           // $query = "INSERT INTO infobase (sender,receiver,msg,ip_sender) values('$sender','$receiver','$txt','$ip')";
             //$run  = $get->query($query) ;

     $conn = mysqli_connect("localhost","root","","adrec1");
$result=$conn->query("SELECT * FROM credentials WHERE  name='$receiver'");
    
		
            if($result->num_rows !=0)
            {
             while($answ=$result->fetch_assoc())
               {
	        	$stater=$answ['status'];
		       $rm=$answ['mail_id'];
		  
               }

           }

           else
            {
            echo "No result.";
            }
            
            
            
            
if($stater=='0'){
$topic='Message from Chat Express';
$sen="From: sender@gmail.com";

$m_body=<<<EMAIL
Hi $receiver,

You have message from $sender stating $txt   
EMAIL;
//cho $stater;
//echo $sender;

mail($rm,$topic,$m_body,$sen);}

                    if($run){
        
                    echo "<embed loop='false' src ='chat.wav' hidden = 'true' autoplay='true'/>";

                    }
           
         

                  $m = 1;
            }

           }
         }

          
             

            $conu = mysqli_connect("localhost","root","","adrec1");
             $comu=$conu->query("SELECT * FROM contact where name ='$receiver' and user='$sender'");
             if($comu->num_rows!=0)
                {
              
                     while($rowu=$comu->fetch_assoc())
                      {
                          $unread=$rowu['unread'];
                           $time1=$rowu['date1'];
         
                            $up=$unread+1;
                           //  echo "$up";
                             
                             $updatequery ="UPDATE contact SET unread='$up'  where name ='$receiver' and user='$sender'";
                             $update=mysqli_query($get,$updatequery);   

          
                        }

                   }

                 
           
         
          
           
           


          
       		    $ques = ("SELECT * FROM credentials WHERE  name='$receiver'");
		     	   $ans = mysqli_query($get, $ques);
	

       
         //    $run  = $get->query($query) ;

         
       //             if($run){
        
           //         echo "<embed loop='false' src ='chat.wav' hidden = 'true' autoplay='true'/>";
  
  //                  }
           
         

             ?><html><br><br></html></html><html><?php

                    if($m==0){
                      ?> <html><h1><?php echo " SORRY, your message can't be send  bcoz the user may blocked u or didnt add u as a contact:(" ?></h1></html> <?php
  
                        } 


               $timestamp = date('Y-m-d G:i:s');   
              // echo "$timestamp";

     } else
     {echo "sorry the user is blocked temporarily by admin ";}}
      ?>
      
      
      
       
       
</div>
<?
//session_destroy();
//header("Location:index.php");
?>

<script type="text/javascript" language="Javascript">

function DetectBrowserExit()
{
   alert('Execute task which do you want before exit');
}

window.onbeforeunload = function(){ DetectBrowserExit(); }

</script>
</body>




  

</html>



<?php


include ('get.php');
$name=$_SESSION['name'];
$recep=$_SESSION['recep'];
  

         if(isset($_POST['delete'])){
           
          $name=$_SESSION['name'];
          $recep=$_SESSION['recep'];
 
       $query4 ="SELECT * FROM infobase ORDER BY id DESC";
       $sel ="SELECT *FROM infobase where  sender ='$name' and receiver='$recep'";
        $run4  = $get->query($sel);
     while($rowd = $run4->fetch_array()) 

       {
             
             $d="DELETE FROM infobase where sender ='$name' and receiver='$recep' ";
             $del=mysqli_query($get,$d) or die("failed");
             $d1="DELETE FROM infobase where sender ='$recep' and receiver='$name' ";
             $del1=mysqli_query($get,$d1) or die("failed");
             // $count = $count-1;
             // $count = $count-1;
 
  if($del){
        
          echo "<embed loop='false' src ='chat.wav' hidden = 'true' autoplay='true'/>";

         } 







        }


 

}
       ?>
       