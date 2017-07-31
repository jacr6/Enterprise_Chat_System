<?php
 mysql_connect("localhost","root","");
 mysql_select_db("adrec1");
 
 $term=$_GET["term"];
 
 $query=mysql_query("SELECT * FROM credentials where name like '%".$term."%' order by name ");
 $json=array();
 
    while($row=mysql_fetch_array($query)){
         $json[]=array(
                    'value'=> $row["name"],
                  //  'label'=>$student["name"]." - ".$student["id"]
                        );
    }
 
 echo json_encode($json);
 
?>