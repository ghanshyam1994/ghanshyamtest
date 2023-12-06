<?php
/*
Plugin Name: Warehouse
*/

function create_the_custom_table() {	
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
	
    $table_name = $wpdb->prefix . 'warehouse'; 

    $sql = "CREATE TABLE " . $table_name . " (
	id int(11) NOT NULL AUTO_INCREMENT,	
	p_id int(2) NULL,
	qty int(2) NULL,
	warehouse_list varchar(15),
	PRIMARY KEY  (id)
    ) $charset_collate;";
 
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'create_the_custom_table');

function wporg_custom_post_type() {
	register_post_type('warehouses',
		array(
			'supports' => array( 
						  'title', 
						  'editor', 
						  'excerpt', 
						  'thumbnail', 
						  'custom-fields', 
						  'revisions' 
						),
			'labels'      => array(
				'name'          => __( 'Warehouse', 'textdomain' ),
				'singular_name' => __( 'Warehouse', 'textdomain' ),
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'warehouses' ), // my custom slug
		)
	);
	add_submenu_page(
    'edit.php?post_type=warehouses',
    __( 'Set quentity', 'menu-test' ),
    __( 'Set quentity', 'menu-test' ),
    'manage_options',
    'testsettings',
    'setwherqty_settings'
);
}

function setwherqty_settings(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'warehouse';
	
	if(isset($_POST['submit'])){
		
		$pid = $_POST['product'];
		$wlist = json_encode($_POST['warehouses']);
		$qty = json_encode($_POST['qty']);
		
		$result = $wpdb->get_results ( "SELECT * FROM $table_name WHERE p_id = $pid");
		if(empty($result)){
			$wpdb->insert($table_name, array(
				'p_id' => $_POST['product'],
				'warehouse_list' => json_encode($_POST['warehouses']),
				'qty' => $_POST['qty'], // ... and so on
			));
		} else {
			$wpdb->query($wpdb->prepare("UPDATE $table_name SET warehouse_list='$wlist', qty = $qty WHERE p_id=$pid"));
		}
	}
	$args = array(
				'post_type'      => 'product',
				'posts_per_page' => -1,
			);

	$loop = new WP_Query( $args );
			
			$args = array(
				'post_type'      => 'warehouses',
				'posts_per_page' => -1,
			);

	$loop2 = new WP_Query( $args );
			
	$result = $wpdb->get_results ( "SELECT * FROM $table_name");
?><style>
th, td {
    border: 1px solid;
}
</style><table><tr><th>Product</th><th>Warehouses</th><th>QTY</th></tr><?php
	foreach($result as $data){
		?><tr>
			<td><?php 
			
			while ( $loop->have_posts() ) : $loop->the_post();
			if(get_the_id() == $data->p_id)
				echo get_the_title();
			endwhile;
			wp_reset_query();

			?></td>
			<td><?php 
			if(!empty(json_decode($data->warehouse_list))){
				while ( $loop2->have_posts() ) : $loop2->the_post();			
				if(in_array(get_the_id(), json_decode($data->warehouse_list)))
					echo get_the_title()."<br />";
				endwhile;
			}
			//print_r(json_decode($data->warehouse_list));

			?></td>
			<td><?php echo $data->qty; ?></td>
		</tr><?php
	}
	
	
	?>
	</table>
	<h1>Select Where house quentity</h1>
		<form method="post">
			<select name="product" style="width:300px;">
	<option value="" >(none)</option>
		<?php  
			

    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
		?><option value="<?php echo get_the_id(); ?>" ><?php echo get_the_title(); ?></option>
		<?php
        //echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
    endwhile;
	wp_reset_query();
	?>
	</select>
		<select name="warehouses[]" multiple="multiple" style="width:300px;">
	<option value="" >(none)</option>
		<?php  
			

    while ( $loop2->have_posts() ) : $loop2->the_post();
        global $product;
		?><option value="<?php echo get_the_id(); ?>" ><?php echo get_the_title(); ?></option>
		<?php
        //echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
    endwhile;
	wp_reset_query();
	?>
	</select>
	<input name="qty" type="number" value="">
	<input name="submit" type="submit">
		</form>
	
	
	<?php
}


add_action('init', 'wporg_custom_post_type');


add_action( 'add_meta_boxes', 'yss_custom_post_cat_add' );
function yss_custom_post_cat_add() {
 add_meta_box( 'my-meta-box-id', 'Select products', 'yss_custom_post_cat', 'warehouses', 'normal', 'high' );
}

