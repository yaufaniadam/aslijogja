<?php get_header(); ?>

<!-- Start of Main -->
<main class="main mb-10 pb-1">
  <nav class="breadcrumb-nav container">
    <ul class="breadcrumb bb-no">
      <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
      <li>Produk</li>
    </ul>

  </nav>

  <!-- Start of Page Content -->
  <div class="page-content">
    <div class="container">
      <div class="row gutter-lg">
        <div class="main-content">

          <?php
          while (have_posts()) : the_post();
            $post_id = get_the_ID();
          ?>

            <div class="product product-single row mb-2">
              <div class="col-md-6 mb-4 mb-md-8">
                <div class="product-gallery product-gallery-sticky">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                  } else {
                  ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/noimage-large.jpg" alt="<?php the_title(); ?>">
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="col-md-6 mb-6 mb-md-8">
                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                  <h1 class="product-title"><?php the_title(); ?></h1>
                  <div class="product-bm-wrapper">
                    <?php /* untuk statistik view */ setPostViews(get_the_ID()); ?>
                    <?php
                    $author_id = get_the_author_meta('ID');
                    $mitra  = get_mitra_byauthor($author_id);

                    $featured_img_url = get_the_post_thumbnail_url($mitra[0]->ID, 'thumbnail');
                    ?>

                    <figure class="brand">
                      <a href="<?php echo get_bloginfo('url') . "/mitra-umkm/" . $mitra[0]->post_name; ?>">
                        <?php if ($featured_img_url) { ?>
                          <img src="<?php echo $featured_img_url; ?>" alt="Brand" width="60" height="60" />
                        <?php } else { ?>
                          <img src="<?php bloginfo('template_url'); ?>/assets/images/noimage-thumb.jpg" alt="Brand" width="40" height="40" />
                        <?php } ?>
                      </a>
                    </figure>
                    <div class=" product-meta">
                      <div class="product-categories">
                        Kategori:
                        <?php
                        $taxo = get_the_terms(get_the_ID(), 'kat_produk');
                        if ($taxo) {
                          foreach ($taxo as $tax) {
                            echo  '<a href="' . get_bloginfo('url') . '/produk-kategori/' . __($tax->slug) . '">' . __($tax->name) . '</a>';
                          }
                        }
                        ?>

                      </div>
                      <div class="product-sku">
                        SKU: <span><?php echo get_field('sku'); ?></span>
                      </div>
                      <div class="product-sku mt-2">
                        Dilihat: <span><?php echo number_format(getPostViews(get_the_ID())); ?>x</span>
                      </div>
                    </div>
                  </div>

                  <hr class="product-divider">

                  <div class="product-price">
                    <ins class="new-price">Rp<?php echo number_format(get_field('harga')); ?></ins>
                  </div>


                  <div class="product-short-desc">
                    <?php echo get_field('deskripsi'); ?>
                  </div>

                  <hr class="product-divider">

                  <div class="fix-bottom product-sticky-content sticky-content">
                    <div class="product-form container">
                      <?php $wa = get_field('kontak', $mitra[0]->ID); ?>

                      <a target="_blank" href="https://wa.me/<?php echo ubah_telp($wa['whatsapp']); ?>" title="Klik untuk menghubungi via Whatsapp" class="btn btn-primary btn-cart">

                        <i class="fab fa-whatsapp"></i>
                        <span>Hubungi Penjual</span>
                      </a>
                    </div>
                  </div>

                  <!-- Social share di sini -->
                </div>
              </div>
            </div>
            <!-- <section class="description-section">
              <div class="title-link-wrapper no-link">
                <h2 class="title title-link">Description</h2>
              </div>
              <div class="pt-4 pb-1" id="product-tab-description">
                <div class="row">
                  <div class="col-md-6">
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt arcu cursus vitae congue mauris.
                      Sagittis id consectetur purus ut. Tellus rutrum tellus pelle Vel
                      pretium lectus quam id leo in vitae turpis massa.</p>
                    <ul class="list-type-check list-style-none pl-0">
                      <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit.
                      </li>
                      <li>Vivamus finibus vel mauris ut vehicula.</li>
                      <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                      <li>Ultrices eros in cursus turpis massa tincidunt ante in nibh mauris.
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-6 mt-2">
                    <div class="banner banner-video product-video br-xs">
                      <figure class="banner-media">
                        <a href="#">
                          <img src="<?php bloginfo('template_url'); ?>/assets/images/products/video-banner-610x300.jpg" alt="banner" width="610" height="300" style="background-color: #bebebe;">
                        </a>
                        <a class="btn-play-video btn-iframe" href="<?php bloginfo('template_url'); ?>/assets/video/memory-of-a-woman.mp4"></a>
                      </figure>
                    </div>
                  </div>
                </div>

              </div>
            </section> -->
          <?php
          endwhile;
          ?>


          <section class="vendor-product-section">
            <div class="title-link-wrapper mb-4">
              <h4 class="title text-left">Produk Lainnya dari <?php echo $mitra[0]->post_title; ?> </h4>
              <a href="<?php echo get_bloginfo('url') . '/mitra/' . $mitra[0]->post_name; ?>" class="btn btn-dark btn-link btn-slide-right btn-icon-right">Lihat lebih banyak<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2" data-owl-options="{
                                    'nav': false,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '768': {
                                            'items': 4
                                        },
                                        '992': {
                                            'items': 3
                                        }
                                    }
                                }">

              <?php
              $args = array(
                'post_status'   => 'publish',
                'post_type'     => 'produk',
                'author'     => $author_id,
                'orderby'     => 'rand',
                'posts_per_page' => 4,
                'post__not_in' => [$post_id],
              );

              $the_query = null;
              $the_query = new WP_Query();
              $the_query->query($args);

              while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="product">
                  <figure class="product-media">
                    <figure class="product-media">
                      <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail('small');
                        } else {
                        ?>
                          <img src="<?php bloginfo('template_directory'); ?>/assets/images/noimage-small.jpg" width="280" height="180" alt="<?php the_title(); ?>">
                        <?php
                        }
                        ?>
                      </a>
                    </figure>
                  </figure>
                  <div class="product-details">
                    <div class="product-cat">
                      <?php
                      $taxo = get_the_terms(get_the_ID(), 'kat_produk');
                      if ($taxo) {

                        foreach ($taxo as $tax) {
                          echo  '<a href="' . get_bloginfo('url') . '/produk-kategori/' . __($tax->slug) . '">' . __($tax->name) . '</a> ';
                        }
                      }
                      ?>
                    </div>
                    <h4 class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>

                    <div class="product-pa-wrapper">
                      <div class="product-price">Rp<?php echo number_format(get_field('harga', get_the_ID())); ?></div>
                    </div>
                  </div>
                </div>
              <?php
              endwhile;  ?>
            </div>
          </section>
        </div>
        <!-- End of Main Content -->
        <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
          <div class="sidebar-overlay"></div>
          <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
          <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
          <div class="sidebar-content scrollable">
            <div class="sticky-sidebar">

              <!-- <div class="widget widget-banner mb-9">
                <div class="banner banner-fixed br-sm">
                  <figure>
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/shop/banner3.jpg" alt="Banner" width="266" height="220" style="background-color: #1D2D44;" />
                  </figure>
                  <div class="banner-content">
                    <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                      40<sup class="font-weight-bold">%</sup><sub class="font-weight-bold text-uppercase ls-25">Off</sub>
                    </div>
                    <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                      Ultimate Sale</h4>
                  </div>
                </div>
              </div> -->
              <!-- End of Widget Banner -->

              <?php produk_sidebar('', '8'); ?>
            </div>
          </div>
        </aside>
        <!-- End of Sidebar -->
      </div>
    </div>
  </div>
  <!-- End of Page Content -->
</main>
<!-- End of Main -->

<?php get_footer(); ?>