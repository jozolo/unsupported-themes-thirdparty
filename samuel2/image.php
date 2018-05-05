<?php if (!defined('WEBPATH')) die(); ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php printGalleryTitle(); ?> | <?php echo getAlbumTitle();?> | <?php echo getImageTitle();?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo LOCAL_CHARSET; ?>" />
	<link rel="stylesheet" href="<?php echo  $_zp_themeroot ?>/zen.css" type="text/css" />
	<?php zp_apply_filter('theme_head'); ?>
	<script type="text/javascript">
	  function toggleComments() {
      var commentDiv = document.getElementById("comments");
      if (commentDiv.style.display == "block") {
        commentDiv.style.display = "none";
      } else {
        commentDiv.style.display = "block";
      }
	  }
	</script>
	
	<script type="text/javascript">
	$(document).ready(function() {
    jQuery('a.gallery').colorbox({
   		maxWidth:"98%",
		maxHeight:"98%",
		photo:true,
		close: '<?php echo gettext("close"); ?>'
    	});
    });
	</script>
</head>

<body>
<?php zp_apply_filter('theme_body_open'); ?>

<div>
	<div class="spiffy_content">

		<div class="imgnav">
			<?php if (hasPrevImage()) { ?>
			<a href="<?php echo getPrevImageURL();?>" title="Previous Image">&laquo; prev</a>
			<?php } if (hasNextImage()) { ?>
			<a href="<?php echo getNextImageURL();?>" title="Next Image">next &raquo;</a>
			<?php } ?>
		</div>

		<h1><span><a href="<?php echo getGalleryIndexURL();?>" title="Gallery Index"><?php echo getGalleryTitle();?></a>
		  | <a href="<?php echo getAlbumURL();?>" title="Gallery Index"><?php echo getAlbumTitle();?></a>
		  | </span> <?php printImageTitle(true); ?></h1>

	</div>
	<b class="spiffy">
		<b class="spiffy5"></b>
		<b class="spiffy4"></b>
		<b class="spiffy3"></b>
		<b class="spiffy2"><b></b></b>
		<b class="spiffy1"><b></b></b>
	</b>
</div>

<div>
	<b class="contentbox">
		<b class="contentbox1"><b></b></b>
		<b class="contentbox2"><b></b></b>
		<b class="contentbox3"></b>
		<b class="contentbox4"></b>
		<b class="contentbox5"></b>
	</b>
	<div class="contentbox_content">

	<div id="image">
		<MAP NAME = "imagenav">
		<?php if (hasPrevImage()) { ?>
		<AREA SHAPE="rect" COORDS="0,0 297,297" href="<?php echo getPrevImageURL();?>">
		<?php } if (hasNextImage()) { ?>
		<AREA SHAPE="rect" COORDS="299,0 595,595" href="<?php echo getNextImageURL();?>">
		<?php } ?>
		</MAP>
		<?php if (!isImageVideo()) { ?>
		<IMG src="<?php echo getDefaultSizedImage();?>" USEMAP="#imagenav" />
		<?php } else { 
			printDefaultSizedImage("");
		 } ?>
	</div>


	<div id="narrow">

		<p class="imgdesc"><?php printImageDesc(true); ?></p>

		<p class="imgdesc"><a class="gallery" href="<?php echo getFullImageURL();?>" title="view original full size" target="_blank">view original size</a></p>

		<div id="comments">
		<?php
		if (function_exists('printCommentForm')) {
			printCommentForm();
		}
		?>

		</div>
	</div>
	</div>

	<b class="contentbox">
		<b class="contentbox5"></b>
		<b class="contentbox4"></b>
		<b class="contentbox3"></b>
		<b class="contentbox2"><b></b></b>
		<b class="contentbox1"><b></b></b>
	</b>
</div>

</div>

<?php
zp_apply_filter('theme_body_close');
?>

</body>
</html>
