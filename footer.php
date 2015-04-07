<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Flatland
 */
?>

</div><!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
        <?php if (has_nav_menu('footer-menu', 'bootstrapwp')):  ?>
            <nav role="navigation">
            <?php wp_nav_menu(array(
              'container'       => '',
              'menu_class'      => 'footer-menu',
              'theme_location'  => 'footer-menu')
            );
            ?>
            </nav>
        <?php endif; ?>
        </div>
        <div class="col-md-6 col-lg-6">
            <p class="copyright">&copy; Flatland Church 2015</p>
        </div>
    </div> <!-- .row -->
</div> <!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
