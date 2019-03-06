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

function get_rooms_slider() {

    $args = array(
        'orderby' => 'name',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'post_type' => 'room',
        'post_status' => 'publish'
    );

    $query = new WP_Query($args);

    $string = '';

    if($query->have_posts()) {

        foreach($query->posts as $post) {
            $string .= '<div class="single-item inner-box">';
            $string .= '<figure class="image-box">';
            $string .= '<img src="' . get_the_post_thumbnail_url($post->ID) . '">';
            $string .= '<div class="overlay-box"><div class="overlay-inner"><div class="content">';
            $string .= '<a href="' . get_the_permalink($post->ID) . '" class="link"><i class="icon fas fa-link"></i></a>';
            $string .= '</div></div></div></figure>';

            $string .= '<div class="lower-content">';
            $string .= '<div class="price">₴' . get_field('room_price', $post->ID) . '<span>в сутки</span></div>';
            $string .= '<h3><a href="' . get_the_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h3>';
            $string .= '<div class="text">' . get_field('room_excerpt', $post->ID) . '</div>';
            $string .= '<ul class="info-box">';
            $string .= '<li class="link"><a href="' . get_the_permalink($post->ID) . '">Подробнее</a></li>';
            $string .= '<li><i class="flaticon-television"></i></li><li><i class="flaticon-wifi-connection-signal-symbol"></i></li>';
            $string .= '</ul></div></div>';
        }

    }

    else $string .= 'No rooms found';

    return $string;

}

function custom_breadcrumbs() {
       
    // Settings
    $separator          = '<div class="breadcrumbs-arrow"></div>';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Главная';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'room';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive">' . post_type_archive_title($prefix, false) . '</li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive">' . $custom_tax_name . '</li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                // echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat">' . single_cat_title('', false) . '</li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '">' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '">' . get_the_time('M') . ' Archives</li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '">' . 'Author: ' . $userdata->display_name . '</li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '">Search results for: ' . get_search_query() . '</li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}