function yss_custom_post_cat( $post ) {
 $values = get_post_custom( $post->ID );
 //$selected = isset( $values['custom_post_cat_select'] ) ? esc_attr( $values['custom_post_cat_select'][0] ) : '';
 $selected = get_post_meta( $post->ID, 'custom_post_cat_select', true );
 $where_qty = get_post_meta( $post->ID, 'where_qty', true );
 //print_r($where_qty); exit;
 wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>

   <p>
    <label for="custom_post_cat_select">Select your products</label>
    <br>
    <select name="custom_post_cat_select[]" id="custom_post_cat_select" multiple="multiple" style="width:300px;">
	<option value="" >(none)</option>
		<?php  
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => -1,
			);

			$loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
		?><option value="<?php echo get_the_id(); ?>" <?php echo (!empty($selected) && in_array( get_the_ID(), $selected ) ) ? 'selected="selected"' :  ''; ?>><?php echo get_the_title(); ?></option>
		<?php
        //echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
    endwhile;
	wp_reset_query();
	?>
	</select>
	<label for="custom_post_cat_select">Select your quentity</label>
    <br> 
     
	 <input name="where_qty" type="number" value="<?php echo $where_qty; ?>">
     
  
   </p>
<?php
}

add_action( 'save_post_warehouses', 'yss_custom_post_cat_save' );
function yss_custom_post_cat_save( $post_id ) {
	//print_r($_POST['custom_post_cat_select']); exit;
 // Bail if we're doing an auto save
 /*if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
 // if our nonce isn't there, or we can't verify it, bail
 if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
 // if our current user can't edit this post, bail
 if( !current_user_can( 'edit_post' ) ) return;
 // now we can actually save the data
 $allowed = array(
            'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
    )
 );*/

// Probably a good idea to make sure your data is set
 /*if( isset( $_POST['custom_post_cat_select'] ) )
	 print_r($_POST['custom_post_cat_select']); exit;
  update_post_meta( $post_id, 'custom_post_cat_select', esc_attr( $_POST['custom_post_cat_select'] ) );*/
  if ( isset( $_POST['custom_post_cat_select'] ) ) {
	
        $sanitized_data = array();

        $data = (array) $_POST['custom_post_cat_select'];

        foreach ($data as $key => $value) {

            $sanitized_data[ $key ] = (int)strip_tags( stripslashes( $value ) );

        }

        update_post_meta( $post_id, 'custom_post_cat_select', $sanitized_data );

    }
	
	if(isset($_POST['where_qty'])){
		update_post_meta($post_id, 'where_qty', $_POST['where_qty'] );		
	}

}

add_filter( 'the_content', 'filter_the_content_in_the_main_loop', 1 );

function filter_the_content_in_the_main_loop( $content ) {

    // Check if we're inside the main loop in a single Post.
    if ( is_singular()  ) {
		$selected = get_post_meta( get_the_ID(), 'custom_post_cat_select', true );
		$where_qty = get_post_meta( get_the_ID(), 'where_qty', true );
		 
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => -1,
				'post__in'=> $selected,
			);

			$loop = new WP_Query( $args );
			$html = "<br />";
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				
				$html .= '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
			endwhile;
			
        return $content . esc_html__( 'Total product in warehouses quentity '.$where_qty, 'wporg').'<br />'. esc_html__( 'Total product in warehouses '.count($selected), 'wporg').$html;
    }

    return $content;
}


function action_woocommerce_before_add_to_cart_form() {
    // Get the global product object
    global $product;

    // Is a WC product
    if ( is_a( $product, 'WC_Product' ) ) {
        global $wpdb;
		$table_name = $wpdb->prefix . 'warehouse';		
		 
		$result = $wpdb->get_results ( "SELECT * FROM $table_name WHERE p_id = $product->id");
		
		$args = array(
				'post_type'      => 'warehouses',
				'posts_per_page' => -1,
			);

		$loop2 = new WP_Query( $args );
		
		?>
			<select class="Warehouse" name="Warehouse">
			
			<?php 
				foreach($result as $data){
					
					if(!empty(json_decode($data->warehouse_list))){						
						while ( $loop2->have_posts() ) : $loop2->the_post();			
						if(in_array(get_the_id(), json_decode($data->warehouse_list))){
							$where_qty = get_post_meta( get_the_id(), 'where_qty', true );
							echo "<option value='".$where_qty."'>".get_the_title()."</option>";
						}
						endwhile;
						
					} 
				}
				wp_reset_query();
			?>
				
			</select>
		<?php
    }
    
}
add_action( 'woocommerce_before_add_to_cart_form', 'action_woocommerce_before_add_to_cart_form', 10, 0 );


add_action('wp_footer', 'add_this_script_footer');
function add_this_script_footer(){
	?>
	<script>	
	jQuery(function () {
		jQuery('.Warehouse').trigger('change');
	});
		jQuery('.Warehouse').on('change', function() {
			console.log(jQuery(this).val());
			jQuery('.quantity .input-text').val(jQuery(this).val());
			if(jQuery(this).val() == ''){
				jQuery('.single_add_to_cart_button').attr("disabled", true); 
			} else {
				jQuery('.single_add_to_cart_button').attr("disabled", false);
			}
		});
	</script>
<?php
}



