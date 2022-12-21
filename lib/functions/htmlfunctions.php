<?php

//generates generates a set tag for a for an array of attributes
function generate_tag_group($tag,$attributes_array, $close = true){
    $tags = '';
    foreach ($attributes_array as $info){
        $tags .= create_tag_element($tag, $info,'',$close);
    }
    return $tags;
}



// Base element creators
function create_tag_element($tag, $attributes = null, $content = '', $close = true){
    $element = "<$tag".generate_attributes($attributes).">";
    if(isset($content) ){
        $element .= trim($content);
    }

    if($close == true){
    $element .= close_tag_element($tag);
    }else{
        $element .="
";
    }

    return $element;
}

function close_tag_element($tag){
    return "</$tag>
";
}

function generate_attributes($attributes = null){
    $attributes_collection = ' ';
    if(isset($attributes)){
        if(is_array($attributes)){
            foreach($attributes as $attribute => $property){
                if(is_int($attribute)){
                    $attributes_collection .= $property.' ';
                }else{
                    $attributes_collection .= "$attribute=\"$property\" ";
                }
            }
        }      
    }
    return $attributes_collection;
}
