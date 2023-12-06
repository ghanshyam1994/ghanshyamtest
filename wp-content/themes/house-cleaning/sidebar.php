<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package House Cleaning
 */
?>

<div class="sidebar-area">
  <?php if ( ! dynamic_sidebar( 'house-cleaning-sidebar' ) ) : ?>
    <div role="complementary" aria-label="sidebar1" id="archives" class="sidebar-widget">
        <h4 class="title" ><?php esc_html_e( 'Archives', 'house-cleaning' ); ?></h4>
        <ul>
            <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
        </ul>
    </div>
    <div role="complementary" aria-label="sidebar2" id="meta" class="sidebar-widget">
        <h4 class="title"><?php esc_html_e( 'Meta', 'house-cleaning' ); ?></h4>
        <ul>
            <?php wp_register(); ?>
            <li><?php wp_loginout(); ?></li>
            <?php wp_meta(); ?>
        </ul>
    </div>
  <?php endif; // end sidebar widget area ?>
</div>