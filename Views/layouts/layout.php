<?php

@include_once STATIC_DATA.'resources.php';

if(IS_AJAX != 1){
include_once VIEWS.'layouts'.DS.'_header.php';
?>
        <div class="header-content">
            <div class="container">
                <div class="row">
<?php
if(file_exists(VIEWS.$view.'.php')){
    @include_once VIEWS.$view.'.php';
}
else{
    @include_once VIEWS.'layouts'.DS.'_404.php';
}
?>
                </div>
            </div>
        </div>
<?php
include_once VIEWS.'layouts'.DS.'_footer.php';
}else{
    if(file_exists(VIEWS.$view.'.php')){
    @include_once VIEWS.$view.'.php';
}
}
?>