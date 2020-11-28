<?php
get_header();
?>
<?php
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
      <h1>Galeri <?php the_title(); ?></h1>
    </div>
  </div>
</section>
<!-- Page Content -->
<section id="page-content" class="sidebar-right">
  <div class="container">
    <div class="row">
      <!-- content -->
      <div class="content col-lg-12">

        <div class="container">
          <!-- Gallery -->
          <div class="grid-layout grid-3-columns" data-margin="20" data-item="grid-item" data-lightbox="gallery">
            <?php
            $images = acf_photo_gallery('pilih_foto', $post->ID);
            if (count($images)) :
              //Cool, we got some data so now let's loop over it
              foreach ($images as $image) :
                $id = $image['id']; // The attachment id of the media
                $title = $image['title']; //The title
                $caption = $image['caption']; //The caption
                $full_image_url = $image['full_image_url']; //Full size image url
                $full_image_url_resize = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
                $thumbnail_image_url = $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                $url = $image['url']; //Goto any link when clicked
                $target = $image['target']; //Open normal or new tab
                $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
            ?>
                <div class="grid-item">
                  <a class="image-hover-zoom" href="<?php echo $full_image_url; ?>" data-lightbox="gallery-image">
                    <img src="<?php echo $full_image_url_resize; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                  </a>
                </div>



            <?php endforeach;
            endif; ?>

          </div>
          <!-- end: Gallery -->
        </div>

        <!-- Footer -->

      </div>
      <!-- end: content -->
      <!-- Sidebar-->
      <?php// get_sidebar(); ?>
      <!-- end: Sidebar-->
    </div>
  </div>
</section>
<!-- end: Page Content -->
<!-- Footer -->
<?php
get_footer();
?>