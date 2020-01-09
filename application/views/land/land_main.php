<div id="body" class="home container-fluid">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Cose utili</h1>
      <p class="lead text-muted">Altre cose utili (?)</p>
    </div>
  </section>

  <div class="container-fluid">
    <div class="row">

      <div class="col-md-2">

        <div class="card" style="width: 13rem;">
          <img src="<?php echo site_url('assets/land/default-place.png'); ?>" class="card-img-top" alt="Luogo di default">
          <div class="card-body">
            <p class="card-text text-center">Condizioni meteo</p>
            <p class="card-text text-center"><?php echo date('m/d/Y'); ?></p>
            <p class="card-text text-center">Nuvoloso -4°C</p>
            <div class="dropdown-divider"></div>
            <a class="btn btn-outline-info mb-2" href="#">Messaggi</a>
            <div class="dropdown-divider"></div>
            <h5 class="card-title">Menu</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <ul class="list-group">
              <li class="list-group-item">
                <a href="<?php echo site_url('land_index'); ?>">Aggiorna</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url('land_index'); ?>">Mappa</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url('land_index'); ?>">Scheda</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url('land_index'); ?>">Bacheca</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url('land_index'); ?>">Gestione</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url('land_index'); ?>">Servizi</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary mt-2">Menù utente</a>
          </div>
        </div>

      </div>

      <div class="col-md-8 bg-dark">
        One of three columns
      </div>

      <div class="col-md-2 bg-danger">
        One of three columns
      </div>

    </div>
  </div>

</div>
