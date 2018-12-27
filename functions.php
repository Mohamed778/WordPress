<?php 

require_once('wp-bootstrap-navwalker.php');
add_theme_support('post-thumbnails');

function new_add_style()
{
   wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
   wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
}

function new_add_script()
{
   wp_deregister_script('jquery');
   wp_register_script('jquery', includes_url('/js/jquery/jquery.js'). false, '', true);
   wp_enqueue_script('jquery');
   wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);
   wp_enqueue_script('plugin-js', get_template_directory_uri() . '/js/plugin.js', array('jquery'), false, true);
   wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js');
   wp_script_add_data('html5shiv','conditional','lt IE 9');
   wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js');
   wp_script_add_data('respond','conditional','lt IE 9');
}

function add_menu(){
   register_nav_menu('bootstrap-menu', __('Navigation bar'));
}

function nav_menu(){
   wp_nav_menu(array(
      'theme_location' => 'bootstrap-menu',
      'menu_class'     => 'navbar-nav ml-auto',
      'container'      => false,
      'depth'          => 2,
      'walker'         => new wp_bootstrap_navwalker()
   ));
}
function wpdocs_custom_excerpt_length( $length ) {
   return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wpdocs_excerpt_more( $more ) {
   return ' ...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

add_action( 'wp_enqueue_scripts', 'new_add_style' );
add_action( 'wp_enqueue_scripts', 'new_add_script' );
add_action('init', 'add_menu');


function pagination_numbering(){
   global $wp_query;

   $all_pages = $wp_query->max_num_pages;

   $current_page = max(1, get_query_var('paged'));

   if ($all_pages > 1){
      return paginate_links(array(
         'base' => get_pagenum_link() . '%_%',
         'format' => '/page/%#%',
         'current' => $current_page,
      ));
   }
}
function main_sidebar(){
   register_sidebar(array(
      'name' => 'main sidebar',
      'id' => 'main-sidebar',
      'class' =>'main-sidebar',
      'before_widget' => '<div class="widget-content">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'

   ));
}

add_action('widgets_init', 'main_sidebar');
?>
