<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

?>

<?php if ( is_home() ) :
	the_date('l, j\/n\/Y', '<p class="data-home">', '</p>'); 
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta link-alt">
			<?php 
				if ( has_post_format( array('aside', 'image', 'link', 'quote') ) && is_home() ) :
					echo '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark" class="link-alt">&#35;</a>&nbsp;&middot;';
				elseif ( is_single() && ! is_page() ) :
					echo get_the_time( 'j/n/y, G\hi' );
					echo '&nbsp;&middot;';
				endif ?>

			<?php if ( comments_open() || get_comments_number() ) :
				comments_popup_link( '<span>0</span>', '<span>1</span>', '<span>%</span>', 'comment-link link-alt', '' );
			endif; ?>
			<?php if ( ( 'post' || 'podcast' === get_post_type() ) && ( ! in_category( array( 'post-livre', 'patrocinios' ) ) && ! has_tag( array( 'como-eu-trabalho', 'na-mochila', 'escritorio-em-casa' ) ) ) ) : ?>
				<span class="author-<?php the_author_meta('ID'); ?>">&middot; por <?php echo get_the_author(); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->

	<?php
	if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	elseif ( has_post_format( 'quote' ) && ! is_singular() ) : 
		the_title( '<h2 class="entry-title">', '</h2>' );
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif; 
	?>
</header><!-- .entry-header -->

<?php if ( is_singular() ) :
	dez_post_thumbnail(); 
endif; ?>

<div class="entry-content">
	<?php the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue lendo<span class="screen-reader-text"> "%s"</span>', 'dez' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			wp_kses_post( get_the_title() )
		)
	); ?>
</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php if ( is_single() && shortcode_exists( 'sc' ) ) : 
	echo do_shortcode('[sc name="pos-posts"][/sc]'); 
endif; ?>