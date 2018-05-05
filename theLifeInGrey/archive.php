<?php if (!defined('WEBPATH')) die();?>
<?php header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT'); ?>
<!DOCTYPE html>
	<head>
		<?php include_once('header.php'); ?>
		<meta name="keywords" content="<?php echo html_encode(getMainSiteName().', '.getGalleryTitle()); ?>" />
		<meta name="description" content="<?php echo html_encode(getMainSiteName().' / '.getGalleryTitle().' / '.getGalleryDesc()); ?>" />
		<title><?php echo strip_tags(getMainSiteName().' / '.gettext("Archive View")); ?></title>
	</head>
	<body id="gallery-archives" class="<?php echo 'archives page-'.getCurrentPage(); ?>">
	<?php zp_apply_filter('theme_body_open'); ?>
		<div id="wrapper">
			<div id="header">
				<?php if (getOption('Allow_search')) {  printSearchForm(''); } ?>
				<ul class="path c">
					<?php if ( getMainSiteURL() ) { ?>
						<li><h1><a href="<?php echo getMainSiteURL(); ?>"><?php echo getMainSiteName(); ?></a></h1></li>
					<?php } ?>
					<li><h2><a href="<?php echo getGalleryIndexURL(); ?>"><?php echo getGalleryTitle(); ?></a></h2></li>
					<li><h3><a><?php echo gettext("Archive View"); ?></a></h3></li>
				</ul>
			</div>
			<div id="content" class="c">
					<?php 
					if (zp_loggedin()) {
					echo '<div class="tagcloud">';
						echo '<p>' . gettext('Popular Tags') . '</p>';
						printAllTagsAs('cloud', 'tags');
					echo '</div>';
					}
					if( function_exists( 'printCalendar' ) ) { 
						printCalendar();
					} else {
						printAllDates();
					}
					echo '<div class="clear"></div>';
					?>
				</div>
			</div>
<?php include_once('footer.php'); ?>
		</div>
<?php include_once('analytics.php'); ?>
<?php zp_apply_filter('theme_body_close'); ?>
</body>
</html>