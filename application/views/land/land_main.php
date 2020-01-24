<div id="body" class="home">
	<section class="jumbotron text-center">
    <div class="container">
			<h1>Zone disponibili</h1>
			<p class="lead text-muted">Tutte le zone disponibili per la land</p>
    </div>
  </section>

	<div class="album py-5 bg-light">
		<div class="container">

			<div class="row">

				<?php foreach ($chatroom_array as $chatroom): ?>
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" src="<?php echo site_url('assets/uploads/files/chatroom_image/'.$chatroom->chatroom_img); ?>" height="250" alt="<?php echo $chatroom->chatroom_name; ?>">
							<div class="card-body">
								<p class="card-text"><?php echo $chatroom->chatroom_name; ?></p>
                <p><?php echo $chatroom->chatroom_description; ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<a href="<?php echo site_url('land/chatroom/'.$chatroom->chatroom_id); ?>" class="btn btn-outline-primary">Vai alla stanza</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>

		</div>

	</div>
</div>
