<?php

/**
* This line is required, it must contain the label for your unique username field (what users login with)
*/
$lang['bitauth_username']	= 'Username';

/**
* Password Complexity Labels
*/
$lang['bitauth_pwd_uppercase']	= 'Uppercase Letters';
$lang['bitauth_pwd_number']	= 'Numbers';
$lang['bitauth_pwd_special']	= 'Special Characters';
$lang['bitauth_pwd_spaces']	= 'Spaces';

/**
* Login Error Messages
*/
$lang['bitauth_login_failed']	= 'Invalid %s or Password';
$lang['bitauth_user_inactive']	= 'You must activate this account before you can login.';
$lang['bitauth_user_locked_out']	= 'You have been locked out for %d minutes for too many invalid login attempts, please try again later.';
$lang['bitauth_pwd_expired']	= 'Your password has expired.';

/**
* User Validation Error Messages
*/
$lang['bitauth_unique_username']	= 'This %s is already registered.';
$lang['bitauth_password_is_valid']	= '%s does not meet the complexity requirements: ';
$lang['bitauth_username_required']	= 'The %s field is required.';
$lang['bitauth_password_required']	= 'The %s field is required.';
$lang['bitauth_passwd_complexity']	= 'Password does not meet complexity requirements: %s';
$lang['bitauth_passwd_min_length']	= 'Password must be at least %d characters.';
$lang['bitauth_passwd_max_length']	= 'Password may not be longer than %d characters.';

/**
* Group Validation Error Messages
*/
$lang['bitauth_unique_group']	= 'The %s field must be unique.';
$lang['bitauth_groupname_required']	= 'Group name is required.';

/**
* General Error Messages
*/
$lang['bitauth_instance_na']	= "BitAuth was unable to get the CodeIgniter instance.";
$lang['bitauth_data_error']	= 'You can\'t overwrite default BitAuth properties with custom userdata. Please change the name of the field: %s';
$lang['bitauth_enable_gmp']	= 'You must enable php_gmp to use Bitauth.';
$lang['bitauth_user_not_found']	= 'User not found: %d';
$lang['bitauth_activate_failed']	= 'Unable to activate user with this activation code.';
$lang['bitauth_expired_datatype']	= '$user must be an array or an object in Bitauth::password_is_expired()';
$lang['bitauth_expiring_datatype']	= '$user must be an array or an object in Bitauth::password_almost_expired()';
$lang['bitauth_add_user_datatype']	= '$data must be an array or an object in Bitauth::add_user()';
$lang['bitauth_add_user_failed']	= 'Adding user failed, please notify an administrator.';
$lang['bitauth_code_not_found']	= 'Activation Code Not Found.';
$lang['bitauth_edit_user_datatype']	= '$data must be an array or an object in Bitauth::update_user()';
$lang['bitauth_edit_user_failed']	= 'Updating user failed, please notify an administrator.';
$lang['bitauth_del_user_failed']	= 'Deleting user failed, please notify an administrator.';
$lang['bitauth_set_pw_failed']	= 'Unable to set user\'s password, please notify an administrator.';
$lang['bitauth_no_default_group']	= 'Default group was either not specified or not found, please notify an administrator.';
$lang['bitauth_add_group_datatype']	= '$data must be an array or an object in Bitauth::add_group()';
$lang['bitauth_add_group_failed']	= 'Adding group failed, please notify an administrator.';
$lang['bitauth_edit_group_datatype']= '$data must be an array or an object in Bitauth::update_group()';
$lang['bitauth_edit_group_failed']	= 'Updating group failed, please notify an administrator.';
$lang['bitauth_del_group_failed']	= 'Deleting group failed, please notify an administrator.';
$lang['bitauth_lang_not_found']	= '(No language entry for "%s" found!)';

/**
* Email Activation Messages
*/
$lang['bitauth_activation_email_subject'] = 'Activation email';
$lang['bitauth_activation_email_message'] = 'Dear User,<br/><br/>Please click on the following link to activate your account!<br/><br/>Your account details:</br>Username: %s<br/>Password: %s<br/><br/>%s<br/><br/>Thank you';
$lang['bitauth_activation_email_send_error'] = 'Could not send activation email, please contact the webmaster';

/**
* Forgot Password Messages
*/
$lang['bitauth_forgotpassword_email_subject'] = 'Forgotten password reset email';
$lang['bitauth_forgotpassword_email_message'] = 'Dear User,<br/><br/>This is a password reset confirmation email.<br/><br/>%s';
$lang['bitauth_forgotpassword_email_send_error'] = 'Could not send password reset email, please contact the webmaster';

/**
* Recatpcha Messages
*/
$lang['bitauth_recaptcha_error'] = 'Incorrect captcha code entered. Try again!';
$lang['bitauth_recaptcha_regenerate'] = 'I can\'t read, please generate new captcha!';