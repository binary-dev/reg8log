<?phpif(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");if(!isset($parent_page)) exit("<center><h3>Error: Direct access denied!</h3></center>");require_once $index_dir.'include/class/class_cookie.php';$req_time=time();$cookie=new hm_cookie('reg8log_failed_logins', "\n");$cookie->secure=$https;$usernames=$cookie->get();$matches=null;$tmp10=$usernames;for($i=0; $i<count($tmp10); $i+=2) if($tmp10[$i]===strtolower($_identified_username)) {	$matches[]=$tmp10[$i+1];	unset($usernames[$i], $usernames[$i+1]);}if(!$matches) return;$cookie->set(null, $usernames);require_once $index_dir.'include/code/code_db_object.php';$_username=$reg8log_db->quote_smart($manual_identify['username']);require_once $index_dir.'include/code/code_fetch_site_vars.php';$lock_name=$reg8log_db->quote_smart('reg8log--failed_login-'.$manual_identify['username']."--$site_key");$reg8log_db->query("select get_lock($lock_name, -1)");$query="select * from `failed_logins` where `username`=$_username limit 1";$reg8log_db->query($query);if(!$reg8log_db->result_num()) return;$tmp10=$reg8log_db->fetch_row();// note: don't use $rec instead of $tmp10$attempts=unpack("l10", $tmp10['attempts']);if($matches) foreach($attempts as $key=>$value) if(in_array($value, $matches)) $attempts[$key]=0;$count=0;foreach($attempts as $value) if(($req_time-$value)<$lockdown_period) $count++;if(!$count) {	$query="delete from `failed_logins` where `username`=$_username limit 1";	$reg8log_db->query($query);	return;}if(!$matches) return;$last_attempt=max($attempts);$attempts=$reg8log_db->quote_smart(pack('l10', $attempts[1], $attempts[2], $attempts[3], $attempts[4], $attempts[5], $attempts[6], $attempts[7], $attempts[8], $attempts[9], $attempts[10]));$query="update `failed_logins` set `attempts`=$attempts, `last_attempt`=$last_attempt where `username`=$_username limit 1";$reg8log_db->query($query);?>