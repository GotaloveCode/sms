<?php
$con1=mysql_connect("localhost",'root','');
   if(!$con1) return 'Failed to connect to the database.';
   mysql_select_db('sms',$con1);
  mysql_query("SET NAMES 'utf8';", $con1);
  mysql_query("SET CHARACTER SET 'utf8';", $con1);

?>