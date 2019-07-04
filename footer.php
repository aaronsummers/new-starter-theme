		<footer id="site-footer">
			<div class="wrapper">
				<?php
					$social_media = get_theme_mod( 'my_setting', array() );
					if ( $social_media ) :
						foreach ( $social_media as $social_add ) :
							echo '<a href="' . $social_add['link_url'] . '"><i class="icon-' . $social_add['social_site'] . '"></i></a>';
						endforeach;
					endif;
					// check to see if the logo exists and add it to the page
					if ( get_theme_mod( 'footer_logo' ) ) { ?>
					<div class="footer-logo">
						<img src="<?php echo get_theme_mod( 'footer_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
					</div><!-- /.footer-logo -->
				<?php } ?>

				<?php
				if( get_theme_mod('checkbox_footer_add') ) {
					theme_slug_show_social_icons();
				} 
				?>
			</div>
			<div class="footer-branding"><small>Created by <a href="https://makeagency.co.uk">Make Agency</a></small></div><!-- /.footer-branding -->
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
