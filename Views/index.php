<?php


$label = "Example route: Product Link with an id. See routes file";
echo create_tag_element('a', ['href'=> _link('product', '3'), 'id'=>'testId', 'required', 'disabled'],$label);