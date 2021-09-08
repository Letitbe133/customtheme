<?php

function customtheme_enqueue_scripts()
{
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css');

    // ajout custom css
    wp_enqueue_style('custom-css', get_stylesheet_uri(), ['bootstrap-css']);

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js', [], false, true);
    // ajout du custom js
    wp_enqueue_script('custom-js', get_template_directory_uri().'/js/main.js', ['bootstrap-js'], false, true);
}

function customtheme_li_class($classes)
{
    $classes = [];
    $classes[] = 'nav-item';

    return $classes;
}

function customtheme_link_class($attr)
{
    $attr['class'] = 'nav-link';

    return $attr;
}

function customtheme_setup()
{
    // add thumbnail support to theme
    add_theme_support('post-thumbnails');
    // add menus support
    // add_theme_support('menus');

    // enregistrer le menu dans wp
    register_nav_menus([
        'header' => 'Menu Principal',
        'menu footer' => 'Menu footer',
    ]);

    // ajout tailles d'images perso
    add_image_size('icon', 64, 64, ['x_crop_position' => 'center', 'y_crop_position' => 'center']);
    add_image_size('banner', 1200, 300, true);
}

// ajout des features supportées par le thème
add_action('after_setup_theme', 'customtheme_setup');
// ajouter le script et la stylesheet Bootstrap à notre thème
add_action('wp_enqueue_scripts', 'customtheme_enqueue_scripts');

// application d'un filtre pour les classes li de la navbar
add_filter('nav_menu_css_class', 'customtheme_li_class');
// application d'un filtre pour les classes a de la navbar
add_filter('nav_menu_link_attributes', 'customtheme_link_class');
