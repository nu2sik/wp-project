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


//шорткод в две колонки
add_shortcode('two_columns', 'two_columns_func');


function two_columns_func($atts, $content) {
	ob_start();
	?>

	<div class="two_columns">
     	<?=do_shortcode($content);?>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('column1', 'column1_func');
add_shortcode('column2', 'column1_func');  //два обработчика одной функции

function column1_func($atts, $content) {
	ob_start();
	?>

	<div class="column">
     	<?=$content;?>
	</div>
	<?php
	return ob_get_clean();
}

/*add_shortcode('column2', 'column2_func');

function column2_func($atts, $content) {
	ob_start();
	?>

	<div class="column_right">
     	<?=$content;?>
	</div>
	<?php
	return ob_get_clean();
}
*/
//remove_action('the_content', 'wpautop');   //удаляем пробелы у тега p

add_action('add_meta_boxes_page', 'my_add_metabox');

function my_add_metabox($post) {
    add_meta_box(
        'my-meta-id',
        __( 'My metabox', 'my-text-domain' ),
        'render_my_metabox',
        'page',
        'side',
        'default'
    );
}

function render_my_metabox($post) {
    $value = get_post_meta($post->ID, 'new_field', true);
     $select = get_post_meta($post->ID, 'my_sel', true);
     $check = get_post_meta($post->ID, 'my_check', true);
    ?>
    <p>
    <input type="text" name="new_field" id="new_field" value=<?=$value;?> >
    </p>

    <select name="my_sel">
      <option value="24" <?php if ($select == 24) echo 'selected="selected"';?> >Вариант 24</option>
      <option value="abc" <?php if ($select == 'abc') echo 'selected="selected"';?> >Другой вариант</option>
    </select>

    <p>
      <label for="my_check">
        <input type="checkbox" name="my_check" id="my_check" value="1" <?php if ($check) echo 'checked="checked"';?> >
        Отметка
      </label>
    </p>

    <?php
}

add_action('save_post', 'my_metabox_save');

function my_metabox_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
// echo '<pre>';
//     var_dump($_POST);
// echo '</pre>';
//     wp_die();

    if ( !isset($_POST['new_field']) ) return $post_id;

   // Sanitize the user input.
    $mydata = sanitize_text_field( $_POST['my_phone'] );
    $select = sanitize_text_field( $_POST['my_sel'] );

    $check = isset($_POST['my_check']) ? 1 : 0;

    // Update the meta field.
    update_post_meta( $post_id, 'my_phone', $mydata );
    update_post_meta( $post_id, 'my_sel', $select );


    update_post_meta( $post_id, 'my_check', $check );

}




?>