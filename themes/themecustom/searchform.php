<form class="d-flex" action="<?php echo esc_url(home_url('/')); ?>">

        <!-- l'attribut name avec une valeur "s" est important, c'est grâce à lui que wordpress sera en mesure de traiter la requête -->
        <input class="form-control me-2" type="search" name="s" placeholder="Rechercher" aria-label="Rechercher">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>