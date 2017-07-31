 <?php

 include('connect.php');
$sql=mysql_query("SELECT *FROM credentials");
?>

<?php 
$epr='';

if(isset($_GET['epr']))
    $epr=$_GET['epr'];

if (isset($_POST['add'])) {
	$name=$_POST['username'];
	$user="nikhil";
	$asql=mysql_query("INSERT INTO contact (name,user) values('$name','$user')")  ;

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
          
          $(document).ready( function(){
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