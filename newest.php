<?php
if ( ! defined( 'WEBPATH' ) ) {
	die();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
	<?php npgFilters::apply('theme_head'); ?>
	<title>Newest Images | <?php echo getBareGalleryTitle(); ?></title>

	<?php include("_scripts.php"); ?>

</head>

<?php require '_header.php'; ?>

<main class="content" id="genesis-content">
	<div class="breadcrumb">You are here: <a href="/" title="View Home">Home</a> / <a href="/gallery/">Gallery</a> / Newest Albums</div>

	<article class="post type-post format-standard category-jorjafox entry zenphoto" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

		<header class="entry-header">
			<h2 class="entry-title" itemprop="headline">Newest Albums</h2>
			<div class="entry-meta">By the Fans of LeFox Librarians</div>
		</header>

		<div class="entry-content" itemprop="text">
			<div id="padbox">
				<?php if (function_exists('printLatestUpdatedAlbums')) { printLatestUpdatedAlbums($number = 4, $showtitle = true, $showdesc = true); } ?>
			</div> <!-- PadBox -->
		</div>

		<footer class="entry-footer"></footer>
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
