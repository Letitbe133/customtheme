<?php get_header(); ?>

<div class="container">
<?php if (have_posts()) { ?>

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
                <?php the_content(); ?>
                </p>
                <!-- <small><?php the_category(); ?></small> -->
                <?php if (has_category()) {
            $categories = get_the_category();
            foreach ($categories as $category) {
                // var_dump(get_category_link($category));

                // exit;
                $cat_link = get_category_link($category);
                echo "<a href='{$cat_link}'>{$category->name}</a>";
                // var_dump($category->name);
            }
        } ?>
                <!-- <a class="btn btn-primary" href="<?php the_permalink(); ?>">Voir plus</a> -->
            </div>
        </div>
    </div>
<?php
    } ?>
    </div>
<?php
}
?>
</div>
<?php get_footer(); ?>