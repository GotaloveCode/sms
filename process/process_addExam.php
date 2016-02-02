<?php
extract ($_POST);
// Insert class Details
$sql="select * from exam where exam_type='$exam_name'";
$re=mysql_query($sql);
if(mysql_num_rows($re) > 0) {
header('location: /sms/index.php?view=academics&info=duplicate');
}
else {
$query="INSERT INTO exams (exam_code,exam_type,total_marks)
VALUES ('$exam_name','$exam_name','$total_marks')";
echo $query;
$result=mysql_query($query) or die(mysql_error());

header('location: /sms/index.php?view=academics&info=success');
}
//give success message

?>