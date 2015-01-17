<?php if (!defined('WEBPATH')) die(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">

	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getAlbumTitle() ." | ".getBareGalleryTitle(); ?></title>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen.css" type="text/css" />
	<link rel="stylesheet" href="http://jorjafox.net/wordpress/wp-content/themes/jfogenesis/style.css" type="text/css" />
	<link rel="stylesheet" href="http://jorjafox.net/content/code/fonts/fonts.css" type="text/css" />
	<link type="text/plain" rel="author" href="http://jorjafox.net/humans.txt" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<script type="text/javascript">
	// <!-- <![CDATA[
	$(document).ready(function(){
	$(".colorbox").colorbox({inline:true, href:"#imagethumb"});
	$("a[rel='showcase']").colorbox({transition:"none", width:"75%", photo:true,title:function () { var size = $(this).attr('size'); return "View Image Page".link($(this).attr('solo')) + " | " + "View Full Sized".link($(this).attr('full')) + " ("+size+")" ;} });});
	// ]]> -->
	</script>

</head>
<body class="zenphoto going-green-pro-forest">

<?php 
zp_apply_filter('theme_body_open');
include("header.php"); 
?>

<main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <div class="breadcrumb">You are here: <a href="http://jorjafox.net/" title="View Home">Home</a> / <a href="http://jorjafox.net/gallery/">Gallery</a> / <?php printParentBreadcrumb('',' / ','  / '); ?></span> <span class="trail-end"><a href="<?php echo html_encode(getAlbumURL());?>" title="<?php echo gettext('View album:'); ?><?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumTitle(); ?></a></div>

    

    <article class="post type-post format-standard category-jorjafox entry zenphoto" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

        <header class="entry-header">
            <h2 class="entry-title" itemprop="headline"><?php printAlbumTitle(true); ?></h2>
            <div class="entry-meta"><div class="byline">
                <p><strong>Description</strong>
                <br /><?php printAlbumDesc(); ?></p>
                <p><strong><?php if (function_exists('printDownloadAlbumZipURL') && getNumAlbums()==0 ) { printDownloadAlbumZipURL('Download a zip of all images in this album'); echo ' ('.getNumImages().' images)';} ?></strong></p>
            </div></div>
        </header>

        <div class="entry-content" itemprop="text">
            <div id="padbox">


				<div id="albums">
					<?php while (next_album()): ?>
						<div class="album">
							<div class="thumb">
								<a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
							</div>
							<div class="albumdesc">
								<h3><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
								<div><?php printAlbumDesc(); ?></div>
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
            
            <div style="clear:both;"></div>
        </div>

        <footer class="entry-footer">
            <?php if ((getNumAlbums()) > 0) { ?>
                <div class="archive-pagination pagination"><?php printPageListWithNav("« ".gettext("prev"), gettext("next")." »"); ?></div>
            <?php } else { ?>
		<div class="archive-pagination pagination"><?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?></div>
            <?php } ?>

            <p>Per our <a href="http://jorjafox.net/wiki/JorjaPedia:Copyrights">Copyrights</a> and <a href="http://jorjafox.net/wiki/JorjaPedia:Terms_of_Use">Terms of Use</a>, you are welcome to copy and reuse images on this site for your own use, provided you credit this site in some way (via a link back, or simply by mentioning us by name).</p>
        </footer>

        <div class="pw-footerwidget"><center>
            <?php include("/home/jorjafox/public_html/content/code/ads/medium-rectangle-300x250.php"); ?>
            <?php include("/home/jorjafox/public_html/content/code/ads/studiopress-120x240.php"); ?> 
            <?php include("/home/jorjafox/public_html/content/code/ads/line-buttons-500x250.php"); ?>
        </center></div>    

    </article>	
</main>

<?php include("sidebar.php"); ?>
<?php include("footer.php"); ?>

</div> <!-- End Site-container -->
<?php zp_apply_filter('theme_body_close'); ?>

</body>
</html>
