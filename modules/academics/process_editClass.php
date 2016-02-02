<?php
$class_id= $_GET['class_id'];
extract ($_POST);
// Insert class Details
$sql="update class set class_name='$cname',class_for='$class_for',class_status='$status',capacity='$capacity' where class_id='$class_id'";
//echo $sql;
//break;
$re=mysql_query($sql)or die(mysql_error());


header('location: /sms/index.php?view=academics&info=success');

//give success message

?>