<?php
$subject_id= $_GET['subject_id'];
extract ($_POST);
// Insert class Details
$sql="delete from subject where subject_id='$subject_id'";
//echo $sql;
//break;
$re=mysql_query($sql)or die(mysql_error());


header('location: /sms/index.php?view=academics&info=deleted');

//give success message