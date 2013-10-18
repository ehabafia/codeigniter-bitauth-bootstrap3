<!doctype html>
<html lang="en">
<head id="aum-crm">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>AUM - CRM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Iconifier might be helpful for generating favicons and touch icons: http://iconifier.net -->
	<link rel="shortcut icon" href="<?php echo base_url();?>_/img/favicon.ico" />
	<!-- This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK -->
	<link rel="apple-touch-icon" href="<?php echo base_url();?>_/img/apple-touch-icon.png" />
	<!-- The is the icon for iOS's Web Clip and other things.
		 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for retina display (IMHO, just go ahead and use the biggest one)
		 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
		 - Transparency is not recommended (iOS will put a black BG behind the icon) -->
	<!-- concatenate and minify for production -->
	<link rel="stylesheet" href="<?php echo base_url();?>_/css/custom-theme/jquery-ui-1.10.3.custom.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>_/css/bootstrap-.css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>_/css/mystyles.css" media="screen" />
	<?php 
	if($this->session->userdata('lang')=="arabic")
		echo "<link rel='stylesheet' href='".base_url()."_/css/style_rtl.css' />";
	?>
	<!-- Application-specific meta tags -->
	<!-- Windows 8 -->
	<meta name="application-name" content="" /> 
	<meta name="msapplication-TileColor" content="" /> 
	<meta name="msapplication-TileImage" content="" />
	<!-- Twitter -->
	<meta name="twitter:card" content="">
	<meta name="twitter:site" content="">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:url" content="">
	<!-- Facebook -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="../../assets/js/html5shiv.js"></script>
	<script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write("<script src='<?php echo base_url();?>_/js/jquery-1.9.1.min.js'>\x3C/script>")</script>
	<script src="<?php echo base_url();?>_/js/bootstrap.js"></script>
	<script src='<?php echo base_url();?>_/js/jquery-ui-1.10.3.custom.min.js'></script>
	<script src="<?php echo base_url();?>_/js/myscript.js"></script>
	
</head>

<body id = "<?php echo $pageName ?>" style="direction: <?php echo t('direction');?>" bgcolor="#888">

	<section class="container">
	<div class="content row">
	<header class="clearfix">
		<section id="branding">
			<a href="/index.php"><img src="/_/images/aum.png" alt="Alissa Universal Motors"></a>
			<?php $fullName = $this->session->userdata('ba_fullname');?>
			<div id="userGreeting"><h5><?php echo t('membersTitle', $fullName);?></h5></div>
		</section><!-- branding -->
	</header>