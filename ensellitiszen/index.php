<?php

// force UTF-8 Ø

if (!defined('WEBPATH')) die();

?>
<!DOCTYPE html>

<html>
<head>
<?php zp_apply_filter('theme_head'); ?>
	<title><?php printGalleryTitle(); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo LOCAL_CHARSET; ?>" />
	<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen.css" type="text/css" />
	<script type="text/javascript" src="<?php echo $_zp_themeroot ?>/scripts/BubbleTooltips.js"></script>
	<script type="text/javascript">
		window.onload=function(){enableTooltips()};
	</script>

</head>

<body>
<?php zp_apply_filter('theme_body_open'); ?>
<div id="main">

	<div id="gallerytitle">
		<h2 id="title"><a href="<?php echo getGalleryIndexURL();?>" title="Gallery Index"><?php echo getGalleryTitle();?></a></h2>

		<h2 id="titlesub">Welcome to my gallery</h2>
	</div>

	<div id="albums">
		<?php while (next_album()): ?>
		<div class="album" onclick="location.href='<?php echo getAlbumURL();?>';">
			<a href="<?php echo getAlbumURL();?>" title="View album <?php echo getAlbumTitle();?>">
			<?php printAlbumThumbImage(getAlbumTitle()); ?>
			</a>
			<div class="albumdesc">
        <small><? printAlbumDate("Date Taken: "); ?></small>
				<h3><a href="<?php echo getAlbumURL();?>" title="View album: <?php echo getAlbumTitle();?>"><?php printAlbumTitle(); ?></a></h3>
				<p><?php printAlbumDesc(); ?></p>
			</div>
			<p style="clear: both; "></p>
		</div>
		<?php endwhile; ?>
	</div>

	<div class="center">
		<?php printPageListWithNav("« prev", "next »"); ?>
	</div>


</div>

<div id="credit"><?php printZenphotoLink(); ?></div>
<br />
<?php 
 zp_apply_filter('theme_body_close'); 
 ?>
</body>
</html>
