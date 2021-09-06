<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Asli Jogja" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Roboto:400,500,600,700,800'],
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '<?php bloginfo('template_url'); ?>/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/fonts/wolmart.ttf?png09e" as="font" type="font/ttf" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body>
    <div class="page-wrapper">
   