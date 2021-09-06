<?php
require_once('inc/wp_bootstrap_navwalker.php');
require_once('inc/custom_walker_nav_menu.php');
require_once('inc/better-excerpts.php');
require_once('inc/cpt.php');

require 'update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://solusidesain-update-theme.netlify.app/aslijogja/theme.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'aslijogja'
);

add_filter( 'query_vars', 'wpse26555_add_vars' );
function wpse26555_add_vars( $vars )
{
    $vars[] = 'id_produk';
    return $vars;
}

function aslijogja_theme_support()
{
	//create dynamic title tag support
	add_theme_support('title-tag');
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('post-thumbnails');
	add_image_size('large', 1000, 1200, true);
	add_image_size('cover', 1000, 480, true);
	add_image_size('medium', 800, 900, true);
	add_image_size('small', 215, 245, true);
	add_image_size('thumbnail', 150, 150, true);

	add_filter('use_default_gallery_style', '__return_false');
}

add_action('after_setup_theme', 'aslijogja_theme_support');

//Disable Default Dashboard Widgets
function remove_dashboard_meta()
{
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
	remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
	remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Removes the 'At a Glance' widget
	remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
	remove_meta_box('rg_forms_dashboard', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
	remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
	remove_action('admin_notices', 'update_nag');
}
add_action('admin_init', 'remove_dashboard_meta');

function tjd_wp_title($title, $sep)
{
	global $paged, $page;

	if (is_feed()) {
		return $title;
	}

	$title .= get_bloginfo('name');

	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		$title = "$title $sep $site_description";
	}

	if ($paged >= 2 || $page >= 2) {
		$title = "$title $sep " . sprintf(__('Page %s', 'bws'), max($paged, $page));
	}

	return $title;
}
add_filter('wp_title', 'tjd_wp_title', 10, 2);

function aslijogja_menus()
{
	$locations = array(
		'topbar'   => __('Top Bar Menu', 'tjd-framework'),
		'header'   => __('Header Menu', 'tjd-framework'),
		'header-kategori'   => __('Kategori Utama', 'tjd-framework'),
		'footer1'   => __('Footer 1', 'tjd-framework'),
		'footer2'   => __('Footer 2', 'tjd-framework'),
		'footer3'   => __('Footer 3', 'tjd-framework'),
	);

	register_nav_menus($locations);
}

add_action('init', 'aslijogja_menus');

