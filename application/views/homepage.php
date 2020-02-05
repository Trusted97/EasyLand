<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if ($success == 1): ?>
  <div class="alert alert-success text-center" role="alert">
    Il tuo personaggio è stato creato con successo puoi già entrare <a href="<?php echo site_url('auth/login'); ?>" class="alert-link">dentro la Land!</a>
  </div>
<?php endif; ?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Nome-Land</h1>
      <p>Qui va aggiunta una fighissima descrizione dove puoi scrivere quello che ti pare da come una prefazione della tua land oppure ad un semplice messaggio di benvenuto per i tuoi giocatori</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Scopri la land &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Regolamento</h2>
        <p>In questa sezione troverai il regolamento da rispettare all'interno della land da osservare sempre quando si è in gioco.</p>
        <p><a class="btn btn-primary" href="<?php echo site_url('regolamento'); ?>" role="button">Leggi le regole &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Ambientazione</h2>
        <p>L'ambientazione della land, dove è ambientata, in che epoca siamo e la sua storia in questa sezione</p>
        <p><a class="btn btn-primary" href="<?php echo site_url('ambientazione'); ?>" role="button">Esplora il mondo della land &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Razze di gioco</h2>
        <p>La scelta della razza del personaggio è fondamentale per inizare ad interpretare il vostro personaggio. Chi sarai in questo mondo?</p>
        <p><a class="btn btn-primary" href="<?php echo site_url('razze') ?>" role="button">Scopri le razze del gioco &raquo;</a></p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>
