<?php
define("ROUTES", [
//Example route format
//# controller:aztrasC view:index
['url'=>'@^home$@', 'name'=>'', 'controller'=>'index', 'view'=>'index'],

//# controller:aztrasC view:index
['url'=>'@^home\/$@', 'name'=>'', 'controller'=>'index', 'view'=>'index'],

//# controller:aztrasC view:index
['url'=>'@^$@', 'name'=>'', 'controller'=>'index', 'view'=>'index'],

//#Passing parameters through route - (?P<parameter-name>\w)
['url'=>'@^product$@', 'name'=>'', 'controller'=>'product', 'view'=>'product'],
['url'=>'@^product/$@', 'name'=>'', 'controller'=>'product', 'view'=>'product'],

['url'=>'@^product/(?P<id>\d+)/$@', 'name'=>'', 'controller'=>'product', 'view'=>'product'],
['url'=>'@^product/(?P<id>\d+)$@', 'name'=>'', 'controller'=>'product', 'view'=>'product'],
//Strict for digits
//['url'=>'@^product/(?P<id>\w+)/$@', 'name'=>'', 'controller'=>'admin', 'view'=>'admin/index'],

//Special route for extracting static data from static folder.

//Post request with a reference to the data file and query with reference the data variable being accessed json object to be retuen
['url'=>'@^api/$@', 'name'=>'', 'controller'=>'api', 'view'=>''],
['url'=>'@^api$@', 'name'=>'', 'controller'=>'api', 'view'=>''],
#end of routes
]);

