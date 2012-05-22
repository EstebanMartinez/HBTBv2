<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>
<div class="content">

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

<?php posts_nav_link(); ?>

</div><!--end content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>