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
    <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
			<div class="header-body">
				<div class="header-container container">
					<div class="header-row">
						<div class="header-column">
							<div class="header-row">
								<div class="header-logo">
									<a href="index.html">
										<img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="img/logo.png">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    </header>
    <?php include_once LAYOUTS.'nav.php'; ?>