function aslijogja_register_styles()
{
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style('aslijogja-style-css', get_template_directory_uri() . "/style.css", array(), $version, 'all');
	wp_enqueue_style('fa', get_template_directory_uri() . "/assets/vendor/fontawesome-free/css/all.min.css", array(), '1.0', 'all');
	wp_enqueue_style('owl', get_template_directory_uri() . "/assets/vendor/owl-carousel/owl.carousel.min.css", array(), '1.0', 'all');
	wp_enqueue_style('animate', get_template_directory_uri() . "/assets/vendor/animate/animate.min.css", array(), '1.0', 'all');
	wp_enqueue_style('magnific', get_template_directory_uri() . "/assets/vendor/magnific-popup/magnific-popup.min.css", array(), '1.0', 'all');
	wp_enqueue_style('aslijogja', get_template_directory_uri() . "/assets/css/style.min.css", array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'aslijogja_register_styles');

function aslijogja_register_scripts()
{
	wp_enqueue_script('labip-plugin-js', get_template_directory_uri() . "/assets/vendor/jquery.plugin/jquery.plugin.min.js", array('jquery'), '1.0', true);
	wp_enqueue_script('images', get_template_directory_uri() . "/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js", array(), '1.0', true);
	wp_enqueue_script('carousel', get_template_directory_uri() . "/assets/vendor/owl-carousel/owl.carousel.min.js", array(), '1.0', true);
	wp_enqueue_script('zoom', get_template_directory_uri() . "/assets/vendor/zoom/jquery.zoom.js", array(), '1.0', true);
	wp_enqueue_script('countdown', get_template_directory_uri() . "/assets/vendor/jquery.countdown/jquery.countdown.min.js", array(), '1.0', true);
	wp_enqueue_script('popup', get_template_directory_uri() . "/assets/vendor/magnific-popup/jquery.magnific-popup.min.js", array(), '1.0', true);
	wp_enqueue_script('skroll', get_template_directory_uri() . "/assets/vendor/skrollr/skrollr.js", array(), '1.0', true);
	wp_enqueue_script('main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'aslijogja_register_scripts');

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar Forum',
		'id'            => 'forum',
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-forum">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title bb-no mb-0">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function mitra($cat = null)
{

?>
	<?php
	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'mitra',
		'posts_per_page' => 12,
		'tax_query' => array(
			array(
				'taxonomy' => 'mitra_cats',
				'terms' => $cat,
				'field' => 'term_id',
			)
		)
	);

	$the_query = null;
	$the_query = new WP_Query();
	$the_query->query($args);
	?>
	<div class="carousel" data-items="<?php echo $data_items; ?>" data-dots="false" data-lightbox="gallery">
		<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

			<!-- portfolio item -->
			<div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
				<div class="portfolio-item-wrap">
					<div class="portfolio-image">
						<a href="#">
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('thumbnail-square');
							} else {
							?>
								<img src="<?php bloginfo('template_directory'); ?>/images/blog/17.jpg" alt="<?php the_title(); ?>">
							<?php
							}
							?>
						</a>
					</div>
					<div class="portfolio-description">
						<a title="<?php the_title(); ?>">
							<h3><?php echo short_title(9); ?></h3>
						</a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- end: portfolio item -->
		<!--Gallery Carousel -->
	</div>

	<?php $the_query = null;
	wp_reset_query(); ?>
<?php
}

function blog($cats = null, $num)
{
?>
	<?php

	$args = array(

		'post_type' => 'post',
		'posts_per_page' => $num,
		'cat' => $cats
	);

	$_posts =  new WP_Query($args);

	?>

	<?php if ($_posts->have_posts()) : ?>

		<?php while ($_posts->have_posts()) : $_posts->the_post(); ?>

			<div class="post text-center overlay-zoom">
				<figure class="post-media br-sm">
					<a href="<?php the_permalink(); ?>">

						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('thumbnail-square');
						} else {
						?>
							<img src="<?php bloginfo('template_directory'); ?>/images/blog/17.jpg" width="280" height="180" alt="<?php the_title(); ?>">
						<?php
						}
						?>
					</a>
				</figure>
				<div class="post-details">
					<div class="post-meta">
						<!-- by <a href="#" class="post-author"><?php echo get_the_author(); ?></a> -->
						<a href="#" class="post-date mr-0"><?php echo get_the_date(); ?></a>
					</div>
					<h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo short_title(8); ?></a>
					</h5>

				</div>
			</div>


		<?php endwhile; ?>
	<?php endif; ?>
	<?php $_posts = null;
	wp_reset_query(); ?>
<?php
}

