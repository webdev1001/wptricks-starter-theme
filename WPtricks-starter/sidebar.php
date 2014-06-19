		<aside>
			<ul>
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

				<li>
					<h2>WPtricks Starter Template Theme</h2>
					<em>WPtricks Starter is a theme template built with HTML 5.</em>
                    <p>This theme has a few of my usual theme additions included to make my life just that little bit easier. Check <strong>WPtricks-starter/javascript/</strong> folder for included scripts.</p>
				</li>
				<li>
					<h2>Theme Options</h2>
					<em>WPtricks Starter uses the wp theme customizer</em>
                    <p><a href="wp-admin/customize.php">Click here to be taken to the theme customizer.</a></p>
				</li>
                <li>
                	<h2>Lightbox by magnific-popup</h2>
                    <a href="http://dimsemenov.com/plugins/magnific-popup/" target="new"><em>http://dimsemenov.com/plugins/magnific-popup/</em></a> 
                    <p>Lighbox is activated on all attachment links.</p>
                    <p><a href="<?php bloginfo('template_directory'); ?>/images/_MG_0066.jpg"><img src="<?php bloginfo('template_directory'); ?>/images/thumb.png"></a></p>
                </li>
                <li>
                	<h2>Tooltips by tooltipster</h2>
                    <a href="http://iamceege.github.io/tooltipster/" target="new"><em>http://iamceege.github.io/tooltipster/</em></a> 
                    <p>Active on all elements with a title="attribute <em> + accepts HTML</em>".</p>
                    <p><span class="tip" title="THIS IS A <h4>TOOLTIP</h4><em>With some added <strong>HTML</strong></em>">HOVER ME - <strong>SHOW TOOLTIP</strong></span></p>
                </li>
                <li>
                	<h2>Font Icons by fontawesome</h2>
                    <a href="http://fortawesome.github.io/Font-Awesome/" target="new"><em>http://fortawesome.github.io/Font-Awesome/</em></a> 
                    <p>Check-out the "<a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">Cheat Sheet</a>" for icons.</p>
                    <p><i class="fa fa-2x fa-thumbs-o-up"></i> &nbsp; <i class="fa fa-2x fa-thumbs-o-up"></i> &nbsp; <i class="fa fa-2x fa-thumbs-o-up"></i> &nbsp; <i class="fa fa-2x fa-thumbs-o-up"></i> &nbsp; <i class="fa fa-2x fa-thumbs-o-up"></i> &nbsp; <i class="fa fa-2x fa-thumbs-o-up"></i></p>
                </li>
                <li>
                	<h2>ScrollTo Hash</h2>
                    <p>Anything that links to a css ID on the page will be scrolled to.</p>
					<p>This links to the body id of #top - <a href="#top">Click me to scroll to the top!</a></p>
					<hr>
					<p>Adding a class of .noscroll to the link, will disable the scrolling.</p>
					<p>This links to the body id of #top and has a class of .noscroll - <a href="#top" class="noscroll">Click me to jump to the top!</a></p>
                </li>
				
			<?php endif; ?>
			</ul>
		</aside>