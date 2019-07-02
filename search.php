<?php
if ( ! defined( 'WEBPATH' ) ) {
	die();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php npgFilters::apply('theme_head'); ?>
	<title>Search Results | <?php echo getBareGalleryTitle(); ?></title>

	<?php include("_scripts.php"); ?>

	<script type="text/javascript">
	// <!-- <![CDATA[
	$(document).ready(function(){
	$(".colorbox").colorbox({inline:true, href:"#imagethumb"});
	$("a[rel='showcase']").colorbox({transition:"none", width:"75%", photo:true,title:function () { var size = $(this).attr('size'); return "View Image Page".link($(this).attr('solo')) + " | " + "View Full Sized".link($(this).attr('full')) + " ("+size+")" ;} });});
	// ]]> -->
	</script>
</head>

<?php require '_header.php'; ?>

<?php
	$total = getNumImages() + getNumAlbums();
	if ($total == 0) {
		$_current_search->clearSearchWords();
	}
?>

<main class="content" id="genesis-content">
	<div class="breadcrumb">You are here: <a href="/" title="View Home">Home</a> / <a href="/gallery/">Gallery</a> / Search Results</div>

	<article class="post type-post format-standard category-jorjafox entry zenphoto" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

		<header class="entry-header">
			<h2 class="entry-title" itemprop="headline">Search Results</h2>
			<div class="entry-meta">By the Fans of LeFox Librarians</div>
		</header>

		<div class="entry-content" itemprop="text">
			<div id="padbox">

				<?php
					$searchwords = getSearchWords();
					$searchdate = getSearchDate();
					if (!empty($searchdate)) {
						$searchwords .= $searchdate;
					}
					if ($total) {
						echo '<p>' . sprintf(gettext('Total matches for <em>%1$s</em>: %2$u'), html_encode($searchwords), $total) . '</p>';
					} else {
						echo "<p>" . gettext('Sorry, no matches for your search.') . "</p>";
					}
				?>

				<?php if ((getNumAlbums()) > 0) { ?>
					<div id="albums">
					   <?php while (next_album()): ?>
					   <div class="album">
						 <div class="albumdesc">
						   <h3><a href="<?php echo html_encode(getAlbumURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumTitle(); ?></a></h3>
						   <p><?php printAlbumDesc(); ?></p>
						 </div>
						 <div class="thumb">
						   <a href="<?php echo html_encode(getAlbumURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
						 </div>
						 <p style="clear: both; "><!-- End Albums --></p>
					   </div>
					<?php endwhile; ?>
					</div>
				<?php } ?>

				<?php if ((getNumImages()) > 0) { ?>
					<div id="images">
					   <?php $x=0; while (next_image(true)):
					   if ($x>=1) { $show='style="display:none;"'; } else { $show='';}  ?>
					   <div class="image"><div class="imagethumb">
					<a href="<?php echo html_encode(getDefaultSizedImage());?>" rel="showcase" title="<?php echo getBareImageTitle();?>" full="<?php echo html_encode(getFullImageURL()); ?>" solo="<?php echo html_encode(getImageURL()); ?>" size="<?php echo getFullWidth() . "x" . getFullHeight(); ?>" /> <?php printImageThumb(getAnnotatedImageTitle()); ?></a>
					   </div></div>
					   <?php $x=$x+1;
					   endwhile; ?>
					</div>
				<?php } ?><!-- End Images -->

				<br clear="all" />

			</div> <!-- PadBox -->
		</div>
	</article>
</main>

<?php
	require '_sidebar.php';
	require '_footer.php';
?>

</div> <!-- End Site-container -->
<?php npgFilters::apply( 'theme_body_close' ); ?>

</body>
</html>