function produk($cat = null, $item)
{

?>
	<?php
	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'produk',
		'orderby'     => 'rand',
		'posts_per_page' => 20,
		'tax_query' => array(
			array(
				'taxonomy' => 'kat_produk',
				'field' => 'term_id',
				'terms' => $cat
			)
		)

	);

	$the_query = null;
	$the_query = new WP_Query();
	$the_query->query($args);

	?>

	<div class="product-wrapper-1 appear-animate mb-4">
		<div class="title-link-wrapper pb-1 mb-4">
			<h2 class="title ls-normal mb-0"><?php echo get_the_category_by_ID($cat); ?></h2>
			<a href="<?php bloginfo('url'); ?>/produk" class="font-size-normal font-weight-bold ls-25 mb-0">Produk Lainnya<i class="w-icon-long-arrow-right"></i></a>
		</div>
		<div class="row">
			<!-- <div class="col-lg-3 col-sm-4 mb-4">
				<div class="banner h-100 br-sm" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/banner-samping.jpg); 
                            background-color: #EAEFF3;">
					<div class="banner-content content-top">
						<h5 class="banner-subtitle font-weight-normal mb-2">Promos 17 Agustus</h5>
						<hr class="banner-divider bg-dark mb-2">
						<h3 class="banner-title font-weight-bolder text-uppercase ls-25">
							Oleh-oleh <br> <span class="font-weight-normal text-capitalize">Khas Jogja</span>
						</h3>
						<a href="<?php bloginfo('url'); ?>/produk" class="btn btn-dark btn-outline btn-rounded btn-sm">Lihat Produk</a>
					</div>
				</div>
			</div> -->
			<!-- End of Banner -->
			<div class="col-lg-12 col-sm-12">
				<div class="owl-carousel owl-theme row cols-xl-6 cols-lg-3 cols-2" data-owl-options="{
                                'nav': false,
                                'dots': false,
                                'margin': 20,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }">

					<?php $i = 1;

					while ($the_query->have_posts()) : $the_query->the_post(); ?>

						<?php if ($i % 2 == 1) : ?>
							<div class="product-col">
							<?php endif; ?>

							<div class="product-wrap product text-center">
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
								<div class="product-details">
									<h4 class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class="ratings-container">

										<?php
										$author_id = get_the_author_meta('ID');
										$mitra  = get_mitra_byauthor($author_id);
										?>
										<a href="<?php echo bloginfo('url') . "/" . $mitra[0]->post_type . "/" . $mitra[0]->post_name; ?>" class="rating-reviews">
											<?php echo $mitra[0]->post_title; ?>
										</a>
									</div>
									<div class="product-price">
										<ins class="new-price">Rp<?php echo number_format(get_field('harga', get_the_ID())); ?></ins>
									</div>
								</div>
							</div>

							<?php
							if ($i % 2 == 0) : ?>
							</div>
						<?php endif; ?>

					<?php $i++;
					endwhile;  ?>

				</div>
				<!-- End of Produts -->
			</div>
		</div>
	</div>
	<!-- End of Product Wrapper 1 -->


	<?php $the_query = null;
	wp_reset_query(); ?>
<?php
}
function produk_saya()
{

?>
	<?php
	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'produk',
		'author' => get_current_user_id(),
		'posts_per_page' => 20,
	);

	$the_query = null;
	$the_query = new WP_Query();
	$the_query->query($args);

	?>

	<div class="product-wrapper-1 appear-animate mb-4 mt-8">
	
		<div class="row">
			<!-- <div class="col-lg-3 col-sm-4 mb-4">
				<div class="banner h-100 br-sm" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/banner-samping.jpg); 
                            background-color: #EAEFF3;">
					<div class="banner-content content-top">
						<h5 class="banner-subtitle font-weight-normal mb-2">Promos 17 Agustus</h5>
						<hr class="banner-divider bg-dark mb-2">
						<h3 class="banner-title font-weight-bolder text-uppercase ls-25">
							Oleh-oleh <br> <span class="font-weight-normal text-capitalize">Khas Jogja</span>
						</h3>
						<a href="<?php bloginfo('url'); ?>/produk" class="btn btn-dark btn-outline btn-rounded btn-sm">Lihat Produk</a>
					</div>
				</div>
			</div> -->
			<!-- End of Banner -->
			<div class="col-lg-12 col-sm-12">
				<div class="row cols-xl-6 cols-lg-3 cols-2" ">

					<?php $i = 1;

					while ($the_query->have_posts()) : $the_query->the_post(); ?>

				
							<div class="product-col">
						

							<div class="product-wrap product text-center">
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
								<div class="product-details">
									<h4 class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class="product-price">
										<ins class="new-price">Rp<?php echo number_format(get_field('harga', get_the_ID())); ?></ins>
									</div>
									<div class="ratings-container">
											<a class="btn btn-sm btn-ellipse btn-secondary" href="<?php echo get_bloginfo('url'); ?>/edit-produk?id_produk=<?php echo get_the_ID(); ?>">Edit <i class="fas fa-edit"></i></a>
									</div>
									
								</div>
							</div>

					
							</div>

					<?php
					endwhile;  ?>

				</div>
				<!-- End of Produts -->
			</div>
		</div>
	</div>
	<!-- End of Product Wrapper 1 -->


	<?php $the_query = null;
	wp_reset_query(); ?>
<?php
}

