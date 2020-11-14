<!-- Post item-->
<div class="post-item border">
    <div class="post-item-wrap">
        <div class="post-image">
            <a href="#">
                <img alt="" src="<?php the_post_thumbnail_url(); ?>">
            </a>
        </div>
        <div class="post-item-description">
            <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo get_the_date('Y-m-d'); ?></span>
            <h2><a href="<?php the_permalink(); ?>" class="text-green">
                    <?php

                    the_title();

                    ?>
                </a></h2>
            <p>
                <?php
                echo the_excerpt();
                ?>
        </div>
    </div>
</div>
<!-- end: Post item-->