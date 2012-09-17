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
				<?php the_content(__('Read more')); ?>
			</div>
			<footer>
				<time datetime="2012-09-14"><?php the_time('F jS, Y') ?></time>
				<?php the_tags('<ul class="tags"><li>',',</li><li>','</li></ul>'); ?>
				<?php comments_popup_link('0 comments','1 comment','% comments','comments'); ?>
			</footer>
		</article>

	<?php endwhile; else: ?>
		<article>
			<h2><a href="/">Nothing found</a></h2>
			<p><?php _e('Sorry, page not found. Are you a bit lost?'); ?></p>
		</article>
	<?php endif; ?>

	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<nav class="paging">
			<div class="previous"><?php next_posts_link('<span>&larr;</span> Older posts'); ?></div>
			<div class="next"><?php previous_posts_link('Newer posts <span>&rarr;</span>'); ?></div>
		</nav>	
	<?php endif; ?>
	
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>