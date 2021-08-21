<?php get_header(); ?>

<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Hasil Pencarian : <?php printf(__('%s', 'shape'), '<h2>"' . get_search_query() . '"</h2>'); ?></h1>

        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="<?php echo get_bloginfo('url'); ?>">Home</a></li>
                <li><a href="<?php echo get_bloginfo('url'); ?>/blog">Blog</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-8 mt-8">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <?php if (have_posts()) :
                    while (have_posts()) : the_post(); ?>

                        <article class="post post-list post-listing mb-md-10 mb-6 pb-2 overlay-zoom mb-4">
                            <figure class="post-media br-sm">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('small');
                                    }
                                    ?>
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <?php

                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                                    }
                                    ?>

                                </div>
                                <h4 class="post-title">
                                    <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                                </h4>
                                <div class="post-content">
                                    <p><?php echo excerpt(60); ?></p>

                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author"><?php the_author(); ?></a>
                                    - <a href="#" class="post-date"><?php echo get_the_date(); ?></a>
                                </div>
                            </div>
                        </article>


                    <?php endwhile; ?>
                    <div class="toolbox toolbox-pagination justify-content-between">

                        <div class="pagenavi">
                            <?php
                            // if (function_exists('wp-pagenavi')) {
                            wp_pagenavi();
                            // } 
                            ?>
                        </div>
                    </div>

                    <?php else : ?>
                        <h2><i class="fas fa-exclamation-triangle"></i> Mohon maaf, hasil pencarian tidak ditemukan.</h2>
                        <p>Silakan ulangi pencarian dengan menggunakan kata kunci lain.</p>
                        <hr>

                        <?php pencarian(['post'])  ?>

                    <?php endif; ?>

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