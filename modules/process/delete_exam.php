<?php
$exam_id= $_GET['exam_id'];
extract ($_POST);
// delete class Details
$sql="delete from exams where exam_id='$exam_id'";
//echo $sql;
//break;
$re=mysql_query($sql)or die(mysql_error());


header('location: /sms/index.php?view=academics&info=deleted');

//give success message

?>