function brands($item)
{

?>
	<?php
	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'mitra',
		'orderby'     => 'rand',
		'posts_per_page' => $item,
	);

	$the_query = null;
	$the_query = new WP_Query();
	$the_query->query($args);

	?>

	<div class="shop-default-brands mb-5">
		<div class="row brands-carousel owl-carousel owl-theme cols-xl-7 cols-lg-6 cols-md-4 cols-sm-3 cols-2" data-owl-options="{
                                'items': 7,
                                'nav': false,
                                'dots': false,
                                'margin': 20,
                                'loop': true,
                                'autoPlay': 'true',
																'autoplayTimeout':1000,
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
                                        'items': 6
                                    },
                                    '1200': {
                                        'items': 9
                                    }
                                }
                            }
                        ">
			<?php

			while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<figure>
					<a href="<?php the_permalink(); ?>">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('thumbnail');
						} else {
						?>
							<img class="rounded-circle" src="<?php bloginfo('template_directory'); ?>/assets/images/noimage-thumb.jpg" width="150" height="150" alt="<?php the_title(); ?>">
						<?php
						}
						?>
					</a>

				</figure>

			<?php
			endwhile;  ?>
		</div>
	</div>
	<!-- End of Shop Brands-->

	<?php $the_query = null;
	wp_reset_query(); ?>
<?php
}

function produk_sidebar($cat = 0, $item)
{

	if ($cat != '') {
		$args = array(
			'post_status'   => 'publish',
			'post_type'     => 'produk',
			'posts_per_page' => $item,
			'orderby'        => 'rand',
			'tax_query' => array(
				array(
					'taxonomy' => 'kat_produk',
					'field' => 'term_id',
					'terms' => $cat
				)
			)

		);
	} else {
		$args = array(
			'post_status'   => 'publish',
			'post_type'     => 'produk',
			'posts_per_page' => $item,
			'orderby'        => 'rand',
		);
	}

	$the_query = null;
	$the_query = new WP_Query();
	$the_query->query($args);

?>

	<div class="widget widget-products">
		<div class="title-link-wrapper mb-2">
			<h4 class="title title-link font-weight-bold">Produk Lainnya</h4>
		</div>

		<div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'items': 1,
                                            'margin': 20
                                        }">


			<?php $i = 1;

			while ($the_query->have_posts()) : $the_query->the_post(); ?>

				<?php if ($i % 4 == 1) : ?>
					<div class="widget-col">
					<?php endif; ?>

					<div class="product product-widget">
						<figure class="product-media">
							<a href="<?php the_permalink(); ?>">
								<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('thumbnail');
								} else {
								?>
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/noimage-thumb.jpg" alt="<?php the_title(); ?>">
								<?php
								}
								?>
							</a>
						</figure>
						<div class="product-details">
							<h4 class="product-name">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<?php
							$author_id = get_the_author_meta('ID');
							$mitra  = get_mitra_byauthor($author_id);
							?>
							<a href="<?php echo bloginfo('url') . "/" . $mitra[0]->post_type . "/" . $mitra[0]->post_name; ?>" class="rating-reviews">
								<?php echo $mitra[0]->post_title; ?>
							</a>
							<div class="product-price">Rp<?php echo number_format(get_field('harga', get_the_ID())); ?></div>
						</div>
					</div>
					<?php
					if ($i % 4 == 0) : ?>
					</div>
				<?php endif; ?>

			<?php $i++;
			endwhile;  ?>
		</div>
	</div>

	<!-- End of Product Wrapper 1 -->
	<?php $the_query = null;
	wp_reset_query(); ?>
<?php
}

