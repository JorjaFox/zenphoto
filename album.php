<?php if (!defined('WEBPATH')) die(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">

	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getAlbumTitle()." | ".getBareGalleryTitle(); ?></title>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen.css" type="text/css" />
	<link type="text/plain" rel="author" href="http://jorjafox.net/humans.txt" />
	<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
    <!--[if lt IE 9]>
    	<script type="text/javascript" src="http://jorjafox.net/content/code/respond.src.js"></script>
    	<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen-ie.css" type="text/css" />
    <![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<script type="text/javascript">
	// <!-- <![CDATA[
	$(document).ready(function(){
	$(".colorbox").colorbox({inline:true, href:"#imagethumb"});
	$("a[rel='showcase']").colorbox({transition:"none", width:"75%", photo:true,title:function () { var size = $(this).attr('size'); return "View Image Page".link($(this).attr('solo')) + " | " + "View Full Sized".link($(this).attr('full')) + " ("+size+")" ;} });});
	// ]]> -->
	</script>

</head>
<body>

<?php 
zp_apply_filter('theme_body_open');
include("header.php"); 
?>

    <div class="breadcrumb">You are here: <a href="http://jorjafox.net/" title="View Home">Home</a> / <a href="http://jorjafox.net/gallery/">Gallery</a> / <?php printParentBreadcrumb('',' / ','  / '); ?></span> <span class="trail-end"><a href="<?php echo html_encode(getAlbumLinkURL());?>" title="<?php echo gettext('View album:'); ?><?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumTitle(); ?></a></div>

    <div class="lq-content"><?php include("/home/jorjafox/public_html/content/code/ads/liquidweb-325x38.php"); ?></div>

    <div class="post type-post status-publish format-standard hentry category-jorjafox zenphoto-album">
        <h2 class="entry-title"><?php printAlbumTitle(true); ?></h2>
		<div class="byline"><p><strong>Description</strong>
		<br /><?php printAlbumDesc(); ?></p>
		
		<p><strong><?php if (function_exists('printDownloadLinkAlbumZip') && getNumAlbums()==0 ) { printDownloadLinkAlbumZip('Download a zip of all images in this album'); echo ' ('.getNumImages().' images)';} ?></strong></p>
		</div>
		
		<div class="entry-content">
		                
	<!-- Sub-Albums -->
<div id="padbox">
    <?php if ((getNumAlbums()) > 0) { ?>
        <div id="albums">

			<?php while (next_album()): ?>
			<div class="album">
				<div class="thumb"><a href="<?php echo htmlspecialchars(getAlbumLinkURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a></div>
				<div class="albumdesc"><h3><a href="<?php echo htmlspecialchars(getAlbumLinkURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumTitle(); ?></a></h3>
                <p><?php printAlbumDesc(); ?><br /><em><?php if (getNumImages() > 0) { echo getNumImages(); echo ' Images';} ?></em></p></div>
				
			</div>
			<?php endwhile; ?>
        </div>        
    <?php } ?>

    <?php if ((getNumImages()) > 0) { ?>
        <div id="images">
		   <?php $x=0; while (next_image(true)):
           if ($x>=1) { $show='style="display:none;"'; } else { $show='';}  ?>
           <div class="image"><div class="imagethumb">
		<a href="<?php echo html_encode(getDefaultSizedImage());?>" rel="showcase" title="<?php echo getBareImageTitle();?>" full="<?php echo html_encode(getFullImageURL()); ?>" solo="<?php echo html_encode(getImageLinkURL()); ?>" size="<?php echo getFullWidth() . "x" . getFullHeight(); ?>" /> <?php printImageThumb(getAnnotatedImageTitle()); ?></a>
		   </div></div>
           <?php $x=$x+1;
           endwhile; ?>
        </div>
    <?php } ?>

</div> <!-- PadBox -->

<div style="clear:both;"></div>

<?php if ((getNumAlbums()) > 0) { ?>
<div class="navigation"><?php printPageListWithNav("« ".gettext("prev"), gettext("next")." »"); ?></div>
<?php } ?>
<div class="sp-content"><iframe src="http://jorjafox.net/content/code/ads/studiopress-468x60.php" width="480" height="80" frameborder="0">
<?php include("/home/jorjafox/public_html/content/code/ads/studiopress-468x60.php"); ?></iframe></div>
<p>Per our <a href="http://jorjafox.net/wiki/JorjaPedia:Copyrights">Copyrights</a> and <a href="http://jorjafox.net/wiki/JorjaPedia:Terms_of_Use">Terms of Use</a>, you are welcome to copy and reuse images on this site for your own use, provided you credit this site in some way (via a link back, or simply by mentioning us by name).</p>

		</div> <!-- entry content -->

        	</div> <!-- end post -->
        </div> <!-- end content hfeed -->

<?php include("sidebar.php"); ?>
<?php include("footer.php"); ?>

</div>
<?php zp_apply_filter('theme_body_close'); ?>

</body>
</html>
