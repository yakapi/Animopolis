<?php
// Ajout Option ACF Pro

if(function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

/* Autoriser les fichiers SVG  <?xml version="1.0" encoding="utf-8"?> ajouter cette ligne de code a nos svg*/
function wpc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

// Ajout des fonctionnaliter de theme
      // Ajouter la prise en charge des images mises en avant
      add_theme_support( 'post-thumbnails' );

      // Ajouter automatiquement le titre du site dans l'en-tête du site
      add_theme_support( 'title-tag' );

      // Ajouter un logo perso
      add_theme_support( 'custom-logo', array(
          // 'height' => 74,
          // 'width'  => 74,
      ) );

      // Add default posts and comments RSS feed links to head.
    	add_theme_support( 'automatic-feed-links' );

      // Add theme support for selective refresh for widgets.
      // add_theme_support( 'customize-selective-refresh-widgets' );

      // Ajouter un background perso
      $defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
        'default-position-x'     => 'left',    // 'left', 'center', 'right'
        'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
        'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
        'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
        'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
        'default-color'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
        );
        add_theme_support( 'custom-background', $defaults );


        // // Ajout jQuery CDN
        //   add_action( 'init', 'wpm_jquery' );

        //   function wpm_jquery() {
        //   if ( !is_admin() ) {
        //   //La fonction supprime l'utilisation du fichier original de JQuery sur votre serveur
        //       wp_deregister_script( 'jquery' );
        //   //Elle enregistre alors le nouvel emplacement de JQuery, chargé depuis le CDN de Google
        //       wp_register_script( 'jquery', get_template_directory_uri() . 'assets/js/external/jquery/jquery.js', false, null, true );
        //   //La fonction charge JQuery
        //   }
        // }
        // Ajoute proprement les enqueue scripts et styles

              function wpdocs_theme_name_scripts() {
                  wp_enqueue_style( 'style-principale', get_stylesheet_uri() );
                  wp_enqueue_style( 'font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css');
                  // wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
                  wp_enqueue_script( 'ex-jquery', get_template_directory_uri() . '/assets/js/jquery-3.4.1.js', array(), '1.0.0', false );
                  wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/carousel.js', array(), '1.0.0', true );
                  wp_enqueue_script( 'progress-bar', get_template_directory_uri() . '/assets/js/progress-bar.js', array(), '1.0.0', true );
                  wp_enqueue_script( 'filter-cat', get_template_directory_uri() . '/assets/js/filter-cat.js', array(), '1.0.0', true );
                  wp_enqueue_style( 'toolbox', get_template_directory_uri() . '/assets/css/toolbox.css', array(), '1.0' );
                  wp_enqueue_script( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js');
              }
              add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


        // Ajout des fonctionnaliter MENU
          function mytheme_menus() {

          	$locations = array(
          		'primary'  => __( 'Desktop Horizontal Menu', 'twentytwenty' ),
          		'expanded' => __( 'Desktop Expanded Menu', 'twentytwenty' ),
          		'mobile'   => __( 'Mobile Menu', 'twentytwenty' ),
          		'footer'   => __( 'Footer Menu', 'twentytwenty' ),
          		'social'   => __( 'Social Menu', 'twentytwenty' ),
          	);

          	register_nav_menus( $locations );
          }

          add_action( 'init', 'mytheme_menus' );


// Ajout de Zone pour les widgets
function animopolis_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'animopolis' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets for your blog here.', 'animopolis' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title h5">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Menu Widgets', 'animopolis' ),
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Add widgets you want in the menu panel here.', 'animopolis' ),
        'before_widget' => '<section id="%1$s" class="widget menu-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title h5">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer_Widgets', 'animopolis' ),
        'id'            => 'sidebar-3',
        'description'   => esc_html__( 'Add widgets you want in the footer here.', 'animopolis' ),
       'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title h5">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'animopolis_widgets_init' );


// Custom Register ShortCode
function custom_regist(){

  $html = '<form id="c_register_form" class="c_register_form" action="" method="post">
    <div class="row_form">
      <label for="register_name">Identifiant :</label>
      <input type="text" id="register_name" name="login" value="">
    </div>
    <div class="row_form">
      <label for="register_password">Mot de Passe :</label>
      <input type="password" id="register_password" name="pswd" value="">
    </div>
    <div class="row_form">
      <label for="register_mail">E-mail :</label>
      <input type="email" id="register_mail" name="mailOf" value="">
    </div>
    <div class="c-sub-form row_form">
      <input type="submit" id="register_sub" class="register-sub" name="sub" value="Inscription">
    </div>
  </form>';
  return $html;
}

add_shortcode( 'register_form', 'custom_regist' );


// Redirection page (empeche l'utilisateur d'aller sur une page dite si il n'est pas connecter)
function wpm_ressource_redirect(){
  if( is_page( 'data' ) && ! is_user_logged_in() ){
      wp_redirect( home_url( '/connexion/' ) );
      exit;
  }
}
add_action( 'template_redirect', 'wpm_ressource_redirect' );


// Affichage de la barre admin
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}

add_action('after_setup_theme', 'remove_admin_bar');

// Custom Post Type
function all_register_post_types() {

    // CPT Espace Animaux
    $labels = array(
        'name' => 'Espace',
        'all_items' => 'Tous les espaces',  // affiché dans le sous menu
        'singular_name' => 'Espace',
        'add_new_item' => 'Ajouter un espace',
        'edit_item' => 'Modifier l\'espace',
        'menu_name' => 'Espace'
    );

	   $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'show_nav_menus' => true,
        'has_archive' => true,
        'taxonomies' => array('category', 'post_tag'),
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
	     );

	   register_post_type( 'espace', $args );

     // CPT Marque
     $labels = array(
         'name' => 'Marque',
         'all_items' => 'Tous les marques',  // affiché dans le sous menu
         'singular_name' => 'marque',
         'add_new_item' => 'Ajouter une marque',
         'edit_item' => 'Modifier la marque',
         'menu_name' => 'Marque'
     );

     $args = array(
         'labels' => $labels,
         'public' => true,
         'show_in_rest' => true,
         'has_archive' => true,
         'can_export'  => true,
         'taxonomies' => array('category', 'post_tag'),
         'supports' => array( 'title', 'editor','thumbnail' ),
         'menu_position' => 5,
         'menu_icon' => 'dashicons-admin-customizer',
       );

     register_post_type( 'marque', $args );
}
add_action( 'init', 'all_register_post_types' ); // Le hook init lance la fonction

 ?>
