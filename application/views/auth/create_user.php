<div class="container-fluid mt-2">
  <h1><?php echo lang('create_user_heading');?></h1>
  <p><?php echo lang('create_user_subheading');?></p>

  <?php if (isset($message)): ?>
    <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
  <?php endif; ?>

  <?php echo form_open("auth/create_user");?>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="first_name">Nome</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nome">
      </div>
      <div class="form-group col-md-6">
        <label for="last_name">Cognome</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Cognome">
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <label for="phone">Numero di telefono</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Numero di telefono">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Conferma Password</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Conferma Password">
      </div>
      <div class="form-group col-md-6">
        <input class="btn btn-primary" type="submit" name="submit" value="Crea Utente">
        <a class="btn btn-secondary" href="<?php echo site_url('auth/index'); ?>">Annulla</a>
      </div>
    </div>
  <?php echo form_close();?>
</div>
