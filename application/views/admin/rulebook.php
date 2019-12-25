<input id="site_url" type="hidden" value="<?php echo site_url(); ?>">
<div id="rulebook_container" class="container-fluid mt-5">
  <div class="row">
    <div class="mt-2 mb-2 col-lg-12">
      <!-- Single button -->
      <div class="form-group">
        <label for="ruleName">Nome Regola</label>
        <input id="rule_name" type="text" class="form-control" placeholder="Inserisci il nome della regola">
      </div>

      <div class="form-group">
        <label for="ruleBody">Corpo regola</label>
        <textarea id="rule_body" class="form-control" rows="3" placeholder="Inserisci qui il corpo della regola"></textarea>
      </div>

      <div class="form-group">
        <input id="addRule" class="btn btn-primary my-2 my-sm-0" type="button" value="Aggiungi Regola">
      </div>
    </div>
  </div>

  <?php if (count($rules_array) > 0): ?>
    <table class="table">

      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Regola</th>
          <th scope="col">Regola dettagliata</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($rules_array as $key => $rule): ?>
          <tr>
            <th scope="row"><?php echo $rule->rule_id; ?></th>
            <td><?php echo $rule->rule_title; ?></td>
            <td><?php echo $rule->rule_text; ?></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  <?php else: ?>
    <div class="container-fluid">
      <h1>Non è stata creata alcuna regola!</h1>
    </div>
  <?php endif; ?>

</div>
