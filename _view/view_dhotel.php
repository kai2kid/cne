<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Master Hotel - Detail Room</label>
    <ul class="nav navbar-nav navbar-right">
          <!--<li><button id="btnInsert" class="btn-sm btn-primary hs-s" data-toggle="modal" data-target="#formInsert" onclick="loadForm('dhotel~<?php echo $model->dataParent["hotel_code"] ?>','insert')">Add</button></li>-->
          <!--<li><button id="btnUpdate" class="btn-sm btn-success hs-s" data-toggle="modal" data-target="#formUpdate" onclick="loadForm('dhotel~<?php echo $model->dataParent["hotel_code"] ?>','update')" disabled>Update</button></li>-->
          <!--<li><button id="btnDelete" class="btn-sm btn-danger hs-s" data-toggle="modal" data-target="#formDelete" onclick="loadForm('dhotel~<?php echo $model->dataParent["hotel_code"] ?>','delete')" disabled>Delete</button></li>-->
		  <li><button id="btnBack" class="btn-sm btn-default hs-s" data-toggle="modal" data-target="#" onclick="document.location='hotel';">Back</button></li>
    </ul>
    <input type="hidden" value="" id="masterID">
  </div>
        
	<div class="vs-s"></div>    
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="row">
			<label for="hotel_code" class="control-label col-md-1 no-pad-r" style="margin-top:5px;">Hotel Code</label>
			<div class="col-md-1">
				<input name="hotel_code" type="text" class="form-control" id="hotel_code" value="<?php echo $model->dataParent["hotel_code"] ?>" readonly>
			</div>
		</div>
		<div class="vs-xs"></div>  
		<div class="row">
			<label for="hotel_name" class="control-label col-md-1 no-pad-r">Name</label>			
			<label id="hotel_name" class="control-label col-md-3 no-pad-r"><?php echo $model->dataParent["hotel_name"] . ($model->dataParent["hotel_name_korean"] != "" ? " - " . $model->dataParent["hotel_name_korean"] : "" ); ?></label>			
		</div>
		<div class="vs-xs"></div>  
		<div class="row">
			<label for="hotel_location" class="control-label col-md-1 no-pad-r">Location</label>			
			<label id="hotel_location" class="control-label col-md-2 no-pad-r" style="padding-right: 5px;"><?php echo $model->dataParent["location_name"] ?></label>			
			<!--<label id="hotel_city" class="control-label col-md-2 no-pad-r no-pad-l" style="padding-right: 5px;"><?php echo $model->dataParent["hotel_city"] ?></label>			-->
			<!--<label id="hotel_country" class="control-label col-md-2 no-pad-r no-pad-l" style="padding-right: 5px;"><?php echo $model->dataParent["hotel_country"] ?></label>-->
		</div>
	  </div>
	</div>
	
	
	<div class="container-fluide">
		
	</div>
  <div class="vs-m"></div> 
