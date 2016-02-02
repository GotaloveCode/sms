<?php
session_start();
include('../../../connection/connect.php');
extract($_GET);
$m=explode(' ',$student_name);
$query="SELECT stud_id FROM student_details WHERE fname='$m[0]' AND mname='$m[1]' AND lname='$m[2]' ";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$intials=$row[0];
$date=date('Y-m-d');

//add book to issued books
$query="INSERT INTO issued_books (issue_id,book_id,date_issued,issued_by,book_condition)
VALUES ('NULL','$book_id','$date','$user_id','$book_condition')";
mysql_query($query) or die (mysql_error());

header("location:course_books.php?info=success&tab=issue");

?>



