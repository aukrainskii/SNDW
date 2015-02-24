<?php 
	global $vozx_options;
?>

<footer id="ABdev_main_footer">

		<div id="footer_landing_container">
			<div class="container">
					<div class="span7 footer_landing_copyright">
						<?php echo (isset($vozx_options['copyright'])) ? wp_kses($vozx_options['copyright'], ABdev_allowed_tags()): ''; ?>	 
					</div>
					<a href="#" id="back_to_top" title="<?php esc_attr_e('Back to top', 'ABdev_vozx') ?>"><i class="ci_icon-angle-double-up"></i></a>
			</div>
		</div>
	</footer>