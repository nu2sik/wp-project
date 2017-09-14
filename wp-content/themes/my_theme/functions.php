<?php
function my_theme_enqueue_styles() {

    $parent_style = 'twentyseventeen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

//функция меняет заголовок поста
function my_title($title) {
	$title = $title . ' - ' . date('d.m.Y');
	return $title;
}

add_filter('the_title', 'my_title');

function head_tel($site_title) {
	$site_title = $site_title . ' - ' . '097 000 00 00';
	return $site_title;
}

add_filter('bloginfo', 'head_tel');

function do_my_shortcode($atts, $content) {
    ob_start();

    if ( isset( $atts['size'] ) ) {
        echo '<span style="font-size: ' . $atts['size'] . '">';
    }

    echo 'Мой шорткод: ' . $content;

    if ( isset( $atts['size'] ) ) {
        echo '</span>';
    }

    return ob_get_clean();
}

add_shortcode( 'my_shortcode', 'do_my_shortcode');

function shortcode_the_author_link() {
	ob_start();
	echo '<div><a href="' . get_the_author_url() . '">' . get_the_author() . '</a></div>';

	return ob_get_clean();
}

add_shortcode( 'shortcode_author_link', 'shortcode_the_author_link');

function shortcode_text_color( $atts, $content ) {
    extract(shortcode_atts(array(
		"color" => 'blue',
	), $atts));
   return '<div><span style="color: ' . $color . ';">' . $content . '</span></div>';
}
add_shortcode('text-color', 'shortcode_text_color');

function shortcode_text_column( $atts, $content ) {

   return '<div class="column" style="column-count: 2; column-gap: 10px;">' . $content . '</div>';
}
add_shortcode('text-column', 'shortcode_text_column');





function page_count( $query ) {
	if ($query->is_home() && $query->is_main_query()) {
        $query->set('posts_per_page', 3);
    }
}
add_action( 'pre_get_posts', 'page_count' );

?>