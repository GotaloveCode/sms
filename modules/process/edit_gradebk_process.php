<td width="100%" valign="top">
<?php	
$gradebk_id= $_GET['gradebk_id'];	
	
//Extract form details
extract ($_POST);
//get active term

$sql_period="SELECT * from term_period where year_name='$year2' and term_name='$term_name2'";
$result_period=mysql_fetch_assoc(mysql_query($sql_period));
extract($result_period);
//select subject details
$sql_subject="SELECT subject_id from subject where subject_name='$subject2'";
$result_subject=mysql_fetch_assoc(mysql_query($sql_subject));
extract($result_subject);
//select class details
$sql_class="SELECT class_id from class where class_name='$class2'";
$result_class=mysql_fetch_assoc(mysql_query($sql_class));
extract($result_class);

//generate grade book name
$gradebk=$subject2.'_'.$class2.'_'.$term_name2.'_'.$year2;
//check if gradebook already exists
$query="SELECT gradebk from gradebk where gradebk='$gradebk'";
$result=mysql_query($query);
$Num_Of_Records=mysql_num_rows($result);

//if item already exists
	if ($Num_Of_Records > 0)
	{
header('location:/sms/index.php?info=duplicate&view=academics#tabs-6');

	}
else{//create the gradebook
$sql="update gradebk set gradebk='$gradebk',subject_id='$subject_id',class_id='$class_id',term_id='$term_id' where gradebk_id='$gradebk_id'";
//echo $sql;
//break;
mysql_query($sql)or die(mysql_error());
$sql2="update  student_marks set subject_id='$subject_id',term_id='$term_id' where gradebk_id='$gradebk_id'";
mysql_query($sql2)or die(mysql_error());
header('location:/sms/index.php?info=edited&view=academics#tabs-6');
}	
//give success message
?>
</td>
