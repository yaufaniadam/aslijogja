<?php /* Template Name: Tentang Kami*/ ?>
<?php
get_header();
include('inc/heading.php');
?>

<!-- Tentang Kami -->
<section style="background-color: #FCFCFC;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_tentang_kami') ?></h3>
            <span class="lead"><?php echo get_field('keterangan_layanan') ?> </span>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php echo get_field('deskripsi_judul_kami') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Tentang Kami -->

<!-- Kisah Kami -->
<section style="background-color:#ececec;padding-bottom:100px;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_kisah_kami') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <p><?php echo get_field('deskripsi_kisah_kami') ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-divider" data-style="3" data-height="120"></div>
</section>
<!-- END Kisah Kami -->

<!-- Visi Misi -->
<section style="background-color: #FCFCFC;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_visi_misi') ?></h3>
        </div>
        <div class="row">
            <div class="col-lg-6 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('visi') ?>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <?php echo get_field('misi') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Visi Misi -->

<!-- Tim Lab -->
<section>
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;"><?php echo get_field('judul_tim_lab') ?></h3>
        </div>
        <div class="row team-members m-b-40 my-5 mx-5">
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image">
                        <img src="<?php echo get_field('foto_tim_1') ?>">
                    </div>
                    <div class="team-desc">
                        <h3><?php echo get_field('nama_tim_1') ?></h3>
                        <span><?php echo get_field('jabatan_tim_1') ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image">
                        <img src="<?php echo get_field('foto_tim_2') ?>">
                    </div>
                    <div class="team-desc">
                        <h3><?php echo get_field('nama_tim_2') ?></h3>
                        <span><?php echo get_field('jabatan_tim_2') ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image">
                        <img src="<?php echo get_field('foto_tim_3') ?>">
                    </div>
                    <div class="team-desc">
                        <h3><?php echo get_field('nama_tim_3') ?></h3>
                        <span><?php echo get_field('jabatan_tim_3') ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image">
                        <img src="<?php echo get_field('foto_tim_4') ?>">
                    </div>
                    <div class="team-desc">
                        <h3><?php echo get_field('nama_tim_4') ?></h3>
                        <span><?php echo get_field('jabatan_tim_4') ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image">
                        <img src="<?php echo get_field('foto_tim_5') ?>">
                    </div>
                    <div class="team-desc">
                        <h3><?php echo get_field('nama_tim_5') ?></h3>
                        <span><?php echo get_field('jabatan_tim_5') ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image">
                        <img src="<?php echo get_field('foto_tim_6') ?>">
                    </div>
                    <div class="team-desc">
                        <h3><?php echo get_field('nama_tim_6') ?></h3>
                        <span><?php echo get_field('jabatan_tim_6') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Tim Lab -->

<!-- Footer -->
<?php
get_footer();
?>