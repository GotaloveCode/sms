<td width="100%" valign="top">
<?php
$book_id=$_GET['book_id'];


extract($_POST);
$today=date('Y-m-d');

$query="SELECT stud_id, book_condition FROM issued_books WHERE book_id ='$book_id'";

$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
extract($row);

$query="INSERT INTO returned (stud_id,book_id,date,book_condition)
VALUES ('$stud_id','$book_id','$today','$book_condition')";

mysql_query($query) or die (mysql_error());

$query="UPDATE books SET book_status='Available',book_condition='$book_condition' WHERE book_id='$book_id' ";

$result=mysql_query($query)or die (mysql_error());

$query="delete from issued_books WHERE book_id='$book_id' ";
$result=mysql_query($query)or die (mysql_error());

echo "<script language=javascript>alert('Book Cleared!');window.location = '/sms/index.php?view=library';</script>";
?>
</td>







