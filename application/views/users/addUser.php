<div class="col col-lg-10">
    <h3><?php echo t($pageName); ?></h3>

	<?php
		$er = '';
		if(validation_errors('<div class="error">', '</div>')): ?>

	<div class="row">
		<div class="col-lg-offset-1 col-lg-10">
			<div class="alert alert-dismissable alert-danger">
				<button class="close" data-dismiss="alert" type="button">×</button>
				<p><strong><?php echo t('error-message')?></strong></p>
				<?php echo t(validation_errors()); ?>
			</div>
		</div>
	</div>
<?php	elseif(isset($msg)): ?>

	<div class="row">
		<div class="col-lg-offset-1 col-lg-10">
			<div class="alert alert-dismissable alert-success">
				<button class="close" data-dismiss="alert" type="button">×</button>
				<p><strong><?php echo t('success-message')?></strong></p>
				<?php echo t($msg); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
		
	<div id="form-body">
	<?php
		$attributes = array('class' => '', 'id' => 'addUserSubmit');
		echo form_open('/users/addUser', $attributes); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<?php if(form_error('username')) $er = 'has-error';?> 
					<div class="col-lg-6 form-group <?php echo $er ?>">
						<label for="username" class="control-label"> <?php echo t('username')?><span class="required">*</span></label>
						<?php echo form_input('username', set_value('username'), 'id="username" class="form-control" maxlength="20" TABINDEX=1 placeholder="'.t('usernamePH').'"'); ?>
					</div>
					<?php $er = ''; ?>
					<?php if(form_error('password')) $er = 'has-error';?> 
					<div class="col-lg-6 form-group <?php echo $er ?>">
						<label for="password" class="control-label"><?php echo t('password')?> <span class="required">*</span></label>
						<?php echo form_password('password', set_value('password'), 'id="password" class="form-control" maxlength="20" TABINDEX=2 placeholder="'.t('passwordPH').'"'); ?>
					</div>
					<?php $er = ''; ?>
				</div>

				<div class="row">
					<?php if(form_error('fullName')) $er = 'has-error';?> 
					<div class="col-lg-6 form-group <?php echo $er ?>">
						<label for="fullName" class="control-label"> <?php echo t('fullName')?><span class="required">*</span></label>
						<?php echo form_input('fullName', set_value('fullName'), 'id="fullName" class="form-control" TABINDEX=4 placeholder="'.t('fullNamePH').'"'); ?>
					</div>
					<?php $er = ''; ?>
					<?php if(form_error('passwordConf')) $er = 'has-error';?> 
					<div class="col-lg-6 form-group <?php echo $er ?>">
						<label for="passwordConf" class="control-label"><?php echo t('passwordConf')?> <span class="required">*</span></label>
						<?php echo form_password('passwordConf', set_value('passwordConf'), 'id="passwordConf" class="form-control" maxlength="20" TABINDEX=3 placeholder="'.t('passwordConfPH').'"'); ?>
					</div>
					<?php $er = ''; ?>
				</div>

				<div class="row">
					<?php if(form_error('email')) $er = 'has-error';?> 
					<div class="col-lg-6 form-group <?php echo $er ?>">
						<label for="email" class="control-label"> <?php echo t('email')?><span class="required">*</span></label>
						<?php echo form_input('email', set_value('email'), 'id="email" class="form-control" TABINDEX=5 placeholder="'.t('emailPH').'"'); ?>
					</div>
					<?php $er = ''; ?>
					<?php if(form_error('group')) $er = 'has-error';?> 
					<div class="col-lg-6 form-group clearfix <?php echo $er ?>">
						<label for="group" class="control-label"><?php echo t('group')?> <span class="required">*</span></label>
						<?php echo form_dropdown('group', $groups, '2', 'class="form-control" TABINDEX=6 disabled=disabled')?>
					</div>
					<?php $er = ''; ?>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="text-right form-group">
							<?php echo form_submit( 'submit', t('addUser'), 'id="submit" class="btn btn-info btn-sm" style="font-weight: bold"'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<?php echo form_close(); ?>

	</div>
					
</div>

<script type="text/javascript">
<!--
$(document).ready(function() {
    $('input:visible:enabled:first').focus();
});
//-->
</script>
