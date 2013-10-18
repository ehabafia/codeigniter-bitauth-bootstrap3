<div id="loginPage">
	
<?php echo ( form_error('email') ? "<div class='alert alert-danger center'>".form_error('email')."</div>" : '' ); ?>
<?php echo ($success ? "<div class='alert alert-success center'>".$success."</div>" : ''); ?>	

<?php
	echo form_open('', 'id="login-form"');
	$x = t('emailPH');
	echo form_label(t('email') , 'email', array('id'=>'email'));
?>	<div class="input-group">
		<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span><?php
	echo form_input('email', set_value('email'), "class='form-control' placeholder='$x' ");
?>	</div><?php
	
	/* echo form_submit('submit', t('login'), 'id="submit"'); */
	?>
	<div class="text-right margin-top-10">
		<a href="/login"><?php echo t('login'); ?></a>
		<button type="submit" class="btn btn-success btn-sm" style="font-weight: bold"><?php echo t('submit')?></button>
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
