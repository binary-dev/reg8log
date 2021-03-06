<?php
if(ini_get('register_globals')) exit("<center><h3>Error: Turn that damned register globals off!</h3></center>");
$parent_page=true;

$index_dir='../';

$store_request_entropy_probability2=1;

require_once $index_dir.'include/common.php';

require $index_dir.'include/code/code_encoding8anticache_headers.php';

require $index_dir.'include/code/admin/code_require_admin.php';

require $index_dir.'include/config/config_admin.php';

if($show_statistics_in_admin_operations_page) {
	require $index_dir.'include/code/admin/code_get_statistics4admin.php';
	$flag=true;
}
else $flag=false;

?>

<html <?php echo $page_dir; ?>>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="EXPIRES" CONTENT="0">
<title><?php echo tr('Admin operations'); ?></title>
<style>
li {
font-size: large;
margin: 7px;
}
.li_item {
font-size: large;
margin: 7px;
color: white;
}
</style>
</head>
<body bgcolor="#7587b0" text="#000000" link="#0000FF" vlink="#800080" alink="#FF0000" style="margin: 0;" <?php echo $page_dir; ?>>
<table width="100%"  cellpadding="5" cellspacing="0" style="">
<tr>
<td valign="top">
</td>
<td  width="100%" valign="top">
<?php
require $index_dir.'include/page/page_sections.php';
?>
</td>
</tr>
</table>
<center>
<table bgcolor="#7587b0" style="position: relative; top: -170px;">
<tr><td>
<ul>
<li><?php echo tr('Accounts'); ?>:
<ul>
<li><a class="li_item" href="admin-accounts.php"><?php echo tr('Accounts'); ?></a><?php if($flag) echo "($accounts)"; ?>
<br><br>
<li><a class="li_item" href="admin-ban_user.php"><?php echo tr('Ban a user'); ?></a>
<li><a class="li_item" href="admin-unban_user.php"><?php echo tr('Unban a user'); ?></a>
<li><a class="li_item" href="admin-banned_users.php"><?php echo tr('Banned users'); ?></a><?php if($flag) echo "($banned_users)"; ?>
</ul>
<br>
<li><?php echo tr('Pending accounts'); ?>:
<ul>
<li><a class="li_item" href="admin-pending_accounts4admin.php"><?php echo tr('Accounts awaiting admin\'s confirmation'); ?></a><?php if($flag) echo "($pending_accounts4admin)"; ?>
<li><a class="li_item" href="admin-pending_accounts4email.php"><?php echo tr('Accounts awaiting email verification'); ?></a><?php if($flag) echo "($pending_accounts4email)"; ?>
</ul>
<br>
<li><?php echo tr('Security logs'); ?>:
<ul>
<li><a class="li_item" href="admin-account_blocks.php"><?php echo tr('Account blocks'); ?></a><?php if($flag) echo '<span title="', tr('Active/All'), '">(<span style="color: red">', $active_account_blocks, '</span>/', $all_account_blocks, ')</span>'; ?>
<li><a class="li_item" href="admin-ip_blocks.php"><?php echo tr('IP blocks'); ?></a><?php if($flag) echo '<span title="', tr('Active/All'), '">(<span style="color: red">', $active_ip_blocks, '</span>/', $all_ip_blocks, ')</span>'; ?>
</ul>
<br>
<li><?php echo tr('Database'); ?>:
<ul>
<li><a class="li_item" href="admin-tables_status.php"><?php echo tr('Tables status'); ?></a>
</ul>
</ul>
</td></tr>
</table>
</center>
<?php
require $index_dir.'include/page/page_foot_codes.php';
?>
</body>
</html>
