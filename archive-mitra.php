<?php get_header(); ?>

<!-- Start of Main -->
<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="<?php echo get_bloginfo('url'); ?>">Home</a></li>
                <li>Mitra UMKM</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Pgae Contetn -->
    <div class="page-content mb-8">
        <div class="container">

            <!-- Start of Shop Banner -->
            <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs" style="background-image: url(assets/images/shop/banner1.jpg); background-color: #FFC74E;">
                <div class="banner-content">
                    <h4 class="banner-subtitle font-weight-bold">Mitra UMKM</h4>
                    <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Asli dari Jogja</h3>
                    <!-- <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                        Now<i class="w-icon-long-arrow-right"></i></a> -->
                </div>
            </div>
            <!-- End of Shop Banner -->

            <div class="row gutter-lg">
                <aside class="sidebar vendor-sidebar sticky-sidebar-wrapper left-sidebar sidebar-fixed">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                    <div class="sidebar-content">
                        <div class="sticky-sidebar">
                            <div class="widget widget-search-form">
                                <div class="widget-body">
                                    <?php pencarian(['mitra']) ?>
                                </div>
                            </div>
                            <!-- End of Widget -->
                        </div>
                        <!-- End of Sticky Sidebar -->
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Sidebar -->

                <div class="main-content">
                    <div class="toolbox wcfm-toolbox">

                    </div>
                    <!-- End of Toolbox -->

                    <div class="row cols-sm-2">

                        <?php

                        while (have_posts()) : the_post();
                            $foto_cover = get_field('foto_cover');

                            if (!empty($foto_cover)) {
                                $foto = esc_url($foto_cover['url']);
                            } else {

                                $foto =  get_bloginfo('template_url') . "/assets/images/noimage-cover.jpg";
                            }

                            if (get_field('kontak')) {
                                $telp = get_field('kontak')['telepon'];
                                $whatsapp = get_field('kontak')['whatsapp'];
                                $email = get_field('kontak')['email'];
                            } else{
                                $telp = "";
                                $whatsapp = "";
                                $email = "";
                            }

                        ?>

                            <div class="store-wrap mb-4">
                                <div class="store store-grid store-wcfm">
                                    <div class="store-header">
                                        <div class="mask"></div>
                                        <figure style="height:200px;
                                       background:url(<?php echo $foto; ?>) center center no-repeat;background-size:700px;">
                                        </figure>
                                    </div>
                                    <!-- End of Store Header -->
                                    <div class="store-content">
                                        <h4 class="store-title"> 
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>

                                        <hr class="kabupaten">

                                        <ul class="seller-info-list list-style-none">
                                            <li class="store-email">
                                                <a href="email:#">
                                                    <i class="far fa-envelope"></i>
                                                    <?php echo $email; ?>
                                                </a>
                                            </li>
                                            <li class="store-phone">
                                                <i class="w-icon-phone"></i>
                                                <?php echo $telp; ?>
                                            </li>
                                            <li class="store-phone">
                                                <a target="_blank" href="https://wa.me/<?php echo ubah_telp($whatsapp); ?>" title="Klik untuk menghubungi via Whatsapp">
                                                    <i class="fab fa-whatsapp"></i>
                                                    <?php echo $whatsapp; ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End of Store Content -->
                                    <div class="store-footer">
                                        <figure class="seller-brand">

                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('thumbnail');
                                            } else {
                                            ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/noimage-thumb.jpg" alt="<?php the_title(); ?>">
                                            <?php
                                            }
                                            ?>

                                        </figure>

                                        <a href="<?php the_permalink(); ?>" class="btn btn-rounded btn-primary">Lihat Profil UMKM</a>
                                    </div>
                                    <!-- End of Store Footer -->
                                </div>
                                <!-- End of Store -->
                            </div>
                        <?php endwhile;  ?>

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
                <!-- End of Main Content -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->


</main>
<!-- End of Main -->

<?php get_footer(); ?>