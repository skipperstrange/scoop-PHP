<?php

@include_once RESOURCES.'resources.php';

if(IS_AJAX != 1){
include_once VIEWS.'layouts'.DS.'_header.php';
?>
       <div role="main" class="main" id="main">
<?php
if(file_exists(VIEWS.$view.'.php')){
    @include_once VIEWS.$view.'.php';
}
else{
    $pageTitle = "404";
    @include_once VIEWS.'layouts'.DS.'_404.php';
}
?>
   </div>
<?php
include_once VIEWS.'layouts'.DS.'_footer.php';
}else{
    if(file_exists(VIEWS.$view.'.php')){
    @include_once VIEWS.$view.'.php';
    @include_once PARTIALS.'_rerun_scripts.php';
}
}
?>