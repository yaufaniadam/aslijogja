<?php get_header(); ?>

<!-- Start of Main -->
<main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                        <li>Error 404</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content error-404d pt-5 pb-5">
                <div class="container">
                    <div class="banner pt-5 pb-5">                       
                        <div class="banner-content text-center">
                            <h2 class="banner-title">
                                <span style="color:red;">Oops!!!</span> Error 404.
                            </h2>
                            <p class="text-dark">Halaman yang Anda cari tidak ditemukan. </p>
                            <a href="<?php bloginfo('url'); ?>" class="btn btn-dark btn-rounded btn-icon-right">Kembali ke Home<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->
  

<?php get_footer(); ?>