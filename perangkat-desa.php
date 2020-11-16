<?php /* Template Name: Perangkat Desa */ ?>
<?php
get_header();
?>
<!-- SECTION IMAGE FULLSCREEN -->
<div class="row" style="background-image:url(<?php the_field('pd_gambar_heading') ?>); background-size: cover; background-position: center center;">
    <div class="col-lg-6 mx-0 px-0">

    </div>

    <div class="col-lg-6 mx-0 px-0">
        <section class="fullscreen background-yellow">
            <div class="">
                <div class="col-10 ml-5 mt-5 text-black">
                    <h2 class="margin-bottom-0">
                        <?php the_field('pd_judul_heading') ?>
                    </h2>
                    <p>
                        <?php the_field('pd_deskripsi_heading') ?>
                    </p>
                    <div data-animate="fadeInUp" data-animate-delay="900"></div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- end: SECTION IMAGE FULLSCREEN -->
<!-- Tentang -->
<section style="background-color: #F8F8F8;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php the_field('tentang_seleksi_perangkat_desa') ?></h3>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php the_field('tentang_1') ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php the_field('tentang_2') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: Tentang -->
<!-- Urgensi -->
<section>
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php the_field('judul_urgensi') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php the_field('deskripsi_urgensi_1') ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php the_field('deskripsi_urgensi_2') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: Urgensi -->
<!-- Sukses Story -->
<section style="background-color: #F8F8F8;">
    <div class="container pb-5">
        <div class="heading-text heading-section text-black">
            <h3><?php the_field('judul_sukses_story') ?></h3>
        </div>
        <?php the_suksesstory() ?>
    </div>
</section>
<!-- End: Sukses Story -->
<!-- Mengapa Kami -->
<section style="background: #065139;">
    <div class="container">
        <div class="heading-text heading-section text-white">
            <h3><?php the_field('judul_mengapa_kami') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <h4 style="font-weight: normal; color: #FEBD0E;"><?php the_field('judul_mengapa_kami_1') ?></h4>
                    <p class="text-white"><?php the_field('deskripsi_mengapa_kami_1') ?></p>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <h4 style="font-weight: normal; color: #FEBD0E;"><?php the_field('judul_mengapa_kami_2') ?></h4>
                    <p class="text-white"><?php the_field('deskripsi_mengapa_kami_2') ?></p>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <h4 style="font-weight: normal; color: #FEBD0E;"><?php the_field('judul_mengapa_kami_3') ?></h4>
                    <p class="text-white"><?php the_field('deskripsi_mengapa_kami_3') ?></p>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <h4 style="font-weight: normal; color: #FEBD0E;"><?php the_field('judul_mengapa_kami_4') ?></h4>
                    <p class="text-white"><?php the_field('deskripsi_mengapa_kami_4') ?></p>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <h4 style="font-weight: normal; color: #FEBD0E;"><?php the_field('judul_mengapa_kami_5') ?></h4>
                    <p class="text-white"><?php the_field('deskripsi_mengapa_kami_5') ?></p>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <h4 style="font-weight: normal; color: #FEBD0E;"><?php the_field('judul_mengapa_kami_6') ?></h4>
                    <p class="text-white"><?php the_field('deskripsi_mengapa_kami_6') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: Mengapa Kami -->
<!-- Mitra Kami -->
<section>
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php echo get_field('pd_judul_mitra') ?></h3>
            <span class="lead"><?php echo get_field('pd_deskripsi_mitra') ?></span>
        </div>
        <!--Gallery Carousel -->
        <?php

        the_mitra();

        ?>
    </div>
</section>
<!-- end: Mitra Kami -->
<!-- Testimonial Carousel -->
<section style="background: #FEBD0E; padding: 40px 0;">
    <div class="container pb-5">
        <div class="heading-text heading-section">
            <h3><?php the_field('pd_judul_testimoni') ?></h3>
            <span class="lead"><?php the_field('pd_deskripsi_testimoni') ?></span>
        </div>
        <!-- Testimonials -->
        <?php the_testimoni() ?>
</section>
<!-- end: Testimonial -->
<!--call-to-action dark -->
<div style="background: #065139;" class="call-to-action p-t-100 p-b-100  mb-0">
    <div class="container">
        <div class="row text-white">
            <div class="col-lg-10">
                <h3>
                    <?php the_field('pd_judul_call_us') ?>
                </h3>
                <p>
                    <?php the_field('pd_deskripsi_call_us') ?>
                </p>
            </div>
            <div class="col-lg-2"><a class="btn background-yellow border-0" href="<?php the_field('pd_link_button_call_us') ?>"><?php the_field('pd_button_call_us') ?></a></div>
        </div>
    </div>
</div>
<!--end: call-to-action dark -->
<!-- BLOG -->
<!-- BLOG -->
<section class="content">
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php the_field('pd_judul_berita') ?></h3>
        </div>
        <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item">
            <?php the_berita(get_field('berita')); ?>
        </div>
    </div>
</section>
<!-- end: BLOG -->
<!-- end: BLOG -->
<!-- Footer -->
<?php
get_footer();
?>