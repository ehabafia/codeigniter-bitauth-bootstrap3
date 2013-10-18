<?php
if(!isset($selected)) $selected = "";
//if ( $this->bitauth->has_role('admin') or $this->bitauth->has_role('sales')):
	$tapped = $this->router->class;

//endif;
	?>
		<nav class="navbar navbar-inverse" role="navigation">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="#">AUM</a>
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav">

		      <li class="dropdown <?php echo ($tapped == 'users')? "active":'' ?>">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Add User</a></li>
		          <li><a href="/users/">List Users</a></li>
		          <li><a href="#">Edit User</a></li>
		          <li><a href="#">Delete User</a></li>
		        </ul>
		      </li>

		      <li class="<?php echo ($tapped == 'quotations')? "active":'' ?>"><a href="#">Link</a></li>

		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quotations <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">List of Quotations</a></li>
		          <li><a href="#">Create a Quotation</a></li>
		          <li class="divider"></li>
		          <li><a href="#">Request a Discount</a></li>
		          <li><a href="#">Request a Delete</a></li>
		        </ul>
		      </li>
		      
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Action</a></li>
		          <li><a href="#">Another action</a></li>
		          <li><a href="#">Something else here</a></li>
		          <li><a href="#">Separated link</a></li>
		          <li><a href="#">One more separated link</a></li>
		        </ul>
		      </li>
		      
		    </ul>

		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="/logout" class="bold">Log Out</a></li>
		    </ul>
		  </div><!-- /.navbar-collapse -->
		</nav>


