<?php get_header(); ?>

<section class="blogposts">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article>
			<?php get_post_image(get_the_ID()); ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="author">
				Posted by <a target="_blank" href="<?php the_author_url(); ?>" rel="author"><?php the_author('display_name'); ?></a>
			</div>
			<div class="content">
				<?php the_content(); ?>
			</div>
			<footer>
				<time datetime="<?php the_time('Y-m-d H:i:s') ?>"><?php the_time('F jS, Y') ?></time>
				<?php the_tags('<ul class="tags"><li>',',</li><li>','</li></ul>'); ?>
			</footer>
			<section class="social">
				<ul>
					<li><div class="fb-like" data-send="false" data-layout="box_count" data-show-faces="false"></div></li>
					<li><a data-count="vertical" href="https://twitter.com/share" class="twitter-share-button">Tweet</a></li>
					<li><div class="g-plusone" data-size="tall"></div></li>
				</ul>
			</section>

			<?php comments_template(); ?> 

		</article>

		<?php comment_form(); ?>

	<?php endwhile; endif;?>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>