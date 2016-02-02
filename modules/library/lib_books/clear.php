<?php
include('../../../connection/connect.php');
extract($_POST);
$today=date('Y-m-d');

$query="SELECT adminNo,book_condition FROM issued WHERE book_no='$book_no'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$adminNo=$row[0];


$query="INSERT INTO returned (adminNo,book_no,date,book_condition)
VALUES ('$adminNo','$book_no','$today','$condition')";
mysql_query($query) or die (mysql_error());

$query="UPDATE book SET book_status='Available',book_condition='$condition' WHERE book_no='$book_no' ";
$result=mysql_query($query);

$query="UPDATE issued SET book_status='cleared' WHERE book_no='$book_no'";
$result=mysql_query($query);

echo "<script language=javascript>alert('Book Cleared!');window.location = 'index.php';</script>";
?>








