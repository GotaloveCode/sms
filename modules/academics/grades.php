<?php
			
			$sql = "Select * FROM grades ORDER by grade_id ASC ";
			$result     = mysql_query($sql) or die(mysql_error());


			?>
 <h2>Grading System</h2>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="entryTable">
<tr><td><a href="">New</a></td></tr>
<tr align="center" class="entryTableHeader">
<th align="center">Grade</th>
<th width="" align="center">Range</th>
<th width=""align="center">Comments</th>
<th align="center">Details</th>
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
?>
<tr class="<?php echo $class; ?>">
<td align="center" ><?php echo $grade;?> </td>
<td align="center"><?php echo $max_mark.'-'.$min_mark;?> </td>
<td align="center"><?php echo $grade_comment;?> </td>

<td align="center"><a href="">Details</a></td></tr>
 <?php
}
}
else{
	echo 'No hostels for now.';
}
?>
</table>

 <p>&nbsp;</p>

</form></p>