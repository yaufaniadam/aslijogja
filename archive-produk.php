<?php get_header(); ?>

<!-- Start of Main -->
<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="<?php echo get_bloginfo('url'); ?>">Home</a></li>
                <li>Produk</li>
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
                    <h4 class="banner-subtitle font-weight-bold text-white">Produk Pilihan</h4>
                    <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Asli dari Jogja</h3>
                    <!-- <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                        Now<i class="w-icon-long-arrow-right"></i></a> -->
                </div>
            </div>
            <!-- End of Shop Banner -->


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

                            <div class="sticky-sidebar">
                                <div class="widget widget-search-form">
                                    <div class="widget-body">
                                        <?php pencarian(['produk']) ?>
                                    </div>
                                </div>
                                <!-- End of Widget -->

                            </div>
                          
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
                    <!-- <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                        btn-icon-left d-block d-lg-none"><i class="w-icon-category"></i><span>Filters</span></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price-low">Sort by pric: low to high</option>
                                    <option value="price-high">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box">
                                <select name="count" class="form-control">
                                    <option value="9">Show 9</option>
                                    <option value="12" selected="selected">Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-layout">
                                <a href="shop-banner-sidebar.html" class="icon-mode-grid btn-layout active">
                                    <i class="w-icon-grid"></i>
                                </a>
                                <a href="shop-list.html" class="icon-mode-list btn-layout">
                                    <i class="w-icon-list"></i>
                                </a>
                            </div>
                        </div>
                    </nav> -->
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