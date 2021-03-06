<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!isset($parent_page)) exit("<center><h3>Error: Direct access denied!</h3></center>");

require_once $index_dir.'include/config/config_security_logs.php';

require_once $index_dir.'include/code/code_db_object.php';

$query="select * from `admin_block_alerts` where `for`='email' limit 1";

$reg8log_db->query($query);

$rec=$reg8log_db->fetch_row();

$last_alert_email=$rec['last_alert'];

if(!(!$alert_emails_min_interval or $req_time>=($last_alert_email+$alert_emails_min_interval))) {
	$reg8log_db->query("select release_lock('$lock_name3')");
	return;
}

if($max_alert_emails) {
	$query='select count(*) from `block_alert_emails_history` where `timestamp`>='.($req_time-$max_alert_emails_period);
	if($reg8log_db->count_star($query)>=$max_alert_emails) {
		$reg8log_db->query("select release_lock('$lock_name3')");
		return;
	}
}

$new_ip_blocks=$rec['new_ip_blocks'];
require $index_dir.'include/code/admin/code_check_ip_blocks_alert_threshold.php';

$admin_alert_email_msg='';

if(isset($ip_blocks_alert_threshold_reached)) {

	$admin_alert_email_msg='- '.sprintf(tr('There were %d new IP block(s).', false, $admin_emails_lang), $new_ip_blocks)."\n";

	$query='update `admin_block_alerts` set `new_ip_blocks`=0, `last_alert`='.$req_time." where `for`='email' limit 1";
	$reg8log_db->query($query);

}

$reg8log_db->query("select release_lock('$lock_name3')");

if($admin_alert_email_msg) {
	require $index_dir.'include/code/email/admin/code_email_admin_alert_msg.php';
		if($max_alert_emails) {
		$query="insert into `block_alert_emails_history` (`timestamp`) values($req_time)";
		$reg8log_db->query($query);
		require_once $index_dir.'include/config/config_cleanup.php';
		if(mt_rand(1, floor(1/$cleanup_probability))==1) require $index_dir.'include/code/cleanup/code_block_alert_emails_history_expired_cleanup.php';
		if(mt_rand(1, floor(1/$cleanup_probability))==1) require $index_dir.'include/code/cleanup/code_block_alert_emails_history_size_cleanup.php';
	}
}

?>