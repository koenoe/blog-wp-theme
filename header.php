<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php wp_title(''); ?> <?php if ( !(is_404()) && (is_single()) or (is_page()) or (is_archive()) ) { ?> | <?php } ?><?php bloginfo('name');?></title>
		
		<meta charset="utf-8">
		<meta name="description" content="Personal blog about development and photography. Written by a freelance photographer and a developer working for Mangrove.">
		<meta name="keywords" content="photography, strobist, photographer, developer, development, programming" />
		<meta name="author" content="Koen Romers">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="shortcut icon" href="/favicon.ico" type="image/ico">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php wp_head(); ?>
	</head>
	<body>
		<div class="wrap">