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
          <div class="card-body text-center">

            <p class="card-text">Condizioni meteo</p>
            <p class="card-text"><?php echo date('d/m/Y'); ?></p>
            <p class="card-text">Nuvoloso -4°C</p>

            <div class="dropdown-divider"></div>

            <a class="btn btn-outline-info mb-2 mt-2" href="#">Messaggi</a>

            <div class="dropdown-divider"></div>

            <h5 class="card-title">Menu</h5>

            <ul class="list-group">
              <li class="list-group-item">
                <a href="<?php echo site_url('land'); ?>">Aggiorna</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url(); ?>">Mappa</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url(); ?>">Scheda</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url(); ?>">Bacheca</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url(); ?>">Gestione</a>
              </li>
              <li class="list-group-item">
                <a href="<?php echo site_url(); ?>">Servizi</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary mt-2">Menù utente</a>
          </div>
        </div>

      </div>

      <div class="col-md-8 bg-dark">
        One of three columns
      </div>

      <div class="col-md-2">
        <div class="container text-center">
          <h4>Giocatori Online</h4>
          <?php foreach ($player_online as $key => $player): ?>
            <p><?php echo $player->player_nicename; ?> <span class="badge badge-success">Online</span> </p>
          <?php endforeach; ?>
        </div>

      </div>

    </div>
  </div>

</div>