function post_sidebar($cat = 0, $item)
{
	if ($cat != '') {
		$args = array(
			'post_status'   => 'publish',
			'post_type'     => 'post',
			'posts_per_page' => $item,
			'category__not_in' => $cat,
		);
	} else {
		$args = array(
			'post_status'   => 'publish',
			'post_type'     => 'post',
			'posts_per_page' => $item,
		);
	}

	$the_query = null;
	$the_query = new WP_Query();
	$the_query->query($args);

?>

	<div class="widget widget-products">
		<div class="title-link-wrapper mb-2">
			<h4 class="title title-link font-weight-bold">Artikel Terbaru</h4>
		</div>

		<div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'items': 1,
                                            'margin': 20
                                        }">


			<?php $i = 1;

			while ($the_query->have_posts()) : $the_query->the_post(); ?>

				<?php if ($i % 4 == 1) : ?>
					<div class="widget-col">
					<?php endif; ?>

					<div class="post-widget mb-4">
						<figure class="post-media br-sm">
							<a href="<?php the_permalink(); ?>">
								<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('thumbnail');
								} else {
								?>
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/noimage-thumb.jpg" alt="<?php the_title(); ?>">
								<?php
								}
								?>
							</a>
						</figure>
						<div class="post-details">
							<h4 class="post-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<div class="post-meta">
								<a href="#" class="post-date"><?php echo get_the_date(); ?></a>
							</div>
						</div>
					</div>


					<?php
					if ($i % 4 == 0) : ?>
					</div>
				<?php endif; ?>

			<?php $i++;
			endwhile;  ?>
		</div>
	</div>

	<!-- End of Product Wrapper 1 -->
	<?php $the_query = null;
	wp_reset_query(); ?>
<?php
}

function pencarian($posttype)
{
?>
	<form action="<?php bloginfo('url'); ?>" method="GET" class="input-wrapper input-wrapper-inline">

		<?php foreach($posttype as $post) { ?>
			<input type="hidden" name="post_type[]" value="<?php echo $post; ?>" />
		<?php } ?>

		<input id="s" type="text" class="form-control" name="s" placeholder="Cari" autocomplete="off" required>
		<button class="btn btn-search"><i class="w-icon-search"></i></button>
	</form>

<?php
}

//contributor can edit
// get the "contributor" role object
$obj_existing_role = get_role('contributor');

// add the "Edit published posts" capability
$obj_existing_role->add_cap('edit_published_posts');

//hapus yg ga diperlukan contributor
if (!current_user_can('update_plugins')) {
	// Hook for adding admin menus
	add_action('admin_menu', 'add_menu_mitra');
	function add_menu_mitra()
	{
		$current_user = get_current_user_id();

		$args = array(
			'post_type' => 'mitra',
			'posts_per_page' => 1,
			'author' => $current_user
		);

		$mitra = get_posts($args);

		$menu_slug = get_bloginfo('url') . '/wp-admin/post.php?post=' . $mitra[0]->ID . '&action=edit';
		add_menu_page(
			__('Profil UMKM', 'textdomain'),
			__('Profil UMKM', 'textdomain'),
			'edit_published_posts',
			$menu_slug,
			'',
			'dashicons-store',
			5
		);

		add_menu_page(
			__('Inkubasi Bisnis', 'textdomain'),
			__('Inkubasi Bisnis', 'textdomain'),
			'edit_published_posts',
			'inkubasi-bisnis',
			'inkubasi_bisnis_callback',
			'dashicons-chart-line',
			30
		);
	}

	// delete permalink
	add_filter('get_sample_permalink_html', 'wpse_125800_sample_permalink');
	function wpse_125800_sample_permalink($return)
	{
		$return = '';

		return $return;
	}

	//hapus tombol add
	add_action('admin_head', 'remove_addnew');
	function remove_addnew()
	{
		global $pagenow;
		if ('post.php' === $pagenow && isset($_GET['post']) && 'mitra' === get_post_type($_GET['post'])) {
			echo '<style>
				a.page-title-action {
					display: none !important;
				}
				ul.wp-submenu.wp-submenu-wrap {
						display: none !important;
				}
			} 
			</style>';
		}
	}
}

function inkubasi_bisnis_callback()
{
	echo "Inkubasi here";
}

/**
 * Removes some menus by page.
 */
function wpdocs_remove_menus()
{

	if (!current_user_can('update_plugins')) {
		remove_menu_page('edit.php?post_type=mitra');
		remove_menu_page('edit.php?post_type=kkn');
		remove_menu_page('edit-comments.php');
		remove_menu_page('edit.php');
		remove_menu_page('tools.php');
	}
}
add_action('admin_menu', 'wpdocs_remove_menus');
 
