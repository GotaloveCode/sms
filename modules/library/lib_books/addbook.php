<?php
session_start();
include('../../../connection/connect.php');
extract($_POST);

$query="INSERT INTO lib_books (title,ISBNo,book_no,book_subject,author,book_condition,book_status,class)
VALUES ('$bkTitle','$isbnNO','$bkNo','$subject','$author','$condtion','Available','$class')";
mysql_query($query) or die ('error updating database,check your inputs');
echo "<script language=javascript>alert('Book Details Added!');window.location = 'index.php';</script>";

$query="SELECT count FROM lib_books_count WHERE subject='$subject' AND class='$class'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$count=$row[0];
$count1=$count+1;

$query="UPDATE lib_books_count SET count='$count1' WHERE subject='$subject' AND class='$class'";
mysql_query($query) or die ('error updating database,check your inputs');

?>



