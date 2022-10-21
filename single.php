<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

<main>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

<article class="post">

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
		<p class="post__meta">Publié le <?php the_time( get_option( 'date_format' ) ); ?></p>
	</div>
	<div class="full-width">
		<?php the_content(); ?>
	</div>


</article>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>