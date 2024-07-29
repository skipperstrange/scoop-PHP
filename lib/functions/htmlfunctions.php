<?php

/**
 * Generates a set of tags for a given tag and array of attributes.
 *
 * @param string $tag - The HTML tag name.
 * @param array $attributes_array - An array of attributes for the tags.
 * @param bool $close - Flag indicating whether to include closing tags. Default is true.
 * @return string - The generated set of tags.
 */
function generate_tag_group($tag, $attributes_array, $close = true) {
    $tags = '';
    
    foreach ($attributes_array as $info) {
        $tags .= create_tag_element($tag, $info, '', $close);
    }

    return $tags;
}

/**
 * Creates a base tag element with optional attributes and content.
 *
 * @param string $tag - The HTML tag name.
 * @param array|null $attributes - An array of attributes for the tag. Default is null.
 * @param string|null $content - The content to be placed within the tag. Default is an empty string.
 * @param bool $close - Flag indicating whether to include the closing tag. Default is true.
 * @return string - The generated tag element.
 */
function create_tag_element($tag, $attributes = null, $content = '', $close = true) {
    $element = "<$tag" . generate_attributes($attributes) . ">\n";

    
    
    if (isset($content)) {
        $element .= trim($content);
    }

    if ($close == true) {
        $element .= close_tag_element($tag);
    } else {
        $element .= "\n";
    }

    return $element;
}

/**
 * Closes a tag element.
 *
 * @param string $tag - The HTML tag name.
 * @return string - The closing tag for the given tag.
 */
function close_tag_element($tag) {
    return "</$tag>\n";
}

/**
 * Generates attribute string for a tag element.
 *
 * @param array|null $attributes - An array of attributes for the tag. Default is null.
 * @ author - SkipperStrange
 * @return string - The generated attribute string.
 */
function generate_attributes($attributes = null) {
    $attributes_collection = ' ';

    if (isset($attributes)) {
        if (is_array($attributes)) {
            foreach ($attributes as $attribute => $property) {
                if (is_int($attribute)) {
                    $attributes_collection .= $property . ' ';
                } else {
                    $attributes_collection .= "$attribute=\"$property\" ";
                }
            }
        }
    }

    return $attributes_collection;
}

/**
 * Alias for generating a group of tags.
 * 
 * @param string $tag - The HTML tag name.
 * @param array $attributes_array - An array of attributes for the tags.
 * @param bool $close - Flag indicating whether to include closing tags. Default is true.
 * @return string - The generated set of tags.
 */
function _tag_group($tag, $attributes_array, $close = true) {
    return generate_tag_group($tag, $attributes_array, $close);
}

/**
 * Generates an HTML tag with optional attributes and content, 
 * handling nested tags if content is an array.
 *
 * @param string $tag - The HTML tag name.
 * @param array|null $attributes - An array of attributes for the tag. Default is null.
 * @param string|array $content - The content to be placed within the tag. Can be a string or an array of nested tags. Default is an empty string.
 * @param bool $close - Flag indicating whether to include the closing tag. Default is true.
 * @return string - The generated tag element.
 */
function _tag($tag, $attributes = null, $content = '', $close = true) {
    // Check if content is an array, meaning there are nested tags
    if (is_array($content)) {
        // Map each nested item to generate the tag elements recursively
        $content = array_map(function($item) {
            return is_array($item) ? _tag($item['tag'], $item['attributes'], $item['content'] ?? '', $item['close'] ?? true) : $item;
        }, $content);
        // Combine all nested tag elements into a single string
        $content = implode('', $content);
    }
    // Generate the main tag element
    return create_tag_element($tag, $attributes, $content, $close);
}

