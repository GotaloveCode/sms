<?php
	
	
$sql = "Select subject_id, subject_name FROM subject ORDER by subject_id ASC ";
$result     = mysql_query($sql) or die(mysql_error());


?>
 <h2>Subjects On Offer in this School</h2>
	
	<form action="/sms/index.php?view=allocate_subject" method="post" name="frmSubject" id="frmSubject">
	<table width="70%" border="0" cellpadding="1" cellspacing="1" id="theList" class="entryTable">
	<tr><td><select name="student_name">
         <?php
		 
		 //get the student who was recently added and do not have a class yet
	$query1="SELECT stud_id,fname,mname,lname FROM student_details WHERE stud_id
             NOT IN (SELECT stud_id FROM student_subjects)";
	$result1=mysql_query($query1);
	$rowArray=array();
	$rowId=2;
	while($row1=mysql_fetch_array($result1)){
		$rowArray[$rowId]=$row1['fname'].' '.$row1['mname'].' '.$row1['lname'];
		//$rowId=$rowId+1;
    //	$rowArray=getArray();
		echo "<option selected>".$rowArray[2]."</option>";
		for($index=100;$index<=count($rowArray);$index++){
			echo "<option>".$rowArray[$index]."</option>";
		}
    }
	?>
</select></td></tr>
<tr align="center" class="entryTableHeader">
<th padding:2px align="center" >Subject ID</th>
<th padding:2px align="center">Subject Name</th>
<th padding:2px align="center">Allocate</th>
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
<td align="center"><?php echo $subject_id;?> </td>
<td align="center"><?php echo $subject_name;?></td>
<td align="center"><input type="checkbox" name="subject[]" value="<?php echo $subject_name?>"></td></tr>
  <?php
}

}
?>
<tr>
		<td height="43">&nbsp;</td>
		<td>
		<p align="left">
        <input name="save" type="submit" id="save" value="Allocate Subjects"></p>
	
    </p>
	</td>
	<td>
		<p align="left">
        
		<p><input name="cancel" type="reset" id="cancel" value="Cancel Allocation"></p>
    </p>
	</td>
	</tr>
</table>
</form>