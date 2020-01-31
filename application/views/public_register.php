<div class="container-fluid">
  <section class="container">
    <div class="row mt-4">
      <div class="col-md-6">
        <h3 class="dark-grey">Registrazione</h3>

        <form action="index.html" method="post">

          <div class="form-group col-lg-8">
            <label>E-Mail</label>
            <input type="email" name="email_address" class="form-control">
            <p>Inserire un e-mail valida, altrimento non sarà possibile completare la registrazione</p>
          </div>

          <div class="form-group col-lg-6">
            <label>Password</label>
            <input type="password" name="" class="form-control" id="" value="">
          </div>

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
            <select class="custom-select" id="inputGroupSelect01">
              <option selected>Scegli razza...</option>
              <?php foreach ($races_array as $key => $race): ?>
                <option value="<?php echo $race->races_id; ?>"><?php echo $race->races_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group col-lg-6">
            <label>Repeat Password</label>
            <input type="password" name="" class="form-control" id="" value="">
          </div>

          <div class="form-group col-lg-6">
            <label>Repeat Email Address</label>
            <input type="" name="" class="form-control" id="" value="">
          </div>

          <div class="col-sm-6">
            <input type="checkbox" class="checkbox" /> Sigh up for our newsletter
          </div>

          <div class="col-sm-6">
            <input type="checkbox" class="checkbox" /> Send notifications to this email
          </div>

          <div class="col-sm-6">
            <button type="submit" class="btn btn-primary">Register</button>
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
