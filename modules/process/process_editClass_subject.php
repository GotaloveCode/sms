<?php
$cst_id= $_GET['cst_id'];

extract ($_POST);
// Insert class Details
$sql="update class_subject_teacher set class_id ='$class_id',subject_id='$subject_id'
 where cst_id='$cst_id'"; 
//echo $sql;
//break;
$result=mysql_query($sql) or die(mysql_error());

header('location: /sms/index.php?view=academics&info=edited#tabs-3');

//give success message

?>