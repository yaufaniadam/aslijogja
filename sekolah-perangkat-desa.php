<?php /* Template Name: Sekolah Perangkat Desa*/ ?>
<?php
get_header();
include('inc/heading.php');
?>

<!-- Tentang Sekolah Perangkat Desa -->
<section style="background-color: #F8F8F8;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('tentang_sekolah_perangkat_desa') ?></h3>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php echo get_field('deskripsi_tentang_sekolah_1') ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php echo get_field('deskripsi_tentang_sekolah_2') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Tentang Sekolah Perangkat Desa -->

<!-- Urgensi -->
<section>
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_urgensi') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php echo get_field('deskripsi_urgensi') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Urgensi -->

<!-- Tujuan Kami -->
<section style="background-color: #F8F8F8;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_tujuan') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('tujuan_1') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Tujuan Kami -->

<!-- Kenapa Harus Lab IP -->
<section class="background-green">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 class="text-white" style="font-weight: bold;"><?php echo get_field('judul_kenapa_harus_kami') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('kenapa_1') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('kenapa_2') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('kenapa_3') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('kenapa_4') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('kenapa_5') ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('kenapa_6') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: Kenapa Harus Lab IP -->

<!-- Accordion -->
<section>
    <div class="container">
        <div class="row">
            <div class="content col-lg">
                <!-- Accordion -->
                <div class="heading-text heading-section">
                    <h3 style="font-weight: bold;"><?php echo get_field('judul_kelas') ?></h3>
                </div>
                <div class="accordion">
                    <div class="ac-item">
                        <h4 class="ac-title"><?php echo get_field('kelas_1') ?></h4>
                        <div class="ac-content">
                            <?php echo get_field('deskripsi_kelas_1') ?>
                        </div>
                    </div>
                    <div class="ac-item">
                        <h4 class="ac-title"><?php echo get_field('kelas_2') ?></h4>
                        <div class="ac-content">
                            <?php echo get_field('deskripsi_kelas_2') ?>
                        </div>
                    </div>
                    <div class="ac-item">
                        <h4 class="ac-title"><?php echo get_field('kelas_3') ?></h4>
                        <div class="ac-content">
                            <?php echo get_field('deskripsi_kelas_3') ?>
                        </div>
                    </div>
                    <div class="ac-item">
                        <h4 class="ac-title"><?php echo get_field('kelas_4') ?></h4>
                        <div class="ac-content">
                            <?php echo get_field('deskripsi_kelas_4') ?>
                        </div>
                    </div>
                    <div class="ac-item">
                        <h4 class="ac-title"><?php echo get_field('kelas_5') ?></h4>
                        <div class="ac-content">
                            <?php echo get_field('deskripsi_kelas_5') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Accordion -->

