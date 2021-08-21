<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Asli Jogja" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Roboto:400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '<?php bloginfo('template_url'); ?>/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/fonts/wolmart.ttf?png09e" as="font" type="font/ttf" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body>
    <div class="page-wrapper">
   <!-- Start of Header -->
        <header class="header header-border">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Selamat Datang / Sugeng Rawuh!</p>
                    </div>
                    <div class="header-right">
                        <a href="<?php bloginfo('url'); ?>/wp-login.php" class="d-lg-show login sign-in"><i class="w-icon-account"></i>Login</a>
                        <span class="delimiter d-lg-show">/</span>
                        <a href="<?php bloginfo('url'); ?>/daftar" class="ml-0 d-lg-show login register">Daftar</a>
                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                        </a>
                        <a href="<?php bloginfo('url'); ?>" class="logo ml-lg-0" title="kembali ke Home">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" alt="logo" width="144" height="45" />
                        </a>
        
                        <form method="get" id="s" action="<?php bloginfo('url'); ?>" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <input type="hidden" name="post_type[]" value="produk" />
                            <input type="hidden" name="post_type[]" value="mitra" />                            
                            <input type="text" name="s"  class="form-control" name="search" id="search" placeholder="Cari produk atau UMKM" required />
                            <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-right ml-4">

                        <a class="wishlist label-down link d-xs-show" href="<?php bloginfo('url'); ?>/produk">
                            <i class="w-icon-products"></i>
                            <span class="wishlist-label d-lg-show">Produk</span>
                        </a>                      

                        <a class="compare label-down link d-xs-show" href="<?php bloginfo('url'); ?>/komunitas">
                            <i class="w-icon-service"></i>
                            <span class="compare-label d-lg-show">Komunitas</span>
                        </a>

                        <a class="compare label-down link d-xs-show" href="<?php bloginfo('url'); ?>/mitra-umkm">
                            <i class="w-icon-vendor-store"></i>
                            <span class="compare-label d-lg-show">UMKM</span>
                        </a>
                        
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
                <div class="container">
                    <div class="inner-wrap">
                    <div class="header-left">
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Kategori</span>
                                </a>

                                <div class="dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-tshirt2"></i>Fashion
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Women</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                                Watches</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Sale</a></li>
                                                    </ul>
                                                </li>
                                               
                                               
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-tshirt2"></i>Fashion
                                            </a>
                                        </li>                                       
                                        <!-- <li>
                                            <a href="shop-banner-sidebar.html"
                                                class="font-weight-bold text-primary text-uppercase ls-25">
                                                View All Categories<i class="w-icon-angle-right"></i>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <div class="header-right">
                            <nav class="main-nav">
                                <!-- <ul class="menu active-underline">
                                    <li class="active">
                                        <a href="demo1.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="shop-banner-sidebar.html">Produk</a>                                       
                                    </li>
                                    <li>
                                        <a href="vendor-dokan-store.html">Inkubasi Bisnis</a>                                     
                                    </li>
                                    <li>
                                        <a href="blog.html">Profil UMKM</a>                                       
                                    </li>
                                   
                                </ul> -->
                                <?php
                                wp_nav_menu(
                                    array(
                                        'menu'              => 'header',
                                        'theme_location'    => 'header',
                                        'depth'             => 2,
                                        'container'         => 'nav',
                                        'container_id'      => 'top_menu',
                                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker()
                                    )
                                )
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->

        
      
    <!-- Body Inner -->
    <?php /* <div class="body-inner">
        <!-- Header -->
        <header id="header" data-transparent="true" data-responsive-fixed="true" class="light">

            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src(($custom_logo_id));
                        }
                        ?>
                        <a href="<?php echo get_bloginfo('url'); ?>" class="logo-default" data-dark-logo="<?php echo $logo[0] ?>">
                            <img src="<?php $custom_logo_id = get_theme_mod('custom_logo');
                                        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                                        echo $image[0]; ?>" alt="Lab IP" class="py-3 d-none d-md-block">
                            <img src="<?php $custom_logo_id = get_theme_mod('custom_logo');
                                        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                                        echo $image[0]; ?>" alt="Lab IP" class="d-inline d-md-none py-4">
                        </a>

                    </div>
                    <!--End: Logo-->
                    <!-- Search -->
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                        <form role="search" id="searchform" class="search-form" action="/" method="get">
                            <input id="s" class="form-control" name="s" type="text" placeholder="Type & Search..." />
                            <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                        </form>
                    </div>
                    <!-- end: search -->
                    <!--Header Extras-->
                    <div class="header-extras">
                        <ul>
                            <li>
                                <a id="btn-search" href="#"> <i class="icon-search"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--end: Header Extras-->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <?php
                                wp_nav_menu(
                                    array(
                                        'menu'              => 'header',
                                        'theme_location'    => 'header',
                                        'depth'             => 2,
                                        'container'         => 'nav',
                                        'container_id'      => 'top_menu',
                                        'container_id'      => 'top_menu',
                                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker()
                                    )
                                )
                                ?>
                            </nav>
                        </div>
                    </div>
                    <!--end: Navigation-->

                </div>
            </div>
        </header>
        <!-- end: Header -->

        */