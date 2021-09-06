<?php 

    $kolom_sisi = get_field('kolom_sisi');

?>

<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0"><?php the_title(); ?></h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="<?php echo get_bloginfo('url'); ?>">Home</a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-8 <?php echo ($kolom_sisi !=1) ? "adas" : "offset-md-2"; ?>">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content post-single-content">
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <div class="post post-grid post-single">
                            <div class="post-details">                               
                                <div class="post-content">
                                    <?php echo the_content(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- End Post -->               


                    <?php endwhile; ?>

                </div>
                <!-- End of Main Content -->
                <?php 

                if($kolom_sisi !=1) {
                    get_sidebar(); 
                }
                ?>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->