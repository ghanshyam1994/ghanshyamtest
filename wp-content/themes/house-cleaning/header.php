<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package House Cleaning
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>
<?php if(get_theme_mod('house_cleaning_preloader_hide', false )){ ?>
	<div class="loader">
		<div class="preloader">
			<div class="diamond">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
<?php } ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'house-cleaning' ); ?></a>

<header id="site-navigation" class="header">
		<div class="top-header py-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-3 align-self-center text-center text-md-left">
						<?php $house_cleaning_settings = get_theme_mod( 'house_cleaning_social_links_settings' ); ?>
						<div class="social-links text-lg-left">
							<?php if ( is_array($house_cleaning_settings) || is_object($house_cleaning_settings) ){ ?>
								<?php foreach( $house_cleaning_settings as $house_cleaning_setting ) { ?>
									<a href="<?php echo esc_url( $house_cleaning_setting['link_url'] ); ?>">
										<i class="<?php echo esc_attr( $house_cleaning_setting['link_text'] ); ?> mr-3"></i>
									</a>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-8 col-md-9 align-self-center text-center text-lg-right text-md-right">
						<?php if ( get_theme_mod('house_cleaning_header_location') ) : ?>
							<span class="px-3 b-right-icon header-icon"><i class="fas fa-map-marker-alt mr-2"></i><?php echo esc_html( get_theme_mod('house_cleaning_header_location' ) ); ?></span>
						<?php endif; ?>
						<?php if ( get_theme_mod('house_cleaning_header_phone_number') ) : ?>
							<span class="px-3 b-right-icon header-icon"><i class="fas fa-phone mr-2"></i><?php echo esc_html( get_theme_mod('house_cleaning_header_phone_number' ) ); ?></span>
						<?php endif; ?>
						<?php if ( get_theme_mod('house_cleaning_header_email') ) : ?>
							<span class="px-3 header-icon"><i class="fas fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('house_cleaning_header_email' ) ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="middle-header py-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 align-self-center">
						<div class="logo text-center text-lg-left text-md-left mb-3 mb-md-0">
							<div class="logo-image">
								<?php the_custom_logo(); ?>
							</div>
							<div class="logo-content">
								<?php
									if ( get_theme_mod('house_cleaning_display_header_title', true) == true ) :
										echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
										echo esc_attr(get_bloginfo('name'));
										echo '</a>';
									endif;
									if ( get_theme_mod('house_cleaning_display_header_text', false) == true ) :
										echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
									endif;
								?>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 align-self-center text-center">
						<button class="menu-toggle my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
							<span aria-hidden="true"><?php esc_html_e( 'Menu', 'house-cleaning' ); ?></span>
						</button>
						<nav id="main-menu" class="close-panal">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'main-menu',
									'container' => 'false'
								));
							?>
							<button class="close-menu my-2 p-2" type="button">
								<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</nav>
					</div>
					<div class="col-lg-3 col-md-3 align-self-center text-center text-lg-right text-md-right p-md-0 b-left-button">
						<?php if ( get_theme_mod('house_cleaning_header_button_url') || get_theme_mod('house_cleaning_header_button_text') ) : ?>
						<div class="appoint-button">
							<a href="<?php echo esc_url( get_theme_mod('house_cleaning_header_button_url' ) ); ?>"><i class="fas fa-arrow-right mr-2"></i><?php echo esc_html( get_theme_mod('house_cleaning_header_button_text' ) ); ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
</header>