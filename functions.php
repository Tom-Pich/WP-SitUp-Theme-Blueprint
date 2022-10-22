<?php 

function su_register_assets() {
	wp_enqueue_style("SitUp", get_stylesheet_uri(), array(), "1.0");
	wp_enqueue_script( 'load-fa', 'https://kit.fontawesome.com/34ed29389d.js' );
	wp_enqueue_script('register', get_template_directory_uri().'/scripts/main.js', array(), '1.0', true);
}

function su_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

function insert_opengraph_tags() {
    global $post;

    if ( !is_singular()){return;} //if it is not a post or a page

	$og_post_title = is_front_page() ? get_bloginfo("name") : get_the_title();
	$og_post_type = is_front_page() ? "website" : "article";

	echo '<meta property="og:title" content="' . $og_post_title . '"/>';
	echo '<meta property="og:type" content="' . $og_post_type . '"/>';
	echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	echo '<meta property="og:decription" content="' . get_the_excerpt() . '"/>';

    if(!has_post_thumbnail( $post->ID )) {
        $default_image="/img/default-og-img.jpg";
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo " ";
}


add_theme_support("post-thumbnails");
add_theme_support("title-tag"); // Ajoute le titre du document dans head title
add_theme_support('editor-styles');
add_editor_style( 'editor-styles.css' );
add_action("wp_enqueue_scripts", "su_register_assets");
add_action( 'admin_menu', 'su_remove_admin_menus' ); // supprimer page menu "commentaires"
add_filter( 'show_admin_bar', '__return_false' ); // supprime la barre d’édition en front-end
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // désactive le remplacement auto des émojis
add_action( 'wp_head', 'insert_opengraph_tags', 5 ); // rajoute les tags Open Graph
add_post_type_support( 'page', 'excerpt' ); // permet les excerpts sur les posts type page

register_nav_menus(['main' => 'Menu Principal', 'footer' => 'Bas de page',]);
/* register_sidebar(['id' => 'sidebar', 'name' => 'Sidebar', 'before_widget'  => '<div class="sidebar-widget %2$s">', 'after_widget'  => '</div>',]); */