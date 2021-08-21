<?php get_header(); ?>
<!-- Start of Main-->
<main class="main">

    <section class="intro-section">
        <?php

        while (have_posts()) : the_post();

            the_content();

        endwhile;

        ?>
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