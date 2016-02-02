<?php
$class=$_GET["class"];
include('../../../connection/connect.php');
s
?>
<select name="book_no" class="box" id="book_no">
         <?php
	$query="SELECT  book_no FROM  books,class where class.class_id=books.class_id and class_name='$class' ";
	$result=mysql_query($query);
	$rowArray=array();
	$rowId=2;
	while($row=mysql_fetch_array($result)){
		$rowArray[$rowId]=$row['book_no'];
		//$rowId=$rowId+1;
    //	$rowArray=getArray();
		echo "<option selected>".$rowArray[2]."</option>";
		for($index=100;$index<=count($rowArray);$index++){
			echo "<option>".$rowArray[$index]."</option>";
		}
    }
	?>
</select>
