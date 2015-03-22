<table 
  id="<?php echo $id; ?>" 
  name="<?php echo $name; ?>" 
  border="<?php echo $border; ?>" 
  class="<?php echo $class; ?>" 
  cellpadding="<?php echo $cellpadding; ?>" 
  cellspacing="<?php echo $cellspacing; ?>" 
  style="<?php echo $style; ?>"
  width="<?php echo $width; ?>"
>

<?php if ($caption != "") { ?>
  <caption><?php echo $caption; ?></caption>
<?php } ?>

<?php if ($thead != "") { ?>
  <thead>
    <tr>
    <?php foreach ($thead as $header) { ?>
      <th><?php echo $header; ?></th>
    <?php } ?>
    </tr>
  </thead>
<?php } ?>

<?php if ($tbody != "") { ?>
  <tbody>
    <?php foreach ($tbody as $record) { ?>
    <tr onclick="document.location='lowongan_add_2'">
      <?php foreach ($record as $field) { ?>
      <td><?php echo $field; ?></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
<?php } ?>

<?php if ($tfoot != "") { ?>
  <tfoot>
    <tr>
      <?php foreach ($tfoot as $footer) { ?>
      <td><?php echo $footer; ?></td>
      <?php } ?>
    </tr>
  </tfoot>
<?php } ?>
</table>
