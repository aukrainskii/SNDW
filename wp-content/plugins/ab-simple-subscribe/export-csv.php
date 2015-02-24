<?php 
require_once '../../../wp-load.php';
if (current_user_can('manage_options')) {
	header("Content-type: application/force-download");
	header('Content-Disposition: inline; filename="subscribers'.date('YmdHis').'.csv"');
	
	$args = array( 'post_type' => 'subscribers', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$custom = get_post_custom();

		echo '"' . $custom['ABss_subscriber_name'][0] . '","' . $custom['ABss_subscriber_email'][0] . '"' . "\r\n";

	endwhile;
}