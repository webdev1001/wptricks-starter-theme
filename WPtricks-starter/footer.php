		<footer>
            <div class="wrapper">
                <div class="footer clearfix">
                    <ul><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-one')) : endif; ?></ul>
                    <ul><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-two')) : endif; ?></ul>
                    <ul><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-three')) : endif; ?></ul>
                    <ul><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-four')) : endif; ?></ul>
                </div>
                <footer class="lower-footer">
                    <div>
                        &copy; <?php echo date('Y'); ?> <span id="copyright-message"><?php echo get_theme_mod( 'wptricks_footer_copyright_text' ); ?></span> 
                        <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> 
                        	 - 
                         <a href="http://wptricks.co.uk/" title="WordPress Theme Design">WPtricks Starter Theme</a>
                    </div>
						<?php my_social_media_icons(); ?>
                </footer>
			</div> <!-- /.wrapper -->
		</footer>
		<?php wp_footer(); ?>

	<!-- JAVASCRIPT -->
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/jquery.tooltipster.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/jquery.magnific-popup.js"></script>
    <!-- ADD JS CALLS IN WPTRICKS-STARTER.JS -->
		<script src="<?php bloginfo('template_directory'); ?>/javascript/wptricks-starter.js"></script>
        
	</body>
</html>