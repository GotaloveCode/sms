<td width="100%" valign="top">
<?php
//Extract form details

$gradebk_id=$_SESSION['gradebk_id'];
//select subject details
$sql_subject="SELECT * from gradebk where gradebk_id='$gradebk_id'";
$result_subject=mysql_fetch_assoc(mysql_query($sql_subject));
extract($result_subject);
//check if student marks already exists
$query="SELECT gradebk_id from student_marks where gradebk_id='$gradebk_id'";
$result=mysql_query($query);
$Num_Of_Records=mysql_num_rows($result);
//if item already exists
	if ($Num_Of_Records > 0)
	{
	
foreach($_POST['marks1'] as $index => $val){
//echo "marks1[".$index."]=".$val.'<br>';
$date=date('Y-m-d');
//Insert marks Details
$query="UPDATE student_marks SET cat_1='$val' WHERE stud_id='$index' AND gradebk_id='$gradebk_id'";
$result=mysql_query($query) or die(mysql_error());
}
}
else{
foreach($_POST['marks1'] as $index => $val){
$date=date('Y-m-d');
//Insert marks Details
$query="INSERT INTO student_marks (stud_id,cat_1,cat_2,mid_term,end_term,term_id,subject_id,gradebk_id)
VALUES ('$index','$val','0','0','0','$term_id','$subject_id','$gradebk_id')";
$result=mysql_query($query) or die(mysql_error());
}
}
//cat 2
foreach($_POST['marks2'] as $index => $val){
//echo "marks2[".$index."]=".$val.'<br>';
$date=date('Y-m-d');
//Insert marks Details
$query="UPDATE student_marks SET cat_2='$val' WHERE stud_id='$index' AND gradebk_id='$gradebk_id'";
$result=mysql_query($query) or die(mysql_error());
}
//mid_term
foreach($_POST['marks3'] as $index => $val){
//echo "marks3[".$index."]=".$val.'<br>';
$date=date('Y-m-d');
//Insert marks Details
$query="UPDATE student_marks SET mid_term='$val' WHERE stud_id='$index' AND gradebk_id='$gradebk_id'";
$result=mysql_query($query) or die(mysql_error());
}
//end_term
foreach($_POST['marks4'] as $index => $val){
//echo "marks4[".$index."]=".$val.'<br>';
$date=date('Y-m-d');
//Insert marks Details
$query="UPDATE student_marks SET end_term='$val' WHERE stud_id='$index' AND gradebk_id='$gradebk_id'";
$result=mysql_query($query) or die(mysql_error());
}
foreach($_POST['details'] as $index => $val){
	//echo "details[".$index."]=".$val.'<br>';
	$date=date('Y-m-d');
	//Insert marks Details
	$query="UPDATE student_marks SET teacher_comments='$val' where stud_id='$index' AND gradebk_id='$gradebk_id'";
	$result=mysql_query($query) or die(mysql_error());

}



?>
<p align="center"class='success'>Marks added successfully</p><br>
</td>
