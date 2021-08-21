<?php get_header(); ?>
<!-- Start of Main-->
<main class="main">

    <section class="intro-section">
        <div class="owl-carousel owl-theme owl-nav-inner owl-dot-inner owl-nav-lg animation-slider gutter-no row cols-1" data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'items': 1,
                    'responsive': {
                        '1600': {
                            'nav': true,
                            'dots': false
                        }   
                    }
                }">
            <div class="banner banner-fixed intro-slide intro-slide1" style="background-image: url(<?php bloginfo('template_url'); ?>/assets//images/demos/demo1/sliders/slide-1.jpg); background-color: #ebeef2;">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/demos/demo1/sliders/shoes.png" alt="Banner" data-bottom-top="transform: translateY(10vh);" data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                    </figure>
                    <div class="banner-content y-50 text-right">
                        <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                }">
                            Custom <span class="p-relative d-inline-block">Men’s</span>
                        </h5>
                        <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                }">
                            RUNNING SHOES
                        </h3>
                        <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.6s'
                                }">
                            Sale up to <span class="font-weight-bolder text-secondary">30% OFF</span>
                        </p>

                        <a href="shop-list.html" class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>

                    </div>
                    <!-- End of .banner-content -->
                </div>
                <!-- End of .container -->
            </div>
            <!-- End of .intro-slide1 -->

            <div class="banner banner-fixed intro-slide intro-slide2" style="background-image: url(<?php bloginfo('template_url'); ?>/assets//images/demos/demo1/sliders/slide-2.jpg); background-color: #ebeef2;">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate" data-animation-options="{
                                'name': 'fadeInUpShorter',
                                'duration': '1s'
                            }">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/demos/demo1/sliders/men.png" alt="Banner" data-bottom-top="transform: translateX(10vh);" data-top-bottom="transform: translateX(-10vh);" width="480" height="633">
                    </figure>
                    <div class="banner-content d-inline-block y-50">
                        <h5 class="banner-subtitle font-weight-normal text-default ls-50 slide-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                }">
                            Mountain-<span class="text-secondary">Climbing</span>
                        </h5>
                        <h3 class="banner-title font-weight-bolder text-dark mb-0 ls-25 slide-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                }">
                            Hot & Packback
                        </h3>
                        <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                }">
                            Only until the end of this week.
                        </p>
                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s',
                                    'delay': '1s'
                                }">
                            SHOP NOW<i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                    <!-- End of .banner-content -->
                </div>
                <!-- End of .container -->
            </div>
            <!-- End of .intro-slide2 -->

            <div class="banner banner-fixed intro-slide intro-slide3" style="background-image: url(<?php bloginfo('template_url'); ?>/assets//images/demos/demo1/sliders/slide-3.jpg); background-color: #f0f1f2;">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate" data-animation-options="{
                                'name': 'fadeInDownShorter',
                                'duration': '1s'
                            }">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/demos/demo1/sliders/skate.png" alt="Banner" data-bottom-top="transform: translateY(10vh);" data-top-bottom="transform: translateY(-10vh);" width="310" height="444">
                    </figure>
                    <div class="banner-content text-right y-50">
                        <p class="font-weight-normal text-default text-uppercase mb-0 slide-animate" data-animation-options="{
                                    'name': 'fadeInLeftShorter',
                                    'duration': '1s',
                                    'delay': '.6s'
                                }">
                            Top weekly Seller
                        </p>
                        <h5 class="banner-subtitle font-weight-normal text-default ls-25 slide-animate" data-animation-options="{
                                    'name': 'fadeInLeftShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                }">
                            Trending Collection
                        </h5>
                        <h3 class="banner-title p-relative font-weight-bolder ls-50 slide-animate" data-animation-options="{
                                    'name': 'fadeInLeftShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                }"><span class="text-white mr-4">Roller</span>-skate
                        </h3>
                        <div class="btn-group slide-animate" data-animation-options="{
                                    'name': 'fadeInLeftShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                }">
                            <a href="shop-list.html" class="btn btn-dark btn-outline btn-rounded btn-icon-right">SHOP
                                NOW<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <!-- End of .banner-content -->
                    </div>
                    <!-- End of .container -->
                </div>
            </div>
            <!-- End of .intro-slide3 -->
        </div>
        <!-- End of .owl-carousel -->
    </section>
    <!-- End of .intro-section -->

    <?php
    $banner_home_atas = get_field('banner_home_atas');
    $banner_kiri = get_field('banner_kiri');
    $link_banner_kiri = get_field('link_banner_kiri');
    $banner_kanan = get_field('banner_kanan');
    $link_banner_kanan = get_field('link_banner_kanan');
    $banner_tengah = get_field('banner_tengah');
    $link_banner_tengah = get_field('link_banner_tengah');
    $banner_tengah = get_field('banner_tengah');

    if (in_array(1, $banner_home_atas)) { ?>
        <div class="container">

            <div class="row category-banner-wrapper appear-animate pt-6 pb-8">
                <div class="col-md-6 mb-4">
                    <div class="banner banner-fixed br-xs">
                        <figure>
                            <?php
                            if (!empty($banner_kiri)) { ?>
                                <a href="<?php echo $link_banner_kiri; ?>" target="_blank">
                                    <img src="<?php echo esc_url($banner_kiri['url']); ?>" alt="<?php echo esc_attr($banner_kiri['alt']); ?>" />
                                </a>
                            <?php } else { ?>

                                <img src="<?php bloginfo('template_url'); ?>/assets/images/bannerkirikanan.png" alt="Category Banner" width="610" height="160" style="background-color: #ecedec;" />

                            <?php } ?>
                        </figure>

                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="banner banner-fixed br-xs">
                        <figure>
                            <?php
                            if (!empty($banner_kanan)) { ?>
                                <a href="<?php echo $link_banner_kanan; ?>" target="_blank">
                                <img src="<?php echo esc_url($banner_kanan['url']); ?>" alt="<?php echo esc_attr($banner_kanan['alt']); ?>" />
                                </a>
                            <?php } else { ?>

                                <img src="<?php bloginfo('template_url'); ?>/assets/images/bannerkirikanan.png" alt="Category Banner" width="610" height="160" style="background-color: #ecedec;" />

                            <?php } ?>
                        </figure>

                    </div>
                </div>
            </div>
            <!-- End of Category Banner Wrapper -->
        </div>

    <?php } ?>

    <div class="container">
        <?php produk(get_field('kategori_produk_1'), 10) ?>
        <!-- End of Product Wrapper 1 -->

        <?php if (in_array(1, $banner_tengah)) { ?> 
        <div class="banner banner-fashion appear-animate br-sm mb-9">
            <div class="banner-content align-items-center">
                <?php
                if (!empty($banner_tengah)) { ?>
                    <a href="<?php echo $link_banner_tengah; ?>" target="_blank">
                    <img src="<?php echo esc_url($banner_tengah['url']); ?>" alt="<?php echo esc_attr($banner_tengah['alt']); ?>" />
                    </a>
                <?php } else { ?>

                    <img src="<?php bloginfo('template_url'); ?>/assets/images/bannerkirikanan.png" alt="Category Banner" width="610" height="160" style="background-color: #ecedec;" />

                <?php } ?>
            </div>
        </div>
        <!-- End of Banner Tengah -->

        <?php } ?>

        <?php produk(get_field('kategori_produk_2'), 10) ?>
        
        <div class="post-wrapper appear-animate mb-4">
            <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title ls-normal mb-0">Artikel dan Blog</h2>
                <a href="<?php echo get_bloginfo('url'); ?>/blog" class="font-weight-bold font-size-normal">Lihat Artikel Lainnya</a>
            </div>
            <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-sm-2 cols-1" data-owl-options="{
                        'items': 4,
                        'nav': false,
                        'dots': true,
                        'loop': false,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '576': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4,
                                'dots': false
                            }
                        }
                    }">

                <?php blog('', 12); ?>
            </div>
        </div>
        <!-- Post Wrapper -->
    </div>
    <!--End of Catainer -->
</main>
<!-- End of Main -->

<?php get_footer(); ?>