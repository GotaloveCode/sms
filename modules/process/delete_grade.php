<?php
$grade_id= $_GET['grade_id'];
extract ($_POST);
// delete class Details
$sql="delete from grades where grade_id='$grade_id'";
//echo $sql;
//break;
$re=mysql_query($sql)or die(mysql_error());


header('location: /sms/index.php?view=academics&info=deleted');

//give success message

?>