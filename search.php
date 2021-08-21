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
                <li>Pencarian</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->


    <!-- Start of Page Content -->
    <div class="page-content mb-8 mt-8">
        <div class="container">
            <div class="row gutter-lg">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?php if (have_posts()) : ?>

                        <?php
                        while (have_posts()) : the_post();
                            global $post;

                        ?>
                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <figure class="post-media br-sm">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('thumbnail');
                                            } else { ?>
                                                <img src="<?php bloginfo('template_url'); ?>/assets/images/noimage-thumb.jpg" alt="">
                                            <?php }
                                            ?>
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <div class="post-details">
                                        <div class="post-cats text-primary">
                                            <strong>
                                                <?php if ($post->post_type == 'mitra') {

                                                    echo '<span style="color:orange"><i class="w-icon-vendor-store"></i> Mitra UMKM<span>';
                                                
                                                } elseif ($post->post_type == 'produk') {
                                                    echo '<span style="color:green"><i class="w-icon-products"></i> Produk<span>';
                                                } elseif ($post->post_type == 'post') {
                                                    echo '<span style="color:blue"><i class="w-icon-products"></i>  Artikel/Blog<span>';
                                                } else {
                                                    echo '<span style="color:red"><i class="w-icon-computer"></i> Halaman<span>';
                                                }    ?>
                                               
                                            </strong>
                                        </div>
                                        <h4 class="post-title">
                                            <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                                        </h4>
                                        <div class="post-cats text-primary">


                                            <?php if ($post->post_type == 'post') { ?>
                                                <div class="post-meta">
                                                    by <a href="#" class="post-author"><?php the_author(); ?></a>
                                                    - <a href="#" class="post-date"><?php echo get_the_date(); ?></a>
                                                </div>
                                              <?php  
                                            } elseif ($post->post_type == 'mitra') {
                                                if (get_field('kontak')) {
                                                    echo '<i class="fab fa-whatsapp"></i> ' . get_field('kontak')['whatsapp'];
                                                }
                                            } elseif ($post->post_type == 'produk') {
                                                $author_id = get_the_author_meta('ID');
                                                $mitra  = get_mitra_byauthor($author_id);
                                                ?>
                                                <a href="<?php echo bloginfo('url') . "/" . $mitra[0]->post_type . "/" . $mitra[0]->post_name; ?>" class="rating-reviews">
                                                    <?php echo $mitra[0]->post_title; ?>
                                                </a>
                                            <?php } ?>

                                        </div>



                                    </div>
                                </div>
                            </div>



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
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->
<?php get_footer(); ?>