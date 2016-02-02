<?php
extract ($_POST);
//select grades
$sql="select * from grades where grade='$grade_letter'";
$re=mysql_query($sql);
if(mysql_num_rows($re) > 0) {
header('location: /sms/index.php?view=academics&info=duplicate');
}
else {
// Insert class Details
$query="INSERT INTO grades (grade,max_mark,min_mark,grade_comment)
VALUES ('$grade_letter','$upper_mark','$lower_mark','$grade_comments')";
echo $query;
$result=mysql_query($query) or die(mysql_error());

header('location: /sms/index.php?view=academics&info=success');
}
//give success message

?>