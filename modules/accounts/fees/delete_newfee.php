<?php 
$id= $_GET['id'];

$sql="delete from fees_newstudent where id=$id"; 
$result=mysql_query($sql) or die(mysql_error());
echo'<script>window.location=" /sms/index.php?info=edited&view=newfee"</script>';

?>  