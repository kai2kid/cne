      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update Season Period</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="dhotelperiod_updating" method="post">
          <input type="hidden" name="hotel_code" value="<?php echo $data["hotel_code"]; ?>">
          <input type="hidden" name="period_id" value="<?php echo $data["period_id"]; ?>">
          <div class="form-group">
            <label for="period_type" class="control-label col-md-3 no-pad-r">Type</label>
            <div class="col-md-6">
              <select name="period_type" class="form-control min-padding" id="period_type">
                <option value="1" <?php echo ($data['period_type'] == "1" ? "selected" : "") ?>>Low Season</option>
                <option value="2" <?php echo ($data['period_type'] == "2" ? "selected" : "") ?>>High Season</option>
                <option value="3" <?php echo ($data['period_type'] == "3" ? "selected" : "") ?>>Peak Season</option>
              </select>
              
            </div>
          </div>                   
          <div class="form-group">
            <label for="period_start" class="control-label col-md-3 no-pad-r">Start</label>
            <div class="col-md-6">
              <select name="period_startd" class="form-control min-padding" id="period_startd" style="width: auto; display:inline-block;">
                <?php for ($d=1; $d <= 31 ; $d++) { ?>
                <option value="<?php echo str_pad($d,2,"0",STR_PAD_LEFT); ?>" <?php echo ($data['period_startd'] == str_pad($d,2,"0",STR_PAD_LEFT) ? "selected" : "") ?>><?php echo str_pad($d,2,"0",STR_PAD_LEFT); ?></option>
                <?php } ?>                
              </select>
              <select name="period_startm" class="form-control min-padding" id="period_startm" style="width: auto; display:inline-block;">
                <?php for ($m=1; $m <= 12 ; $m++) { ?>
                <option value="<?php echo str_pad($m,2,"0",STR_PAD_LEFT); ?>" <?php echo ($data['period_startm'] == str_pad($m,2,"0",STR_PAD_LEFT) ? "selected" : "") ?>><?php echo monthToText($m); ?></option>                
                <?php } ?>                
              </select>
            </div>            
          </div>  
          <div class="form-group">
            <label for="period_end" class="control-label col-md-3 no-pad-r">End</label>
            <div class="col-md-6">
              <select name="period_endd" class="form-control min-padding" id="period_endd" style="width: auto; display:inline-block;">
                <?php for ($d=1; $d <= 31 ; $d++) { ?>
                <option value="<?php echo str_pad($d,2,"0",STR_PAD_LEFT); ?>" <?php echo ($data['period_endd'] == str_pad($d,2,"0",STR_PAD_LEFT) ? "selected" : "") ?>><?php echo str_pad($d,2,"0",STR_PAD_LEFT); ?></option>
                <?php } ?>                
              </select>
              <select name="period_endm" class="form-control min-padding" id="period_endm" style="width: auto; display:inline-block;">
                <?php for ($m=1; $m <= 12 ; $m++) { ?>
                <option value="<?php echo str_pad($m,2,"0",STR_PAD_LEFT); ?>" <?php echo ($data['period_endm'] == str_pad($m,2,"0",STR_PAD_LEFT) ? "selected" : "") ?>><?php echo monthToText($m); ?></option>                
                <?php } ?>                
              </select>
            </div>            
          </div>  
          <div class="form-group">
            <label class="control-label col-md-9">&nbsp;</label>
            <div class="col-md-2">
              <input type="submit" class="btn btn-success btn-block" value="Update">
            </div>            
          </div>
          
        </form>
      </div>	 