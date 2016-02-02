<?php
$class_id= $_GET['class_id'];
extract ($_POST);
// Insert class Details
$sql="delete from class where class_id='$class_id'";
//echo $sql;
//break;
$re=mysql_query($sql)or die(mysql_error());


header('location: /sms/index.php?view=academics&info=deleted');

//give success message

?>