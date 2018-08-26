<?php
if (!defined('WEBPATH')) die();
header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT');
?>
<!DOCTYPE html>
<head>
	<?php printZDRoundedCornerJS(); ?>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/style.css" type="text/css" />
</head>
<body>
<?php zp_apply_filter('theme_body_open'); ?>

<div id="main">

<?php include("header.php"); ?>

<div id="content">

	<div id="breadcrumb">
	<h2>
		<?php if ( extensionEnabled('zenpage') ) { ?>
	 		<a href="<?php echo getGalleryIndexURL();?>" title="<?php gettext('Index'); ?>"><?php echo gettext("Index"); ?></a>» 
	 	<?php } ?>
	 		<a href="<?php echo htmlspecialchars(getCustomPageURl('gallery'));?>" title="<?php echo gettext('Gallery'); ?>"><?php echo gettext("Gallery") . " » "; ?></a>
			<strong><?php echo gettext("Contact"); ?></strong>
	</h2>
	</div>

	<div id="content-left">	
	<h2 class="contact"><?php echo gettext('Send me a message of Love') ?></h2>
	<?php
	printContactForm();
	?> 

	</div><!-- content left-->
		
	
	<div id="sidebar">
		<?php include("sidebar.php"); ?>
	</div><!-- sidebar -->



	<div id="footer">
	<?php include("footer.php"); ?>
	</div>

</div><!-- content -->

</div><!-- main -->
<?php zp_apply_filter('theme_body_close'); ?>
</body>
</html>