
<?php
// contient toutes les fonctions nécessaires au fonctionnement du thème

function customtheme_enqueue_scripts()
{
    // on intègre la librairie css Bootstrap pour pouvoir l'utiliser dans le thème
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css');

    // ajout custom css
    wp_enqueue_style('custom-css', get_stylesheet_uri(), ['bootstrap-css']);

    // ajout d'une autre feuille de style en fonction de vos besoins
    wp_enqueue_style('theme_css', get_template_directory_uri().'/css/theme.css', ['custom-css']);

    // ajout du js Bootstrap
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

    // add title-tag support to theme
    add_theme_support('title-tag');

    // enregistrer le menu dans wp
    register_nav_menus([
        'header' => 'Menu Principal',
        'menu footer' => 'Menu footer',
    ]);

    // ajout tailles d'images perso
    // penser à régénérer les plugins après avoir créé une ou des tailles personnalisées
    // voir le plugin "Regenerate Thumbnails"
    add_image_size('icon', 64, 64, ['x_crop_position' => 'center', 'y_crop_position' => 'center']);
    add_image_size('banner', 1900, 250, true);
}

// on génrère note pagination bootstrap custom
function customtheme_generate_pagination()
{
    // on récupère les liens de pagination sous forme de tableau
    $pages = paginate_links([
        'type' => 'array',
    ]);
    // on affiche le markup html
    echo '<nav aria-label="Page navigation example"><ul class="pagination">';

    // on boucle sur les pages
    foreach ($pages as $page) {
        // on recherche si cuurent est présent dans la chaûne de caractères
        $active = strpos($page, 'current') ? 'active' : '';

        echo '<li class="page-item '.$active.'">';
        // on remplace dans la chaîne de carcatères la classe wordpress page-numbers par page-link de bootstrap
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }

    echo '</ul></nav>';
}

// ajout des features supportées par le thème
add_action('after_setup_theme', 'customtheme_setup');
// ajouter le script et la stylesheet Bootstrap à notre thème
add_action('wp_enqueue_scripts', 'customtheme_enqueue_scripts');

// application d'un filtre pour les classes li de la navbar
add_filter('nav_menu_css_class', 'customtheme_li_class');
// application d'un filtre pour les classes a de la navbar
add_filter('nav_menu_link_attributes', 'customtheme_link_class');
