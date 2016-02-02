<?php
session_start();
//Save
include '../../connection/connect.php';
if(isset($_POST['login']))
{
      extract($_POST);
	  
	  $userName= stripslashes($userName);
	  $password= stripslashes($password);
	 $userName=mysql_real_escape_string($userName);
	 $password  =mysql_real_escape_string($password);
     $password  = sha1($password);
	$Query= "SELECT * FROM user WHERE userName='" .$userName."' and password='" .($password)."' and status='1'"; 
	$Result=mysql_query($Query)or die(mysql_error());
	$Num_Of_Records=mysql_num_rows($Result);
	if ($Num_Of_Records > 0)
	{
		$List = mysql_fetch_array($Result);

		$fullName = $List['full_name'];
		$User=$List['userName'];
		$User_ID = $List['user_id'];
		$User_TypeID = $List['user_type_id'];
		$student_photoURL=$List['student_photoURL'];
		$_SESSION['full_name']=$fullName;
		$_SESSION['userName'] = $User;
		$_SESSION['UserID'] = $User_ID;
		$_SESSION['UserType'] = $User_TypeID;
		$_SESSION['student_photoURL'] = $student_photoURL;
		$_SESSION['LoggedIn'] = 'True';
		$sql="SELECT userType from usertype where user_type_id='$User_TypeID'";
		$result=mysql_fetch_assoc(mysql_query($sql)) or die (mysql_error());
		extract($result);
		$_SESSION['User_type']=$userType;
		//save to the log
//$log=mysql_query("insert into ".$_SESSION['Produce']."log (userID,event,event_type) values ('".$_SESSION['userName']."','Logged into the system','LOG IN')");
		header('location: ../../index.php');
	}
	else
	{
	//save to the log
//$log=mysql_query("insert into ".$_SESSION['Produce']."log (userID,event,event_type) values ('Host: ".$_SERVER['REMOTE_ADDR']."','Log In Attempt Failed.','FAILED')");
		$_SESSION['LoggedIn'] = 'Invalid';
		header("location:login.php?info=invalid&tab=invalid");
	}
	
}

?>