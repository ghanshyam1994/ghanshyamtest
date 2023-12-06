<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package House Cleaning
 */

get_header(); ?>



<div id="content" class="mt-5">
  <div class="container">
    <?php $house_cleaning_single_page_layout = get_theme_mod( 'house_cleaning_single_page_layout','One Column');
      if($house_cleaning_single_page_layout == 'One Column'): ?>
          <?php
            while ( have_posts() ) :
              the_post();
              get_template_part( 'template-parts/content', get_post_type());

              wp_link_pages(
                array(
                  'before' => '<div class="house-cleaning-pagination">',
                  'after' => '</div>',
                  'link_before' => '<span>',
                  'link_after' => '</span>'
                )
              );
              comments_template();
            endwhile;
          ?>
      <?php elseif ($house_cleaning_single_page_layout == 'Left Sidebar') : ?>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="sidebar-area">
              <?php
                dynamic_sidebar('sidebar-2');
              ?>
            </div>
          </div>
          <div class="col-lg-8 col-md-8">
            <?php
              while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type());

                wp_link_pages(
                  array(
                    'before' => '<div class="house-cleaning-pagination">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>'
                  )
                );
                comments_template();
              endwhile;
            ?>
          </div>
        </div>
      <?php elseif ($house_cleaning_single_page_layout == 'Right Sidebar') : ?>
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <?php
              while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type());

                wp_link_pages(
                  array(
                    'before' => '<div class="house-cleaning-pagination">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>'
                  )
                );
                comments_template();
              endwhile;
            ?>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="sidebar-area">
              <?php
                dynamic_sidebar('sidebar-2');
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>