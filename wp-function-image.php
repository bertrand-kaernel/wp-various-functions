<?php 

/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/// WP FUNCTIONS FOR IMAGES
/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

update_option( 'thumbnail_size_w', 525 ); // Set Thumbnail width - default 150
update_option( 'thumbnail_size_h', 525 ); // Set Thumbnail height - default 150
update_option( 'thumbnail_crop', 1 );     // Set Crop mode - 0 Soft, 1 Hard

update_option( 'medium_size_w', 768 ); // Set Thumbnail width - default 150
update_option( 'medium_size_h', 768 ); // Set Thumbnail height - default 150
update_option( 'medium_crop', 1 );     // Set Crop mode - 0 Soft, 1 Hard

update_option( 'large_size_w', 1920 ); // Set Thumbnail width - default 150
update_option( 'large_size_h', 1280); // Set Thumbnail height - default 150
update_option( 'large_crop', 1 );     // Set Crop mode - 0 Soft, 1 Hard

/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/// ADD MY SIZES - SIZE + RATIO
/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
  
    add_image_size( 'L-169', 1920, 1080, true ); 
    add_image_size( 'L-43', 1920, 1440, true ); 
    add_image_size( 'M-169', 768, 432, true ); 
    add_image_size( 'M-43', 768, 576, true );
    add_image_size( 'S-43', 525, 319, true );
}

/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/// SIZES DANS LE TABLEAU DE BORD
/// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

add_filter('image_size_names_choose', 'add_custom_thumb');

function add_custom_thumb($sizes) {
    $addsizes = array(
        "large-169"    => __( "1920 x 1080"),
        "large-43"     => __( "1920 x 1440"),
        "medium-169"   => __( "768 x 432"),
        "medium-43"    => __( "768 x 576"),
        "small-43"     => __( "525 x 319"),
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}
