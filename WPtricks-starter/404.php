<?php get_header(); 

/*
 * Error 404
 * Displaying pages, archives, categories, 20 blog posts
 *************************************************************/

?>

		<section>
            <div class="wrapper">
            <div class="left-content">
			<article>
				<h1>Error 404 - Not Found <i class="fa  fa-ban text-danger"></i></h1>
				<p>Sorry, but the requested resource was not found on this site.</p>
                <p>Please try searching above or take a look below to find what you're looking for.</p>

				<section class="categories">
                <h2 class="entry-title"><i class="fa fa-th-list"></i> Categories</h2>
                   <ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>
                </section>

                <section class="archives">
                <h2 class="entry-title"><i class="fa fa-archive"></i>Archives</h2>
                <ul>
                    <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
                </ul>
                </section>

                <section class="pages">
                <h2 class="entry-title"><i class="fa fa-paper-clip"></i>Pages</h2>
                    <ul><?php wp_list_pages("title_li="); ?></ul>
                </section>

                <section class="posts">
                <h2 class="entry-title"><i class="fa  fa-thumb-tack"></i> All Blog Posts:</h2>
                                  <ol><?php // Change showposts= to the amount you'd like to show on the front end.
                          $archive_query = new WP_Query('showposts=20');
                                  while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                                  <li>
                                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                                  </li>
                                  <?php endwhile; ?>
                                  </ol>
                </section>

			</article>
                </div> <!-- /.left-content -->
                <?php get_sidebar(); ?>
            </div><!-- /.wrapper -->
		</section>

<?php get_footer(); ?>