<!-- footer spécifique à votre thème -->
<!-- remplace le fichier footer.php par défaut de Wordpress -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
    <div class="col d-flex align-items-center">
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
</div>

    <?php wp_footer(); ?>
