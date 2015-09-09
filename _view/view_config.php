<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Configuration</label>
  </div>
        
  <div class="vs-s"></div>    

<!--  <table class="tableList">-->
  <form method="POST" action="config_updating">
    <table class="table table-striped table-bordered table-font" cellspacing="0" width="50px" id="table_master">
      <thead>
        <tr>
          <th align="center">Configure</th>
          <th align="center">Value</th>       
        </tr>
      </thead>
      
      <tbody>
        <?php foreach($model->directory() as $data) { ?>
        <tr>
          <td align="left"><?php echo strtoupper($data["config_name"]); ?></td>
          <td align="right"><input type=text name="<?php echo $data["config_code"]; ?>" value="<?php echo $data["config_value"]; ?>" /></td>
        </tr>
        <?php } ?>      
        <tr>
          <td align="center" colspan="2"><input type="submit" value=" Save " /></td>
        </tr>
      </tbody>    
    </table>
  </form>
