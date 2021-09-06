<?php get_header(); ?>

<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Artikel/Blog</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="<?php echo get_bloginfo('url'); ?>">Home</a></li>
                <li><a href="<?php echo get_bloginfo('url'); ?>/blog">Blog</a></li>
                <li><?php echo short_title('5'); ?></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content post-single-content">
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <div class="post post-grid post-single">
                            <div class="post-details">
                                <h2 class="post-title"><?php echo the_title(); ?></h2>
                                <div class="post-meta">
                                    oleh <a href="#" class="post-author"><?php the_author(); ?></a>
                                    - <a href="#" class="post-date"><?php the_date(); ?></a>
                                    <?php /* untuk statistik view */ setPostViews(get_the_ID()); ?>
                                    <a href="#" class="post-date mr-4" ><i class="fas fa-eye"></i><span> <?php echo number_format(getPostViews(get_the_ID())); ?>x</span></a>
                                    <span class="post-date">
                                    <i class="fas fa-folder"></i> 
                                    <?php
                                        $terms = get_the_terms($post->ID, 'category');
                                        if ($terms) :
                                            foreach ($terms as $category) {
                                        ?>
                                                <a title="Lihat artikel lainnya pada kategori <?php echo $category->name; ?>" href="<?php echo get_category_link($category->term_id); ?>">
                                                    <?php echo $category->name; ?></a>,&nbsp;

                                        <?php }
                                        endif;
                                        ?>
                                    </span>
                                </div>


                                <figure class="post-media br-sm mt-3 mb-5">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('large');
                                    }
                                    ?>

                                </figure>

                                <div class="post-content">
                                    <?php echo the_content(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- End Post -->


                        <?php
                        $post_tags = get_the_tags();
                        if (!empty($post_tags)) {
                            echo '<div class="tags"><label class="text-dark mr-2">Kata Kunci:</label>';
                            foreach ($post_tags as $post_tag) {
                                echo '<a  class="tag" href="' . get_tag_link($post_tag) . '">' . $post_tag->name . '</a>';
                            }
                            echo '</div>';
                        }
                        ?>




                            <?php include('inc/post-navigation.php'); ?>


                    <?php endwhile; ?>

                </div>
                <!-- End of Main Content -->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->
<?php get_footer(); ?>