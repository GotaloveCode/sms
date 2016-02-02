<td width="100%" valign="top">
<?php			
//Extract form details
extract ($_POST);
//get active term
$sql_period="SELECT * from term_period where active='1'";
$result_period=mysql_fetch_assoc(mysql_query($sql_period));
extract($result_period);
//select subject details
$sql_subject="SELECT subject_name from subject where subject_id='$subject_id'";
$result_subject=mysql_fetch_assoc(mysql_query($sql_subject));
extract($result_subject);
//select class details
$sql_class="SELECT class_name from class where class_id='$class_id'";
$result_class=mysql_fetch_assoc(mysql_query($sql_class));
extract($result_class);

//generate grade book name
$gradebk=$subject_name.'_'.$class_name.'_'.$term_name.'_'.$year_name;
//check if gradebook already exists
$query="SELECT gradebk from gradebk where gradebk='$gradebk'";
$result=mysql_query($query);
$Num_Of_Records=mysql_num_rows($result);
//if item already exists
	if ($Num_Of_Records > 0)
	{
		?>
<p align="center"class='success'>Grade book Already Exists!</p><br>
<?php


	}
else{//create the gradebook
$sql="INSERT INTO gradebk (gradebk,subject_id,class_id,term_id) VALUES ('$gradebk','$subject_id','$class_id','$term_id')";
mysql_query($sql);
?>
<p align="center"class='success'>Grade book added successfully</p><br>
<?php
}	
//give success message
?>
</td>