<!--  <table class="tableList">-->
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <!--<th>Name</th>-->
        <th rowspan="3" align="center" width="45px">&nbsp;</th>
        <th rowspan="3" valign="middle" align="center" style="text-align: center; color: red;">Promo</th>        
        <th rowspan="3" valign="middle" align="center" style="text-align: center;">XB</th>
        <th colspan="6" valign="middle" align="center" style="text-align: center;">Fit</th>
        <th colspan="6" valign="middle" align="center" style="text-align: center;">Group</th>
      </tr>
      <tr>
        <th rowspan="2" valign="middle" align="center" style="text-align: center;">Breakfast</th>
        <th colspan="2" valign="middle" align="center" style="text-align: center;">Low</th>        
        <th colspan="2" valign="middle" align="center" style="text-align: center;">High</th>
        <th rowspan="2" valign="middle" align="center" style="text-align: center;">Peak</th>
        <th rowspan="2" valign="middle" align="center" style="text-align: center;">Breakfast</th>
        <th colspan="2" valign="middle" align="center" style="text-align: center;">Low</th>        
        <th colspan="2" valign="middle" align="center" style="text-align: center;">High</th>
        <th rowspan="2" valign="middle" align="center" style="text-align: center;">Peak</th>      
      </tr>
      <tr>
        <th valign="middle" align="center" style="text-align: center;">WD</th>
        <th valign="middle" align="center" style="text-align: center;">WE</th>
        <th valign="middle" align="center" style="text-align: center;">WD</th>
        <th valign="middle" align="center" style="text-align: center;">WE</th>
        <th valign="middle" align="center" style="text-align: center;">WD</th>
        <th valign="middle" align="center" style="text-align: center;">WE</th>
        <th valign="middle" align="center" style="text-align: center;">WD</th>
        <th valign="middle" align="center" style="text-align: center;">WE</th>
      </tr>
    </thead>
    
    <tbody>
      <?php foreach($model->directory() as $data) { ?>
      <tr onclick="setID('<?php echo $data["room_code"]; ?>')">
          <!--<td><?php echo $data["room_name"]; ?></td>-->
          <td>
            <img class='img_button' src="<?php echo _PATH_IMAGE?>icon_edit.png" data-toggle="modal" data-target="#formUpdate" onclick="openForm('dhotel~<?php echo $model->dataParent["hotel_code"] ?>','update','<?php echo $data["room_code"]; ?>')" /> &nbsp;
            <!--<img class='img_button' src="<?php echo _PATH_IMAGE?>icon_delete.png" data-toggle="modal" data-target="#formDelete" onclick="openForm('dhotel~<?php echo $model->dataParent["hotel_code"] ?>','delete','<?php echo $data["room_code"]; ?>')" />-->
          </td>
          <td align="right"><?php echo number_format($data["room_promo"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_extrabed"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_fit_breakfast"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_fit_weekday_low"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_fit_weekend_low"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_fit_weekday_high"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_fit_weekend_high"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_fit_peak"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_group_breakfast"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_group_weekday_low"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_group_weekend_low"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_group_weekday_high"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_group_weekend_high"]); ?></td>                
          <td align="right"><?php echo number_format($data["room_group_peak"]); ?></td>                
      </tr>
      <?php } ?>      
    </tbody>    
  </table>
  
  <!-- Modal -->
  <div class="modal fade" id="formInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-primary">
          <?php include(_PATH_VIEW . "view_dhotel_insert.php"); ?>
        </div>
      </div>    
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-success" id="updateFormContent">
          <?php include (_PATH_VIEW . "view_dhotel_update.php"); ?>
        </div>    
      </div>
    </div>
  </div>  

  <!-- Modal -->	
  
  <div class="modal fade" id="formDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-danger" id="deleteFormContent">
          <?php include (_PATH_VIEW . "view_dhotel_delete.php"); ?>
        </div>    
      </div>
    </div>
  </div>
 
 <hr>
 
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Master Hotel - Period</label>
    <ul class="nav navbar-nav navbar-right">
          <li><button id="btnInsert2" class="btn-sm btn-primary hs-s" data-toggle="modal" data-target="#formInsert2" onclick="loadForm2('dhotelperiod~<?php echo $model->dataParent["hotel_code"] ?>','insert')">Add</button></li>
          <!--<li><button id="btnUpdate2" class="btn-sm btn-success hs-s" data-toggle="modal" data-target="#formUpdate2" onclick="loadForm2('dhotelperiod~<?php echo $model->dataParent["hotel_code"] ?>','update')" disabled>Update</button></li>-->
          <!--<li><button id="btnDelete2" class="btn-sm btn-danger hs-s" data-toggle="modal" data-target="#formDelete2" onclick="loadForm2('dhotelperiod~<?php echo $model->dataParent["hotel_code"] ?>','delete')" disabled>Delete</button></li>-->
      <li><button id="btnBack" class="btn-sm btn-default hs-s" data-toggle="modal" data-target="#" onclick="document.location='hotel';">Back</button></li>
    </ul>
    <input type="hidden" value="" id="masterID2">
  </div>
        
 
  <div class="container-fluide">
    
  </div>
  <div class="vs-m"></div> 
  <table class="table table-striped table-bordered table-font datatable" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th class="no-sort" width="25px">&nbsp;</th>
        <th>Type</th>
        <th>Start</th>
        <th>End</th>        
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th class="no-sort" width="25px">&nbsp;</th>
        <th>Type</th>
        <th>Start</th>
        <th>End</th>        
      </tr>
    </tfoot>
    
    <tbody>
      <?php foreach ($model2->directory() as $data) { ?>
      <tr onclick="setID2('<?php echo $data["period_id"]; ?>')">
          <td>
            <img class='img_button' src="<?php echo _PATH_IMAGE?>icon_edit.png" data-toggle="modal" data-target="#formUpdate" onclick="openForm('dhotelperiod~<?php echo $model->dataParent["hotel_code"] ?>','update','<?php echo $data["period_id"]; ?>')" /> &nbsp;
            <img class='img_button' src="<?php echo _PATH_IMAGE?>icon_delete.png" data-toggle="modal" data-target="#formDelete" onclick="openForm('dhotelperiod~<?php echo $model->dataParent["hotel_code"] ?>','delete','<?php echo $data["period_id"]; ?>')" />
          </td>
          <td><?php echo $data["period_type_name"]; ?></td>
          <td><?php echo formatYearly($data["period_start"]); ?></td>
          <td><?php echo formatYearly($data["period_end"]); ?></td>
      </tr>
      <?php } ?>      
    </tbody>    
  </table>
  
  <!-- Modal -->
  <div class="modal fade" id="formInsert2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-primary" id="insertFormContent2">
          <?php include(_PATH_VIEW . "view_dhotelperiod_insert.php"); ?>
        </div>
      </div>    
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formUpdate2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-success" id="updateFormContent2">
        </div>    
      </div>
    </div>
  </div>  

  <!-- Modal -->  
  
  <div class="modal fade" id="formDelete2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-danger" id="deleteFormContent2">
        </div>    
      </div>
    </div>
  </div>
</div>