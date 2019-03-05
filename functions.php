<?php 
function yasnyy_enqueue_styles() {
    if(!is_admin()) {

        wp_enqueue_script( 'bootstrapjs', get_stylesheet_directory_uri() . '/js/bootstrap.js', array ('jquery'), '1', true);
        wp_enqueue_script( 'owl', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array ('jquery'), '1', true);
        wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/js/wow.js', array('jquery'));
        wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '1', true);
        wp_enqueue_script( 'smoothscroll', get_stylesheet_directory_uri() . '/js/SmoothScroll.js', array('jquery'), '1', true);
        wp_enqueue_script( 'html5lightbox', get_stylesheet_directory_uri() . '/js/html5lightbox/html5lightbox.js', array('jquery'), '1', true);
        wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/js/isotope.js', array('jquery'), '1', true);
        wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/js/jquery-ui.js', array('jquery'), '1', true);

        wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1', true);

        wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/css/style.css');
        wp_enqueue_style('responsive-styles', get_stylesheet_directory_uri() . '/css/responsive.css');

        add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style');
        function enqueue_parent_theme_style() {
            wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'yasnyy_enqueue_styles' );

function clean_custom_menus() {
    ob_start();
    dynamic_sidebar('top-bar-left-content');
    $sidebar_left = ob_get_contents();
    ob_end_clean();

    ob_start();
    dynamic_sidebar('top-bar-right-content');
    $sidebar_right = ob_get_contents();
    ob_end_clean();

	$menu_name = 'menu-1'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list = '<div class="header-top clearfix">' . "\n";
        $menu_list .= '<div class="left-content">' . $sidebar_left . '</div>';

        $menu_list .= '<div class="middle-content"><figure class="logo-box"><a href="/yasnyy/"><img src="/yasnyy/wp-content/themes/yasnyy/images/yasnyy-logo.svg" alt=""></a></figure></div>';

        $menu_list .= '<div class="right-content">' . $sidebar_right . '</div>';
        $menu_list .= '</div>';

        $menu_list .= '<div class="header-bottom clearfix">' . "\n";
        $menu_list .= '<figure class="logo-box"><a href="/yasnyy/"><img src="/yasnyy/wp-content/themes/yasnyy/images/yasnyy-logo.svg" alt=""></a></figure>';
        $menu_list .= '<div class="menu-area">';
        $menu_list .= '<nav class="main-menu navbar-expand-lg">';
        $menu_list .= '<div class="navbar-header">';
        $menu_list .= '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">';
        $menu_list .= '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
        $menu_list .= '</button></div>';
        $menu_list .= '<div class="navbar-collapse collapse clearfix">';
        $menu_list .= '<ul class="navigation clearfix">';

        foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
        }
        $menu_list .= '</ul>';
        $menu_list .= '</div></nav></div></div>' . "\n";

        $menu_list .= '<div class="sticky-header">';
        $menu_list .= '<div class="container clearfix">';
        $menu_list .= '<figure class="logo-box"><a href="/yasnyy/"><img src="/yasnyy/wp-content/themes/yasnyy/images/yasnyy-logo.svg" alt=""></a></figure>';
        $menu_list .= '<div class="menu-area">';
        $menu_list .= '<nav class="main-menu navbar-expand-lg">';
        $menu_list .= '<div class="navbar-header">';
        $menu_list .= '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">';
        $menu_list .= '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
        $menu_list .= '</button></div>';
        $menu_list .= '<div class="navbar-collapse collapse clearfix">';
        $menu_list .= '<ul class="navigation clearfix">';

        foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
        }
        $menu_list .= '</ul>';
        $menu_list .= '</div></nav></div></div></div>' . "\n";

	} else {
		$menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}

function yasnyy_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Top Bar Left Content',
        'id'            => 'top-bar-left-content',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="top-bar-left_title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => 'Top Bar Right Content',
        'id'            => 'top-bar-right-content',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="top-bar-right_title">',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'yasnyy_widgets_init' );

// NEWS CUSTOM POST TYPE
function room_custom_post_type() {
    $args['post-type-room'] = array(
          'labels' => array(
              'name' => __( 'Комнаты', 'ggeugene' ),
              'singular_name' => __( 'Комната', 'ggeugene' ),
              'all_items' => 'Все Комнаты',
              'add_new' => __( 'Добавить Новую', 'ggeugene' ),
              'add_new_item' => __( 'Добавить новую Комнату', 'ggeugene' ),
              'edit_item' => __( 'Изменить Комнату', 'ggeugene' ),
              'new_item' => __( 'Новая Комната', 'ggeugene' ),
              'view_item' => __( 'Просмотреть Комнату', 'ggeugene' ),
              'search_items' => __( 'Искать Комнаты', 'ggeugene' ),
              'not_found' => __( 'Комнаты не найдены', 'ggeugene' ),
              'not_found_in_trash' => __( 'Комнаты не найдены в корзине', 'ggeugene' ),
              'parent_item_colon' => __( 'Родительская Комната:', 'ggeugene' ),
              'menu_name' => __( 'Комнаты', 'ggeugene' ),
          ),
          'hierarchical' => true,
          'description' => 'Добавьте Комнаты',
          'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
          'taxonomies' => array('room_cats'),
          'menu_icon' => 'dashicons-building',
          'show_ui' => true,
          'public' => true,
          'publicly_queryable' => true,
          'exclude_from_search' => false,
          'capability_type' => 'post',
          'query_var' => 'room',
          'menu_position' => 20,
          'has_archive' => true,
          'rewrite' => array('slug' => 'nomera', 'with_front' => true)
          );
      register_post_type('room', $args['post-type-room']);
    $taxonomies = array();
    $taxonomies['taxonomy-room_cats'] = array(
      'labels' => array(
        'name' => __( 'Категории Комнат', 'ggeugene' ),
        'singular_name' => __( 'Категория Комнаты', 'ggeugene' ),
        'search_items' =>  __( 'Найти категории Комнат', 'ggeugene' ),
        'all_items' => __( 'Все категории Комнат', 'ggeugene' ),
        'parent_item' => __( 'Родительская категория Комнаты', 'ggeugene' ),
        'parent_item_colon' => __( 'Родительская категория Комнаты:', 'ggeugene' ),
        'edit_item' => __( 'Изменить категорию Комнаты', 'ggeugene' ),
        'update_item' => __( 'Обновить категорию Комнаты', 'ggeugene' ),
        'add_new_item' => __( 'Добавить новую ', 'ggeugene' ),
        'new_item_name' => __( 'Новое имя категории Комнаты', 'ggeugene' ),
        'choose_from_most_used'	=> __( 'Выберите категорию Комнаты из самых популярных', 'ggeugene' )
      ),
      'hierarchical' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'nomera' )
    );
    /* Register taxonomy: name, cpt, arguments */
    register_taxonomy('room_cats', array('room'), $taxonomies['taxonomy-room_cats']);
    register_taxonomy_for_object_type('room_cats', 'room');
  }
  add_action( 'init', 'room_custom_post_type' );