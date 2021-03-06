<div class="container-fluid">
  <h1><?php echo lang('index_heading');?></h1>
  <p><?php echo lang('index_subheading');?></p>

  <?php if (isset($message)): ?>
    <div class="alert alert-info" role="alert"><?php echo $message;?></div>
  <?php endif; ?>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th><?php echo lang('index_fname_th');?></th>
          <th><?php echo lang('index_lname_th');?></th>
          <th><?php echo lang('index_email_th');?></th>
          <th><?php echo lang('index_groups_th');?></th>
          <th><?php echo lang('index_status_th');?></th>
          <th><?php echo lang('index_action_th');?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user):?>
          <tr>
            <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');?></td>
            <td>
              <?php foreach ($user->groups as $group):?>
                <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')) ;?><br />
              <?php endforeach?>
            </td>
            <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
            <td>
              <a class="btn btn-outline-dark" href="<?php echo site_url("auth/edit_user/".$user->id); ?>">Modifica</a>
              <a class="btn btn-danger" href="#">Elimina Utente</a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>

  <p><?php echo anchor('auth/create_user', lang('index_create_user_link'), array('class' => 'btn btn-primary mr-2'))?>   <?php echo anchor('auth/create_group', lang('index_create_group_link'), array('class' => 'btn btn-primary'))?></p>

</div>
