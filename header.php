<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<title><?php wp_title(''); ?></title>

        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

		<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
		<?php 
		$development = ;
		$whitelist = array( '127.0.0.1', '::1' );
		if( in_array($_SERVER['REMOTE_ADDR'], $whitelist) || $development == true; ) : ?>
			<style>
				pre {
					background: #f4f4f4;
					border: 1px solid #ddd;
					border-left: 3px solid #f36d33;
					color: #444;
					page-break-inside: avoid;
					font-family: monospace;
					font-size: 15px;
					line-height: 1.6;
					margin: 1.6em auto;
					max-width: 95%;
					overflow: auto;
					padding: 1em 1.5em;
					display: block;
					word-wrap: break-word;
				}
			</style>
		<?php endif; // if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) : ?>
	</head>
	<body <?php  $classes[] = ''; body_class($classes); ?> id="top">

	<header id="site-header" class="hpadding">
		<div class="wrapper">
			<h2 class="site-logo">
				<?php
					// Display the Custom Logo
					the_custom_logo();
					if (has_custom_logo()) { echo '<span class="has-logo">' . get_bloginfo('name') . '</span>'; }
					if (!has_custom_logo()) { bloginfo('name'); }
				?>
			</h2>
			<nav id="header-nav">
				
			</nav>
		</div><!-- /.wrapper -->
	</header><!-- /#site-header -->

