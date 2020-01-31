<?php if ($message != null): ?>
  <div id="infoMessage" class="alert alert-warning" role="alert"><?php echo $message;?></div>
<?php endif; ?>

<?php echo form_open("auth/login", $form_attributes);?>

  <div class="text-center mb-4">
    <a href="<?php echo site_url(); ?>"><img class="mb-4" src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"></a>
    <h1 class="h3 mb-3 font-weight-normal"><?php echo lang('login_heading');?></h1>
    <p><?php echo lang('login_subheading');?></p>
  </div>

  <div class="form-label-group">
    <?php echo form_input($identity);?>
    <label for="inputEmail">Email</label>
  </div>

  <div class="form-label-group">
    <?php echo form_input($password);?>
    <label for="inputPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <?php echo form_checkbox('remember', '1', false, 'id="remember"');?> Ricordami
    </label>
  </div>

  <p><?php echo form_submit('submit', lang('login_submit_btn'), "class='btn btn-lg btn-primary btn-block'");?></p>

  <div class="alert alert-secondary" role="alert">
    Password dimenticata? <a href="forgot_password" class="alert-link">Clicca qui per recuperarla</a>
  </div>

  <?php echo form_close();?>
