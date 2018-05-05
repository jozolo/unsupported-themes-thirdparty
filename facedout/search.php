<?php if (!defined('WEBPATH')) die();
header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT');
?>
<!DOCTYPE html>
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?> | <?php echo gettext("Search"); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/style.css" type="text/css" />
	<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
	<?php printZDSearchToggleJS(); ?>
</head>
<body>
<?php zp_apply_filter('theme_body_open'); ?>
<div id="main">
		<div id="header">
		<h1><?php printGalleryTitle(); ?></h1>
		<?php
		if (getOption('Allow_search')) {
			if (is_array($_zp_current_search->getCategoryList())) {
				$catlist = array('news'=>$_zp_current_search->getCategoryList(),'albums'=>'0','images'=>'0','pages'=>'0');
				printSearchForm(NULL, 'search', NULL, gettext('Search category'), NULL, NULL, $catlist);
			} else {
				if (is_array($_zp_current_search->getAlbumList())) {
					$album_list = array('albums'=>$_zp_current_search->getAlbumList(),'pages'=>'0', 'news'=>'0');
					printSearchForm(NULL, 'search', NULL, gettext('Search album'), NULL, NULL, $album_list);
				} else {
					printSearchForm("","search","",gettext("Search gallery"));
				}
			}
		}
		?>
		</div>

<div id="breadcrumb">
		<h2><a href="<?php echo getGalleryIndexURL();?>" title="<?php gettext('Index'); ?>"><?php echo gettext("Home"); ?></a> » <?php echo "<strong>".gettext("Search")."</strong>";	?>
			</h2>
			</div>

		<div id="content">
        
	<div id="sidebar">
		<?php include("sidebar-left.php"); ?>
	</div><!-- sidebar-left -->        
        
		<div id="content-right">
		<?php
		$numimages = getNumImages();
		$numalbums = getNumAlbums();
		$total = $numimages + $numalbums;
		$zenpage = getOption('zp_plugin_zenpage');
		if ($zenpage && !isArchive()) {
			$numpages = getNumPages();
			$numnews = getNumNews();
			$total = $total + $numnews + $numpages;
		} else {
			$numpages = $numnews = 0;
		}
		$searchwords = getSearchWords();
		$searchdate = getSearchDate();
		if (!empty($searchdate)) {
			if (!empty($searchwords)) {
				$searchwords .= ": ";
			}
			$searchwords .= $searchdate;
		}
		if ($total > 0 ) {
			?>
			<h3>
			<?php
			printf(ngettext('%1$u Hit for <em>%2$s</em>','%1$u Hits for <em>%2$s</em>',$total), $total, $searchwords);
			?>
			</h3>
			<?php
		}
		if ($_zp_page == 1) { //test of zenpage searches
			if ($numpages > 0) {
				$number_to_show = 5;
				$c = 0;
				?>
				<hr />
				<h3><?php printf(gettext('Pages (%s)'),$numpages); ?> <small><?php	printZDSearchShowMoreLink("pages",$number_to_show); ?></small></h3>
					<ul class="searchresults">
					<?php
					while (next_page()) {
						$c++;
						?>
						<li<?php printZDToggleClass('pages',$c,$number_to_show); ?>>
						<h4><?php printPageTitlelink(); ?></h4>
							<p class="zenpageexcerpt"><?php echo shortenContent(strip_tags(getPageContent()),80,getOption("zenpage_textshorten_indicator")); ?></p>
						</li>
						<?php
					}
					?>
					</ul>
				<?php
				}
			if ($numnews > 0) {
				$number_to_show = 5;
				$c = 0;
				?>
				<h3><?php printf(gettext('Articles (%s)'),$numnews); ?> <small><?php	printZDSearchShowMoreLink("news",$number_to_show); ?></small></h3>
					<ul class="searchresults">
					<?php
					while (next_news()) {
						$c++;
						?>
						<li<?php printZDToggleClass('news',$c,$number_to_show); ?>>
						<h4><?phpprintNewsURL(); ?></h4>
							<p class="zenpageexcerpt"><?php echo shortenContent(strip_tags(getNewsContent()),80,getOption("zenpage_textshorten_indicator")); ?></p>
						</li>
						<?php
					}
					?>
					</ul>
				<?php
				}
			}
			?>
			<h3>
			<?php
				if (getOption('search_no_albums')) {
					if (!getOption('search_no_images') && ($numpages + $numnews) > 0) {
						printf(gettext('Images (%s)'),$numimages);
					}
				} else {
					if (getOption('search_no_images')) {
						if (($numpages + $numnews) > 0) {
							printf(gettext('Albums (%s)'),$numalbums);
						}
					} else {
						printf(gettext('Albums (%1$s) &amp; Images (%2$s)'),$numalbums,$numimages);
					}
				}
			?>
			</h3>
		<?php if (getNumAlbums() != 0) { ?>
			<div id="albums">
				<?php while (next_album()): ?>
					<div class="album">
							<div class="thumb">
							<a href="<?php echo html_encode(getAlbumURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getBareAlbumTitle();?>"><?php printCustomAlbumThumbImage(getBareAlbumTitle(), NULL, 95, 95, 95, 95); ?></a>
 							 </div>
								<div class="albumdesc">
									<h3><a href="<?php echo html_encode(getAlbumURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getBareAlbumTitle();?>"><?php printAlbumTitle(); ?></a></h3>
 									<?php printAlbumDate(""); ?>
									<p><?php echo truncate_string(getAlbumDesc(), 45); ?></p>
								</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php } ?>
<?php if (getNumImages() > 0) { ?>
			<div id="images">
				<?php while (next_image()) { ?>
				<div class="image">
					<div class="imagethumb"><a href="<?php echo html_encode(getImageURL());?>" title="<?php echo getBareImageTitle();?>"><?php printImageThumb(getBareImageTitle()); ?></a></div>
				</div>
				<?php } ?>
			</div>
		<br clear="all" />
<?php } ?>
		<?php
		if (function_exists('printSlideShowLink')) printSlideShowLink(gettext('View Slideshow'));
		if ($total == 0) {
				echo "<p>".gettext("Sorry, no matches found. Try refining your search.")."</p>";
			}

			printPageListWithNav("« ".gettext("prev"),gettext("next")." »");
			?>

	</div><!-- content right-->

	<div id="footer">
	<?php include("footer.php"); ?>
	</div>
</div><!-- content -->

</div><!-- main -->
<?php
zp_apply_filter('theme_body_close');
?>
</body>
</html>