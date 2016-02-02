<?php
extract ($_POST);
// Insert class Details
$sql="select * from class_subject_teacher where teacher_id='$teacher_id' and subject_id='$subject_id' and class_id='$class_id'";
$re=mysql_query($sql);
if(mysql_num_rows($re) > 0) {
header('location: /sms/index.php?view=academics&info=duplicate');
}
else {
$query="INSERT INTO class_subject_teacher (class_id,teacher_id,subject_id)
VALUES ('$class_id','$teacher_id','$subject_id')";
echo $query;
$result=mysql_query($query) or die(mysql_error());

header('location: /sms/index.php?view=academics&info=success');
}
//give success message

?>