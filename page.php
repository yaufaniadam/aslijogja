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
<section>
    <div class="container">
    <?php the_content(); ?>
    </div>
</section>
<!-- end: FULL WIDTH PAGE -->
<!-- Footer -->
<?php
get_footer();
?>