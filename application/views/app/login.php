<div id="loginPage">
	
<?php echo ( ! empty($error) ? "<div class='alert alert-danger center'>$error</div>" : '' ); ?>
	

<?php
	echo form_open('', 'id="login-form"');
	$x = t('usernamePH');
	echo form_label(t('username') , 'username', array('id'=>'username'));
?>	<div class="input-group">
		<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span><?php
	echo form_input('username', set_value('username'), "class='form-control' placeholder='$x' ");
?>	</div><?php
	$x = t('passwordPH');
	echo form_label(t('password') , 'password');
?>	<div class="input-group">
		<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span><?php
	echo form_password('password', set_value('password'), "class='form-control' placeholder='$x'");
?>	</div><?php
	
	/* echo form_submit('submit', t('login'), 'id="submit"'); */
	?>
	<div class="text-right margin-top-10">
		<a href="/forgot_password"><?php echo t('lostpass'); ?></a>
		<button type="submit" class="btn btn-success btn-sm" style="font-weight: bold"><?php echo t('login')?></button>
	</div>
	<?php 
	
	echo form_close();	

?>
</div>
</div>

<script type="text/javascript">
<!--
$(document).ready(function() {
    $('input:visible:enabled:first').focus();
});
//-->
</script>
