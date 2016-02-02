<?php
$subject_id= $_GET['subject_id'];
extract ($_POST);
// Insert class Details
$sql="update subject set subject_name='$subject_name',group_id='$group_id',department_id='$department',code_id='$knec_code' where subject_id='$subject_id'";
//echo $sql;
//break;
$re=mysql_query($sql)or die(mysql_error());


header('location: /sms/index.php?view=academics&info=edited#tabs-2');

//give success message
?>