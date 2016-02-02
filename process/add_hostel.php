<td width="80%" valign="top">
<?php
$student_name=$_POST['student_name'];
$code = explode(' ', $student_name);
$fname=$code[0];
$mname=$code[1];
$lname=$code[2];
$hostel_id=$_POST['hostel_id'];
//select hostel details
$query="SELECT * FROM hostel WHERE hostel_id='$hostel_id'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);

//select student details
$query="SELECT stud_id,gender,class_id FROM student_details WHERE fname='$fname' AND mname='$mname' AND lname='$lname'";
$result=mysql_query($query);
$row1=mysql_fetch_array($result);

//update students to include hostel allocated
$query2="UPDATE student_details SET hostel_id='$hostel_id' WHERE stud_id='$row1[0]'";
mysql_query($query2);

//update hostel to increase count
//get student class
$query="SELECT class_for FROM class WHERE class_id='$row1[0]'";
$result=mysql_query($query) or die (mysql_error());
$row2=mysql_fetch_array($result);
if($row2[0]=='Form One'){
$formone=$row[2]+1;
echo 'am here';
$query="UPDATE hostel SET Form_One='$formone'";
mysql_query($query);

}
if($row2[0]=='Form Two'){
$formtwo=$row[3]+1;
$query="UPDATE hostel SET Form_Two='$formtwo'";
mysql_query($query);

}
if($row2[0]=='Form Three'){
$formthree=$row[4]+1;
$query="UPDATE hostel SET Form_Three='$formthree'";
mysql_query($query);

}
if($row2[0]=='Form Four'){
$formfour=$row[5]+1;
$query="UPDATE hostel SET Form_Four='$formform'";
mysql_query($query);

}
?>
<p align="center"class='success'>Hostel allocated!.</p><br>
