<?php acf_form_head(); ?>
<?php get_header(); ?>

<!-- Start of Main -->
<main class="main umkm">
    <!-- Start of Page Content -->
    <div class="page-content pt-5 pb-5">
        <div class="container">
            <?php
                    if (is_user_logged_in() == true) :
                        global $current_user;
                        $user_id = 'user_' . $current_user->ID;
                    else : 
                      echo "<i class='fas fa-exclamation-triangle'></i> Anda tidak diperkenankan mengakses halaman ini";
                      exit;
                    endif;

            ?>
            <div class="row gutter-lg">
                <?php get_sidebar('profil-umkm'); ?>
                <div class="main-content">

                    <!-- Start of Page Header -->
                    <div class="header-umkm">
                        <h1 class="page-title mb-0"><?php the_title(); ?></h1>
                    </div>
                    <!-- End of Page Header -->
                  
                        <?php produk_saya(); ?>
                 
                  
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->
<?php get_footer(); ?>