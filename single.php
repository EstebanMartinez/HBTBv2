<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div class="content">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }?>
                    
                    <div class="page-post">
                    <div class="article">
					<h1><?php the_title(); ?></h1>

						<div class="post-meta"><?php twentyten_posted_on(); ?></div>
						
						<div class="post-content"><?php the_content(); ?></div>
						
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

				
                <div class="post-choose">
                	<div class="post-choose-left">
						<?php previous_post_link( '%link', '' . _x( '&laquo;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
					</div><!--end post-choose-left-->
                    
                    <div class="post-choose-right">
						<?php next_post_link( '%link', '%title ' . _x( '&raquo;', 'Next post link', 'twentyten' ) . '' ); ?>
                    </div><!--end post-choose-right-->
				</div><!--end post-choose-->
                
                </div><!--end article-->
                </div><!--end post-->
                
                <div class="authorinfo">
                	<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
							
                            <div class="authorleft">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
							</div><!--end authorleft-->
                            
                            <!--<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>-->
                            
                            <div class="authorright">
								<?php the_author_meta( 'description' ); ?>
                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                    <?php printf( __( 'Read more by %s &raquo;', 'twentyten' ), get_the_author() ); ?>
                                </a>
                            </div><!--end authorright-->
					<?php endif; ?>
                </div><!--end authorinfo-->
                
				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>