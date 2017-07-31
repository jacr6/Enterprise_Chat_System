  <?php
SESSION_START();
$s1='';
$s='';
 $hel=$_SESSION['name'];

 include('connect.php');
$sql=mysql_query("SELECT *FROM contact");

?>

<html>
 <body>


<h2>contacts</h2>
       <table  border="1" cellspacing="0" cellspacing="0" width="700">
       <thead>
        <th>name</th>
         <!--    <th>user</th> -->
             
            <th>status</th>
            <th>messages</th> 
            <th>files</th> 
              <th>last seen</th> 
             <th>action</th>
           
              </thead> 

            <?php



       while ($row = mysql_fetch_array($sql)) {

                  $findname=$row['name'];

                  $find=mysql_query("SELECT *FROM credentials where name='$findname' ");

                         while ($g = mysql_fetch_array($find)) {
                	          $s=$g['status'];
                	          $fb=$g['access'];
                	         switch ($s){
		            	         case 0: $s = "offline"; break;
	             	           case 1: $s = "avaliable"; break;
		            	         case 2: $s = "busy"; break;
		                      	case 3: $s = "idle"; break;
			                        } 
   
                       }
                        
                        $find2=mysql_query("SELECT *FROM table_name where sender='$findname' and  receiver='$hel' ");

                         while ($g3 = mysql_fetch_array($find2)) {
                	          $s3=$g3['file'];
                	        }    
                 
                   $find1=mysql_query("SELECT *FROM contact where user='$findname' and name='$hel' "
                    );
                           
                           while ($g1 = mysql_fetch_array($find1)) {
                                $s1=$g1['unread'];
                                
                              $g2=$g1['date1'];
                                }

                   
                        $use=$row['user'];
                        if($hel == $use){

                       echo "<tr>
                            <td>".$row['name']."</td>
                            <td>".$s."</td>
                             <td>".$s1."</td>";
                               if(isset($s3))
                             {echo "<td>".$s3."</td>";}
                             else
                              {echo"<td></td>";}
                            
                             if(isset($g2))
                             {echo "<td>".$g2."</td>";}
                             else
                              {echo"<td></td>";}
                             echo "<td>
                             
                              <a href ='afterlogin.php?epr=block&id=".$row['id']."'>block</a>
                              <a href ='f.php?name=".$row['name']."&access=".$fb."'>files</a>
                        </td>
                         </tr>";


                       }


             


                


                
           }    
             

            ?>
       </table>
</body>
</html>
<?php


?>
<script></script>
