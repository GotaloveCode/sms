<?php
session_start();
ob_start();
include('../../../connection/connect.php');
include ('../../../common/functions.php');
if($_SESSION['LoggedIn'] != 'True'){
		header("location:/sms/modules/security/logout.php");
		}
//isLoggedIn();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>MySkulMate</title>	
<link rel="stylesheet" href="../../../sm_css.css" type="text/css">
<link rel="stylesheet" type="text/css" href="../../../jq/jquery.autocomplete.css" />	
<script type="text/javascript" src="../../../jq/jquery.js"></script>
<script type='text/javascript' src='../../../jq/jquery.autocomplete.js'></script>
<script type='text/javascript' src='../../../jq/highlight.js'></script>
<script type="text/javascript">
$().ready(function() {

	$("#search_term").autocomplete("parsearch.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
</script>

</head>
<body rightmargin="5px" leftmargin="5px" topmargin="5px" bottommargin="0" marginheight="5px" marginwidth="5px">
<div id="wrap">
<div id="top"> </div>
<div id="contentt">
<div align="right" style="background-color:#95B9C7; height:80px;">
<div style="float:left; padding:4px; background-color:#95B9C7;"><img src="../../../school_logo.jpg" alt="logo" width="70" height="70" border="1"></div>
  
  <div style="float:left; padding:5px; margin-top:40px; font-size:16px; font-weight:bold; color:#000000;">
 &nbsp;&nbsp; <u></u>&nbsp;&nbsp;
   <u></u>&nbsp;&nbsp;
   <u></u>&nbsp;&nbsp;
   <u></u>&nbsp;&nbsp;
   <u><?php echo $_SESSION['schoolname'];?></u>
  </div>
  <div style="float:right; color:#FFFFFF;">
  <div style="float:right; padding:4px; background-color:#95B9C7;"><img src="<?php echo $_SESSION['student_photoURL'];?>" alt="logo" width="70" height="70" border="1"></div>
 
  <span class="msg"><?php $time=getDayTime(); echo $time; ?>&nbsp;</span><?php echo date("D M j Y g:i a");?></div><br>
</div>

<div class="nav_bar">
  <div style="width:inherit; float:left;"> Welcome <strong><?php echo $_SESSION['full_name'];?></strong>  </div>
  <div style="float:left; margin-left:100px;"><?php $termPeriod= getActiveTerm ();  ?><strong>&nbsp;&nbsp;Term/Semester: &nbsp;</strong><?php echo $termPeriod['key2'];?>&nbsp;&nbsp; <?php echo $termPeriod['key1'];?></div>
  <div style="width:inherit; float:right; margin-right:20px"><strong><?php echo $_SESSION['userName']; echo '['.$_SESSION['User_type'].']'?></strong>[ <a href="/sms/modules/security/logout.php">logout</a> ]</div>
</div>
<table width="100%" height="80%" border="0" cellpadding="4" cellspacing="0">
  <tbody><tr>
  <!--left Column| Menu Bar-->
    <td width="20%" valign="top" bgcolor="#DDDDDD" nowrap="nowrap"><!--admin menu-->
<div class="menu_inc">
  <!--Menu Header-->
  <div class="menu_item_main"><a href="../../../index.php">Home</a> </div>
  <hr>
  <!--Menu Items-->
     <?php if ($_SESSION['User_type']=="admin" || $_SESSION['User_type']=="super_admin" ){ echo '  <div class="menu_item"><a href="../../../index.php?view=admissions">Admissions </a></div> ';} ?>
   <hr noshade="noshade">
  <?php if ($_SESSION['User_type']=="admin" || $_SESSION['User_type']=="super_admin" || $_SESSION['User_type']=="parent"|| $_SESSION['User_type']=="student" || $_SESSION['User_type']=="teacher"){ echo '     <div class="menu_item"><a href="../../../index.php?view=academics"> Academics</a></div>  ';} ?>
   <!--Student Administration Menu-->
     
    <!--Library Menu-->
   <hr noshade="noshade">
 <?php if ($_SESSION['User_type']=="admin" || $_SESSION['User_type']=="super_admin" || $_SESSION['User_type']=="clerk" || $_SESSION['User_type']=="librarian" || $_SESSION['User_type']=="student"){ echo '  <div class="menu_item"><a href="../../../index.php?view=library">Library Management</a></div>  ';} ?>
     <!--Mini Account Menu-->
   <hr noshade="noshade">
<?php if ($_SESSION['User_type']=="admin" || $_SESSION['User_type']=="super_admin" || $_SESSION['User_type']=="parent" || $_SESSION['User_type']=="clerk" || $_SESSION['User_type']=="student"){ echo '   <div class="menu_item"><a href="../../../index.php?view=accounts">Accounts Office</a></div> ';} ?>
 <hr noshade="noshade">
 <?php if ($_SESSION['User_type']=="admin" || $_SESSION['User_type']=="super_admin" || $_SESSION['User_type']=="clerk" || $_SESSION['User_type']=="librarian" || $_SESSION['User_type']=="student"){echo ' <div class="menu_item"><a href="../../../index.php?view=add_user">Manage Users</a></div> ';} ?>
   <hr noshade="noshade">
           	<!--Message Menu-->
  
  

   <div class="menu_item"><a href="/sms/modules/security/logout.php"> Sign Out</a></div>
      <hr noshade="noshade">
<!--end main div-->  
</div></td>
	<!--right Column | Data Column-->

<td width="100%" valign="top">
<h2>Parents List</h2>
<form action="/sms/modules/admissions/students/searchparent.php" method="post">
<table border="0" cellspacing="1" cellpadding="4" class="entryTable">
<td><img src="/sms/images/view.png"/>Search Parent:
<input type="text" name="search_term" value="" id="search_term">
<input type="submit" name="action2" value="Search" class="page"></form>
</td><td><a href="/sms/modules/admissions/students/print_parlist.php" target="_blank"><button type="button" name="print" value="" id="print">Print</button></a></td>
</table>


<DIV STYLE="overflow: auto; height: 500; 
            border-left: 1px gray solid; border-bottom: 1px gray solid; 
            padding:0px; margin: 0px">
			
<table width="98%" border="0" cellpadding="1" cellspacing="1" class="entryTable" id="theList">

<tr align="center" class="entryTableHeader">
<th width="" >#</th>
<th width="20%">Parent Name</th>
<th >Adm No.</th>
<th width="20%" >Student Name</th>
<th width="" >Phone</th>
<th width="" >Address</th>
<th width="" >Contact</th>
<th >In Sch</th>

</tr>

<?php

$sql = "Select * FROM parent_details ORDER by parent_id ASC ";
$result     = mysql_query($sql) or die(mysql_error());
 if (mysql_num_rows($result) > 0) {
$i = 0;

while($row = mysql_fetch_assoc($result)) {
extract($row);
//students name & adm
$query1="SELECT fname,mname ,lname,adminNo from student_details where parent_id='$parent_id'";
$result1=mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$pfname=$row1[0];
$pmname=$row1[1];
$plname=$row1[2];
$sadm=$row1[3];
//
if ($i%2) {
	$class = 'row1';
} else {
	$class = 'row2';
}
$i += 1;
?>
<tr class="<?php echo $class; ?>">
<td align="center"><?php echo $parent_id;?> </td>
<td align=""><?php echo $fname. ' '.strtoupper($mname[0]).'. '.$lname;?></td>
<td align=""><?php echo $sadm;?> </td>
<td align=""><?php echo $pfname. ' '.strtoupper($pmname[0]).'. '.$plname;?> </td>
<td align=""><?php echo $phoneNo;?> </td>
<td align=""><?php echo $postalAddress;?> </td>
<td align="center"><?php echo $contact_method;?> </td>
<td align="center"><?php if($active==1){ echo 'YES';} else { echo 'NO';}?> </td>

</tr>


 <?php
}
?>
<div class="paging">

</div>
<?php
}
else{
	echo 'No Parents for now.';
}
?>
</table>
</div>
</form>
</td>
</tr></tbody></table>
<div id="footer" align="center"><a href="" ></a></div>
</div>
<div id="bottom"> 
</div>
</div>
</body></html>