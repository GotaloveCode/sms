<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>User Account Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
<link rel="stylesheet" type="text/css" href="../style.css" media="screen" />

</head>

<body>
<div id="wrap">

<div id="top"> </div>
<div id="contentt">
<div id="logo" align="center">
<img src="../images/logo.jpg"/>

</div>
<!-- end header -->

<?php
		if (!$_SESSION['LoggedIn'] || $_SESSION['LoggedIn']=='False'){
echo '<div class="entry" align=center><font color=red><b>You Must <a href ="../index.php">log in</a> to view this page.</font></div>';
}
else
{
?>

<div class="left">
		 <?php
		include('user_menu.php');		
		?>
	</div>


<div class="middle">
		
			<h2 class="title">Change your Account Password</h2>
			
			
			<?php
			if (isset($_GET['msg'])){
         $msg=$_GET['msg'];
             if ($msg=='fail'){
                   echo'<tr><td align=center><font color=red>An error occured.Please enter Correct current password.</font></td></tr>';
                  }
                   else
                {
                echo'<tr><td align=center><font color=green>User account successfully updated.</font></td></tr>';
                }
                 }
	?>		
			<form name ="user" id="user" method="post"  onsubmit="return validate(this);" action="process_user.php" onreset="password.focus();">
				    <table width="580" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
					  <tr class="entryTableHeader"> 
                      <td colspan="2">My Account Details</td>
                      </tr>
                          <tr>
                            <td width="100" class="label"><strong>User Level:</strong></td>
                            <td width="250" class="content"><label>
                             <b><?php echo $_SESSION['UserLevel']; ?>
                            </label></td>
                          </tr>
						  <tr>
                            <td width="100" class="label"><strong>Username:</strong></td>
                            <td width="250" class="content"><label>
                             <b><?php echo $_SESSION['Username']; ?>
                            </label></td>
                          </tr>
                          <tr>
                            <td height="33" class="label"><strong>Current Password</strong></td>
							<td class="content"><label>
                              <input class="box" type="password" name="password" id="password" title="Enter password" />
                            </label><span class="required" title="This field is required.">*</span></td>
                          </tr>
						  <tr>
                            <td height="33" class="label"><strong>New Password</strong></td>
							<td class="content"><label>
                              <input class="box" type="password" name="newpassword" id="newpassword" title="Enter new password" />
                            </label><span class="required" title="This field is required.">*</span></td>
                          </tr>
						   <tr>
                            <td height="33" class="label"><strong>Confirm New Password</strong></td>
							<td class="content"><label>
                              <input class="box" type="password" name="confirmnew" id="confirmnew" title="Confirm new password" />
                            </label><span class="required" title="This field is required.">*</span></td>
                          </tr>
                          <tr>
                            <td height="43">&nbsp;</td>
                      <td>
                              <input type="submit" name="Save" id="Save" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
							  
                              <input type="reset" name="Clear" id="Clear" value="Clear" >	  
					  
					 </td>
							
                          </tr>
                         
                        </table>
                    <script language="JavaScript" type="text/javascript">
<!--
function validate (user)
{
 
  if (user.password.value == "") {
    alert( "Please Enter your Current password." );
    user.password.focus();
    return false ;
  }
 
	else if (user.newpassword.value == "") {
    alert( "Please Enter new password." );
    user.newpassword.focus();
    return false ;
	}
	
	else if (user.confirmnew.value == "") {
    alert( "Please Confirm new password." );
    user.confirmnew.focus();
    return false ;
	}
	else if (user.newpassword.value != user.confirmnew.value) {
    alert( "The new password fields do not match" );
	user.newpassword.value = "";
	user.confirmnew.value = "";
    user.newpassword.focus();
    return false ;
	}
	
	else{
  return true ;
  }
}
//-->
</script>
	          </form>
				
			</div>
			
	
	
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- start footer -->
<div id="bottom"> </div>
<div id="footer">
&copy; <?php echo date('Y. '); ?> Kilimo-Online

</div>
<!-- end footer -->
</body>
</html>
<?p ~dulla^@204~ 