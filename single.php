<?php get_header(); ?>

<section class="blogposts">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article>
			<?php get_post_image(get_the_ID()); ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="author">
				Posted by <a href="<?php the_author_url(); ?>" rel="author"><?php the_author('display_name'); ?></a>
			</div>
			<div class="content">
				<?php the_content(); ?>
			</div>
			<footer>
				<time datetime="2012-09-14"><?php the_time('F jS, Y') ?></time>
				<?php the_tags('<ul class="tags"><li>',',</li><li>','</li></ul>'); ?>
			</footer>

			<?php comments_template(); ?> 

		</article>

		<?php comment_form(); ?>

	<?php endwhile; endif;?>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>