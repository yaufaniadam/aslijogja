<?php
function create_post_types_slider()
{
  // Slider post type 
  $label = array(
    'name'         => __('Slider', 'tjd-framework'),
    'singular_name'   => __('Slider', 'tjd-framework'),
    'add_new'       => _x('Add New', 'Slider', 'tjd-framework'),
    'add_new_item'     => __('Add New Slider', 'tjd-framework'),
    'edit_item'     => __('Edit Slider', 'tjd-framework'),
    'new_item'       => __('New Slider', 'tjd-framework'),
    'view_item'     => __('View Slider', 'tjd-framework'),
    'search_items'     => __('Search Slider', 'tjd-framework'),
    'not_found'     => __('No Slider found', 'tjd-framework'),
    'not_found_in_trash' => __('No Slider found in Trash', 'tjd-framework'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels'       => $label,
    'description'     => __('All Slider upload here', 'tjd-framework'),
    'public'       => true,
    'supports'      => array('title'),
    'query_var'     => true,
    'rewrite'       => array('slug' => 'slider'),
    'menu_icon'      => 'dashicons-slides',
    'show_in_nav_menus' => false,
    'has_archive'     => true,
    'menu_position'   => 20,
  );
  register_post_type('slider', $args);
}
add_action('init', 'create_post_types_slider');


function create_post_types_mitra()
{
  // Slider post type 
  $label = array(
    'name'         => __('Mitra UMKM', 'aslijogja'),
    'singular_name'   => __('Mitra UMKM', 'aslijogja'),
    'add_new'       => _x('Tambah', 'Mitra', 'aslijogja'),
    'add_new_item'     => __('Tambah Mitra', 'aslijogja'),
    'edit_item'     => __('Edit Profil UMKM', 'aslijogja'),
    'new_item'       => __('Mitra Baru', 'aslijogja'),
    'view_item'     => __('Lihat Mitra', 'aslijogja'),
    'search_items'     => __('Cari Mitra', 'aslijogja'),
    'not_found'     => __('Mitra tidak ditemukan', 'aslijogja'),
    'not_found_in_trash' => __('Mitra tidak ditemukan di trash', 'aslijogja'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels'       => $label,
    'description'     => __('Semua Mitra', 'aslijogja'),
    'public'       => true,
    'supports'      => array('title', 'author'),
    'query_var'     => true,
    'rewrite'       => array('slug' => 'mitra-umkm'),
    'menu_icon'      => 'dashicons-store',
    'show_in_nav_menus' => false,
    'has_archive'     => true,
    'menu_position'   => 10,
  );
  register_post_type('mitra', $args);
}
add_action('init', 'create_post_types_mitra');

// Add taxonomies
add_action('init', 'create_taxonomies_mitra');

function create_taxonomies_mitra()
{
  // Mitra Kategori
  $mitra_cats = array(
    'name' => __('Kategori Mitra', 'aslijogja'),
    'singular_name' => __('Kategori Mitra', 'aslijogja'),
    'search_items' =>  __('Cari Kategori Mitra', 'aslijogja'),
    'all_items' => __('Semua Kategori', 'aslijogja'),
    'parent_item' => __('Induk Kategori Mitra', 'aslijogja'),
    'parent_item_colon' => __('Induk Kategori Mitra:', 'aslijogja'),
    'edit_item' => __('Edit Kategori Mitra', 'aslijogja'),
    'update_item' => __('Update Kategori Mitra', 'aslijogja'),
    'add_new_item' => __('Buat Kategori Mitra Baru', 'aslijogja'),
    'new_item_name' => __('Nama Kategori Mitra Baru', 'aslijogja'),
    'choose_from_most_used'  => __('Pilih kategori mitra yang sering dipakai', 'aslijogja')
  );

  register_taxonomy('kat_mitra', 'mitra', array(
    'hierarchical' => true,
    'labels' => $mitra_cats,
    'query_var' => true,
    'rewrite' => array('slug' => 'kat-mitra'),
  ));

  // Lokasi
  $lokasi_mitra = array(
    'name' => __('Lokasi Mitra', 'aslijogja'),
    'singular_name' => __('Lokasi Mitra', 'aslijogja'),
    'search_items' =>  __('Cari Lokasi Mitra', 'aslijogja'),
    'all_items' => __('Semua Lokasi', 'aslijogja'),
    'parent_item' => __('Induk Lokasi Mitra', 'aslijogja'),
    'parent_item_colon' => __('Induk Lokasi Mitra:', 'aslijogja'),
    'edit_item' => __('Edit Lokasi Mitra', 'aslijogja'),
    'update_item' => __('Update Lokasi Mitra', 'aslijogja'),
    'add_new_item' => __('Buat Lokasi Mitra Baru', 'aslijogja'),
    'new_item_name' => __('Nama Lokasi Mitra Baru', 'aslijogja'),
    'choose_from_most_used'  => __('Pilih Lokasi mitra yang sering dipakai', 'aslijogja')
  );

  register_taxonomy('lokasi_mitra', 'mitra', array(
    'hierarchical' => true,
    'labels' => $lokasi_mitra,
    'query_var' => true,
    'rewrite' => array('slug' => 'lokasi-mitra'),
  ));

}

function create_post_types_produk()
{
  // Slider post type 
  $label = array(
    'name'         => __('Produk', 'aslijogja'),
    'singular_name'   => __('Produk', 'aslijogja'),
    'add_new'       => _x('Tambah', 'produk', 'aslijogja'),
    'add_new_item'     => __('Tambah Produk Baru', 'aslijogja'),
    'edit_item'     => __('Edit Produk', 'aslijogja'),
    'new_item'       => __('Produk Baru', 'aslijogja'),
    'view_item'     => __('Lihat Produk', 'aslijogja'),
    'search_items'     => __('Cari produk', 'aslijogja'),
    'not_found'     => __('Produk tidak ada', 'aslijogja'),
    'not_found_in_trash' => __('Produk tidak ada Trash', 'aslijogja'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels'       => $label,
    'description'     => __('Semua Produk yang diupload', 'aslijogja'),
    'public'       => true,
    'supports'      => array('title', 'author'),
    'query_var'     => true,
    'rewrite'       => array('slug' => 'produk'),
    'menu_icon'      => 'dashicons-products',
    'show_in_nav_menus' => false,
    'has_archive'     => true,
    'menu_position'   => 10,
  );
  register_post_type('produk', $args);
}
add_action('init', 'create_post_types_produk');

// Add taxonomies
add_action('init', 'create_taxonomies_produk');

function create_taxonomies_produk()
{
  // produk taxonomies
  $produk_cats = array(
    'name' => __('Kategori Produk', 'aslijogja'),
    'singular_name' => __('Kategori Produk ', 'aslijogja'),
    'search_items' =>  __('Cari Kategori Produk ', 'aslijogja'),
    'all_items' => __('Semua Kategori Produk', 'aslijogja'),
    'parent_item' => __('Induk Kategori Produk', 'aslijogja'),
    'parent_item_colon' => __('Induk Kategori Produk:', 'aslijogja'),
    'edit_item' => __('Edit Kategori Produk', 'aslijogja'),
    'update_item' => __('Update Kategori Produk', 'aslijogja'),
    'add_new_item' => __('Tambah Kategori Produk', 'aslijogja'),
    'new_item_name' => __('Nama Kategori Produk Baru', 'aslijogja'),
    'choose_from_most_used'  => __('Kategori Produk sering dipakai', 'aslijogja')
  );

  register_taxonomy('kat_produk', 'produk', array(
    'hierarchical' => true,
    'labels' => $produk_cats,
    'query_var' => true,
    // 'meta_box_cb' => false,
    'rewrite' => array('slug' => 'produk-kategori'),
  ));
}