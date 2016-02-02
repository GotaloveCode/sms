<?php
 $stud_id= $_GET['stud_id'];
$sql="select * from student_details where stud_id = $stud_id";
$row = mysql_query($sql) or die(mysql_error());
$res= mysql_fetch_assoc($row);
extract($res);
//$query="DELETE FROM fees_payment WHERE adminNo='$adminNo'";
//$result=mysql_query($query) or die ('Failed to delete fees_payment');

$query="DELETE FROM parent_details WHERE parent_id='$parent_id'";
$result=mysql_query($query) or die ('Failed to delete parent details');

$query="DELETE FROM medical_history WHERE student_id = $stud_id";
$result=mysql_query($query) or die('Failed to delete medical_history');

$query="DELETE FROM student_details WHERE stud_id = $stud_id";
$result=mysql_query($query) or die('Failed to delete student_details');
echo'<script>window.location=" /sms/modules/admissions/students/students_list2.php"</script>';


?>