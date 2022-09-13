<?php


$label = "Product Link-> admin/index (missing) create this folder and file to see how the route works";
echo create_tag_element('a', ['href'=> _link('product', '3'), 'id'=>'testId', 'required', 'disabled'],$label);