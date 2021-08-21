<aside class="sidebar right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
  <div class="sidebar-overlay">
    <a href="#" class="sidebar-close">
      <i class="close-icon"></i>
    </a>
  </div>
  <a href="#" class="sidebar-toggle">
    <i class="fas fa-chevron-left"></i>
  </a>
  <div class="sidebar-content">
    <div class="sticky-sidebar">
    
      <div class="widget widget-search-form">
        <div class="widget-body">
          <?php pencarian(['post']); ?>
        </div>
      </div>
      <!-- End of Widget search form -->
     
      <?php post_sidebar('',8); ?>
      <!-- End of Widget posts -->

      <div class="widget widget-categories">
        <h3 class="widget-title bb-no mb-0">Kategori</h3>
        <ul class="widget-body filter-items search-ul">
          <?php get_kategori_post(); ?>
        </ul>
      </div>
      <!-- End of Widget categories -->
      
      <div class="widget widget-tags">
        <h3 class="widget-title bb-no">Kata Kunci</h3>
        <?php echo popular_tag(); ?>
      </div>
    
    </div>
  </div>
</aside>