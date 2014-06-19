
<?php
/* MAIN THEME LOOP FOR SINGLE(POSTS & PAGES), ARCHIVES (ALL), ATTACHMENT PAGES (IMAGES) */


/* DISPLAY PAGE AND POST CONTENT ON SINGLE POST & SINGLE PAGES
 *****************************************************/
if ( is_page() || is_single() && !is_attachment() ) {

 if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="main-body">
			<div class="wrapper">
			<div class="left-content">
				<article id="post-<?php the_ID(); ?>">
					<header>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<p>Posted on <?php the_time('F jS, Y'); ?> by <?php the_author(); ?></p>
					</header>
					<section>
						<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>
	
					</section>
					<footer>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
	
						<p>
							This entry was posted on <?php the_time('l, F jS, Y'); ?> at <?php the_time(); ?> and is filed under <?php the_category(', ') ?>. 
							You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.
	
							<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// both comments and pings open ?>
								You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
	
							<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// only pings are open ?>
								Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
	
							<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// comments are open, pings are not ?>
								You can skip to the end and leave a response. Pinging is currently not allowed.
	
							<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// neither comments nor pings are open ?>
								Both comments and pings are currently closed.
	
							<?php } edit_post_link('Edit this entry','','.'); ?>
							<?php echo add_this(); ?>
						</p>
					</footer>
				</article>
	
				
					<?php include_once('_next-previous-posts.php') ?>
				
	
				<?php comments_template(); ?>

				<?php endwhile; else: ?>
			
					<section>
						<article>
							<p>Sorry, no posts matched your criteria.</p>
						</article>
					</section>
			
				<?php endif; ?>
				</div> <!-- /.left-content -->
				<?php get_sidebar(); ?>
				
			</div> <!-- /.wrapper -->
		</section>
<?php } // END - DISPLAY PAGE AND POST CONTENT ON SINGLE POST & SINGLE PAGES ?>
  
  

<?php 
/* DISPLAY POSTS ON HOME, ARCHIVE AND SEARCH PAGES
 *****************************************************/
	if ( is_home() || is_archive() || is_search() ) {
?>	  
		
	<section class="main-body">
			<div class="wrapper">
			<div class="left-content">

		<?php if (have_posts()) : 
			// If we're on any page then display the title for it.
		?>

			<?php $post = $posts[0]; ?>
			<?php if (is_category()) { ?>
			<h1>Archive for the &ldquo;<?php single_cat_title(); ?>&rdquo; Category</h1>

			<?php } elseif(is_tag()) { ?>
			<h1>Posts Tagged &ldquo;<?php single_tag_title(); ?>&rdquo;</h1>

			<?php } elseif (is_day()) { ?>
			<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

			<?php } elseif (is_month()) { ?>
			<h1>Archive for <?php the_time('F, Y'); ?></h1>

			<?php } elseif (is_year()) { ?>
			<h1>Archive for <?php the_time('Y'); ?></h1>

			<?php } elseif (is_author()) { ?>
			<h1>Author Archive</h1>
			
			<?php } elseif (is_search()) { ?>
			<h1>Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;</h1>

			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Blog Archives</h1>

		<?php } ?>
				<?php while (have_posts()) : the_post(); ?>
	
				<article id="post-<?php the_ID(); ?>">
					<header>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<p>Posted on <?php the_time('F jS, Y'); ?> by <?php the_author(); ?></p>
					</header>
					<section>
						<?php the_excerpt('Read more on "'.the_title('', '', false).'" &raquo;'); ?>
	
					</section>
					<footer>
						<p><?php the_tags('Tags: ', ', ', '<br>'); ?> Posted in <?php the_category(', '); ?> &bull; <?php edit_post_link('Edit', '', ' &bull; '); ?> <?php comments_popup_link('Respond to this post &raquo;', '1 Response &raquo;', '% Responses &raquo;'); ?></p>
					</footer>
				</article>
	
				<?php endwhile; ?>
	
				<nav>
					<p><?php posts_nav_link('&nbsp;&bull;&nbsp;'); ?></p>
				</nav>
	
				<?php else : ?>
	
				<article>
					<h1>Not Found</h1>
					<p>Sorry, but the requested resource was not found on this site.</p>
					<?php get_search_form(); ?>
				</article>
	
				<?php endif; ?>

				</div> <!-- /.left-content -->
				<?php get_sidebar(); ?>
			</div><!-- /.wrapper -->
		</section>
<?php } // END - DISPLAY POSTS ON HOME, ARCHIVE AND SEARCH PAGES ?>

<?php 
/* SINGLE ATTATCHMENT/IMAGE PAGE
 *****************************************************/
	if ( is_attachment() ) {
?>	  
			
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="main-body">
			<div class="wrapper">
			<div class="left-content">
			<article id="post-<?php the_ID(); ?>">
				<header>
					<h1><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h1>
					<p><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
				</header>
				<section>
					<?php if (!empty($post->post_excerpt)) the_excerpt(); // the caption ?>
					<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>

					<nav>
						<p><?php previous_image_link(); ?> &bull; <?php next_image_link(); ?></p>
					</nav>
				</section>
				<footer>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

					<p>
						This entry was posted on <?php the_time('l, F jS, Y'); ?> at <?php the_time(); ?> and is filed under <?php the_category(', ') ?>. 
						You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// both comments and pings open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// only pings are open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// comments are open, pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// neither comments nor pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry','','.'); ?>

					</p>
				</footer>
			</article>

		<?php include_once('_next-previous-posts.php') ?>

		<?php comments_template(); ?>


	<?php endwhile; else: ?>

		<section>
			<article>
				<p>Sorry, no posts matched your criteria.</p>
			</article>
		</section>

	<?php endif; ?>
	
				</div> <!-- /.left-content -->
				<?php get_sidebar(); ?>
				
			</div> <!-- /.wrapper -->
		</section>
		
<?php } // END - SINGLE ATTATCHMENT/IMAGE PAGE ?>
