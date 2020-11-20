<?php
function create_post_types_jadwal()
{
  // Slider post type 
  $label = array(
    'name'         => __('Jadwal', 'tjd-framework'),
    'singular_name'   => __('Jadwal', 'tjd-framework'),
    'add_new'       => _x('Add New', 'Jadwal', 'tjd-framework'),
    'add_new_item'     => __('Add New Jadwal', 'tjd-framework'),
    'edit_item'     => __('Edit Jadwal', 'tjd-framework'),
    'new_item'       => __('New Jadwal', 'tjd-framework'),
    'view_item'     => __('View Jadwal', 'tjd-framework'),
    'search_items'     => __('Search Jadwal', 'tjd-framework'),
    'not_found'     => __('No Jadwal found', 'tjd-framework'),
    'not_found_in_trash' => __('No Jadwal found in Trash', 'tjd-framework'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels'       => $label,
    'description'     => __('All Jadwal upload here', 'tjd-framework'),
    'public'       => true,
    'supports'      => array('title', 'thumbnail'),
    'query_var'     => true,
    'rewrite'       => array('slug' => 'jadwal'),
    'menu_icon'      => 'dashicons-calendar-alt',
    'show_in_nav_menus' => false,
    'has_archive'     => true,
    'menu_position'   => 20,
  );
  register_post_type('jadwal', $args);
}
add_action('init', 'create_post_types_jadwal');

// Add taxonomies
add_action('init', 'create_taxonomies_jadwal');

function create_taxonomies_jadwal()
{
  // Mitra taxonomies
  $jadwal_cats = array(
    'name' => __('Jadwal Categories', 'tjd-framework'),
    'singular_name' => __('Jadwal Category', 'tjd-framework'),
    'search_items' =>  __('Search Jadwal Categories', 'tjd-framework'),
    'all_items' => __('All Jadwals Categories', 'tjd-framework'),
    'parent_item' => __('Parent Jadwal Category', 'tjd-framework'),
    'parent_item_colon' => __('Parent Jadwal Category:', 'tjd-framework'),
    'edit_item' => __('Edit Jadwal Category', 'tjd-framework'),
    'update_item' => __('Update Jadwal Category', 'tjd-framework'),
    'add_new_item' => __('Add New Jadwal Category', 'tjd-framework'),
    'new_item_name' => __('New Jadwal Category Name', 'tjd-framework'),
    'choose_from_most_used'  => __('Choose from the most used Jadwal categories', 'tjd-framework')
  );

  register_taxonomy('jadwal_cats', 'jadwal', array(
    'hierarchical' => true,
    'labels' => $jadwal_cats,
    'query_var' => true,
    'rewrite' => array('slug' => 'jadwal-cats'),
  ));
}

function create_post_types_gallery()
{
  // Slider post type 
  $label = array(
    'name'         => __('Gallery', 'tjd-framework'),
    'singular_name'   => __('Gallery', 'tjd-framework'),
    'add_new'       => _x('Add New', 'Gallery', 'tjd-framework'),
    'add_new_item'     => __('Add New Gallery', 'tjd-framework'),
    'edit_item'     => __('Edit Gallery', 'tjd-framework'),
    'new_item'       => __('New Gallery', 'tjd-framework'),
    'view_item'     => __('View Gallery', 'tjd-framework'),
    'search_items'     => __('Search Gallery', 'tjd-framework'),
    'not_found'     => __('No Gallery found', 'tjd-framework'),
    'not_found_in_trash' => __('No Gallery found in Trash', 'tjd-framework'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels'       => $label,
    'description'     => __('All Gallery upload here', 'tjd-framework'),
    'public'       => true,
    'supports'      => array('title', 'thumbnail'),
    'query_var'     => true,
    'rewrite'       => array('slug' => 'gallery'),
    'menu_icon'      => 'dashicons-images-alt',
    'show_in_nav_menus' => false,
    'has_archive'     => true,
    'menu_position'   => 20,
  );
  register_post_type('gallery', $args);
}
add_action('init', 'create_post_types_gallery');

// Add taxonomies
add_action('init', 'create_taxonomies_gallery');

function create_taxonomies_gallery()
{
  // Mitra taxonomies
  $gallery_cats = array(
    'name' => __('Gallery Categories', 'tjd-framework'),
    'singular_name' => __('Gallery Category', 'tjd-framework'),
    'search_items' =>  __('Search Gallery Categories', 'tjd-framework'),
    'all_items' => __('All Gallerys Categories', 'tjd-framework'),
    'parent_item' => __('Parent Gallery Category', 'tjd-framework'),
    'parent_item_colon' => __('Parent Gallery Category:', 'tjd-framework'),
    'edit_item' => __('Edit Gallery Category', 'tjd-framework'),
    'update_item' => __('Update Gallery Category', 'tjd-framework'),
    'add_new_item' => __('Add New Gallery Category', 'tjd-framework'),
    'new_item_name' => __('New Gallery Category Name', 'tjd-framework'),
    'choose_from_most_used'  => __('Choose from the most used Gallery categories', 'tjd-framework')
  );

  register_taxonomy('gallery_cats', 'gallery', array(
    'hierarchical' => true,
    'labels' => $gallery_cats,
    'query_var' => true,
    'rewrite' => array('slug' => 'gallery-cats'),
  ));
}

function create_post_types_mitra()
{
  // Slider post type 
  $label = array(
    'name'         => __('Mitra', 'tjd-framework'),
    'singular_name'   => __('Mitra', 'tjd-framework'),
    'add_new'       => _x('Add New', 'Mitra', 'tjd-framework'),
    'add_new_item'     => __('Add New Mitra', 'tjd-framework'),
    'edit_item'     => __('Edit Mitra', 'tjd-framework'),
    'new_item'       => __('New Mitra', 'tjd-framework'),
    'view_item'     => __('View Mitra', 'tjd-framework'),
    'search_items'     => __('Search Mitra', 'tjd-framework'),
    'not_found'     => __('No Mitra found', 'tjd-framework'),
    'not_found_in_trash' => __('No Mitra found in Trash', 'tjd-framework'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels'       => $label,
    'description'     => __('All Mitra upload here', 'tjd-framework'),
    'public'       => true,
    'supports'      => array('title', 'thumbnail'),
    'query_var'     => true,
    'rewrite'       => array('slug' => 'mitra-kami'),
    'menu_icon'      => 'dashicons-smiley',
    'show_in_nav_menus' => false,
    'has_archive'     => true,
    'menu_position'   => 20,
  );
  register_post_type('mitra', $args);
}
add_action('init', 'create_post_types_mitra');

// Add taxonomies
add_action('init', 'create_taxonomies_mitra');

function create_taxonomies_mitra()
{
  // Mitra taxonomies
  $mitra_cats = array(
    'name' => __('Mitra Categories', 'tjd-framework'),
    'singular_name' => __('Mitra Category', 'tjd-framework'),
    'search_items' =>  __('Search Mitra Categories', 'tjd-framework'),
    'all_items' => __('All Mitras Categories', 'tjd-framework'),
    'parent_item' => __('Parent Mitra Category', 'tjd-framework'),
    'parent_item_colon' => __('Parent Mitra Category:', 'tjd-framework'),
    'edit_item' => __('Edit Mitra Category', 'tjd-framework'),
    'update_item' => __('Update Mitra Category', 'tjd-framework'),
    'add_new_item' => __('Add New Mitra Category', 'tjd-framework'),
    'new_item_name' => __('New Mitra Category Name', 'tjd-framework'),
    'choose_from_most_used'  => __('Choose from the most used Mitra categories', 'tjd-framework')
  );

  register_taxonomy('mitra_cats', 'mitra', array(
    'hierarchical' => true,
    'labels' => $mitra_cats,
    'query_var' => true,
    'rewrite' => array('slug' => 'mitra-cats'),
  ));
}


// Testimoni
function create_post_types_testimoni()
{
  // Slider post type 
  $label = array(
    'name'         => __('Testimoni', 'tjd-framework'),
    'singular_name'   => __('Testimoni', 'tjd-framework'),
    'add_new'       => _x('Add New', 'Testimoni', 'tjd-framework'),
    'add_new_item'     => __('Add New Testimoni', 'tjd-framework'),
    'edit_item'     => __('Edit Testimoni', 'tjd-framework'),
    'new_item'       => __('New Testimoni', 'tjd-framework'),
    'view_item'     => __('View Testimoni', 'tjd-framework'),
    'search_items'     => __('Search Testimoni', 'tjd-framework'),
    'not_found'     => __('No Testimoni found', 'tjd-framework'),
    'not_found_in_trash' => __('No Testimoni found in Trash', 'tjd-framework'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels'       => $label,
    'description'     => __('All Testimoni upload here', 'tjd-framework'),
    'public'       => true,
    'supports'      => array('title', 'thumbnail'),
    'query_var'     => true,
    'rewrite'       => array('slug' => 'testimoni-kami'),
    'menu_icon'      => 'dashicons-heart',
    'show_in_nav_menus' => false,
    'has_archive'     => true,
    'menu_position'   => 20,
  );
  register_post_type('testimoni', $args);
}
add_action('init', 'create_post_types_testimoni');

// Add taxonomies
add_action('init', 'create_taxonomies_testimoni');

function create_taxonomies_testimoni()
{
  // Mitra taxonomies
  $testimoni_cats = array(
    'name' => __('Testimoni Categories', 'tjd-framework'),
    'singular_name' => __('Testimoni Category', 'tjd-framework'),
    'search_items' =>  __('Search Testimoni Categories', 'tjd-framework'),
    'all_items' => __('All Testimonis Categories', 'tjd-framework'),
    'parent_item' => __('Parent Testimoni Category', 'tjd-framework'),
    'parent_item_colon' => __('Parent Testimoni Category:', 'tjd-framework'),
    'edit_item' => __('Edit Testimoni Category', 'tjd-framework'),
    'update_item' => __('Update Testimoni Category', 'tjd-framework'),
    'add_new_item' => __('Add New Testimoni Category', 'tjd-framework'),
    'new_item_name' => __('New Testimoni Category Name', 'tjd-framework'),
    'choose_from_most_used'  => __('Choose from the most used Testimoni categories', 'tjd-framework')
  );

  register_taxonomy('testimoni_cats', 'testimoni', array(
    'hierarchical' => true,
    'labels' => $testimoni_cats,
    'query_var' => true,
    'rewrite' => array('slug' => 'testimoni-cats'),
  ));
}
