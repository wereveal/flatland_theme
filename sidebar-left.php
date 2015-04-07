<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Flatland
 */

if (!is_active_sidebar('sidebar-left')) {
	return;
}
?>
<div id="secondary" class="widget-area col-md-3 col-lg-3 col-md-pull-9 col-lg-pull-9" role="complementary">
    <div class="well">
    <?php dynamic_sidebar('sidebar-left'); ?>
    </div> <!-- .well -->
</div><!-- #secondary -->
