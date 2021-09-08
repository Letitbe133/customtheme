
<div class="row px-2">
    <div class="col">
        Copyright &copy;
    </div>
    <div class="col">
    <?php wp_nav_menu([
        'menu' => 'menu footer',
        'container' => 'footer',
        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
    ]); ?>
    </div>
</div>
    <?php wp_footer(); ?>