<!-- Penawaran -->
<section>
    <div class="container">
        <!-- Pricing Table -->
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_penawaran_kami') ?></h3>
        </div>
        <div class="row pricing-table pt-5">
            <div class="col-lg-4 col-md-12 col-12">
                <div class="plan">
                    <div class="plan-header" style="padding-bottom: 0px;">
                        <h4><?php echo get_field('paket_a') ?></h4>
                        <p class="text-muted"><?php echo get_field('deskripsi_paket_a') ?></p>
                        <h4 class="plan-price" style="font-size: 40px;"><sup>Rp.</sup><?php echo get_field('harga_paket_a') ?></h4>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('pesertakelas_a') ?></p>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('waktu_paket_a') ?></p>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('lokasi_paket_a') ?></p>
                    </div>
                    <div class="plan-list" style="padding-bottom: 20px;">
                        <div class="text-left mx-5" style=" padding-bottom: 20px; border-bottom: 1px solid #f8f8f8;">
                            <?php echo get_field('fasilitas_paket_a') ?>
                        </div>
                    </div>
                    <div class="plan-header pt-0 pb-4">
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('lokasi_paket_a') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="plan featured">
                    <div class="plan-header" style="padding-bottom: 0px;">
                        <h4><?php echo get_field('paket_b') ?></h4>
                        <p class="text-muted"><?php echo get_field('deskripsi_paket_b') ?></p>
                        <h4 class="plan-price" style="font-size: 40px;"><sup>Rp.</sup><?php echo get_field('harga_paket_b') ?></h4>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('pesertakelas_b') ?></p>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('waktu_paket_b') ?></p>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('lokasi_paket_b') ?></p>
                    </div>
                    <div class="plan-list" style="padding-bottom: 20px;">
                        <div class="text-left mx-5" style=" padding-bottom: 20px; border-bottom: 1px solid #f8f8f8;">
                            <?php echo get_field('fasilitas_paket_b') ?>
                        </div>
                    </div>
                    <div class="plan-header pt-0 pb-4">
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('lokasi_paket_b') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="plan">
                    <div class="plan-header" style="padding-bottom: 0px;">
                        <h4><?php echo get_field('paket_c') ?></h4>
                        <p class="text-muted"><?php echo get_field('deskripsi_paket_c') ?></p>
                        <h4 class="plan-price" style="font-size: 40px;"><sup>Rp.</sup><?php echo get_field('harga_paket_c') ?></h4>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('pesertakelas_c') ?></p>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('waktu_paket_c') ?></p>
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('lokasi_paket_c') ?></p>
                    </div>
                    <div class="plan-list" style="padding-bottom: 20px;">
                        <div class="text-left mx-5" style=" padding-bottom: 20px; border-bottom: 1px solid #f8f8f8;">
                            <?php echo get_field('fasilitas_paket_c') ?>
                        </div>
                    </div>
                    <div class="plan-header pt-0 pb-4">
                        <p style="border-bottom: 1px solid #f8f8f8; padding-bottom: 20px;"><?php echo get_field('lokasi_paket_c') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Pricing Table -->
    </div>
</section>
<!-- End Penawaran -->

<!-- Mitra Kami -->
<section>
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php echo get_field('judul_mitra') ?></h3>
            <span class="lead"><?php echo get_field('deskripsi_mitra') ?></span>
        </div>
        <!--Gallery Carousel -->
        <?php

        mitra(get_field('mitra'));

        ?>
    </div>
</section>
<!-- end: Mitra Kami -->

<!-- Testimonial Carousel -->
<section style="background: #FEBD0E; padding: 40px 0;">
    <div class="container pb-5">
        <div class="heading-text heading-section">
            <h3><?php the_field('judul_testimoni') ?></h3>
            <span class="lead"><?php the_field('deskripsi_testimoni') ?></span>
        </div>
        <!-- Testimonials -->
        <?php the_testimoni(get_field('testimony_cats')) ?>
</section>
<!-- end: Testimonial -->

<!--call-to-action dark -->
<div style="background: #065139;" class="call-to-action p-t-100 p-b-100  mb-0">
    <div class="container">
        <div class="row text-white">
            <div class="col-lg-10">
                <h3>
                    <?php the_field('daftar_1') ?>
                </h3>
                <p>
                    <?php the_field('daftar_2') ?>
                </p>
            </div>
            <div class="col-lg-2"><a class="btn background-yellow border-0" href="<?php the_field('link_button') ?>"><?php the_field('tulisan_button') ?></a></div>
        </div>
    </div>
</div>
<!--end: call-to-action dark -->
<!-- Sukses Story -->
<section style="background-color: #F8F8F8;">
    <div class="container pb-5">
        <div class="heading-text heading-section text-black">
            <h3><?php the_field('judul_sukses') ?></h3>
        </div>
        <?php the_suksesstory(get_field('success_story_cat')) ?>
    </div>
</section>
<!-- End: Sukses Story -->
<!-- BLOG -->
<section class="content">
    <div class="container">
        <div class="heading-text heading-section">
            <h3><?php the_field('judul_berita') ?></h3>
        </div>
        <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item">
            <?php the_berita(get_field('berita-sekolah')); ?>
        </div>
    </div>
</section>
<!-- end: BLOG -->
<!-- Footer -->
<?php
get_footer();
?>