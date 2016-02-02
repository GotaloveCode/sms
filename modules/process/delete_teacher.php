<?php
$teacher_id=$_GET['teacher_id'];
// Insert class Details
$sql="delete from teacher where teacher_id='$teacher_id'";
//echo $sql;
//break;
$re=mysql_query($sql)or die(mysql_error());


header('location: /sms/index.php?view=teacher&info=deleted');

//give success message

?>