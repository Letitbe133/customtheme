<!-- c'est le template de base pour afficher la liste de vos articles -->
<!-- vous pouvez aussi utiliser un template home.php qui est plus spécifique et sera utilisé par Wordpress à la place d' index.php -->

<?php get_header(); ?>

<?php wp_nav_menu([
    'menu' => 'header',
    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
    'container_class' => 'collapse navbar-collapse',
]); ?>

</div>
</nav> -->
<div class="container">
<?php if (have_posts()) { ?>

    <div class="row">
        <div class="col"><?php customtheme_generate_pagination(); ?>
    </div>
    </div>

    <div class="row">

    <?php
    while (have_posts()) {
        the_post(); ?>
    <div class="col">
        <div class="card">
        <?php $post_id = get_post_thumbnail_id();
        $alt = get_post_meta($post_id, '_wp_attachment_image_alt', true); ?>
            <!-- <?php the_post_thumbnail('medium'); ?> -->
            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text">
                <?php if (has_excerpt()) {
            the_excerpt();
        } else {
            the_content();
        } ?>
                </p>
                <?php if (has_category()) {
            $categories = get_the_category();
            foreach ($categories as $category) {
                // pour debug
                // var_dump(get_category_link($category));
                // exit;

                $cat_link = get_category_link($category);
                echo "<a href='{$cat_link}'>{$category->name}</a>";

                // pour debug
                // var_dump($category->name);
            }
        } ?>
                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Voir plus</a>

            </div>
        </div>
    </div>
<?php
    } ?>
    </div>
<?php
} else { ?>
    <h2>Aucun article pour le moment</h2>
<?php }
?>

</div>

<?php get_footer(); ?>