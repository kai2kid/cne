<select name="<?php echo (isset($name) ? $name : ""); ?>" id="<?php echo (isset($id) ? $id : "") ?>" onchange="<?php echo (isset($onchange) ? $onchange : "") ?>">
  <?php if ($all == 1) { ?>
  <option value="*" <?php echo ($selected == "*" ? "selected" : "");?>>Semua</option>
  <?php } else { ?>
  <option value=""></option>
  <?php }?>
  <?php foreach ($options as $value => $text) { ?>
  <option <?php echo ($selected == (string)$value ? "selected" : "");?> value="<?php echo $value;?>"><?php echo $text;?></option>
  <?php } ?>
</select>