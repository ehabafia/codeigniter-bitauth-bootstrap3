		<?php if($parentCat !== NULL): //echo $selected.'xxx';?>
		<aside class="col col-lg-2">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><?=$parentCat <> "" ? $parentCat : ""?></h3>
			  </div>
			  <div class="panel-body block">
					<?php
					if(!isset($selected)) $selected = "";
					if ( $this->bitauth->has_role('admin') or $this->bitauth->has_role('sales')):
						if($this->router->class == 'users'):
						?>
						<ul id="navigation">
							<li <?php echo ($selected == 'addUser')? "class='selected'":"" ?> ><a href="/users/addUser"><?php echo t('addUser');?></a></li>
							<li <?php echo ($selected == t('listUsers'))? "class='selected'":"" ?> ><a href="/users"><?php echo t('listUsers');?></a></li>
						</ul>
					<?php endif; ?>
					<?php endif;
					if ( $this->bitauth->has_role('user') or $this->bitauth->has_role('admin')):
						if($this->router->class == 'members'):
						?>
						<ul id="navigation">
							<li <?php echo ($selected == 'addProduct')? "class='selected'":"" ?> ><a href="/members/addProduct"><?php echo t('addProduct');?></a></li>
							<li <?php echo ($selected == 'listProducts')? "class='selected'":"" ?> ><a href="/members/listProducts"><?php echo t('listProducts');?></a></li>
							<li <?php echo ($selected == 'addCategory')? "class='selected'":"" ?>><a href="/members/addCategory"><?php echo t('addCategory');?></a></li>
							<li <?php echo ($selected == 'listCategories')? "class='selected'":"" ?>><a href="/members/listCategories"><?php echo t('listCategories');?></a></li>
							<li <?php echo ($selected == 'addBranch')? "class='selected'":"" ?> ><a href="/members/addBranch"><?php echo t('addBranch');?></a></li>
							<li <?php echo ($selected == 'listBranches')? "class='selected'":"" ?> ><a href="/members/listBranches"><?php echo t('listBranches');?></a></li>
							<li <?php echo ($selected == 'communicate')? "class='selected'":"" ?> ><a href="#"><?php echo t('Communicate');?></a></li>
							<li <?php echo ($selected == 'feedback')? "class='selected'":"" ?> ><a href="#"><?php echo t('Feedback');?></a></li>
							<li <?php echo ($selected == 'logout')? "class='selected'":"" ?> ><a href="/logout"><?php echo t('Logout');?></a></li>
						</ul>
						<?php endif; ?>
					<?php endif; ?>
			  </div>
			</div>
		</aside>
		<?php endif; ?>