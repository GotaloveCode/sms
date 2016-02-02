<?php
session_start();
include '../connection/connect.php';
if (isset($_POST['Save']))
{
      extract($_POST);
	  $username=$_SESSION['Username'];
	$Query= "SELECT * FROM ".$_SESSION['Produce']."user WHERE username = '" .$username. "' and password = '" .md5($password)."'"; 
	$Result=mysql_query($Query);
	$Num_Of_Records=mysql_num_rows($Result);
	if ($Num_Of_Records > 0)
	{
		$Query1="update ".$_SESSION['Produce']."user set password = '" .md5($newpassword)."' where username='" .$username. "'";
		mysql_query($Query1) or die(mysql_error());
		header("location:user.php?msg=success");
	}
	else
	{
		header("location:user.php?msg=fail");
	}
}
?>