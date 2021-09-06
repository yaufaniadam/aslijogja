<?php get_header(); 
$tax = $wp_query->get_queried_object();
?>

<!-- Start of Main -->
<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="<?php echo get_bloginfo('url'); ?>">Home</a></li>
                <li><a href="<?php echo get_bloginfo('url'); ?>/produk">Produk</a></li>
                <li><?php echo $tax->name; ?></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <!-- Start of Shop Banner -->
            <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs" style="background-image: url(<?php echo get_bloginfo('template_directory'); ?>/assets/images/bannerpage.jpg); background-color: #FFC74E;">
                <div class="banner-content">
                    <h4 class="banner-subtitle font-weight-bold text-white">Temukan </h4>
                    <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Produk <?php echo $tax->name; ?></h3>
                    <!-- <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                        Now<i class="w-icon-long-arrow-right"></i></a> -->
                </div>
            </div>
            <!-- End of Shop Banner -->

            <?php brands(10); ?>

            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg mb-10">
                <!-- Start of Sidebar, Shop Sidebar -->
                <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                    <!-- Start of Sidebar Content -->
                    <div class="sidebar-content scrollable">
                        <!-- Start of Sticky Sidebar -->
                        <div class="sticky-sidebar">
                          
                            <!-- Start of Collapsible widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>Semua Kategori</label></h3>
                                <ul class="widget-body filter-items search-ul">                               
                                   <?php get_kategori_produk(); ?>
                                </ul>
                                
                            </div>
                            <!-- End of Collapsible Widget -->                           

                        </div>
                        <!-- End of Sidebar Content -->
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->

                <!-- Start of Shop Main Content -->
                <div class="main-content">
                    
                    <div class="product-wrapper row cols-md-4 cols-sm-2 cols-2">

                        <?php

                        while (have_posts()) : the_post(); ?>

                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('small');
                                            } else {
                                            ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/noimage-small.jpg" width="280" height="180" alt="<?php the_title(); ?>">
                                            <?php
                                            }
                                            ?>
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <!-- <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronics</a>
                                        </div> -->
                                        <h3 class="product-name">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="ratings-container">
                                            <?php
                                            $author_id = get_the_author_meta('ID');
                                            $mitra  = get_mitra_byauthor($author_id);
                                            ?>
                                            <a href="<?php echo bloginfo('url') . "/" . $mitra[0]->post_type . "/" . $mitra[0]->post_name; ?>" class="rating-reviews">
                                                <?php echo $mitra[0]->post_title; ?>
                                            </a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                Rp<?php echo number_format(get_field('harga', get_the_ID())); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        endwhile;  ?>
                    </div>

                    <div class="toolbox toolbox-pagination justify-content-between">

                        <div class="pagenavi">
                            <?php
                            // if (function_exists('wp-pagenavi')) {
                            wp_pagenavi();
                            // } 
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End of Shop Main Content -->
            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->

<?php get_footer(); ?>