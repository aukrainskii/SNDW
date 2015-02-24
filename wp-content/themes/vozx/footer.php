<?php 
global $vozx_options;
?>

<?php 

	$footer_layout = 'default';
	$footer_layout = (is_page_template('page-coming-soon.php')) ? 'coming_soon' : $footer_layout;
	$footer_layout = (is_page_template('page-onepage.php')) ? 'onepage' : $footer_layout;
	$footer_layout = (is_page_template('page-landing-page.php')) ? 'landing_page' : $footer_layout;
	get_template_part('partials/footer_layout_'.$footer_layout);

	?>

	<?php echo (isset( $vozx_options['analytics_code'] )) ? $vozx_options['analytics_code'] : ''; ?>

	<?php wp_footer(); ?>
	
	<?php echo (isset($vozx_options['boxed_body']) && $vozx_options['boxed_body']==1 ) ? '</div>' : '' ; ?>

</body>
</html>