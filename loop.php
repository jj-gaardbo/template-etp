<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class("row"); ?>>

        <div class="col-xl-12">
            <!-- post title -->
            <h2>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </h2>
            <!-- /post title -->
        </div>

        <div class="col-xl-9">

		    <?php
            $excerpts = get_the_excerpt($post);
            if($excerpts === ''){
                echo wpautop(truncate_text(get_the_content(), 300));
            } else {
                echo wpautop(truncate_text($excerpts, 300));
            }?>

            <a class="btn-theme btn-theme-dark-blue view-article" href="<?php the_permalink();?>"><?php _e('Read More', 'etp-consult');?></a>

        </div>

        <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
        <div class="col-xl-3">
            <!-- post thumbnail -->

                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
                </a>

            <!-- /post thumbnail -->
        </div>
        <?php endif; ?>

	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'etp-consult' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
