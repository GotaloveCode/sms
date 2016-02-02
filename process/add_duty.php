<td width="80%" valign="top">
<?php
$student_name=$_POST['student_name'];
$code = explode(' ', $student_name);
$fname=$code[0];
$mname=$code[1];
$lname=$code[2];
$duty_id=$_POST['duty_id'];
//select student details
$query="SELECT stud_id,gender,class_id FROM student_details WHERE fname='$fname' AND mname='$mname' AND lname='$lname'";
$result=mysql_query($query) or die(mysql_error());
$row1=mysql_fetch_array($result);

//update students to include hostel allocated
$query2="UPDATE student_details SET duty_id='$duty_id' WHERE stud_id='$row1[0]'";
mysql_query($query2) or die(mysql_error());

?>
<p align="center"class='success'>Duty allocated!</p><br>
</td>