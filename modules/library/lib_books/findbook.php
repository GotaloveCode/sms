<?php
session_start();
include('../../../connection/connect.php');

$book_no=$_REQUEST['book_no'];
$query="SELECT title FROM lib_books WHERE book_no LIKE '%$book_no%'";
$result=mysql_query($query);

?>
<select name="book">
<option>Select Book</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value><?=$row['title']?></option>
<? } ?>
</select>
