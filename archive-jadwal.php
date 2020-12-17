<?php get_header(); ?>

<?php
$bg_title = get_bloginfo('template_directory') . "/images/bg-ip.jpg";
?>

<link href='<?php echo get_template_directory_uri(); ?>/plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<!-- Page title -->
<section data-bg-parallax="<?php echo $bg_title; ?>">
    <div class="bg-overlay" data-style="13"></div>
    <div class="container">
        <div class="page-title text-center text-light">
            <h1>Jadwal</h1>
        </div>
    </div>
</section>

<!-- Page Content -->
<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-lg-9 offset-lg-2">
                <!-- Page title -->

                <!-- Blog -->
                <div id="blog" class="post-thumbnails">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <!-- Post single item-->
                            <div class="post-item">
                                <div class="post-item-wrap">

                                    <div class="post-item-description">

                                        <span class="post-meta-category"><i class="icon-tag"></i>
                                            <?php
                                            $terms = get_the_terms($post->ID, 'jadwal_cats');
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
                                        <p><i class="fas fa-calendar"></i>
                                            <?php echo get_field('tanggal') ?> | <i class="fas fa-clock"></i>
                                            <?php echo get_field('waktu') ?></p>

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
            <?php // get_sidebar(); 
            ?>
        </div>
    </div>
</section>
<!-- end: Page Content -->

<?php get_footer(); ?>