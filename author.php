<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

				<!--<h1><?php printf( __( 'Author Archives: %s', 'twentyten' ), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h1>-->

<div class="content">
<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="post">
	<div class="postimg">
		<?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        }?> 
    </div><!--end postimg-->
    
    <div class="article">

        <div class="post-left">
            <ul>
                <li><?php the_date('m/d/Y'); ?></li>
                <li><?php the_author_posts_link() ?></li>
                <li><?php comments_popup_link( __( 'Comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></li>
            </ul>
        </div><!--end post-left-->
        
        <div class="post-right">
            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?> 
        </div><!--end post-right-->
        
        </div><!--end post-->

	</div><!--end article-->


<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>