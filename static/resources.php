<?php
// App Metadata
$metadata = [
    ['charset'=>"utf-8", 'http-equiv'=>"X-UA-Compatible",'content'=>"IE=edge"],
    
    ['name'=>"keywords", 'content'=>"A simple procedural mvc framework for beginers"],
    ['name'=>"viewport", 'content'=>"width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no"],
    ['name'=>"author", 'content'=>"skipperstrange@gmail.com"]
];


//stylesheets to be loaded at run time
$styles = [
    //Web Fonts
		["href"=>"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400", "rel"=>"stylesheet", "type"=>"text/css"],

	//Vendor CSS
		["rel"=>"stylesheet", "href"=>VENDOR_PATH."bootstrap/css/bootstrap.min.css"],
		["rel"=>"stylesheet", "href"=>VENDOR_PATH."fontawesome-free/css/all.min.css"],
		["rel"=>"stylesheet", "href"=>VENDOR_PATH."animate/animate.min.css"],
		["rel"=>"stylesheet", "href"=>VENDOR_PATH."simple-line-icons/css/simple-line-icons.min.css"],
		["rel"=>"stylesheet", "href"=>VENDOR_PATH."owl.carousel/assets/owl.carousel.min.css"],
		["rel"=>"stylesheet", "href"=>VENDOR_PATH."owl.carousel/assets/owl.theme.default.min.css"],
		["rel"=>"stylesheet", "href"=>VENDOR_PATH."magnific-popup/magnific-popup.min.css"],

		// Theme CSS
		["rel"=>"stylesheet", "href"=>CSS_PATH."theme.css"],
		["rel"=>"stylesheet", "href"=>CSS_PATH."theme-elements.css"],

		// Skin CSS
		["rel"=>"stylesheet", "href"=>CSS_PATH."skins/default.css"], 

		// Theme Custom CSS -->
		["rel"=>"stylesheet", "href"=>CSS_PATH."custom.css"],

];

$revolutionSliderCss = [
		["rel"=>"stylesheet", "href"=>"vendor/rs-plugin/css/settings.css"],
		["rel"=>"stylesheet", "href"=>"vendor/rs-plugin/css/layers.css"],
		["rel"=>"stylesheet", "href"=>"vendor/rs-plugin/css/navigation.css"],
];




//JS Resources
$js = [
    ["src"=>VENDOR_PATH."modernizr/modernizr.min.js"]
];

$footerJs = [
        ["src"=>VENDOR_PATH."jquery/jquery.min.js"],
		["src"=>VENDOR_PATH."jquery.appear/jquery.appear.min.js"],
		["src"=>VENDOR_PATH."jquery.easing/jquery.easing.min.js"],
		["src"=>VENDOR_PATH."jquery.cookie/jquery.cookie.min.js"],
		["src"=>VENDOR_PATH."popper/umd/popper.min.js"],
		["src"=>VENDOR_PATH."bootstrap/js/bootstrap.min.js"],
		["src"=>VENDOR_PATH."common/common.min.js"],
		["src"=>VENDOR_PATH."jquery.validation/jquery.validate.min.js"],
		["src"=>VENDOR_PATH."jquery.easy-pie-chart/jquery.easypiechart.min.js"],
		["src"=>VENDOR_PATH."jquery.gmap/jquery.gmap.min.js"],
		["src"=>VENDOR_PATH."jquery.lazyload/jquery.lazyload.min.js"],
		["src"=>VENDOR_PATH."isotope/jquery.isotope.min.js"],
		["src"=>VENDOR_PATH."owl.carousel/owl.carousel.min.js"],
		["src"=>VENDOR_PATH."magnific-popup/jquery.magnific-popup.min.js"],
		["src"=>VENDOR_PATH."vide/jquery.vide.min.js"],
		["src"=>VENDOR_PATH."vivus/vivus.min.js"],
    

		[ "src"=>JS_PATH."theme.js"],

        //Theme Custom -->
		[ "src"=>JS_PATH."custom.js"],
		
		//Theme Initialization Files -->
		[ "src"=>JS_PATH."theme.init.js"],

		//Examples -->
		//[ "src"=>JS_PATH."examples/examples.portfolio.js"]
        
];

