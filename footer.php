<!-- Footer -->
<footer id="footer" class="dark">
    <div class="footer-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">


                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer1')) : else : endif; ?>

                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-2">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer2')) : else : endif; ?>
                        </div>
                        <div class="col-lg-3">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer3')) : else : endif; ?>
                        </div>
                        <div class="col-lg-2">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer4')) : else : endif; ?>
                        </div>
                        <div class="col-lg-3">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer5')) : else : endif; ?>
                        </div>
                        <div class="col-lg-2">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer6')) : else : endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-content background-green">
        <div class="container">
            <div class="copyright-text text-center text-yellow">Copyright 2020 © Laboratorium Ilmu Pemerintahan
                UMY</div>
        </div>
    </div>
</footer>
<!-- end: Footer -->
</div>
<!-- end: Body Inner -->
<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->
<?php
wp_footer();
?>
</body>

</html>