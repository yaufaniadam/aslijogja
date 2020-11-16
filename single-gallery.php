<?php

get_header();

?>
<!-- Page Content -->
<section id="page-content" class="sidebar-right">
  <div class="container">
    <div class="row">
      <!-- content -->
      <div class="content col-lg-9">
        <!-- Blog -->
        <div id="blog" class="single-post">
          <!-- Post single item-->
          <div class="post-item">
            <div class="post-item-wrap">
              <div class="post-image">
                <a href="#">
                  <?php if (has_post_thumbnail($post->ID)) : ?>
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>

                    <img alt="" src="<?php echo $image[0]; ?>">
                  <?php endif; ?>
                </a>
              </div>
              <div class="post-item-description">
                <h3 style="font-weight: bold;"><?php
                                                echo get_the_title($post_id);
                                                ?></h3>
                <div class="post-meta">
                  <span class="post-meta-date"><i class="fas fa-calendar-alt"> </i><?php echo get_the_date(); ?></span>
                  <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i><?php comments_number(); ?></a></span>
                  <span class="post-meta-category"><a href=""><i class="fa fa-tag"></i>
                      <?php the_tags(); ?> </a></span>
                  <div class="post-meta-share">

                  </div>
                </div>
                <?php
                if (have_posts()) {
                  while (have_posts()) {
                    the_post();
                    the_content();
                  }
                }
                ?>
              </div>
              <div class="post-tags">
                <a href="#"><?php the_tags(); ?></a>
              </div>
              <div class="post-navigation">
                <?php if (get_previous_post()) { ?>
                  <a href="<?php echo get_the_permalink(get_previous_post()); ?>" class="post-prev">
                    <div class="post-prev-title"><span>Previous Post</span><?php echo get_the_title(get_previous_post()) ?></div>
                  </a>

                <?php } ?>
                <?php if (get_next_post()) { ?>
                  <a href="<?php echo get_the_permalink(get_next_post()); ?>" class="post-next">
                    <div class="post-next-title"><span>Next Post</span><?php echo get_the_title(get_next_post()) ?></div>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- end: Post single item-->
        </div>
      </div>
      <!-- end: content -->
      <!-- Sidebar-->
      <?php get_sidebar(); ?>
      <!-- end: Sidebar-->
    </div>
  </div>
</section>
<!-- end: Page Content -->
<!-- Footer -->
<?php
get_footer();
?>