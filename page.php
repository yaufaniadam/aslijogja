<?php

get_header();

if (has_post_thumbnail()) {
    $bg_title = get_the_post_thumbnail_url($post->ID, 'full');
} else {
    $bg_title = get_bloginfo('template_directory') . "/images/bg-ip.jpg";
} ?>
<!-- Page title -->
<section data-bg-parallax="<?php echo $bg_title; ?>">
    <div class="bg-overlay" data-style="13"></div>
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