<?php
function load_javascript(){  
	wp_register_script('modernizr', get_template_directory_uri().'/js/lib/modernizr.js',null,null);
	wp_register_script('base', get_template_directory_uri().'/js/lib/base.js',null,null);
	wp_register_script('sticky', get_template_directory_uri().'/js/lib/sticky.js',null,null);
	wp_register_script('style', get_template_directory_uri().'/js/style.js',null,null);
	wp_enqueue_script('modernizr');
	wp_enqueue_script('base');
	wp_enqueue_script('jquery');
	wp_enqueue_script('sticky');
	wp_enqueue_script('style');
}
function load_styles(){
	wp_register_style('googlefonts', 'http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic',null,null);
	wp_enqueue_style('googlefonts');
}
function get_post_image($postID){
	$argsThumb = array(
		'order'          => 'ASC',
		'post_type'      => 'attachment',
		'post_parent'    => $postID,
		'post_mime_type' => 'image',
		'post_status'    => null
	);
	$attachments = get_posts($argsThumb);
	if($attachments[0]){
		echo '<figure>'.wp_get_attachment_image($attachments[0]->ID,'full').'</figure>';
	}
}
add_action('init','load_styles'); 
add_action('init','load_javascript');
?>