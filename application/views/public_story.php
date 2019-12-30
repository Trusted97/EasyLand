<div id="body" class="home">
	<section class="jumbotron text-center">
    <div class="container">
			<h1>Ambientazione della Land</h1>
			<p class="lead text-muted">Qui va aggiunta la descrizione per l'ambientazione della land del tipo <i>Nel 2022 sono successe cose che hanno causato altre fighissime cose e cose molto brutte...</i></p>
    </div>
  </section>

  <div class="container">
    <div class="list-group">
      <?php foreach ($story_array as $story): ?>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo $story->land_story_title; ?></h5>
            <small><?php echo $story->land_story_id; ?></small>
          </div>
          <p class="mb-1"><?php echo $story->land_story_text; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
