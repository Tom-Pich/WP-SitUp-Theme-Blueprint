<?php get_header(); ?>

<h1>archive.php</h1>

<main>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

<article class="post">
	<div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
	<div class="full-width">
		<p class="post__meta"><?php the_time( get_option( 'date_format' ) ); ?></p>
		<h2><?php the_title(); ?></h2>
		<?php the_excerpt(); ?>
		<p class="align-right"><a href="<?php the_permalink(); ?>" class="post__link">Lire la suite&hellip;</a></p>
	</div>
</article>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
