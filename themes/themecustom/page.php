<!-- page.php est le template générique qui sera appliqué par défaut aux pages -->

<?php get_header(); ?>

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
</div>
<?php get_footer(); ?>