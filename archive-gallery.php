<?php get_header(); ?>

<!-- Page Content -->
<section id="page-content" class="sidebar-right">
  <div class="container">
    <div class="row">
      <!-- content -->
      <div class="content col-lg-12">
        <!-- Page title -->
        <div class="page-title mb-5">
          <h3>Gallery</h3>
        </div>
        <!-- Blog -->
        <div id="portfolio" class="grid-layout portfolio-3-columns" data-default-filter="ct-branding" data-margin="0">

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <!-- Post single item-->
              <!-- portfolio item -->
              <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                <div class="portfolio-item-wrap">
                  <div class="portfolio-image">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                    ?>
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php bloginfo('template_directory'); ?>/img/noimage.jpg" alt="<?php the_title(); ?>" />
                      </a>
                    <?php } ?>
                  </div>
                  <div class="portfolio-description">
                    <a href="<?php the_permalink(); ?>">
                      <h3><?php echo short_title(8) ?></h3>
                      <span><?php
                            $terms = get_the_terms($post->ID, 'gallery_cats');
                            if ($terms) :
                              foreach ($terms as $category) {
                                echo $category->name;
                              }
                            endif;
                            ?>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                <div class="portfolio-item-wrap">
                  <div class="portfolio-image">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                    ?>
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php bloginfo('template_directory'); ?>/img/noimage.jpg" alt="<?php the_title(); ?>" />
                      </a>
                    <?php } ?>
                  </div>
                  <div class="portfolio-description">
                    <a href="<?php the_permalink(); ?>">
                      <h3><?php echo short_title(8) ?></h3>
                      <span><?php
                            $terms = get_the_terms($post->ID, 'gallery_cats');
                            if ($terms) :
                              foreach ($terms as $category) {
                                echo $category->name;
                              }
                            endif;
                            ?>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                <div class="portfolio-item-wrap">
                  <div class="portfolio-image">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                    ?>
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php bloginfo('template_directory'); ?>/img/noimage.jpg" alt="<?php the_title(); ?>" />
                      </a>
                    <?php } ?>
                  </div>
                  <div class="portfolio-description">
                    <a href="<?php the_permalink(); ?>">
                      <h3><?php echo short_title(8) ?></h3>
                      <span><?php
                            $terms = get_the_terms($post->ID, 'gallery_cats');
                            if ($terms) :
                              foreach ($terms as $category) {
                                echo $category->name;
                              }
                            endif;
                            ?>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                <div class="portfolio-item-wrap">
                  <div class="portfolio-image">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                    ?>
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php bloginfo('template_directory'); ?>/img/noimage.jpg" alt="<?php the_title(); ?>" />
                      </a>
                    <?php } ?>
                  </div>
                  <div class="portfolio-description">
                    <a href="<?php the_permalink(); ?>">
                      <h3><?php echo short_title(8) ?></h3>
                      <span><?php
                            $terms = get_the_terms($post->ID, 'gallery_cats');
                            if ($terms) :
                              foreach ($terms as $category) {
                                echo $category->name;
                              }
                            endif;
                            ?>
                      </span>
                    </a>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>
          <?php else : ?>
            <div class="post-item">
              <div class="post-item-wrap">
                <h4><i class="fas fa-exclamation-triangle"></i> Mohon maaf, hasil pencarian tidak ditemukan.</h4>
                <p>Silakan ulangi pencarian dengan menggunakan kata kunci lain.</p>
                <hr>
              </div>
            </div>
          <?php endif; ?>
          <!-- end: Post single item-->
          <?php wp_pagenavi(); ?>
        </div>
      </div>
      <!-- end: content -->
      <?php // get_sidebar(); 
      ?>
    </div>
  </div>
</section>
<!-- end: Page Content -->

<?php get_footer(); ?>