<?php
require_once('inc/wp_bootstrap_navwalker.php');
require_once('inc/better-excerpts.php');

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

	add_filter('use_default_gallery_style', '__return_false');
}

add_action('after_setup_theme', 'labip_theme_support');


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
	//	wp_enqueue_style('labip-plugin-css', get_template_directory_uri() . "/css/plugins.css", array(), '1.0', 'all');
	wp_enqueue_style('labip-custom-css', get_template_directory_uri() . "/css/custom.css", array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'labip_register_styles');

function labip_register_scripts()
{
	wp_enqueue_script('labip-jquery-js', get_template_directory_uri() . "/js/jquery.js", array(), '1.0', true);
	wp_enqueue_script('labip-plugin-js', get_template_directory_uri() . "/js/plugins.js", array(), '1.0', true);
	// wp_enqueue_script('labip-function-js', get_template_directory_uri() . "/js/functions.js", array(), '1.0', true);
	wp_enqueue_script('labip-custom-js', get_template_directory_uri() . "/js/custom.js", array(), '1.0', true);
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

add_filter('wp_enqueue_scripts', 'tjd_theme_scripts', 0);
function tjd_theme_scripts()
{
	// CSS
	//wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/fonts/icomoon/style.css', array(), '1.0' );
	wp_enqueue_style('plugins-css', get_template_directory_uri() . '/css/plugins.css', array(), '1.0');
	wp_enqueue_style('main', get_template_directory_uri() . '/css/style.css', array(), '1.0');
	wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0');
	//	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0');

	// JS
	wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0', true);
	wp_register_script('functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.0', true);

	wp_enqueue_script('plugins');
	wp_enqueue_script('functions');
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
							<!-- <span class="post-category"><i class="fa fa-tag"></i> <?php foreach ((get_the_category()) as $category) {
																																						echo $category->cat_name . ' ';
																																					} ?></span>-->
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

function create_post_types_jadwal()
{
	// Slider post type 
	$label = array(
		'name' 				=> __('Jadwal', 'tjd-framework'),
		'singular_name' 	=> __('Jadwal', 'tjd-framework'),
		'add_new' 			=> _x('Add New', 'Jadwal', 'tjd-framework'),
		'add_new_item' 		=> __('Add New Jadwal', 'tjd-framework'),
		'edit_item' 		=> __('Edit Jadwal', 'tjd-framework'),
		'new_item' 			=> __('New Jadwal', 'tjd-framework'),
		'view_item' 		=> __('View Jadwal', 'tjd-framework'),
		'search_items' 		=> __('Search Jadwal', 'tjd-framework'),
		'not_found' 		=> __('No Jadwal found', 'tjd-framework'),
		'not_found_in_trash' => __('No Jadwal found in Trash', 'tjd-framework'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' 			=> $label,
		'description' 		=> __('All Jadwal upload here', 'tjd-framework'),
		'public' 			=> true,
		'supports'			=> array('title', 'thumbnail'),
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'gambar-jadwal-kami'),
		'menu_icon'			=> 'dashicons-images-alt',
		'show_in_nav_menus' => false,
		'has_archive' 		=> true,
		'menu_position' 	=> 20,
	);
	register_post_type('jadwal', $args);
}
add_action('init', 'create_post_types_jadwal');

// Add taxonomies
add_action('init', 'create_taxonomies_jadwal');

function create_taxonomies_jadwal()
{
	// Mitra taxonomies
	$jadwal_cats = array(
		'name' => __('Jadwal Categories', 'tjd-framework'),
		'singular_name' => __('Jadwal Category', 'tjd-framework'),
		'search_items' =>  __('Search Jadwal Categories', 'tjd-framework'),
		'all_items' => __('All Jadwals Categories', 'tjd-framework'),
		'parent_item' => __('Parent Jadwal Category', 'tjd-framework'),
		'parent_item_colon' => __('Parent Jadwal Category:', 'tjd-framework'),
		'edit_item' => __('Edit Jadwal Category', 'tjd-framework'),
		'update_item' => __('Update Jadwal Category', 'tjd-framework'),
		'add_new_item' => __('Add New Jadwal Category', 'tjd-framework'),
		'new_item_name' => __('New Jadwal Category Name', 'tjd-framework'),
		'choose_from_most_used'	=> __('Choose from the most used Jadwal categories', 'tjd-framework')
	);

	register_taxonomy('jadwal_cats', 'jadwal', array(
		'hierarchical' => true,
		'labels' => $jadwal_cats,
		'query_var' => true,
		'rewrite' => array('slug' => 'gambar-jadwal-category'),
	));
}

function create_post_types_gallery()
{
	// Slider post type 
	$label = array(
		'name' 				=> __('Gallery', 'tjd-framework'),
		'singular_name' 	=> __('Gallery', 'tjd-framework'),
		'add_new' 			=> _x('Add New', 'Gallery', 'tjd-framework'),
		'add_new_item' 		=> __('Add New Gallery', 'tjd-framework'),
		'edit_item' 		=> __('Edit Gallery', 'tjd-framework'),
		'new_item' 			=> __('New Gallery', 'tjd-framework'),
		'view_item' 		=> __('View Gallery', 'tjd-framework'),
		'search_items' 		=> __('Search Gallery', 'tjd-framework'),
		'not_found' 		=> __('No Gallery found', 'tjd-framework'),
		'not_found_in_trash' => __('No Gallery found in Trash', 'tjd-framework'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' 			=> $label,
		'description' 		=> __('All Gallery upload here', 'tjd-framework'),
		'public' 			=> true,
		'supports'			=> array('title', 'thumbnail'),
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'gallery'),
		'menu_icon'			=> 'dashicons-images-alt',
		'show_in_nav_menus' => false,
		'has_archive' 		=> true,
		'menu_position' 	=> 20,
	);
	register_post_type('gallery', $args);
}
add_action('init', 'create_post_types_gallery');

// Add taxonomies
add_action('init', 'create_taxonomies_gallery');

function create_taxonomies_gallery()
{
	// Mitra taxonomies
	$gallery_cats = array(
		'name' => __('Gallery Categories', 'tjd-framework'),
		'singular_name' => __('Gallery Category', 'tjd-framework'),
		'search_items' =>  __('Search Gallery Categories', 'tjd-framework'),
		'all_items' => __('All Gallerys Categories', 'tjd-framework'),
		'parent_item' => __('Parent Gallery Category', 'tjd-framework'),
		'parent_item_colon' => __('Parent Gallery Category:', 'tjd-framework'),
		'edit_item' => __('Edit Gallery Category', 'tjd-framework'),
		'update_item' => __('Update Gallery Category', 'tjd-framework'),
		'add_new_item' => __('Add New Gallery Category', 'tjd-framework'),
		'new_item_name' => __('New Gallery Category Name', 'tjd-framework'),
		'choose_from_most_used'	=> __('Choose from the most used Gallery categories', 'tjd-framework')
	);

	register_taxonomy('gallery_cats', 'gallery', array(
		'hierarchical' => true,
		'labels' => $gallery_cats,
		'query_var' => true,
		'rewrite' => array('slug' => 'gambar-gallery-category'),
	));
}

function create_post_types_mitra()
{
	// Slider post type 
	$label = array(
		'name' 				=> __('Mitra', 'tjd-framework'),
		'singular_name' 	=> __('Mitra', 'tjd-framework'),
		'add_new' 			=> _x('Add New', 'Mitra', 'tjd-framework'),
		'add_new_item' 		=> __('Add New Mitra', 'tjd-framework'),
		'edit_item' 		=> __('Edit Mitra', 'tjd-framework'),
		'new_item' 			=> __('New Mitra', 'tjd-framework'),
		'view_item' 		=> __('View Mitra', 'tjd-framework'),
		'search_items' 		=> __('Search Mitra', 'tjd-framework'),
		'not_found' 		=> __('No Mitra found', 'tjd-framework'),
		'not_found_in_trash' => __('No Mitra found in Trash', 'tjd-framework'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' 			=> $label,
		'description' 		=> __('All Mitra upload here', 'tjd-framework'),
		'public' 			=> true,
		'supports'			=> array('title', 'thumbnail'),
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'gambar-mitra-kami'),
		'menu_icon'			=> 'dashicons-images-alt',
		'show_in_nav_menus' => false,
		'has_archive' 		=> true,
		'menu_position' 	=> 20,
	);
	register_post_type('mitra', $args);
}
add_action('init', 'create_post_types_mitra');

// Add taxonomies
add_action('init', 'create_taxonomies_mitra');

function create_taxonomies_mitra()
{
	// Mitra taxonomies
	$mitra_cats = array(
		'name' => __('Mitra Categories', 'tjd-framework'),
		'singular_name' => __('Mitra Category', 'tjd-framework'),
		'search_items' =>  __('Search Mitra Categories', 'tjd-framework'),
		'all_items' => __('All Mitras Categories', 'tjd-framework'),
		'parent_item' => __('Parent Mitra Category', 'tjd-framework'),
		'parent_item_colon' => __('Parent Mitra Category:', 'tjd-framework'),
		'edit_item' => __('Edit Mitra Category', 'tjd-framework'),
		'update_item' => __('Update Mitra Category', 'tjd-framework'),
		'add_new_item' => __('Add New Mitra Category', 'tjd-framework'),
		'new_item_name' => __('New Mitra Category Name', 'tjd-framework'),
		'choose_from_most_used'	=> __('Choose from the most used Mitra categories', 'tjd-framework')
	);

	register_taxonomy('mitra_cats', 'mitra', array(
		'hierarchical' => true,
		'labels' => $mitra_cats,
		'query_var' => true,
		'rewrite' => array('slug' => 'gambar-mitra-category'),
	));
}

function mitra($cat = null, $jumlah)
{
	$data_items = ($jumlah == '') ? 3 : $jumlah;

?>
	<?php
	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'mitra',
		'posts_per_page' => 12,
		'cat' => $cat
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

// Testimoni
function create_post_types_testimoni()
{
	// Slider post type 
	$label = array(
		'name' 				=> __('Testimoni', 'tjd-framework'),
		'singular_name' 	=> __('Testimoni', 'tjd-framework'),
		'add_new' 			=> _x('Add New', 'Testimoni', 'tjd-framework'),
		'add_new_item' 		=> __('Add New Testimoni', 'tjd-framework'),
		'edit_item' 		=> __('Edit Testimoni', 'tjd-framework'),
		'new_item' 			=> __('New Testimoni', 'tjd-framework'),
		'view_item' 		=> __('View Testimoni', 'tjd-framework'),
		'search_items' 		=> __('Search Testimoni', 'tjd-framework'),
		'not_found' 		=> __('No Testimoni found', 'tjd-framework'),
		'not_found_in_trash' => __('No Testimoni found in Trash', 'tjd-framework'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' 			=> $label,
		'description' 		=> __('All Testimoni upload here', 'tjd-framework'),
		'public' 			=> true,
		'supports'			=> array('title', 'thumbnail'),
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'testimoni-kami'),
		'menu_icon'			=> 'dashicons-format-status',
		'show_in_nav_menus' => false,
		'has_archive' 		=> true,
		'menu_position' 	=> 20,
	);
	register_post_type('testimoni', $args);
}
add_action('init', 'create_post_types_testimoni');

// Add taxonomies
add_action('init', 'create_taxonomies_testimoni');

function create_taxonomies_testimoni()
{
	// Mitra taxonomies
	$testimoni_cats = array(
		'name' => __('Testimoni Categories', 'tjd-framework'),
		'singular_name' => __('Testimoni Category', 'tjd-framework'),
		'search_items' =>  __('Search Testimoni Categories', 'tjd-framework'),
		'all_items' => __('All Testimonis Categories', 'tjd-framework'),
		'parent_item' => __('Parent Testimoni Category', 'tjd-framework'),
		'parent_item_colon' => __('Parent Testimoni Category:', 'tjd-framework'),
		'edit_item' => __('Edit Testimoni Category', 'tjd-framework'),
		'update_item' => __('Update Testimoni Category', 'tjd-framework'),
		'add_new_item' => __('Add New Testimoni Category', 'tjd-framework'),
		'new_item_name' => __('New Testimoni Category Name', 'tjd-framework'),
		'choose_from_most_used'	=> __('Choose from the most used Testimoni categories', 'tjd-framework')
	);

	register_taxonomy('testimoni_cats', 'testimoni', array(
		'hierarchical' => true,
		'labels' => $testimoni_cats,
		'query_var' => true,
		'rewrite' => array('slug' => 'gambar-testimoni-category'),
	));
}

function the_testimoni()
{

?>
	<?php
	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'testimoni',
		'posts_per_page' => 3,
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
					the_post_thumbnail('thumbnail-square');
				} else {
				?>
					<img src="<?php bloginfo('template_directory'); ?>/images/blog/17.jpg" alt="<?php the_field('nama_testimoni'); ?>">
				<?php
				}
				?>
				<p class="text-black" style="font-size: 16px;"><?php the_field('teks_testimoni'); ?></p>
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

function the_suksesstory()
{
?>
	<?php

	$args = array(
		'category_name' => 'sukses-story',
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
				<div class="testimonial-item text-white">
					<div class="row">

						<div class="col-lg-5">
							<div class="" style="border-radius: 8px; width: 300px; height: 300px; background-image:url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center center;">
							</div>
						</div>
						<div class="col-lg-6 my-4">
							<h3 style="color: #065139 !important;"><?php the_title() ?></h3>
							<div class="text-black"><?php
																			echo the_excerpt();
																			?></div>
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

?>