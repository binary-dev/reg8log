<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!isset($parent_page)) exit("<center><h3>Error: Direct access denied!</h3></center>");



require_once $index_dir.'include/info/info_security_logs.php';

require_once $index_dir.'include/code/code_db_object.php';

$query="select * from `admin_alerts` where `for`='email' limit 1";

$reg8log_db->query($query);

$rec=$reg8log_db->fetch_row();

$last_alert_email=$rec['last_alert'];

if(!(!$alert_emails_min_interval or time()>=($last_alert_email+$alert_emails_min_interval))) {
	$reg8log_db->query("select release_lock('$lock_name3')");
	return;
}

$new_ip_blocks=$rec['new_ip_blocks'];
require $index_dir.'include/code/code_check_ip_blocks_alert_threshold.php';

$admin_alert_email_msg='';

if(isset($ip_blocks_alert_threshold_reached)) {
	$admin_alert_email_msg='- There were '.$new_ip_blocks." new account block(s).\n";

	$query='update `admin_alerts` set `last_alert`='.time()." where `for`='email' limit 1";
	$reg8log_db->query($query);

	$query="update `admin_alerts` set `new_ip_blocks`=0 where `for`='email' and  `new_ip_blocks`=$new_ip_blocks limit 1";
	$reg8log_db->query($query);
}

$reg8log_db->query("select release_lock('$lock_name3')");

if($admin_alert_email_msg) echo $admin_alert_email_msg;

?>