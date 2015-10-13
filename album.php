<?php if (!defined('WEBPATH')) die(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">

	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getAlbumTitle() ." | ".getBareGalleryTitle(); ?></title>

	<?php include("_scripts.php"); ?>

	<script type="text/javascript">
	// <!-- <![CDATA[
	$(document).ready(function(){
	$(".colorbox").colorbox({inline:true, href:"#imagethumb"});
	$("a[rel='showcase']").colorbox({transition:"none", width:"75%", photo:true,title:function () { var size = $(this).attr('size'); return "View Image Page".link($(this).attr('solo')) + " | " + "View Full Sized".link($(this).attr('full')) + " ("+size+")" ;} });});
	// ]]> -->
	</script>

</head>

<?php include("_header.php"); ?>

<main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <div class="breadcrumb">You are here: <a href="/" title="View Home">Home</a> / <a href="/gallery/">Gallery</a> / <?php printParentBreadcrumb('',' / ','  / '); ?></span> <span class="trail-end"><a href="<?php echo html_encode(getAlbumURL());?>" title="<?php echo gettext('View album:'); ?><?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumTitle(); ?></a></div>

    <article class="post type-post format-standard category-jorjafox entry zenphoto" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

        <header class="entry-header">
            <h2 class="entry-title" itemprop="headline"><?php printAlbumTitle(true); ?></h2>
            <div class="entry-meta"></div>
        </header>

        <div class="entry-content" itemprop="text">
            <div id="padbox">

				<div class="byline">
	                <p><?php printAlbumDesc(); ?></p>
	                <?php if (function_exists('printDownloadAlbumZipURL') && getNumAlbums()==0 ) {
		                echo '<p><strong>';
		                printDownloadAlbumZipURL('Download a zip of all images in this album');
		                echo ' ('.getNumImages().' images)';
		                echo '</strong></p>';
		                }
		            ?>
	            </div>

				<div id="albums">
					<?php while (next_album()): ?>
						<div class="album">
							<div class="thumb">
								<a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
							</div>
							<div class="albumdesc">
								<h3><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
								<center><p><?php printAlbumDesc(); ?></p></center>
							</div>
							<p style="clear: both; "></p>
						</div>
					<?php endwhile; ?>
				</div>
				<div id="images">
					<?php while (next_image()): ?>
						<div class="image">
							<div class="imagethumb">
								<a href="<?php echo html_encode(getDefaultSizedImage());?>" rel="showcase" title="<?php echo getBareImageTitle();?>" full="<?php echo html_encode(getFullImageURL()); ?>" solo="<?php echo html_encode(getImageURL()); ?>" size="<?php echo getFullWidth() . "x" . getFullHeight(); ?>" /> <?php printImageThumb(getAnnotatedImageTitle()); ?></a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
            </div> <!-- PadBox -->
        </div>

        <div class="nav-links"><span class="page-numbers current"><div class="archive-pagination pagination"><?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?></div></span></div>

        <footer class="entry-footer"><p class="entry-meta">Per our <a href="/copyrights/">Copyrights</a> and <a href="/terms-of-use/">Terms of Use</a>, you are welcome to copy and reuse images on this site for your own use, provided you credit this site in some way (via a link back, or simply by mentioning us by name).</p></footer>
    </article>

    <div class="adboxes-footerwidget"><center>
		<?php
			$_GET['name'] = 'google-large-rectangle';
			include($_SERVER["DOCUMENT_ROOT"]."/static/content/code/ads/adboxes.php");

			$_GET['name'] = 'studiopress-120x240';
			include($_SERVER["DOCUMENT_ROOT"]."/static/content/code/ads/adboxes.php");

			$_GET['name'] = 'line-buttons-500x250';
			include($_SERVER["DOCUMENT_ROOT"]."/static/content/code/ads/adboxes.php");

		?>
    </center></div>
</main>

<?php include("_sidebar.php"); ?>
<?php include("_footer.php"); ?>

</div> <!-- End Site-container -->
<?php zp_apply_filter('theme_body_close'); ?>

</body>
</html>
