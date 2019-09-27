<article <?php post_class(); ?>>
	<header>
		<span class="<?php echo post_icon(); ?>"></span>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part('templates/entry-meta'); ?>
	</header>
		<?php pa_post_media(); ?>
	<div class="entry-content">
		<?php pa_post_content(); ?>
	</div>
</article>
