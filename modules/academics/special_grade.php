<link rel="stylesheet" href="/sms/sm_css.css" type="text/css">
<td width="80%" valign="top">

<?php
$sql = "Select * FROM special_grades ORDER by grade_id ASC ";
			$result     = mysql_query($sql) or die(mysql_error());
?>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="entryTable" style="white-space:nowrap;">
<tr><td><a href="/sms/index.php?view=addspecial_grade" class="add">New Special Grades</a></td>
<tr align="center" class="entryTableHeader">
<th align="center">Grade</th>
<th align="center">Department</th>
<th width="" align="center">Range</th>
<th width=""align="center">Comments</th>
<th align="center">Actions</th>
</tr>
<?php
if (mysql_num_rows($result) > 0) {
$i = 0;

while($row = mysql_fetch_assoc($result)) {
extract($row);
if ($i%2) {
	$class = 'row1';
} else {
	$class = 'row2';
}
$i += 1;
$query="SELECT department FROM departments where department_id='$department_id'";
$re=mysql_fetch_assoc(mysql_query($query));
extract($re);
?>
<tr class="<?php echo $class; ?>">
<td align="center" ><?php echo $grade;?> </td>
<td align="center" ><?php echo $department;?> </td>
<td align="center"><?php echo $max_mark.'-'.$min_mark;?> </td>
<td align="center"><?php echo $grade_comment;?> </td>

<td align="center">
<a href=""><img src="/sms/images/update.png"/>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=""><img src="/sms/images/delete.jpg"/>Delete</a></td></tr>

 <?php
}
}
else{
	echo 'No grades for now.';
}
?>
</table>

 <p>&nbsp;</p>

</form></p>
</td>

