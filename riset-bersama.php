<?php /* Template Name: Riset Bersama*/ ?>
<?php
get_header();
?>

<!-- SECTION IMAGE FULLSCREEN -->
<div class="row" style="background-image:url(<?php echo get_field('foto_heading') ?>); background-size: cover; background-position: center center;">
    <div class="col-lg-6 mx-0 px-0">
    </div>
    <div class="col-lg-6 mx-0 px-0">
        <section class="fullscreen background-yellow">
            <div class="">
                <div class="col-10 ml-5 mt-5 text-black">
                    <h2 class="margin-bottom-0">
                        <?php echo get_field('judul_heading') ?>
                    </h2>
                    <p>
                        <?php echo get_field('deskripsi_heading') ?>
                    </p>
                    <div data-animate="fadeInUp" data-animate-delay="900"></div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- end: SECTION IMAGE FULLSCREEN -->

<!-- Tentang Riset Bersama -->
<section style="background-color: #FCFCFC;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_tentang') ?></h3>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div  data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php echo get_field('deskripsi_tentang') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Tentang Riset Bersama -->

<!-- Tim Peneliti -->
<section>
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_peneliti') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('peneliti_1') ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <div class="lead" style="font-size: 20px;"><?php echo get_field('peneliti_2') ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Tim Peneliti -->

<!-- Tentang Riset Bersama -->
<section style="background-color: #FCFCFC;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php echo get_field('judul_produk_riset') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php echo get_field('produk_riset') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Tentang Riset Bersama -->

<!-- BLOG -->
<section class="content">
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php echo get_field('judul_berita') ?></h3>
        </div>
        <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item">
            <?php the_berita(); ?>
        </div>
    </div>
</section>
<!-- end: BLOG -->

<!-- Footer -->
<?php
get_footer();
?>