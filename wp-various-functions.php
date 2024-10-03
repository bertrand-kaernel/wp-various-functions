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

/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/// PAGINATION FOR ARCHIVE AND PAGE TEMPLATE
/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function bk_archive_pagination($query = null) // Here the name of your query
{
  if ($query === null) { global $wp_query;
    $query = $wp_query;
  }
  
  $big = 999999999;

  $pagination = paginate_links(array(
    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format'    => '?paged=%#%',
    'current'   => max(1, get_query_var('paged')),
    'total'     => $query->max_num_pages,
    'prev_text' => __('« Previous'),
    'next_text' => __('Next »'),
  ));

  if ($pagination) {
    return '<div class="archive-navigation">' . $pagination . '</div>';
  } else {
    return '<div class="archive-navigation">' . esc_attr('RIENICI') .' </div>';
  }
}
