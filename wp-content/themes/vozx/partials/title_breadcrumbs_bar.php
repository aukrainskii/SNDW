<?php 
global $vozx_options, $ABdev_title_bar_title;

if((!is_search() || !is_404()) && is_object($post)){
	$values = get_post_custom( $post->ID );
}

?>

<?php if(!isset($vozx_options['hide_title_breadcrumbs_bar']) || $vozx_options['hide_title_breadcrumbs_bar']!=1 || !isset($values['abdev_hide_breadcrumbs'][0]) || $values['abdev_hide_breadcrumbs'][0] == '1' ): ?>
	<section id="headline_breadcrumbs_bar">
		<div class="container">
			<div class="row">
				<?php if(!isset($vozx_options['hide_title_from_bar']) || $vozx_options['hide_title_from_bar']!=1): ?>
					<div class="span12 center_aligned">
						<h2>
							<?php if(isset($vozx_options['headline_title']) && $vozx_options['headline_title'] != ''): ?>
								<span class="black"><?php echo wp_kses($vozx_options['headline_title'], ABdev_allowed_tags()); ?></span>
							<?php endif; ?>
						<?php echo (!empty($ABdev_title_bar_title)) ? $ABdev_title_bar_title : get_the_title();?>
					</h2>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php if(isset($vozx_options['hide_breadcrumbs_from_bar']) && $vozx_options['hide_breadcrumbs_from_bar']==0 ): ?>
	<?php if(isset($values['abdev_hide_headline'][0]) && $values['abdev_hide_headline'][0] == 0 ):?>
		<section id="title_breadcrumbs_bar">
			<div class="container">
				<div class="row">
						<div class="span12 center_aligned">
							<?php ABdevFW_simple_breadcrumb(); ?>
						</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>