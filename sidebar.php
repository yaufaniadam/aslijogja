<!-- Sidebar-->
<div class="sidebar sticky-sidebar col-lg-3">
    <?php if (function_exists('tjd_latest_post') && tjd_latest_post(8, 1)) ?>
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('single')) : else : endif; ?>
</div>
<!-- end: Sidebar-->