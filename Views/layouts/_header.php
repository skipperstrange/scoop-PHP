<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <?= generate_tag_group('meta',$metadata, false) ?>

    <!-- styles -->
    <?= generate_tag_group('link',$styles, false) ?>

    <!-- javascript -->
    <?= generate_tag_group('script',$js) ?>

    <?= create_tag_element(_title($pageTitle)) ?>
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
    <?php include_once LAYOUTS.'nav.php'; ?>
