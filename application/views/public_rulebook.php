<div id="body" class="home">
	<section class="jumbotron text-center">
    <div class="container">
			<h1>Regolamento della Land</h1>
			<p class="lead text-muted">Qui va aggiunta descrizione del regolamento della land del tipo <i>Rispettate queste regole per un gioco piacevole altrimenti vi buco</i></p>
    </div>
  </section>

  <div class="container">
    <div class="list-group">
      <?php foreach ($rules_array as $rule): ?>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo $rule->rule_title; ?></h5>
            <small><?php echo $rule->rule_id; ?></small>
          </div>
          <p class="mb-1"><?php echo $rule->rule_text; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
