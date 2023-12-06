<?php
// Your code to enqueue parent theme styles
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style', get_stylesheet_uri() );
   wp_enqueue_style( 'owl1', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css' );
   wp_enqueue_style( 'owl2', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css' );
   
   wp_enqueue_script( 'owljs', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js', array('jquery-core') );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

function custom_testimonial_type_init() {
  $labels = array(
      'name' => 'Custom Testimonial Type',
      'singular_name' => 'custom Testimonial type',
      'add_new' => 'Add New Testimonial',
      'add_new_item' => 'Add New Testimonial',
      'edit_item' => 'Edit Testimonial',
      'new_item' => 'New Testimonial',
      'all_items' => 'All Testimonial',
      'view_item' => 'View Testimonial',
      'search_items' => 'Search Testimonials',
      'not_found' =>  'No Testimonial Found',
      'not_found_in_trash' => 'No testimonial found in Trash', 
      'parent_item_colon' => '',
      'menu_name' => 'Testimonial',
  );
  
  // register post type
  $args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'testimonial'),
      'query_var' => true,
      'menu_icon' => 'dashicons-admin-site',
      'supports' => array(
          'title',
          'editor',
          'excerpt',
          'comments',
          'revisions',
          'thumbnail',
          'author',
          'page-attributes'
      )
  );
  register_post_type( 'testimonial', $args );
  
  // register taxonomy
  register_taxonomy(
      'type', 
      'testimonial', 
      array(
          'hierarchical' => true, 
          'label' => 'Ttestimonial Type', 
          'query_var' => true, 
          'rewrite' => array( 'slug' => 'Testimonial' )
      )
  );
}
add_action( 'init', 'custom_testimonial_type_init' );

function disable_media_comment( $open, $post_id ) {
  //$post = get_post( $post_id );
  //if( $post-&gt;post_type == 'attachment' ) {
  return false;
  //}
  //return $open;
 }
 add_filter( 'comments_open', 'disable_media_comment', 10 , 2 );

 function yourtheme_paging_nav() {

  if( is_singular() )
      return;
  
  global $wp_query;
  
  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;
  
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );
  
  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;
  
  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }
  
  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }
  
  echo '<div><ul class="your-class">' . "\n";
  
  /** Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '<li><a href="%s"><spanclass"prev-class"></span></a></li>' . "\n", get_previous_posts_page_link() );
  
  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="active"' : '';
  
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
  
      if ( ! in_array( 2, $links ) )
          echo '<li>…</li>';
  }
  
  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }
  
  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<li>…</li>' . "\n";
  
      $class = $paged == $max ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }
  
  /** Next Post Link */
  if ( get_next_posts_link() )
      printf( '<li><a href="%s"><span class="next-class"></span></a></li>' . "\n", get_next_posts_page_link() );
  
  echo '</ul></div>' . "\n";
  }


  function create_testimonial_car( $atts ) {
    $terms = get_terms( 'type' );
   

    ?>
    <div class="tab">
      <?php foreach ($terms as $term){ ?>
  <button class="tablinks" onclick="openCity(event, '<?php echo $term->slug; ?>')"><?php echo $term->name; ?></button>
  <?php } ?>
</div>
<?php foreach ($terms as $term){   
  $teslist = get_posts(array(
                      'post_type' => 'testimonial',
                      'tax_query' => array(
                          array(
                          'taxonomy' => 'type',
                          'field' => 'term_id',
                          'terms' => $term->term_id)
                      ))
                  );
                  
                 
  ?>
    <div id="<?php echo $term->slug; ?>" data-id="<?php echo $term->term_id; ?>" class="owl-carousel owl-theme tabcontent carousel_<?php echo $term->term_id; ?>">
      <?php  foreach ($teslist as $tesmo){  ?>
        <div class="testimonials-container item">
          
            <div class="testimonial-card">
              <div class="body-container"><div class="quote-container"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"> <path class="icon-quote" d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z" /> </svg>
              </div>
              <div class="person-quote">
                <p>"<?php echo $tesmo->post_content; ?>"</p>
              </div>
            </div>
            <div class="footer-container">
              <div class="person-image background-person-mark" style="background:no-repeat center/cover url(<?php echo get_the_post_thumbnail_url($tesmo->ID); ?>)">
                
              </div>
              <h3 class="person-h3"><?php $tit = explode(",",$tesmo->post_title); echo isset($tit[0]) ? $tit[0] : ''; ?></h3><h4 class="person-h4"><?php echo isset($tit[1]) ? $tit[1] : ''; ?></h4>
            </div>
          </div>
        </div>        
        <?php  } ?>
      </div>
      <?php  } ?>
  <?php
  }
  add_shortcode( 'TESTIMONIALLIST', 'create_testimonial_car' );