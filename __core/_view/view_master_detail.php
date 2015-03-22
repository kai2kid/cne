<div>
  <h2>Master [<?php echo $master->tb_alias; ?>] </h2>
  <br>
  <form method="post">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <?php if ($mode == "update") {?>
      
    <?php echo HTML::input(array("type"=>"hidden","name"=>"field_".$master->fields[$master->fd_primary]->index,"value"=>$master->id)) ?>
    <?php } ?>
    <table cellpadding="2" cellspacing="5">  
      <tbody>
        <?php foreach($master->fields($mode) as $field) { ?>
          <tr>
            <td><?php echo $field->alias; ?></td>
            <td> : </td>
            <?php if ($field->name != $master->fd_primary) {?>
            <td><?php echo HTML::drawInput($field,($mode == "update" ? $master->data[$field->name] : "")); ?></td>
            <?php } else { ?>
            <td><?php echo $master->id; ?></td>
            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
      
    </table>
    <br>
    <?php echo HTML::input(array("type"=>"submit","value"=>"[ V ] SUBMIT")); ?>
    <?php echo ($mode == "update" ? " &nbsp; &nbsp; &nbsp; " . HTML::input(array("type"=>"button","value"=>"[ X ] DELETE")) : ""); ?>
  </form>
  <hr style="height: 2px;">
  <?php echo HTML::input(array("type"=>"button","value"=>"[ << ] BACK","onclick"=>"document.location='master~".$master->name."'")); ?>
</div>