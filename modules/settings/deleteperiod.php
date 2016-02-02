<?php 
$term_id= $_GET['term_id'];

$sql="delete from term_period where term_id=$term_id"; 
$result=mysql_query($sql) or die(mysql_error());
echo'<script>window.location=" /sms/index.php?info=edited&view=settings"</script>';

?>  