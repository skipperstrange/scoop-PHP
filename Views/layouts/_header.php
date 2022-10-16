<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <?= generate_tag_group('meta',$metadata, false) ?>

    <!-- styles -->
    <?= generate_tag_group('link',$styles, false) ?>

    <!-- javascript -->
    <?= generate_tag_group('script',$js) ?>

    <?= create_tag_element('title','',$pageTitle) ?>
<!-- For tracking asyncronous activities N. B. Use either this or the one in footer for old method. Old method cannot track asyncronous activities.
        Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script>
     var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?=GOOGLE_ANALYITICS_ID ?>']);
  _gaq.push(['_trackPageview']);
</script>
 -->
</head>

<body <?php if($view == 'index'): ?>class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}" <?php endif; ?>>
	
    <?php if($view == 'index'): ?>
    <div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
    <?php endif; ?>
   <h1>Welcome home junior!</h1>
    <?php include_once LAYOUTS.'nav.php'; ?>
