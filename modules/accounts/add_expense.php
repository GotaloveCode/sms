<?php
session_start();
include('../../connection/connect.php');

//Extract form details
extract($_POST);
$date=date('Y-m-d');
//Check if Student alreay exists

$query="SELECT account_name FROM account WHERE account_name='$account_name'";
$result=mysql_query($query);
$Num_Of_Records=mysql_num_rows($result);
//if item already exists
	if ($Num_Of_Records > 0)
	{
		echo "An Account with the same name already exists. An Account may only be created once";
	}
	//Add Student
else{
$account_no='Alpha/'.trim($account_name,' ').'/'.date('m/Y');
// Insert Patient Details
$query="INSERT INTO account (account_no,account_name,account_access,active,account_type,dr,cr)
VALUES ('$account_no','$account_name','$access','$active','expense','00.00','00.00')";
$result=mysql_query($query) or die(mysql_error());
header("location:expense.php?info=success&tab=add");
//give success message

}
?>