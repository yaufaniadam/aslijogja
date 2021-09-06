<?php get_header(); ?>


<?php if (is_bbpress()) :
     get_template_part('template-parts/bbpress');
else :

    get_template_part('template-parts/single-page');

endif; ?>


<?php get_footer(); ?>