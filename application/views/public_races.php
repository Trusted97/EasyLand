<div id="body" class="home">
	<section class="jumbotron text-center">
    <div class="container">
			<h1>Razze disponibili nella Land</h1>
			<p class="lead text-muted">Scegli la razza per il tuo pg!</p>
    </div>
  </section>

	<div class="album py-5 bg-light">
		<div class="container">

			<div class="row">

				<?php foreach ($races_array as $race): ?>
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" src="<?php echo site_url('assets/uploads/files/races_image/'.$race->races_image); ?>" height="250" alt="<?php echo $race->races_name; ?>">
							<div class="card-body">
								<p class="card-text"><?php echo $race->races_name; ?></p>
                <p><?php echo $race->races_description; ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<a href="<?php echo 'razze/'.$race->races_id; ?>" class="btn btn-sm btn btn-outline-info">Scheda</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>

		</div>

	</div>
</div>
