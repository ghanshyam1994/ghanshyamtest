<?php
	the_posts_pagination( array(
		'prev_text' => esc_html__( 'Previous page', 'house-cleaning' ),
		'next_text' => esc_html__( 'Next page', 'house-cleaning' ),
	) );