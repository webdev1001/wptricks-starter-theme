<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>

		<section>
			<div class="wrapper">
				<div class="left-content">
					<article>
						<h1>Favorite Links</h1>
						<ul>
							<?php wp_list_bookmarks(); ?>
						</ul>
					</article>
				</div> <!-- /.left-content -->
				<?php get_sidebar(); ?>
				
			</div> <!-- /.wrapper -->
		</section>

<?php get_footer(); ?>