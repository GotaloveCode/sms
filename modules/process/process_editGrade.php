<?php
$grade_id= $_GET['grade_id'];

extract ($_POST);
// Insert class Details
$sql="update grades set grade ='$grade_letter',max_mark='$upper_mark',min_mark='$lower_mark',grade_comment='$grade_comments' where grade_id='$grade_id'";
 
//echo $sql;
//break;
$result=mysql_query($sql) or die(mysql_error());

header('location: /sms/index.php?view=academics&info=edited');

//give success message

?>