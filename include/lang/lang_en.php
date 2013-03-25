<?php
if(ini_get('register_globals')) exit("<center><h3>error: turn that damned register globals off!</h3></center>");
if(!isset($parent_page)) exit("<center><h3>error: direct access denied!</h3></center>");

return array(
'tie login to ip option description' => 'Leads to higher security, but u would be logged out if your IP changes',
'login limit warning' => 'Only %d incorrect login attempts are permitted in every %s.<br>Number of incorrect login attempts in the past %s: %d<br>Number of tries left: %d',
'block_bypass_mode_max_logins' => 'Note: Maximum number of incorrect logins is limited to <span style="color: red">%d</span>.',
'you are not admin!' => 'You are not authenticated as admin!<br>First log in as admin.',
'Account activated msg' => '<h3>Congratulations!<br>Your registration is completed.</h3>',
'account created msg' => '<h3>Congratulations!<br>You registered successfully.</h3>',
'account activation email sent msg' => '<h3>An email containing the account activation link is sent to your email.<br>Complete your registration by opening that link in %s.<br>If you received no email, you can log into your pending account and request a new email.</h3>',
'pending for admin confirmation msg' => '<h3>Your request is processed successfully and your account is pending for admin\'s confirmation.<br>If it is not confirmed by admin in the next %s it is automatically considered to be removed.</h3>',
'block-bypass max incorrect logins reached msg' => '<center><h3>Maximum number of incorrect logins is reached.<br>You cannot use block-bypass system until next block.</h3>',
'notify user description' => 'Whether user will be notified (via email) about admin approval/rejection of his registration.',
'account block msg' => '<span style="white-space: pre; color: #155;">%s</span>\'s account is <span style="color: #f00">locked</span> for the future %s',
'Check your email carefully msg' => 'Check your email carefully because, for security reasons, the system will not inform you whether the email you entered really exists in the database; But you can of course make other tries in case you made a typo or you don\'t remember certainly which of your emails you had chosen for your account.',
'protection change warning msg' => '- First, don\'t touch this setting if you don\'t know what you are doing and for what reason.
<br>- Second, if you choose a weaker protection level then you will also need a stronger password to resist brute-force attacks.',
'ip block weak' => 'IP block <span style="background: yellow; padding: 5px;" >(Weak protection)</span>',
'account block good' => 'Account block <span style="background: blue; padding: 5px;">(Good protection)</span>',
'account and ip block max' => 'Account and IP blocks <span style="background: green; padding: 5px;">(Maximum protection)</span>',
'New email is shorter than' => '"New email is shorter than "+min_length+\' characters!\';',
'New email is longer than' => '"New email is longer than "+max_length+\' characters!\';',
'ip block msg' => 'Login attempts from IP <span style="white-space: pre; color: blue;">%s</span> are <span style="color: #f00">blocked </span>due to many incorrect logins in the past %s.</span>',
'Max password reset emails msg' => 'Maximum number of password reset emails that can be sent in every %s : %d<br>Note that the system will not, for security reasons, tell you if the maximum number of emails is reached.',
'username format msg' => '1- English &amp; Persian letters &amp; numbers<br>2- No leading, trailing or consecutive spaces.',
'notify me admin action msg' => 'Notify me (via email) when admin approves/rejects my registration',
'account is not blocked msg' => '<span style="white-space: pre; color: #0a8;">%s</span>\'s account is not blocked!',
'account or ip is not blocked msg' => 'Neither of the account <span style="white-space: pre; color: #0a8;">%s</span> and IP <span style="white-space: pre; color: #0a8;">%s</span> are locked!',
'max incorrect logins reached msg' => 'Maximum number of incorrect logins is reached.<br>You cannot use block-bypass system until next block.',
'Check login information msg' => 'You are not authenticated!<br />Check your login information.',
'block-bypass email sent msg' => 'An email is sent to <span style="white-space: pre; color: #080;">%s</span>,<br>if that is the correct email address of the account <span style="white-space: pre; color: #080;">%s</span>',
'max block-bypass emails msg' => ' and<br>the maximum number of block-bypass emails (%s) is not reached',
'You are not authenticated msg' => 'You are not authenticated! <br>First log in',
'new email is shorter than2' => 'new email is shorter than %s characters!',
'new email is longer than2' => 'new email is longer than %s characters!',
'already registered msg' => '%s is already registered; please choose another %s!',
'new password is shorter than' => 'new password is shorter than %d characters!',
'new password is longer than' => 'new password is longer than %d characters!',
'no such email verification record' => 'Error:<br>No such record found!<br>Possible reasons:<br>- Out of email verification time.<br>- Pending account not confirmed by admin in the specified time',
'Pending account expired msg' => 'Error:<br>Pending account is expired!<br>Reason:<br>Not confirmed by admin in the specified time',
'Out of email verification time msg' => 'Error:<br>Pending account is expired!<br>Reason:<br>Out of email verification time',
'email verification already done msg' => 'Your account\'s email verification is already done!',
'waiting for admin confirmation msg' => '<br>Your account is waiting for admin confirmation',
'email verified - waiting admin msg' => 'Your email is verified successfully.<br>Your account is waiting for admin confirmation in %s from your registeration date',
'verification email sent msg' => 'An email is sent to <span style="white-space: pre; color: #080;">%s</span>',
'verification email sent msg p2' => ',<br>if that is the correct email address of your account.<br>(and of course if your account needs email verification)',
'password email sent msg' => 'An email is sent to <span style="white-space: pre; color: #080;">%s</span>,<br>if that is the correct email address of your account',
//-- database setup system --
'variable created msg' => 'Variable <span style="color: green">%s</span> created',
'table created msg' => 'Table <span style="color: green">%s</span> created',
'setup - Copy the string msg' => 'Copy the string in the text box below and paste and save it into the <span style="color: yellow">setup.txt</span> file in the <span style="color: yellow">setup</span> directory and then click on the Continue button.<br>This is to verify that you are the owner of this website',
//-- database setup system --
'Security code short - js msg' => 'Security code is shorter than \'+captcha_min_len+\' characters!',
'Security code long - js msg' => 'Security code is longer than \'+captcha_max_len+\' characters!',
'user needs email verification msg' => 'This account needs email verification too for it to be activated',
'Check your email carefully msg2' => 'Check your email carefully because, for security reasons, the system will not inform you whether the email that you entered is the same as your account\'s email; But you can of course make other tries in case you made a typo or you don\'t remember certainly which of your emails you had chosen for your account.',
'captcha - never used letters' => 'Note: The letters B, D, I, O, Q are never used in captcha codes <br>due to similar appearance with some other characters.',

);

?>