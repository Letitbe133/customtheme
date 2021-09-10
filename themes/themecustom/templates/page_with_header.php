<?php
// Template Name: Page avec header
?>

<!-- Création d'un template de page spécifique -->

<?php get_header(); ?>

<header>
    <h1>Page avec header</h1>
</header>

<div class="container">
<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>

        <?php
    }
}
?>
<!-- injection de templates spécifiques -->
<?php get_template_part('template-parts/section', 'bouton'); ?>
<?php get_template_part('template-parts/text'); ?>

</div>
<?php get_footer(); ?>