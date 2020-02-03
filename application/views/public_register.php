<div class="container-fluid">
  <section class="container">
    <div class="row mt-4">
      <div class="col-md-6">
        <h3 class="dark-grey">Registrazione</h3>

        <?php echo form_open('homepage/register_player'); ?>

          <div class="form-group col-lg-8">
            <label>E-Mail</label>
            <input type="email" name="email_address" class="form-control">
            <p>Inserire un e-mail valida, altrimento non sarà possibile completare la registrazione</p>
          </div>

          <div class="form-group col-lg-6">
            <label>Password</label>
            <input type="password" name="password" class="form-control" id="" value="">
          </div>

          <div class="form-group col-lg-8">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" maxlength="20">
          </div>

          <div class="form-group col-lg-8">
            <label>Cognome</label>
            <input type="text" name="surname" class="form-control" maxlength="20">
          </div>

          <div class="dropdown-divider"></div>

          <div class="form-group col-lg-8">
            <label>Nome Personaggio</label>
            <input type="text" name="name_character" class="form-control" maxlength="20">
          </div>

          <div class="form-group col-lg-8">
            <label>Cognome Personaggio</label>
            <input type="text" name="surname_character" class="form-control" maxlength="20">
          </div>

          <div class="input-group mb-3 col-lg-12">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Razza del personaggio</label>
            </div>
            <select name="races" class="custom-select" id="inputGroupSelect01">
              <option selected>Scegli razza...</option>
              <?php foreach ($races_array as $key => $race): ?>
                <option value="<?php echo $race->races_id; ?>"><?php echo $race->races_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="alert alert-info" role="alert">
            La somma dei punteggi delle caratteristiche non deve essere superiore a 40
          </div>

          <div class="input-group mb-3 col-lg-5">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Forza</label>
            </div>
            <select class="custom-select" name="str_point" id="str_point">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="input-group mb-3 col-lg-5">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Costituzione</label>
            </div>
            <select class="custom-select" name="con_point" id="con_point">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="input-group mb-3 col-lg-5">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Destrezza</label>
            </div>
            <select class="custom-select" name="dex_point" id="dex_point">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="input-group mb-3 col-lg-5">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Intelligenza</label>
            </div>
            <select class="custom-select" name="int_point"id="int_point">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="input-group mb-3 col-lg-5">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Saggezza</label>
            </div>
            <select class="custom-select" name="wis_point" id="wis_point">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="input-group mb-3 col-lg-5">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Carisma</label>
            </div>
            <select class="custom-select" name="cha_point" id="cha_point">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="col-sm-6">
            <input type="submit" class="btn btn-primary" value="Registrati">
          </div>
        </form>

      </div>

      <div class="col-md-6">
        <h3>Termini e Condizioni</h3>
        <p>
          Registrazione (ai sensi del D. Lgs n°196/2003 - Codice in materia di protezione dei dati personali)
        </p>
        <p>
          L'utente, registrandosi, presta il consenso al trattamento dei suoi dati ed autorizza l'inserimento degli stessi nella banca dati del gioco con il fine di inserirli nell'elenco dei suoi utenti. Gli stessi dati NON saranno ceduti e utilizzati da alcun soggetto estraneo a chi, attualmente o in futuro, gestisce il presente gioco.
          I dati saranno trattati con strumenti elettronici e informatici serviranno esclusivamente per partecipare al gioco e per ricevere eventuali ed indispensabili comunicazioni tecniche via e-mail (come l’invio della psw all’indirizzo di posta elettronica dichiarata in sede di registrazione).
          Autorizzando al trattamento dei dati, l’utente autorizza non solo la registrazione dell’indirizzo e–mail ma permette la registrazione dell’indirizzo IP, l’ora dell’iscrizione e l’ora di ogni login.
        </p>
        <p>
          L'indicazione di dati personali completi è assolutamente volontaria e facoltativa. L'interessato potrà  in ogni momento e gratuitamente esercitare i diritti di cui all'art. 7 del D.Lgs n°196/2003, quali: la possibilità  di accedere ai registri del Garante, ottenere informazioni in relazione ai dati che lo riguardano, ottenere la cancellazione o il blocco, ovvero l'aggiornamento, la rettifica o l'integrazione inviando una e-mail all'indirizzo indicato nella home page.
          L'utente dichiara inoltre di aver preso visione del regolamento, come proposto in homepage, di averlo compreso ed accettato in ogni sua parte, e di rispondere a tutti i requisiti richiesti, comprese le eventuali restrizioni di età.
        </p>
      </div>

    </div>
  </section>
</div>
