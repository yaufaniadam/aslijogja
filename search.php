<?php get_header(); ?>

<!-- Page Content -->
<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-lg-9">
                <!-- Blog -->
                <div id="blog" class="single-post" data>
                    <h2>Hasil Pencarian : <?php printf(__('%s', 'shape'), '<h2>' . get_search_query() . '</h2>'); ?></h2>
                    <hr>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <!-- Post single item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <?php
                                        if (has_post_thumbnail()) { ?>
                                            <a href="#">
                                                <img alt="" src="<?php the_post_thumbnail_url(); ?>">
                                            </a>
                                        <?php } else {
                                        ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/images/blog/1.jpg" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                    </div>
                                    <div class="post-item-description">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <div class="post-meta">
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
                                                            <?php echo $category->name; ?></a>,

                                                <?php }
                                                endif;
                                                ?>
                                            </span>
                                            <div class="post-meta-share">

                                            </div>
                                        </div>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Post single item-->
                        <?php endwhile; ?>

                    <?php else : ?>
                        <h4><i class="fas fa-exclamation-triangle"></i> Mohon maaf, hasil pencarian tidak ditemukan.</h4>
                        <p>Silakan ulangi pencarian dengan menggunakan kata kunci lain.</p>
                        <hr>

                    <?php endif; ?>
                </div>
                <div class="row justify-content-center pb-5">
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