<div class="post-navigation">
     <?php previous_post_link('%link', '<span class="post-prev"><div class="post-prev-title"><span>Sebelumnya</span>%title</div></span>', '', ''); ?>

     <?php

     $post_type = get_post_type(get_the_ID());
     $url = get_bloginfo('url') . '/berita';
     ?>
     <a href="<?php echo $url; ?>" class="post-all" title="Semua Berita/artikel">
          <i class="icon-grid"> </i>
     </a>

     <?php next_post_link('%link', '<span class="post-next"><div class="post-next-title"><span>Selanjutnya</span>%title</div></span>', '', ''); ?>
</div>