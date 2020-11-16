<?php /* Template Name: Mitra */ ?>

<?php
get_header();
?>
<!-- SECTION IMAGE FULLSCREEN -->

<?php
$layanan = get_field('layanan');
if ($layanan) : ?>
    <?php $i = 1;
    foreach ($layanan as $post) :
    ?>
        <div class="row d-flex <?php echo ($i % 2 == 0) ? "flex-row-reverse" : '' ?> ">
            <div class="col-lg-6 mx-0 px-0" style="background-image:url(<?php echo get_field('pd_gambar_heading', $post->ID) ?>); background-size: cover; background-position: center center;">

            </div>

            <div class="col-lg-6 mx-0 px-0">
                <section class="fullscreen <?php echo ($i % 2 == 0) ? "text-right" : '' ?>" style="<?php echo ($i % 2 == 0) ? "background:#ffffffe8" : '' ?>">
                    <div class="">
                        <div class="col-10 ml-5 mt-5 text-black">
                            <h2 class="margin-bottom-0">
                                <?php echo get_the_title($post->ID); ?>
                            </h2>
                            <p>
                                <?php echo get_field('pd_deskripsi_heading', $post->ID); ?>
                            </p>
                            <div data-animate="fadeInUp" data-animate-delay="900"></div>
                            <a href="<?php echo get_the_permalink($post->ID); ?>" class="btn <?php echo ($i % 2 == 0) ? "background-yellow" : 'background-green' ?> border-0">Selengkapnya</a>
                        </div>
                    </div>
                </section>
            </div>
            <?php if ($i == 1) : ?>
                <?php wp_reset_query(); ?>
                <!-- Mitra Kami -->
                <section>
                    <div class="container">
                        <div class="heading-text heading-section container">
                            <h3>
                                <?php echo get_field('judul_mitra') ?>
                            </h3>
                            <span class="lead">
                                <?php echo get_field('keterangan_mitra') ?>
                            </span>
                        </div>
                        <?php the_mitra() ?>
                    </div>
                </section>


                <!-- end: Mitra Kami -->
            <?php endif; ?>
        </div>

    <?php $i++;
    endforeach; ?>
    <?php
    wp_reset_postdata(); ?>
<?php endif; ?>
<!-- end: SECTION IMAGE FULLSCREEN -->
<!-- Testimonial Carousel -->
<section style="background: #FEBD0E; padding: 40px 0;">
    <div class="container">
        <div class="heading-text heading-section">
            <h3>
                <?php the_field('mitra_judul_testimoni') ?>
            </h3>
            <span class="lead"><?php the_field('mitra_deskripsi_testimoni') ?></span>
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
<section class="content">
    <div class="container">
        <div class="heading-text heading-section">
            <h3>
                <?php the_field('mitra_judul_berita') ?>
            </h3>
        </div>
        <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item">
            <?php the_berita(get_field('mitra_berita')); ?>
        </div>
    </div>
</section>
<!-- end: BLOG -->
<!-- Footer -->
<?php
get_footer();
?>