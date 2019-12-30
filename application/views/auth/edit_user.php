<div class="container-fluid mt-2">
  <h1><?php echo lang('edit_user_heading');?></h1>
  <p><?php echo lang('edit_user_subheading');?></p>

  <?php if (isset($message)): ?>
    <div class="alert alert-info" role="alert"><?php echo $message;?></div>
  <?php endif; ?>

  <?php echo form_open(uri_string());?>
    <div class="form-row">
      <div class="form-group col-md-6">
        <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
        <?php echo form_input($first_name);?>
      </div>

      <div class="form-group col-md-6">
        <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
        <?php echo form_input($last_name);?>
      </div>

      <div class="form-group col-md-6">
        <?php echo lang('edit_user_phone_label', 'phone');?> <br />
        <?php echo form_input($phone);?>
      </div>

      <div class="form-group col-md-6">
        <?php echo lang('edit_user_password_label', 'password');?> <br />
        <?php echo form_input($password);?>
      </div>

      <div class="form-group col-md-6">
        <?php echo lang('edit_user_password_label', 'password');?> <br />
        <?php echo form_input($password);?>
      </div>

      <div class="form-group col-md-6">
        <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
        <?php echo form_input($password_confirm);?>
      </div>

      <div class="form-group col-md-6">
        <?php if ($this->ion_auth->is_admin()): ?>

            <h3><?php echo lang('edit_user_groups_heading');?></h3>
            <?php foreach ($groups as $group):?>
                <label class="checkbox">
                <?php
                    $gID=$group['id'];
                    $checked = null;
                    $item = null;
                    foreach ($currentGroups as $grp) {
                        if ($gID == $grp->id) {
                            $checked= ' checked="checked"';
                            break;
                        }
                    }
                ?>
                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8');?>
                </label>
            <?php endforeach?>

        <?php endif ?>

        <?php echo form_hidden('id', $user->id);?>
        <?php echo form_hidden($csrf); ?>
      </div>
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="submit" value="Salva Utente">
      <a class="btn btn-secondary" href="<?php echo site_url('auth/index'); ?>">Annulla</a>
    </div>

  <?php echo form_close();?>
</div>
