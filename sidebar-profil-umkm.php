<aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
<?php 

$args = array(
  'post_type' => 'mitra',
  'posts_per_page' => 1,
  'author' => get_current_user_id(),
  'kses' => false
);

$mitra = get_posts($args);

?>
  <!-- Start of Sidebar Content -->
  <div class="sidebar-content umkm scrollable">
    <!-- Start of Sticky Sidebar -->
    <div class="sticky-sidebar">
      <!-- Start of Collapsible widget -->
      <div class="widget widget-collapsible">       
        
        <ul class="widget-body filter-items search-ul">
          <li><a class="btn btn-primary btn-ellipse mb-4 mt-4 btn-lg text-white" href="<?php echo $mitra[0]->guid; ?>"><i class="fas fa-store"></i> Lihat Gerai</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/edit-umkm"><i class="fas fa-store"></i> Edit Profil UMKM</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/produk-saya"><i class="fas fa-tshirt"></i> Produk</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/tambah-produk"><i class="fas fa-plus-circle"></i> Tambah Produk</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/forums"><i class="fas fa-comment-dots"></i> Forum</a></li> 
          <li><a href="<?php echo get_bloginfo('url'); ?>/akun-saya"><i class="fas fa-user"></i> Akun Saya</a></li>
               
        </ul>
      </div>
      <!-- End of Collapsible Widget -->

    </div>
    <!-- End of Sidebar Content -->
  </div>
  <!-- End of Sidebar Content -->
</aside>