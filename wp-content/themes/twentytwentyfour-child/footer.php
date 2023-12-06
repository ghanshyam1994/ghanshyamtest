<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package House Cleaning
 */

?>

<footer class="footer-side">
  <div class="footer-widget">
    <div class="container">
      <?php if ( is_active_sidebar( 'footer1-sidebar' ) || is_active_sidebar( 'footer2- sidebar' ) || is_active_sidebar( 'footer3-sidebar' ) || is_active_sidebar( 'footer4-sidebar' ) ) : ?>
      <?php $count = 0;
        if ( is_active_sidebar('footer1-sidebar') ) : $count++; endif; 
        if ( is_active_sidebar('footer2-sidebar') ) : $count++; endif; 
        if ( is_active_sidebar('footer3-sidebar') ) : $count++; endif; 
        if ( is_active_sidebar('footer4-sidebar') ) : $count++; endif;
        $row = 'col-lg-'. 12/$count .' col-md-'. 12/$count .' col-sm-12';
      ?>
      <div class="row pt-2">
          <?php if ( is_active_sidebar('footer1-sidebar') ) : ?>
              <div class="footer-area <?php echo $row ?>">
                  <?php dynamic_sidebar('footer1-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer2-sidebar') ) : ?>
              <div class="footer-area <?php echo $row ?>">
                  <?php dynamic_sidebar('footer2-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer3-sidebar') ) : ?>
              <div class="footer-area <?php echo $row ?>">
                  <?php dynamic_sidebar('footer3-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer4-sidebar') ) : ?>
              <div class="footer-area <?php echo $row ?>">
                  <?php dynamic_sidebar('footer4-sidebar'); ?>
              </div>
          <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="row pt-2">
        <div class="col-lg-6 col-md-6 align-self-center">
          <p class="mb-0 py-3 text-center text-md-left">
            <?php
              if (!get_theme_mod('house_cleaning_footer_text') ) { ?>    
                  <?php esc_html_e('House Cleaning WordPress Theme','house-cleaning'); ?>
            <?php } else {
                echo esc_html(get_theme_mod('house_cleaning_footer_text'));
              }
            ?>
            <?php if ( get_theme_mod('house_cleaning_copyright_enable', true) == true ) : ?>
            <?php
              /* translators: %s: WP Elemento */
              printf( esc_html__( ' By %s', 'house-cleaning' ), 'WP Elemento' ); ?>
            <?php endif; ?>
          </p>
        </div>
        <div class="col-lg-6 col-md-6 align-self-center text-center text-md-right">
          <?php if ( get_theme_mod('house_cleaning_copyright_enable', true) == true ) : ?>
            <a href="<?php echo esc_url(__('https://wordpress.org','house-cleaning') ); ?>" rel="generator"><?php  /* translators: %s: WordPress */ printf( esc_html__( 'Proudly powered by %s', 'house-cleaning' ), 'WordPress' ); ?></a>
          <?php endif; ?>
          <?php $house_cleaning_settings = get_theme_mod( 'house_cleaning_social_links_settings' ); ?>
						<div class="social-links text-lg-right">
							<?php if ( is_array($house_cleaning_settings) || is_object($house_cleaning_settings) ){ ?>
								<?php foreach( $house_cleaning_settings as $house_cleaning_setting ) { ?>
									<a href="<?php echo esc_url( $house_cleaning_setting['link_url'] ); ?>">
										<i class="<?php echo esc_attr( $house_cleaning_setting['link_text'] ); ?> mr-3"></i>
									</a>
								<?php } ?>
							<?php } ?>
						</div>
        </div>
      </div>
      <?php if ( get_theme_mod('house_cleaning_scroll_enable_setting')) : ?>
        <div class="scroll-up">
          <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
        </div>
      <?php endif; ?>
    </div>
  </div>  
</footer>

<?php wp_footer(); ?>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// find elements
//jQuery(document).ready(function() {
  jQuery('.tabcontent').each(function(){
    console.log(jQuery(this).attr('data-id'));
    jQuery(".carousel_"+jQuery(this).attr('data-id')).owlCarousel({     
      loop: false,
      
      dots: true,
      nav: false,
      items: 1,
  });
  jQuery('.tab .tablinks:first-child').addClass('active')
  jQuery('.tabcontent:not(:first-child)').hide()
  jQuery('#employees').show();
})
  
jQuery(window).scroll(function(){
    if (jQuery(window).scrollTop() >= 250) {
        jQuery('.middle-header>.container>.row').addClass('fixed-header');
        jQuery('header#site-navigation:before').css('background','rgba(4, 47, 89, 0.95)')      
    } else {
        jQuery('.middle-header>.container>.row').removeClass('fixed-header');
        jQuery('header#site-navigation:before').css('background','rgba(4, 47, 89, 0.7)')
        
    }
});
 
//});


</script>
</body>
</html>