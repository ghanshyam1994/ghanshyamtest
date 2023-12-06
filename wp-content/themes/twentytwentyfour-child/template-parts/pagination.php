<?php
	the_posts_pagination( array(
		'prev_text' => '<i class="fas fa-arrow-left"></i>'.esc_html__( ' Previous', 'house-cleaning' ),
		'next_text' => esc_html__( 'Next ', 'house-cleaning' ).'<i class="fas fa-arrow-right"></i>',
	) );