<?php
/*
 *
 * The default full width template for displaying pages.
 *
*/
/* mods 
*     16Aug16 zig - remove page-breadcrumb & page title 
*/
get_header(); 
global $be_themes_data; 
while(have_posts()): the_post();
	$be_pb_class = 'page-builder';
	$be_pb_disabled = get_post_meta( $post->ID, '_be_pb_disable', true );
	if( !isset($be_pb_disabled) || true === $be_pb_disabled || 'yes' == $be_pb_disabled || !isset( $be_themes_data['enable_pb'] ) || 0 == $be_themes_data['enable_pb'] ) {
		$be_pb_class = 'be-wrap no-page-builder';
		//get_template_part( 'page-breadcrumb' );
	} ?>
	<div id="content" class="no-sidebar-page">
		<div id="content-wrap" class="<?php echo $be_pb_class; ?>">
			<section id="page-content">
				<div class="clearfix">
					<?php 
						if ( post_password_required() ) {
	       	 				$content  = get_the_password_form();

	       	 			    echo '<div class="be-wrap clearfix be-section-pad">'.$content.'</div>';
	       	 			} else {
							the_content();
						}
					?>
				</div> <!--  End Page Content -->
				<?php if( isset($be_themes_data['comments_on_page']) && $be_themes_data['comments_on_page'] == 1 ) : ?>
					<div class="be-themes-comments be-row be-wrap">
						<?php comments_template( '', true ); ?>
					</div> <!--  End Optional Page Comments -->
				<?php endif; ?>
			</section>
		</div>
	</div>	<?php 
endwhile;
get_footer(); ?>