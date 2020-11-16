<?php get_header(); ?>

<!-- Page Content -->
<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-lg-9">
                <!-- Page title -->
                <div class="page-title mb-5">
                    <h3>Kategori : <?php echo single_cat_title('', false); ?></h3>
                </div>
                <!-- Blog -->
                <div id="blog" class="post-thumbnails">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <!-- Post single item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('large');
                                            } else {
                                            ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php bloginfo('template_directory'); ?>/img/noimage.jpg" alt="<?php the_title(); ?>" />
                                                </a>
                                            <?php } ?>
                                        </a>

                                    </div>
                                    <div class="post-item-description">
                                        <span class="post-meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('j M Y'); ?></span>

                                        <span class="post-meta-date"><i class="icon-user"></i>
                                            <?php global $post;
                                            $author_id = $post->post_author;
                                            ?>

                                            <?php echo get_the_author_meta('display_name', $author_id); ?></span>

                                        <span class="post-meta-category"><i class="icon-tag"></i>
                                            <?php
                                            $terms = get_the_terms($post->ID, 'category');
                                            if ($terms) :
                                                foreach ($terms as $category) {
                                            ?>
                                                    <a title="Lihat artikel lainnya pada kategori <?php echo $category->name; ?>" href="<?php echo get_category_link($category->term_id); ?>">
                                                        <?php echo $category->name; ?></a> &nbsp;

                                            <?php }
                                            endif;
                                            ?>
                                        </span>

                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?>
                                            </a></h2>
                                        <p><?php echo excerpt('20'); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="item-link">Selengkapnya <i class="icon-chevron-right"></i></a>
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
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<!-- end: Page Content -->

<?php get_footer(); ?>