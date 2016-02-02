<td width="80%" valign="top">
<?php
//Extract form details
$student_name=$_POST['student_name'];
$code = explode(' ', $student_name);
$fname=$code[0];
$mname=$code[1];
$lname=$code[2];
$class_id=$_POST['class_id'];
//select gender of student
$query="SELECT gender,stud_id FROM student_details WHERE fname='$fname' AND mname='$mname' AND lname='$lname'";
$result=mysql_query($query);
$row1=mysql_fetch_array($result);
$stud_id=$row1[1];

//Update student details,to add class id
$query="UPDATE student_details SET class_id='$class_id' WHERE stud_id='$stud_id'";
mysql_query($query) or die ('Couldnt update student details');
//Update class count
$query="SELECT * FROM class WHERE class_id='$class_id'";
$result=mysql_query($query);
$row2=mysql_fetch_array($result);
if($row1[0]=='female'){
$girls=$row2[5]+1;
$query="UPDATE class SET girls='$girls' WHERE class_id='$class_id'";
mysql_query($query) or die ('Couldnt update class details');

}
else{

$boys=$row2[6]+1;
$query="UPDATE class SET girls='$boys' WHERE class_id='$class_id'";
mysql_query($query) or die ('Couldnt update class details');


}
$query="UPDATE student_details SET class_id='$class_id' WHERE fname='$fname' AND mname='$mname' AND lname='$lname'";
mysql_query($query) or die ('Couldnt update student details');


//get student id first
?>

<p align="center"class='success'>Student allocated class successfully</p><br>
  
</td>