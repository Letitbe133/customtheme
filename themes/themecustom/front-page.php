<!-- ce template s'applique uniquement à la page d'accueil de votre site si vous avez choisi d'avoir une page statique -->
<!-- dashboard->réglages->lecture -->

<?php get_header(); ?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

<?php if (has_post_thumbnail()) { ?>
            <div >
            <?php echo get_the_post_thumbnail(null, 'banner', ['class' => 'img-fluid']); ?>
            </div>
        <?php
        } ?>

        <h1 class="my-5"><?php the_title(); ?></h1>

        <?php the_content(); ?>


<?php
    }
}
?>

<?php get_footer(); ?>