<?php if (!defined('WEBPATH')) die(); ?>

<!DOCTYPE html>

<html>
<head>
	<title><?php printGalleryTitle(); ?> | <?php echo getAlbumTitle();?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo LOCAL_CHARSET; ?>" />
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/zen.css" type="text/css" />
	<?php zp_apply_filter('theme_head'); ?>
</head>

<body>
<?php zp_apply_filter('theme_body_open'); ?>

<div id="main">

	<div id="gallerytitle">
		<h2><span><a href="<?php echo getGalleryIndexURL();?>" title="Gallery Index"><?php echo getGalleryTitle();?></a> | </span> <?php printAlbumTitle(true);?></h2>
	</div>

	<?php printAlbumDesc(true); ?>

	<div id="images">
		<?php while (next_image()): ?>
		<div class="image">
			<div class="imagethumb"><a href="<?php echo getImageURL();?>" title="<?php echo getImageTitle();?>"><?php printImageThumb(getImageTitle()); ?></a></div>
		</div>
		<?php endwhile; ?>
	</div>

	<!-- subalbums -->
	<div id="albums">
		<?php while (next_album()): ?>
		<div class="album">
			<a href="<?php echo getAlbumURL();?>" title="View album: <?php echo getAlbumTitle();?>">
			<?php printAlbumThumbImage(getAlbumTitle()); ?>
			</a>
			<div class="albumdesc">
        <small><?php printAlbumDate("Date Taken: "); ?></small>
				<h3><a href="<?php echo getAlbumURL();?>" title="View album: <?php echo getAlbumTitle();?>"><?php printAlbumTitle(); ?></a></h3>
				<p><?php printAlbumDesc(); ?></p>
			</div>
			<p style="clear: both; "></p>
		</div>
		<?php endwhile; ?>
	</div>

	<?php printPageListWithNav("« ".gettext('prev'), gettext('next')." »", false, true, 'pagelist', NULL, true, 9); ?>

</div>

<div id="credit"><?php printZenphotoLink(); ?> | <a href="http://www.tanarat.com/blogs" title="Theme: Moon Lover">Moon Lover</a></div>

<?php
zp_apply_filter('theme_body_close');
?>

</body>
</html>
