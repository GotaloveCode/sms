<?php
require_once "../../connection/connect.php";
$search_term = strtolower($_GET["q"]);
if (!$search_term) return;

$sql="SELECT account_name FROM tblaccount WHERE account_name LIKE '%".$search_term."%' ORDER BY account_name ASC";
$result     = mysql_query($sql) or die(mysql_error());

while($row = mysql_fetch_array($result)) {
$account_name = $row['account_name'];
	echo "$account_name\n";
}
