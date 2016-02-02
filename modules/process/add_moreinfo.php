<td width="80%" valign="top">
<?php

//Extract form details
extract ($_POST);
$student_name=$_POST['student_name'];
$code = explode(' ', $student_name);
$fname=$code[0];
$mname=$code[1];
$lname=$code[2];
//$class_id=$_POST['class_id'];
//select gender of student
$query="SELECT gender,stud_id FROM student_details WHERE fname='$fname' AND mname='$mname' AND lname='$lname'";
$result=mysql_query($query);
$row1=mysql_fetch_array($result);
$stud_id=$row1[1];

//Update student details
$query="INSERT INTO kcpe_marks (stud_id,primary_school,kcpe_index,kcpe_marks,kcpe_subjects,kcpe_year,english_marks,kiswahili_marks,maths_marks,
science_marks,socialstudies_marks) VALUES ('$stud_id','$pname','$index_no','$kcpe_marks','$kcpe_subjects','$kcpe_year','$english_mark','$kiswahili_mark',
'$maths_mark','$science_mark','$socialstudies_mark') ";
mysql_query($query) or die ('Couldnt update student details');

//get student id first

?>
<p align="center"class='success'>Student more information added!</p><br>
</td>