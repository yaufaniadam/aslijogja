<!-- Start of Main -->
<main class="main umkm">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Forum Diskusi</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Page Content -->
    <div class="page-content mb-8 pt-5 pb-5">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content post-single-content">
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <div class="post post-grid post-single">
                                                     
                                <div class="post-content">
                                    <?php echo the_content(); ?>
                                </div>
                           
                        </div>
                        <!-- End Post -->               


                    <?php endwhile; ?>

                </div>
                <!-- End of Main Content -->
                <?php get_sidebar('forum'); ?>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->