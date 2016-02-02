<?php
require_once "../../../connection/connect.php";
$search_term = strtolower($_GET["q"]);
if (!$search_term) return;

$sql="SELECT * FROM parent_details WHERE concat(fname,' ',mname,' ',lname) LIKE '%".$search_term."%' OR spouse_name LIKE '%".$search_term."%'  ORDER BY parent_id ASC";
$result     = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result)) {
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
	echo "$fname $mname $lname\n";
}
