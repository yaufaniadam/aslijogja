<?php /* Template Name: CSR*/ ?>
<?php
get_header();
?>

<!-- SECTION IMAGE FULLSCREEN -->
<div class="row" style="background-image:url(<?php echo get_field('gambar_1') ?>); background-size: cover; background-position: center center;">
    <div class="col-lg-6 mx-0 px-0">
    </div>
    <div class="col-lg-6 mx-0 px-0">
        <section class="fullscreen background-yellow">
            <div class="">
                <div class="col-10 ml-5 mt-5 text-black">
                    <h2 class="margin-bottom-0">
                        <?php echo get_field('judul_1') ?>
                    </h2>
                    <p>
                        <?php echo get_field('keterangan_1') ?>
                    </p>
                    <div data-animate="fadeInUp" data-animate-delay="900"></div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- end: SECTION IMAGE FULLSCREEN -->

<!-- Layanan -->
<section style="background-color: #FCFCFC;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_layanan') ?></h3>
            <span class="lead"><?php echo get_field('keterangan_layanan') ?></span>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('layanan_1') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('layanan_2') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('layanan_3') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('layanan_4') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('layanan_5') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('layanan_6') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: PORTFOLIO -->

<!-- BLOG -->
<section class="content">
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php echo get_field('judul_judul_berita') ?></h3>
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