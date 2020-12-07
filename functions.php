<?php
require_once('inc/wp_bootstrap_navwalker.php');
require_once('inc/better-excerpts.php');
require_once('inc/cpt.php');

require 'update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://solusidesain-update-theme.netlify.app/labip/theme.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'lab-ip'
);

function labip_theme_support()
{
	//create dynamic title tag support
	add_theme_support('title-tag');
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('post-thumbnails');
	add_image_size('large', 800, 600, true);
	add_image_size('medium', 600, 400, true);
	add_image_size('headline', 595, 397, true);
	add_image_size('small', 525, 350, true);
	add_image_size('thumbnail', 150, 150, true);
	add_image_size('micro-thumb', 70, 70, true);

	add_filter('use_default_gallery_style', '__return_false');
}

add_action('after_setup_theme', 'labip_theme_support');

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

function labip_menus()
{
	$locations = array(
		'topbar'   => __('Top Bar Menu', 'tjd-framework'),
		'header'   => __('Header Menu', 'tjd-framework'),
		'footer'   => __('Footer menu', 'tjd-framework'),
	);

	register_nav_menus($locations);
}

add_action('init', 'labip_menus');

function labip_register_styles()
{
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style('labip-style-css', get_template_directory_uri() . "/css/style.css", array(), $version, 'all');
	wp_enqueue_style('labip-plugin-css', get_template_directory_uri() . "/css/plugins.css", array(), '1.0', 'all');
	wp_enqueue_style('labip-custom-css', get_template_directory_uri() . "/css/custom.css", array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'labip_register_styles');

function labip_register_scripts()
{
	wp_enqueue_script('labip-plugin-js', get_template_directory_uri() . "/js/plugins.js", array('jquery'), '1.0', true);
	wp_enqueue_script('labip-function-js', get_template_directory_uri() . "/js/functions.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'labip_register_scripts');


//Register Sidebars
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Single',
		'id' => 'single',
		'description' => 'Widget on Single page.',
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => 'Event',
		'id' => 'event',
		'description' => 'Widget on Event page.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</nav></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><nav>',
	));


	register_sidebar(array(
		'name' => 'Page',
		'id' => 'page',
		'description' => 'Widget on Page.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</nav></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4></div>',
	));
	register_sidebar(array(
		'name' => 'Footer 1',
		'id' => 'footer1',
		'description' => 'Widget on footer.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	));
	register_sidebar(array(
		'name' => 'Footer 1',
		'id' => 'footer1',
		'description' => 'Widget on footer.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	));
	register_sidebar(array(
		'name' => 'Footer 1',
		'id' => 'footer1',
		'description' => 'Widget on footer 1.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	));
	register_sidebar(array(
		'name' => 'Footer 2',
		'id' => 'footer2',
		'description' => 'Widget on footer 2.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	));
	register_sidebar(array(
		'name' => 'Footer 3',
		'id' => 'footer3',
		'description' => 'Widget on footer 3.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	));
	register_sidebar(array(
		'name' => 'Footer 4',
		'id' => 'footer4',
		'description' => 'Widget on footer 4.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	));
	register_sidebar(array(
		'name' => 'Footer 5',
		'id' => 'footer5',
		'description' => 'Widget on footer 5.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	));
	register_sidebar(array(
		'name' => 'Footer 6',
		'id' => 'footer6',
		'description' => 'Widget on footer 6.',
		'before_widget' => '<div class="%2$s widget" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	));
}

// latest post
function tjd_latest_post($number, $thumb)
{
?>
	<div class="widget">
		<h4 class="widget-title"><?php _e('Terbaru', 'tjd-framework'); ?> </h4>
		<div class="post-thumbnail-list">
			<?php
			$cur_read = get_the_ID();
			$the_query = null;
			$the_query = new WP_Query('post_status=publish&post_type=post&posts_per_page=' . $number);

			if ($thumb == 1) {
				while ($the_query->have_posts()) : $the_query->the_post();
			?>

					<div class="post-thumbnail-entry">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('small');
						} else {
						?>
							<img width="100" height="" src="<?php bloginfo('template_directory'); ?>/img/noimage.jpg" alt="<?php the_title(); ?>" />
						<?php
						}
						?>
						<div class="post-thumbnail-content">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title(8); ?></a>
							<span class="post-date"><i class="fas fa-calendar-alt"> </i><?php echo get_the_date(); ?></span>
						</div>
					</div>

				<?php endwhile;
			} else {


				echo "<ul>";
				while ($the_query->have_posts()) : $the_query->the_post();

					if (is_single()) {
						if ($cur_read == get_the_ID()) {
							$class = "onread";
						} else {
							$class = "normal";
						}
					} else {
						$class = 'normal';
					} ?>
					<li class="<?php echo $class; ?>"><span class="reading"><?php _e('On read', 'tjd-framework'); ?></span><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
						<span class="post-date"><?php echo get_the_date('d F, Y'); ?></span></li>

			<?php endwhile;
				echo "</ul>";

				wp_reset_query();
			}
			?>
		</div>
	</div>
<?php }


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

function the_berita($cats = null)
{
?>
	<?php

	$args = array(

		'post_type' => 'post',
		'posts_per_page' => 4,
		'cat' => $cats
	);

	$_posts =  new WP_Query($args);

	?>

	<?php if ($_posts->have_posts()) : ?>



		<?php while ($_posts->have_posts()) : $_posts->the_post(); ?>

			<div class="post-item border">
				<div class="post-item-wrap">
					<div class="post-image">
						<a href="#">
							<div class="img-style" style="background-image: url(<?php the_post_thumbnail_url(); ?>); ">
							</div>
						</a>
					</div>
					<div class="post-item-description">
						<span class="post-meta-date"><i class="fas fa-calendar-alt"> </i><?php echo get_the_date(); ?></span>
						<h2><a href="<?php the_permalink(); ?>" class="text-green">
								<?php

								echo short_title(8);

								?>
							</a></h2>
						<p>
							<?php
							echo excerpt(15);
							?>
					</div>
				</div>
			</div>


		<?php endwhile; ?>
	<?php endif; ?>
	<?php $_posts = null;
	wp_reset_query(); ?>
<?php
}

function the_berita_all()
{
?>
	<!-- Blog -->
	<div id="blog" class="grid-layout post-2-columns m-b-30" data-item="post-item">
		<?php
		$paged = get_query_var('paged');
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 4,
			'paged' => $paged
		);
		$_posts =  new WP_Query($args);
		?>
		<?php if ($_posts->have_posts()) : ?>
			<?php while ($_posts->have_posts()) : $_posts->the_post(); ?>
				<div class="post-item border">
					<div class="post-item-wrap">
						<div class="post-image">
							<a href="#">
								<div class="img-style" style="background-image: url(<?php the_post_thumbnail_url(); ?>); ">
								</div>
							</a>
						</div>
						<div class="post-item-description" style="<?php if (wp_is_mobile()) {
																												echo "height: 600px!important;";
																											} else {
																												echo "height: 400px!important;";
																											} ?>">
							<span class="post-meta-date"><i class="fas fa-calendar-alt"> </i><?php echo get_the_date(); ?></span>
							<h2><a href="<?php the_permalink(); ?>" class="text-green">
									<?php
									echo wp_trim_words(get_the_title(), 25);
									?>
								</a></h2>
							<p>
								<?php
								echo the_excerpt();
								?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php $_posts = null;
		wp_reset_query(); ?>
	</div>
<?php
}


function the_testimoni($cat = null)
{

?>
	<?php
	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'testimoni',
		'posts_per_page' => 3,
		'tax_query' => array(
			array(
				'taxonomy' => 'testimoni_cats',
				'terms' => $cat,
				'field' => 'term_id',
			)
		),
	);

	$the_query = null;
	$the_query = new WP_Query();
	$the_query->query($args);

	?>
	<!-- Testimonials -->
	<div class="carousel arrows-visibile testimonial testimonial-single testimonial-left" data-items="1" data-autoplay="true" data-loop="true" data-autoplay="3500">
		<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
			<!-- Testimonials item -->
			<div class="testimonial-item">
				<?php
				if (has_post_thumbnail()) {
					the_post_thumbnail('thumbnail');
				} else {
				?>
					<img src="<?php bloginfo('template_directory'); ?>/images/blog/17.jpg" alt="<?php the_field('nama_testimoni'); ?>">
				<?php
				}
				?>
				<p><?php the_field('teks_testimoni'); ?></p>
				<span class="text-black"><?php the_field('nama_testimoni'); ?></span>
				<span class="text-black"><?php the_field('jabatan_testimoni') ?></span>
				<p class="text-black"></p>
			</div>
		<?php endwhile; ?>
		<!-- end: Testimonials item-->
	</div>
	<?php $the_query = null;
	wp_reset_query(); ?>
<?php
}

function the_suksesstory($cat)
{
?>
	<?php

	$args = array(
		'cat' => $cat,
		'post_type' => 'post',
		'posts_per_page' => 4
	);

	$_posts =  new WP_Query($args);

	?>

	<?php if ($_posts->have_posts()) : ?>



		<!-- Testimonials -->
		<div class="carousel arrows-visibile testimonial testimonial-single testimonial-left" data-items="1" data-autoplay="true" data-loop="true" data-autoplay="3500">
			<?php while ($_posts->have_posts()) : $_posts->the_post(); ?>

				<!-- Testimonials item -->
				<div class="testimonial-item text-whit">
					<div class="row">

						<div class="col-lg-5">
							<div class="" style="border-radius: 8px; width: 300px; height: 300px; background-image:url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center center;">
							</div>
						</div>
						<div class="col-lg-6 my-4">
							<h3 style="color: #065139 !important;"><?php the_title() ?></h3>
							<p class="text-blacks">
								<?php
								echo excerpt('20');
								?>
							</p>
							<a href="<?php echo get_the_permalink() ?>" class="btn background-yellow ?> border-0">Selengkapnya</a>
						</div>
					</div>
				</div>
				<!-- end: Testimonials item-->

			<?php endwhile; ?>
		</div>
		<!-- end: Testimonials -->
	<?php endif; ?>
	<?php $_posts = null;
	wp_reset_query(); ?>
<?php
}

function produk($cat = null)
{

?>
	<?php
	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'produk',
		'posts_per_page' => 10,

	);

	$the_query = null;
	$the_query = new WP_Query();
	$the_query->query($args);

	?>
	<!-- produkals -->
	<div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="40">

		<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
			<div class="portfolio-item light-bg no-overlay img-zoom ct-photography ct-marketing ct-media">
				<div class="portfolio-item-wrap">
					<div class="portfolio-image">
						<a href="<?php the_permalink(); ?>">
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('small');
							} else {
							?>
								<img src="<?php bloginfo('template_directory'); ?>/images/blog/17.jpg" alt="<?php the_field('nama_produk'); ?>">
							<?php
							}
							?>
						</a>
					</div>
					<div class="portfolio-description">
						<a href="portfolio-page-grid-gallery.html">
							<h3><?php echo short_title(15); ?></h3>
							<p><?php echo get_field('karya'); ?></p>
							<span style="font-weight:700;">Rp <?php echo number_format(get_field('harga')); ?></span>
						</a>
					</div>
				</div>
			</div>


		<?php endwhile; ?>
		<!-- end: produkals item-->
	</div>
	<?php $the_query = null;
	wp_reset_query(); ?>
<?php
}

?>