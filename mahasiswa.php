<?php /* Template Name: Mahasiswa */ ?>
<?php
get_header();
include('inc/heading.php');
?>

<!-- Pilih Layanan -->
<section>
    <div class="container">

        <div class="tabs tabs-vertical">
            <div class="row no-gutters mx-auto">
                <div class="col-lg-6 pb-3">
                    <ul class="nav flex-column nav-tabs" id="myTab4" role="tablist" aria-orientation="vertical">
                        <li class="nav-item nav-pills-custom">
                            <a class="nav-link active text-bold py-3 h3" id="home-tab" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true"><?php echo get_field('jenis_layanan_1') ?></a>
                        </li>
                        <li class="nav-item nav-pills-custom">
                            <a class="nav-link text-bold py-3 h3" id="profile-tab" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false"><?php echo get_field('jenis_layanan_2') ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 layanan-tabs">
                    <div class="p-5 shadow">
                        <div class="tab-content" id="v-pills-tabContent">
                        </div>
                        <div class="tab-content p-30" id="myTabContent4">
                            <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab">
                                <p class="h3 text-bold text-danger">Pilih Layanan</p>
                                <?php
                                $layanan = get_field('keterangan_layanan_1');
                                $layanan2 = get_field('keterangan_layanan_2');
                                if ($layanan) { ?>
                                    <?php
                                    foreach ($layanan as $post) :
                                    ?>
                                        <a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a><br>
                                    <?php endforeach; ?>
                                    <?php
                                    wp_reset_postdata(); ?>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab">
                                <p class="h3 text-bold text-danger">Pilih Layanan</p>

                                <?php if ($layanan2) { ?>
                                    <?php
                                    foreach ($layanan2 as $post2) :
                                    ?>
                                        <a href="<?php echo get_the_permalink($post2->ID); ?>"><?php echo get_the_title($post2->ID); ?></a><br>
                                    <?php endforeach; ?>
                                    <?php
                                    wp_reset_postdata(); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Pilih Layanan -->

<!-- BLOG -->
<section class="content">
    <div class="container">
        <div class="heading-text heading-section">
            <h3>Berita</h3>
        </div>
        <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item">
            <?php the_berita(get_field('berita')); ?>
        </div>
    </div>
</section>
<!-- end: BLOG -->

<!-- Footer -->
<?php
get_footer();
?>