function acf_set_featured_image( $value, $post_id, $field  ){
    
    if($value != ''){
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	   	update_post_meta($post_id, '_thumbnail_id', $value);
    }
 
    return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=logo_umkm', 'acf_set_featured_image', 10, 3);

function acf_set_featured_image_produk( $value, $post_id, $field  ){
    
    if($value != ''){
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	   	update_post_meta($post_id, '_thumbnail_id', $value);
    }
 
    return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=foto_produk', 'acf_set_featured_image_produk', 10, 3);

// function update_cpt_post_terms($post_id)
// {
// 	if (get_post_type($post_id) != 'produk') {
// 		return;
// 	}

// 	$terms_amenities = NULL; // this will clear terms if none found
// 	$terms_status = NULL; // this will clear terms if none found
// 	$terms_certificaciones = NULL;

// 	if (have_rows('kat_produk', $post_id)) { // loops through the repeater for amenities
// 		$terms_amenities = array();
// 		while (have_rows('kat_produk', $post_id)) {
// 			// add this term to the array
// 			$terms_amenities[] = get_sub_field('kategori', false); // false for no formatting
// 		}
// 	}
// 	wp_set_object_terms($post_id, $terms_amenities, 'kategori', false);


// }

// add_action('acf/save_post', 'update_cpt_post_terms'); // Fixes issue with taxonomies not saving in some CPTs

function get_mitra_byauthor($id)
{
	$args = array(
		'post_type' => 'mitra',
		'posts_per_page' => 1,
		'author' => $id
	);

	$mitra = get_posts($args);

	return $mitra;
}

add_action('user_register', function ($user_id) {

	$user = get_user_by('ID', $user_id);
	$role = $user->roles[0];
	if ($role == 'contributor') {
		$name = $user->first_name;
		$slug = strtolower(str_replace(' ', '-', $name));
		$post_setup = array(
			'post_type'     => 'mitra',
			'post_title'    => $name,
			'post_name'    => $slug,
			'post_author'    => $user_id,
			'post_status'   => 'pending',
		);
		wp_insert_post($post_setup);
	}
});

function update_extra_profile_fields($user_id) {
	$user = get_user_by('ID', $user_id);
	$role = $user->roles[0];
	if ($role == 'contributor') {                 

		$args = array(
			'author'        =>  $user_id, 
			'post_type'       =>  'mitra',
			'posts_per_page' => 1 // no limit
		);
		$mitra = get_posts( $args );
		if(count($mitra) ==1) {

			echo "<script type='javascript'> alert(); </script>";
			// foreach ($mitra as $mitra) {
			// 	$name = $user->first_name;
			// 	$post_setup = array(
			// 		'ID'     => $mitra->ID,
			// 		'post_type'     => 'mitra',
			// 		'post_title'    => $name,
			// 		'post_status'   => 'publish',
			// 	);
			// 	wp_update_post($post_setup);

			// }
		}
	}	
}
add_action('edit_user_profile_update', 'update_extra_profile_fields');

function get_kategori_produk()
{
	wp_list_categories(array(
		'orderby' => 'name',
		'title_li' => '',
		'taxonomy'     => 'kat_produk',
	));
}
function get_kategori_post()
{
	wp_list_categories(array(
		'orderby' => 'name',
		'title_li' => '',
		'taxonomy'     => 'category',
	));
}

function getPostViews($postID)
{

	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);

	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}

function setPostViews($postID)
{

	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}


function popular_tag()
{ ?>

	<div class="widget-body tags">
		<?php
		$tags = get_tags();
		$args = array(
			'smallest' => 14,
			'largest' => 14,
			'unit' => 'px',
			'number' => 10,
			'format' => 'flat',
			'separator' => " ",
			'orderby' => 'count',
			'order' => 'DESC',
			'show_count' => 1,
			'echo' => false
		);

		$tag_string = wp_generate_tag_cloud($tags, $args);

		return $tag_string;
		?>
	</div>

<?php
}

function ubah_telp($telp)
{
	if (substr($telp, 0, 4) == 0) {
		$telp = 0;
	} else {
		$telp = "62" . $telp;
	}
	return $telp;
}

//add class to post navigation
function posts_link_next_class($format){
	$format = str_replace('href=', 'class="align-items-end text-right" href=', $format);
	return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
	$format = str_replace('href=', 'class="align-items-start text-left" href=', $format);
	return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');

/* BBPRESS */
function bbp_enable_visual_editor( $args = array() ) {
	$args['tinymce'] = true;
	return $args;
}