<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
if(!isset($parent_page)) exit("<center><h3>Error: Direct access denied!</h3></center>");

?>

<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="EXPIRES" CONTENT="0">
<title>Members area</title>
<script>
function onLogout() {
	exp = new Date();
	exp.setTime(exp.getTime()+(30*1000));
	cookie='reg8log_autologin2=logout;path=/';
	cookie+=';expires='+exp.toGMTString();
	<?php
	if($https) echo "cookie+=';secure';\n";
	?>
	document.cookie=cookie;
	return true;
}
</script>
</head>
<body bgcolor="#7587b0">
<table width="100%" height="80%">
<tr>
<td align="left" valign="top">
<?php
require $index_dir.'include/page/page_sections.php';
?>
</td>
<tr>
<td align="center">
<?php
echo $msg;
if($log_last_activity and $user->user_info['last_activity']) require $index_dir.'include/page/page_print_last_activity.php';
?>
<br /><a href="logout.php?antixsrf_token=<?php echo $_COOKIE['reg8log_antixsrf_token']; ?>" onclick="return onLogout()">Log out</a></td>
</tr>
</table>
<?php
require $index_dir.'include/page/page_foot_codes.php';
?>
</body>
</html>
