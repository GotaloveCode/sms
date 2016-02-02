<?php
session_start();
include('../../../connection/connect.php');

$adminNo=$_REQUEST['adminNo'];
$query="SELECT fname,mname,lname FROM student_details WHERE adminNo='$adminNo'";
$result=mysql_query($query);

?>
<select name="student">
<option>Select Student</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value><?=$row['fname'].' '.$row['mname'].' '.$row['lname']?></option>
<? } ?>
</select>
