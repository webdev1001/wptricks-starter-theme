<?php
	$prevPost = get_previous_post(true);
	$nextPost = get_next_post(true);
?>

    <?php $prevPost = get_previous_post(true);
        if($prevPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $prevPost->ID
            );
            $prevPost = get_posts($args);
            foreach ($prevPost as $post) {
                setup_postdata($post);
    ?>
    <nav class="single-post-nav clearfix">
        <div class="post-previous">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p><?php $content = get_the_content(); echo wp_trim_words( $content , '28' ); ?></p>
            
             <a class="previous" href="<?php the_permalink(); ?>"><i class="fa fa-arrow-left"></i> Previous Article</a>
        </div> <!-- /.post-previous-->
    <?php
                wp_reset_postdata();
            } //end foreach
        } // end if
         
        $nextPost = get_next_post(true);
        if($nextPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $nextPost->ID
            );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post);
    ?>
        <div class="post-next">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p><?php $content = get_the_content(); echo wp_trim_words( $content , '28' ); ?></p>
            
            <a class="previous" href="<?php the_permalink(); ?>">Next Article <i class="fa fa-arrow-right"></i></a>
        </div> <!-- /.post-next -->
    </nav> <!-- /.single-post-nav -->
    <?php
                wp_reset_postdata();
            } //end foreach
        } // end if
    ?>
