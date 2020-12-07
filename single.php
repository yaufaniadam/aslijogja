<?php get_header(); ?>

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
                                        <?php echo do_shortcode('[ssba]'); ?>
                                    </div>
                                </div>
                                <?php the_content(); ?>
                            </div>
                            <div class="post-tags">
                                <?php $tags = get_the_tags($post->ID);
                                if ($tags) : ?>
                                    <?php foreach ($tags as $tag) :  ?>
                                        <a href="<?php bloginfo('url'); ?>/tag/<?php print_r($tag->slug); ?>"><?php print_r($tag->name); ?></a>
                                <?php endforeach;
                                endif; ?>
                            </div>
                            <?php // include('inc/post-navigation.php'); 
                            ?>

                        </div>
                    </div>
                    <!-- end: Post single item-->
                </div>
            </div>
            <!-- end: content -->
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<!-- end: Page Content -->

<?php get_footer(); ?>