<div id="body" class="home container-fluid">

  <section class="jumbotron text-center">
    <div class="container">
      <h1><?php echo $room_info[0]->chatroom_name; ?></h1>
      <p class="lead text-muted"><?php echo $room_info[0]->chatroom_description; ?></p>
      <a href="<?php echo site_url('land'); ?>" class="btn btn-primary">Torna alle seleziona stanze</a>
    </div>
  </section>

  <div class="container-fluid">
    <div class="row">

      <div class="col-md-10">
        <!-- Form per invio messaggi semplici -->
        <div class="container-fluid modal-dialog-scrollable" role="document">

          <div class="modal-content">
            <div id="chat-container" class="modal-body">

            </div>
            <div id="container-message" class="modal-footer">
              <!-- <div class="row">
                <div class="col-sm-6 col-md-8">
                  <select class="form-control">
                    <option>Parlato</option>
                    <option>Azione</option>
                    <option>Sussurro</option>
                    <option>Master</option>
                    <option>PNG</option>
                  </select>
                  <textarea id="land-chat-message" class="form-control" placeholder="Messaggio"></textarea>
                </div>
                <div class="mt-2 col-6 col-md-4">
                  <input id="message-button" class="btn btn-primary mb-2" type="submit" value="Invia messaggio">
                </div>
              </div> -->
              <div class="input-group mb-3">
                <input id="land-dice-message" class="form-control" type="text">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="dice-button">Calcola tiro</button>
                </div>
              </div>
              <div class="input-group mb-3">
                <select id="message_type">
                  <option selected>Tipo</option>
                  <option>Parlato</option>
                  <option>Azione</option>
                  <option>Sussurro</option>
                  <option>Master</option>
                  <option>PNG</option>
                </select>
                <textarea id="land-chat-message" class="form-control"></textarea>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="message-button">Invia</button>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

      <div class="col-md-2">

        <div class="card">
          <img src="<?php echo site_url('assets/uploads/files/chatroom_image/'.$room_info[0]->chatroom_img); ?>" class="card-img-top" alt="Luogo di default">
          <div class="card-body text-center">

            <p class="card-text">Condizioni meteo</p>
            <p class="card-text"><?php echo date('d/m/Y'); ?></p>
            <p class="card-text"><?php echo $room_info[0]->chatroom_weather; ?></p>

            <div class="dropdown-divider"></div>

            <a class="btn btn-outline-info mb-2 mt-2" href="#">Messaggi</a>

            <div class="dropdown-divider"></div>

            <h5 class="card-title">Menu</h5>

            <ul class="list-group">
              <li class="list-group-item">
                <a href="<?php echo site_url('land'); ?>">Stanze</a>
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

    </div>
  </div>

</div>
