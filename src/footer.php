	<footer id="colophon" class="site-footer">
    <div class="container">
      <figure class="footer-logo">
        <img src="<?php bloginfo('template_url'); ?>/images/LandmarkAuctions_Logo.svg" alt="<?php bloginfo('name'); ?>" width="273" height="62" />
      </figure>
      <hr class="divider" />
      <div class="widget-area">
        <?php if (is_active_sidebar('footer-1')){dynamic_sidebar('footer-1');} ?>
        <?php if (is_active_sidebar('footer-2')){dynamic_sidebar('footer-2');} ?>
        <?php if (is_active_sidebar('footer-3')){dynamic_sidebar('footer-3');} ?>
        <?php if (is_active_sidebar('footer-4')){dynamic_sidebar('footer-4');} ?>
      </div>
      <div class="below-widget-area">
        <?php if (is_active_sidebar('footer-5')){dynamic_sidebar('footer-5');} ?>
      </div>
      <div class="widget-logos">
        <?php if (is_active_sidebar('footer-6')){dynamic_sidebar('footer-6');} ?>
      </div>
    </div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'landmarkauctions' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'landmarkauctions' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'landmarkauctions' ), 'landmarkauctions', '<a href="https://joseguerra.dev">Jose Guerra</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
