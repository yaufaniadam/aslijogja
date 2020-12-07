<?php /* Template Name: Mahasiswa */ ?>
<?php
get_header();
include('inc/heading.php');
?>



<!-- Kisah Kami -->
<section class="content">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;">Mahasiswa</h3>
        </div>
        <div class="row icon-boxes">

            <?php
            $layanan = get_field('keterangan_layanan_1');
            if ($layanan) { ?>
                <?php
                foreach ($layanan as $post) :
                ?>

                    <div class="icon-boxx col-md-4 col-6">
                        <img width="60" height="60" src="<?php echo get_field('icon', $post->ID) ?>">
                        <div class="icon-box-content">
                            <a href="<?php echo get_the_permalink($post->ID); ?>">
                                <h3><?php echo get_the_title($post->ID); ?></h3>
                            </a>
                            <p class="pb-5"><?php echo excerpt('15') ?></p>
                        </div>
                    </div>

                <?php endforeach; ?>
                <?php
                wp_reset_postdata(); ?>
            <?php } ?>


        </div>
    </div>
</section>

<!-- Kisah Kami -->
<section class="content">
    <div class="container">
        <div class="heading-text heading-section">
            <h3 style="font-weight: bold;">Dosen</h3>
        </div>
        <div class="row icon-boxes">

            <?php
            $layanan2 = get_field('keterangan_layanan_2');
            if ($layanan2) { ?>
                <?php
                foreach ($layanan2 as $post) :
                ?>

                    <div class="icon-boxx col-md-4 col-6">
                        <img width="60" height="60" src="<?php echo get_field('icon', $post->ID) ?>">
                        <div class="icon-box-content">
                            <a href="<?php echo get_the_permalink($post->ID); ?>">
                                <h3><?php echo get_the_title($post->ID); ?></h3>
                            </a>
                            <p class="pb-3"><?php echo excerpt('15') ?></p>
                            <a href="<?php echo get_the_permalink($post->ID); ?>">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>
                <?php
                wp_reset_postdata(); ?>
            <?php } ?>


        </div>
    </div>

</section>



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