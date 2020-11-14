<?php /* Template Name: Kontak */ ?>
<?php

get_header();

?>
<!-- Page title -->
<section data-bg-parallax="<?php the_field('foto_background_kontak') ?>" style="padding-top: 160px; padding-bottom: 160px;">
    <div class="container">
        <div class="page-title text-center text-light">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</section>
<!-- end: Page title -->
<!-- FULL WIDTH PAGE -->
<!-- CONTENT -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
            <div class="heading-text heading-section">
            <h3 class="text-uppercase"><?php the_field('kontak_judul') ?></h3>
            </div>
                <p><?php the_field('kontak_deskripsi') ?></p>
                <div class="m-t-30 mb-5">
                <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="heading-text heading-section">
            <h3 class="text-uppercase"><?php the_field('kontak_alamat') ?></h3>
            </div>
                <div class="row">
                    <div class="col-lg-6">
                        <address>
                            <strong><?php the_field('judul_alamat_1') ?></strong><br>
                            <?php the_field('deskripsi_alamat_1') ?>
                        </address>
                    </div>
                    <div class="col-lg-6">
                        <address>
                        <strong><?php the_field('judul_alamat_2') ?></strong><br>
                            <?php the_field('deskripsi_alamat_2') ?>
                        </address>
                    </div>
                </div>
                <!-- Google Map -->
                <?php the_field('iframe_alamat') ?>
                <!-- end: Google Map -->
            </div>
        </div>
    </div>
</section> <!-- end: Content -->
<!-- end: FULL WIDTH PAGE -->
<!-- Footer -->
<?php
get_footer();
?>