<?php
session_start();
include('../../../connection/connect.php');

$adminNo=$_REQUEST['adminNo'];
$query="SELECT book_no FROM lib_issued WHERE adminNo='$adminNo' and book_status='issued'";
$result=mysql_query($query);

?>
<select name="book_no">
<option>Select Student</option>
<?php  while($row=mysql_fetch_array($result)) { ?>
<option value><?php =$row['book_no'] ?></option>
<?php } ?>
</select>
