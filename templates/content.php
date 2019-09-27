<article <?php post_class(); ?>>
	<header>
	  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<?php 
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	  the_post_thumbnail();
	} 
	?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<footer>
      <?php //get_template_part('templates/entry-meta'); ?>
	</footer>
</article>



