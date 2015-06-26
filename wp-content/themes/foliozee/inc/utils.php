<?php

/**
 * Theme Wrapper
 *
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */

// returns WordPress subdirectory if applicable
function wp_base_dir()
{
    preg_match('!(https?://[^/|"]+)([^"]+)?!', site_url(), $matches);
    if (count($matches) === 3) {
        return end($matches);
    } else {
        return '';
    }
}

// opposite of built in WP functions for trailing slashes
function leadingslashit($string)
{
    return '/' . unleadingslashit($string);
}

function unleadingslashit($string)
{
    return ltrim($string, '/');
}

function add_filters($tags, $function)
{
    foreach ($tags as $tag) {
        add_filter($tag, $function);
    }
}

function is_element_empty($element)
{
    $element = trim($element);
    return empty($element) ? false : true;
}


function content($num)
{
    $theContent = get_the_content();
    $output = preg_replace('/<img[^>]+./', '', $theContent);
    $output = preg_replace('/<blockquote>.*<\/blockquote>/', '', $output);
    $output = preg_replace('|\[(.+?)\](.+?\[/\\1\])?|s', '', $output);
    $output = strip_tags($output);
    $limit = $num + 1;
    $content = explode(' ', $output, $limit);
    array_pop($content);
    $content = implode(" ", $content) . "...";
    echo $content;
}

 function kraft_get_option( $option_type, $option_id, $default = '' ) {
    
    /* get the saved options */ 
    $options = get_option( $option_type );
    
    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
      return stripslashes(trim($options[$option_id]));
    }
    
    return $default;
    
  }
  
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
