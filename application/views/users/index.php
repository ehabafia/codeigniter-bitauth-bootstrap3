	<div class="col col-lg-10">
	    <h3><?php echo t($pageName); ?></h3>
		<table class="table table-striped table-bordered table-hover" id="info">
			<tr class="primary">
				<th width="1"><?php echo t('id'); ?></th>
				<th><?php echo t('username'); ?></th>
				<th><?php echo t('fullname'); ?></th>
				<th><?php echo t('location'); ?></th>
				<th width="1"><?php echo t('role'); ?></th>
				<th width="1"><?php echo t('status'); ?></th>
				<th width="1"><?php echo t('actions'); ?></th>
			</tr>
		<?php
		$badge = array (
			'1' => 'label-danger',
			'2' => 'label-info',
			'3' => 'label-primary',
			'4' => 'label-warning',
			);
			if( ! empty($users))
			{
				foreach($users as $_user)
				{
					$actions = '';
					if($bitauth->has_role('admin'))
					{
						if($_user->user_id == 1)
						{
							$actions = anchor('users/editUser/'.$_user->user_id, '<span class="glyphicon glyphicon-edit"></span>', 'title="Edit '.$_user->fullname.'"');

						}else {
							$actions = anchor('users/editUser/'.$_user->user_id, '<span class="glyphicon glyphicon-edit"></span>', 'title="Edit '.$_user->fullname.'"');
							$actions .= " ";
							$actions .= '<a href="#" id="userDelete-'.$_user->user_id.'" class="delusr" alt="Delete" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>';
						}
					}

					echo '<tr id="user-'.$_user->user_id.'">'.
						'<td>'.$_user->user_id.'</td>'.
						'<td>'.$_user->username.'</td>'.
						'<td>'.$_user->fullname.'</td>'.
						'<td>'.$_user->location.'</td>'.
						'<td><span class="label '.$badge[$_user->groups[0]].'">'.$groups[$_user->groups[0]].'</span></td>'.
						'<td>'.(($_user->enabled == 0)? '<span id="'.$_user->user_id.'" class="label label-danger"><a href="#" id="unblock-'.$_user->user_id.'" class="unblockUser" alt="Unblock User" title="Unblock User">Blocked</a></span>':'<span id="'.$_user->user_id.'" class="label label-success"><a href="#" id="block-'.$_user->user_id.'" class="blockUser" alt="Block User" title="Block User">Active</a></span>').'</td>'.
						'<td>'.$actions.'</td>'.
					'</tr>';
				}
			}
		?>
		</table>
		<div class="text-right margin-bottom-10">
			<a href="/users/addUser" class="btn btn-info btn-sm text-right">Add User</a>
		</div>
	</div>

	<!--
	*
	*	Dialog for Delete the User
	*
	-->
	<div id="dialog" title="<?php echo t('deluser'); ?>">
		<p><?php echo t('rusure'); ?></p>
	</div>



