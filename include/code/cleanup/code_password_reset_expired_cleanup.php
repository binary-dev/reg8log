<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!isset($parent_page)) exit("<center><h3>Error: Direct access denied!</h3></center>");

$expired=$req_time-$password_reset_period;

$query="delete from `password_reset` where `timestamp` < $expired";

$reg8log_db->query($query);

?>