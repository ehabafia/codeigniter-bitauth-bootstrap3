<?php
	$this->load->view('_/_header.php');

	$this->load->view('_/_nav.php');

	echo '<div id="content" class="row">';

	$this->load->view('_/_aside.php');
	$this->load->view('_/_content.php');

	echo '</div>';

	$this->load->view('_/_footer.php');
