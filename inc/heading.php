<!-- SECTION IMAGE FULLSCREEN -->
<div class="row no-gutters full-top-image-header" data-height-xs="360" style="background-image:url(<?php echo get_field('gambar_heading') ?>);background-size: cover; background-position: left bottom;">
  <div class="offset-md-6 col-lg-6 bg-white-9">
    <div class="inspiro-slider">
      <div class="d-flex justify-content-start align-items-end align-items-md-start container container-slider-text">
        <div class="slider-text dark ml-md-5 ml-0">
          <?php if (get_field('show_title') == 1) { ?>
            <h5 class="margin-bottom-0">
              <?php the_title() ?>
            </h5>
          <?php } ?>
          <h2 class="margin-bottom-0">
            <?php the_field('judul_heading') ?>
          </h2>
          <p style="font-family: 'Poppins', sans-serif;">
            <?php the_field('deskripsi_heading') ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end: SECTION IMAGE FULLSCREEN -->