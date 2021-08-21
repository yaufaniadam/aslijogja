<?php get_header();
?>
<!-- Start of Main -->
<main class="main mb-10 pb-1">
  <nav class="breadcrumb-nav container">
    <ul class="breadcrumb bb-no">
      <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
      <li>Mitra</li>
      <li><?php the_title(); ?></li>
    </ul>
  </nav>

  <!-- Start of Page Content -->
  <div class="page-content">
    <div class="container">

      <?php
      while (have_posts()) : the_post();
      $author_id = get_the_author_meta('ID');
      $foto_cover = get_field('foto_cover');
      $kontak = get_field('kontak');
      $social_media = get_field('social_media');
      $olshop = get_field('marketplace'); 
      $lokasi = get_field('lokasi_mitra');
      $mitra  = get_mitra_byauthor($author_id);
      $featured_img_url = get_the_post_thumbnail_url($mitra[0]->ID, 'thumbnail');
     
      if ($kontak) {
        $telp = $kontak['telepon'];
        $whatsapp = $kontak['whatsapp'];
        $email = $kontak['email'];
    } else{
        $telp = "";
        $whatsapp = "";
        $email = "";
    }
      
      ?>
        <div class="store store-wcfm-banner mb-10">
          <figure class="store-media">

            <?php
            if (!empty($foto_cover)) { ?>
              <a href="<?php echo $link_foto_cover; ?>" target="_blank">
                <img src="<?php echo esc_url($foto_cover['url']); ?>" alt="<?php echo esc_attr($foto_cover['alt']); ?>" />
              </a>
            <?php } else { ?>

              <img src="<?php bloginfo('template_url'); ?>/assets/images/noimage-1240.jpg" alt="<?php the_title(); ?>"  style="background-color: #ecedec;" />

            <?php } ?>
          </figure>

          <div class="store-content">
            <div class="store-content-left mr-auto">
              <div class="personal-info">
                <figure class="seller-brand">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('thumbnail');
                  } else {
                  ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/noimage-thumb.jpg" alt="<?php the_title(); ?>">
                  <?php
                  }
                  ?>
                </figure>
                <div class="ratings-container">
                  <!-- <div class="ratings-full">
                  <span class="ratings" style="width: 100%;"></span>
                  <span class="tooltiptext tooltip-top"></span>
                </div> -->
                </div>
              </div>
              <div class="address-info">
                <h4 class="store-title"><?php the_title(); ?></h4>
                <ul class="seller-info-list list-style-none">
                  <li class="store-address">
                    <i class="w-icon-map-marker"></i>
                    <?php echo get_field('alamat'); ?><br>
                  </li>
                  <li class="store-email">
                    <a href="email:#">
                      <i class="far fa-envelope"></i>
                      <?php echo $email; ?>
                    </a>
                  </li>
                  <li class="store-phone">
                    <a>
                      <i class="w-icon-phone"></i>
                      <?php echo $telp; ?>
                    </a>
                    
                
                  </li>
                  <li class="store-phone">
                  
                      <a target="_blank" href="https://wa.me/<?php echo ubah_telp($whatsapp); ?>" title="Klik untuk menghubungi via Whatsapp">
                        <i class="fab fa-whatsapp"></i>
                        <?php echo $whatsapp; ?>
                      </a>
                
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="store-content-right">
              <!-- <div class="btn btn-rounded btn-icon-left btn-inquiry"><i class="fab fa-whatsapp"></i>Hubungi Kami</div> -->
              <div class="social-icons social-icon-border-color border-thin">
                <?php if ($social_media) { ?>
                  <?php if ($social_media['facebook']) { ?>
                    <a href="<?php echo $social_media['facebook']; ?>" class="social-icon social-facebook w-icon-facebook"></a>
                  <?php }

                  if ($social_media['twitter']) { ?>
                    <a href="<?php echo $social_media['twitter']; ?>" class="social-icon social-twitter w-icon-twitter"></a>
                  <?php }
                  if ($social_media['youtube']) { ?>
                    <a href="<?php echo $social_media['youtube']; ?>" class="social-icon social-youtube w-icon-youtube"></a>
                  <?php }
                  if ($social_media['instagram']) { ?>
                    <a href="<?php echo $social_media['instagram']; ?>" class="social-icon social-instagram w-icon-instagram"></a>
                <?php }
                }
                ?>
              </div>
              <?php if (!empty($olshop['tokopedia']) || !empty($olshop['shopee']) || !empty($olshop['bukalapak']) || !empty($olshop['blibli']) || !empty($olshop['jd_id'])) { ?>
              <div class="social-icons"> <span class="text-white mr-3">Temukan kami di </span>
                
                  <?php if ($olshop['tokopedia']) { ?>
                    <a href="<?php echo $olshop['tokopedia']; ?>" class="marketplace-icon tokopedia">
                    </a>
                  <?php }

                  if ($olshop['shopee']) { ?>
                    <a href="<?php echo $olshop['shopee']; ?>" class="marketplace-icon shopee"></a>
                  <?php }
                  if ($olshop['bukalapak']) { ?>
                    <a href="<?php echo $olshop['bukalapak']; ?>" class="marketplace-icon bukalapak"></a>
                  <?php }
                  if ($olshop['blibli']) { ?>
                    <a href="<?php echo $olshop['blibli']; ?>" class="marketplace-icon blibli"></a>
                  <?php }

                  if ($olshop['jd_id']) { ?>
                    <a href="<?php echo $olshop['jd_id']; ?>" class="marketplace-icon jdid"></a>
                <?php }   ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php
            endwhile;
            $the_query = null;
            wp_reset_query();
            ?>
      <!-- Start of Shop Content -->
      <div class="shop-content row gutter-lg mb-10">
        <!-- Start of Sidebar, Shop Sidebar -->
        <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
          <!-- Start of Sidebar Overlay -->
          <div class="sidebar-overlay"></div>
          <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

          <!-- Start of Sidebar Content -->
          <div class="sidebar-content scrollable">
            <!-- Start of Sticky Sidebar -->
            <div class="sticky-sidebar">
              
              <!-- Start of Collapsible widget -->
              <div class="widget widget-collapsible">
                <h3 class="widget-title"><label>Semua Kategori</label></h3>
                <ul class="widget-body filter-items search-ul">
                <?php get_kategori_produk(); ?>
                </ul>
              </div>
              <!-- End of Collapsible Widget -->             

            </div>
            <!-- End of Sidebar Content -->
          </div>
          <!-- End of Sidebar Content -->
        </aside>
        <!-- End of Shop Sidebar -->

        <!-- Start of Shop Main Content -->
        <div class="main-content">
          
          <div class="product-wrapper row cols-md-4 cols-sm-2 cols-2">

            <?php
            $args = array(
              'post_status'   => 'publish',
              'post_type'     => 'produk',
              'posts_per_page'     => 8,
              'author'     => $author_id,

            );

            $the_query = null;
            $the_query = new WP_Query();
            $the_query->query($args);

            while ($the_query->have_posts()) : $the_query->the_post(); ?>

              <div class="product-wrap">
                <div class="product text-center">
                  <figure class="product-media">
                    <a href="<?php the_permalink(); ?>">
                      <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail('small');
                      } else {
                      ?>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/newsletter-2.jpg" width="280" height="180" alt="<?php the_title(); ?>">
                      <?php
                      }
                      ?>
                    </a>
                  </figure>
                  <div class="product-details">
                    <!-- <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronics</a>
                                        </div> -->
                    <h3 class="product-name">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="ratings-container">
                      <?php
                      $author_id = get_the_author_meta('ID');
                      $mitra  = get_mitra_byauthor($author_id);
                      ?>
                      <a class="rating-reviews">
                        <?php echo $mitra[0]->post_title; ?>
                      </a>
                    </div>
                    <div class="product-pa-wrapper">
                      <div class="product-price">
                        Rp<?php echo number_format(get_field('harga', get_the_ID())); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php
            endwhile;
            ?>
          </div>

          <div class="toolbox toolbox-pagination justify-content-between">
            
            <div class="pagenavi">
              <?php 
               // if (function_exists('wp-pagenavi')) {
                  wp_pagenavi(array( 'query' => $the_query) );
               // } ?>
            </div>
          </div>
        </div>
        <!-- End of Shop Main Content -->
      </div>
      <!-- End of Shop Content -->

      

    </div>
  </div>
  </div>
  <!-- End of Page Content -->
</main>
<!-- End of Main -->

<?php get_footer(); ?>