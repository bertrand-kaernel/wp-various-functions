<?php 

/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/// INCLUDE SVG IN WORDPRESS
/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function bk_include_svg($svg_file)
{
    $path_to_svg = file_get_contents(get_template_directory() . '/bk-folder/images/' . $svg_file);
    if ( !empty($path_to_svg) ) {
       return $path_to_svg;
    } else {
        return  '&varnothing;';
    }
}
