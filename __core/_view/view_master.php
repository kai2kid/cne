<div>
  <h2>Master [<?php echo $master->tb_alias; ?>] </h2>
  <br>
  <button onclick="document.location='master~<?php echo $master->name; ?>_detail'">[ + ] Add new data</button>
  <br>
  <br>
  <table class="tableList">
    <thead>
      <tr>
      <?php foreach($master->fields("directory") as $field) { ?>
        <th><?php echo $field->alias; ?></th>
      <?php } ?>
      </tr>
    </thead>
    
    <tbody>
      <?php foreach($master->directory() as $data) { ?>
      <tr onclick="document.location='master~<?php echo $master->name; ?>_detail~<?php echo $data[$master->fd_primary]; ?>'">
        <?php foreach($master->fields("directory") as $field) { ?>
          <td <?php echo HTML::formatTD($field->type,$field->size); ?>>
            <?php echo HTML::formatValue($data[$field->name],$field->type,$field->size) ?>
          </td>
        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
    
  </table>
  <br>
  <button onclick="document.location='master~<?php echo $master->name; ?>_detail'">[ + ] Add new data</button>
</div>