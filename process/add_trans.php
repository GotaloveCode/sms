<td width="100%" valign="top">
<?php
$user_id='1';
//Extract form details
extract($_POST);
$date=date('Y-m-d');
//Check if Student alreay exists

$query="SELECT * FROM account WHERE account_name='$account_name1'";
$result=mysql_query($query);
$row = mysql_fetch_assoc($result);
extract($row);

$dr=$dr+$amount;
$cr=$cr+$amount;
// Insert Patient Details
if($account_type=='income'){
$query="INSERT INTO transaction (trans_date,trans_details,account_id,trans_amount,trans_type,user_id,payment_mode,slip_no)
VALUES ('$date','$details','$account_id','$amount','income','$user_id','$payment_mode','$slip_no')";
$result=mysql_query($query) or die(mysql_error());
$query="UPDATE account SET cr='$cr' WHERE account_id='$account_id'";
mysql_query($query);
if($payment_mode=='cash'){
$query="SELECT dr as old_dr FROM account WHERE account_name='cash'";
$result=mysql_query($query);
$row = mysql_fetch_assoc($result);
extract($row);
$new_dr=$old_dr+$amount;
$query="UPDATE account SET dr='$new_dr' WHERE account_name='cash'";
mysql_query($query);
?>
<p align="center"class='success'>Transaction added successfully</p><br>
<?php

}
else{
$query="SELECT dr as old_dr FROM account WHERE account_name='bank'";
$result=mysql_query($query);
$row = mysql_fetch_assoc($result);
extract($row);
$new_dr=$old_dr+$amount;
$query="UPDATE account SET dr='$new_dr' WHERE account_name='bank'";
mysql_query($query);
?>
<p align="center"class='success'>Transaction added successfully</p><br>
<?php

}
}
else{
$query="INSERT INTO transaction (trans_date,trans_details,account_id,trans_amount,trans_type,user_id,payment_mode,slip_no)
VALUES ('$date','$details','$account_id','$amount','expense','$user_id','$payment_mode','$slip_no')";
$result=mysql_query($query) or die(mysql_error());
$query="UPDATE account SET dr='$dr' WHERE account_id='$account_id'";
mysql_query($query);
if($payment_mode=='cash'){
$query="SELECT cr as old_dr FROM account WHERE account_name='cash'";
$result=mysql_query($query);
$row = mysql_fetch_assoc($result);
extract($row);
$new_dr=$old_dr+$amount;
$query="UPDATE account SET cr='$new_dr' WHERE account_name='cash'";
mysql_query($query);
?>
<p align="center"class='success'>Transaction added successfully</p><br>
<?php


}
else{
$query="SELECT cr as old_dr FROM account WHERE account_name='bank'";
$result=mysql_query($query);
$row = mysql_fetch_assoc($result);
extract($row);
$new_dr=$old_dr+$amount;
$query="UPDATE account SET cr='$new_dr' WHERE account_name='bank'";
mysql_query($query);
?>
<p align="center"class='success'>Transaction added successfully</p><br>
<?php

}
}

//give success message


?>
</td>