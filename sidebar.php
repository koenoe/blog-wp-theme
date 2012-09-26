<aside id="mainaside" class="sticky">
	<div id="logo">
		<h1>
			<a href="/">
				Koen<em>Romers</em>
				<span><?php bloginfo('description'); ?> </span>
			</a>
		</h1>
		<div class="intro">
			<p>I'm a developer working for <a href="http://www.mangrove.com" target="_blank">Mangrove</a> and a freelance photographer.</p>
			<p>This blog is mainly about my project, experimenting with a new programming language or framework every month for one year.</p>
		</div>
	</div>
	<div class="block categories">
		<h3><?php _e('Categories'); ?></h3>
		<ul>
			<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
		</ul>
	</div>
</aside>