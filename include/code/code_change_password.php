<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!isset($parent_page)) exit("<center><h3>Error: Direct access denied!</h3></center>");
$parent_page=true;

if($change_autologin_key_upon_new_password) {

	$new_autologin_key=random_string(43);

	$query='update `accounts` set `password_hash`='.$reg8log_db->quote_smart(create_secure_hash($_POST['newpass'])).", `autologin_key`='$new_autologin_key'".' where `username`='.$reg8log_db->quote_smart($_username).' limit 1';

	$reg8log_db->query($query);

	if(!isset($user)) return;
	
	$user->user_info['autologin_key']=$new_autologin_key;

	$user->save_identity($user->autologin_durability);

}
else {

	$query='update `accounts` set `password_hash`='.$reg8log_db->quote_smart(create_secure_hash($_POST['newpass'])).' where `username`='.$reg8log_db->quote_smart($_username).' limit 1';

	$reg8log_db->query($query);

}

?>
