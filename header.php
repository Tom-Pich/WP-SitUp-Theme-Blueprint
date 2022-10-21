<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/img/favicon.png" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
<?php wp_body_open(); ?>

<header>

	<div class="header__titles-wrapper">
		<a href="/">
			<img src="<?= get_template_directory_uri() ?>/img/logo.svg" alt="Logo de l’entreprise" id="header-main-logo">
		</a>
		<div>
			<h1>Titre du site</h1>
			<h2>Slogan</h2>
		</div>
	</div>

	<button id="toggle-menu-button" class="phone" onclick="toggleNavMenu()">
		<svg width="76.47" height="51.43" version="1.1" viewBox="0 0 76.47 51.43" xmlns="http://www.w3.org/2000/svg">
			<path d="m2.5 2.5h71.47" style="fill:none;stroke-linecap:round;stroke-width:7;stroke:#000"/>
			<path d="m2.5 25.73h71.47" style="fill:none;stroke-linecap:round;stroke-width:7;stroke:#000"/>
			<path d="m2.5 48.93h71.47" style="fill:none;stroke-linecap:round;stroke-width:7;stroke:#000"/>
		</svg>
	</button>

	<?php wp_nav_menu(['theme_location' => 'main', 'container' => 'ul', "menu_id" => "header-menu-wide", "menu_class" => "menu desktop"]); ?>
	<?php wp_nav_menu(['theme_location' => 'main', 'container' => 'ul', "menu_id" => "header-menu-phone", "menu_class" => "menu phone"]); ?>

</header>