<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Master Transport - Detail Vehicle</label>
    <ul class="nav navbar-nav navbar-right">
          <li><button id="btnInsert" class="btn-sm btn-primary hs-s" data-toggle="modal" data-target="#formInsert" onclick="loadForm('dtransport~<?php echo $model->dataParent["transport_code"] ?>','insert')">Add</button></li>
          <li><button id="btnUpdate" class="btn-sm btn-success hs-s" data-toggle="modal" data-target="#formUpdate" onclick="loadForm('dtransport~<?php echo $model->dataParent["transport_code"] ?>','update')" disabled>Update</button></li>
          <li><button id="btnDelete" class="btn-sm btn-danger hs-s" data-toggle="modal" data-target="#formDelete" onclick="loadForm('dtransport~<?php echo $model->dataParent["transport_code"] ?>','delete')" disabled>Delete</button></li>
		  <li><button id="btnBack" class="btn-sm btn-default hs-s" data-toggle="modal" data-target="#" onclick="document.location='transport';">Back</button></li>
    </ul>
    <input type="hidden" value="" id="masterID">
  </div>
        
	<div class="vs-s"></div>    
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="row">
			<label for="transport_code" class="control-label col-md-1 no-pad-r" style="margin-top:5px;">transport Code</label>
			<div class="col-md-1">
				<input name="transport_code" type="text" class="form-control" id="transport_code" readonly value="<?php echo $model->dataParent["transport_code"] ?>">
			</div>
		</div>
		<div class="vs-xs"></div>  
		<div class="row">
			<label for="transport_name" class="control-label col-md-1 no-pad-r">Name</label>			
			<label id="transport_name" class="control-label col-md-3 no-pad-r"><?php echo $model->dataParent["transport_name"] ?></label>			
		</div>
		<div class="vs-xs"></div>  
		<div class="row">
			<label for="transport_location" class="control-label col-md-1 no-pad-r"><?php echo $model->dataParent["transport_name"] ?></label>						
			<label id="transport_city" class="control-label col-md-2 no-pad-r no-pad-l" style="padding-right: 5px;"><?php echo $model->dataParent["transport_name"] ?></label>			
			<label id="transport_country" class="control-label col-md-2 no-pad-r no-pad-l" style="padding-right: 5px;"><?php echo $model->dataParent["transport_name"] ?></label>
		</div>
	  </div>
	</div>
	
	
	<div class="container-fluide">
		
	</div>
  <div class="vs-m"></div> 
<!--  <table class="tableList">-->
  <table class="table table-striped table-bordered table-font datatable" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th>Name</th>        
        <th>Type</th>
        <th>Low Price</th>        
		    <th>High Price</th>        
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Name</th>        
        <th>Type</th>
        <th>Low Price</th>        
		    <th>High Price</th>
      </tr>
    </tfoot>
    
    <tbody>
      <?php foreach($model->directory() as $data) { ?>
      <tr onclick="setID('<?php echo $data["vehicle_code"]; ?>')">
          <td><?php echo $data["vehicle_name"]; ?></td>          
          <td><?php echo $data["vehicle_type"]; ?></td>
          <td><?php echo $data["vehicle_price_low"]; ?></td>                
		      <td><?php echo $data["vehicle_price_high"]; ?></td>                
      </tr>
      <?php } ?>      
    </tbody>    
  </table>
  
  <!-- Modal -->
  <div class="modal fade" id="formInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-primary">
          <?php include(_PATH_VIEW . "view_dtransport_insert.php"); ?>
        </div>
      </div>    
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-success" id="updateFormContent">
          <?php include (_PATH_VIEW . "view_dtransport_update.php"); ?>
        </div>    
      </div>
    </div>
  </div>  

  <!-- Modal -->	
  
  <div class="modal fade" id="formDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-danger" id="deleteFormContent">
          <?php include (_PATH_VIEW . "view_dtransport_delete.php"); ?>
        </div>    
      </div>
    </div>
  </div>
 
</div>