<?php 

  // load css into the website's front-end
  function opm_script_enqueue(){
      wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/master.css', array(), all  );
      wp_enqueue_style('resetstyle', get_template_directory_uri() . '/css/reset.css', array(), all );
      wp_enqueue_style('fontawesonestyle', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3', all );
      wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Oxygen:400,300,700', false  );
  }
  
  add_action('wp_enqueue_scripts', 'opm_script_enqueue');
  
  
  function opm_theme_setup(){
      add_theme_support('menus');
      
      register_nav_menu('primary', 'Top Navigation');
      register_nav_menu('secondary', 'Footer Navigation');
      
      // Post Thumbnail
      add_theme_support('post-thumbnails');
      set_post_thumbnail_size( 648, 300);
  }
  
  add_action('init', 'opm_theme_setup');
  
  // Custom Excerpt
  function opm_custom_excerpt_length( $length ) {
      return 60;
  }
  add_filter( 'excerpt_length', 'opm_custom_excerpt_length', 999 );
  
  // Custom Header
  add_theme_support('custom-header');
  add_theme_support('custom-background');
  add_theme_support('title-tag');
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'video', 'chat') );
  
  add_theme_support( 'custom-logo', array(
    'height'      => 240,
    'width'       => 240,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
  ) );
  
  
  // Sidebar Functions
  
  function opm_widget_setup(){
    register_sidebar(array(
      
      'name' => 'Sidebar',
      'ID'   => 'Sidebar-1',
      'class'=> 'custom',
      'description' => 'Top Sidebar',
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => "</li>\n",
      'before_title' => '<h2 class="widgettitle">',
      'after_title' => "</h2>\n",
      )
    );
    register_sidebar(array(
      
      'name' => 'Sidebar',
      'ID'   => 'Sidebar-2',
      'class'=> 'custom',
      'description' => 'Middle Sidebar',
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => "</li>\n",
      'before_title' => '<h2 class="widgettitle">',
      'after_title' => "</h2>\n",
      )
    );
  }
  
  add_action('widgets_init', 'opm_widget_setup')
  

?>