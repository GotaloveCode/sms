<?php
/*function to remove htmlentities and preventing sql injection*/
function mysql_entities_fix_string($string){
return htmlentities(mysql_fix_string($string));
}
function mysql_fix_string($string){
if(get_magic_quotes_gpc())$string=stipslashes($string);
return mysql_real_escape_string($string);
}
?>