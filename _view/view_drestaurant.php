<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Master Restaurant - Detail Menu</label>
    <ul class="nav navbar-nav navbar-right">
          <li><button id="btnInsert" class="btn-sm btn-primary hs-s" data-toggle="modal" data-target="#formInsert" onclick="loadForm('drestaurant~<?php echo $model->dataParent["restaurant_code"] ?>','insert')">Add</button></li>
          <li><button id="btnUpdate" class="btn-sm btn-success hs-s" data-toggle="modal" data-target="#formUpdate" onclick="loadForm('drestaurant~<?php echo $model->dataParent["restaurant_code"] ?>','update')" disabled>Update</button></li>
          <li><button id="btnDelete" class="btn-sm btn-danger hs-s" data-toggle="modal" data-target="#formDelete" onclick="loadForm('drestaurant~<?php echo $model->dataParent["restaurant_code"] ?>','delete')" disabled>Delete</button></li>
		  <li><button id="btnBack" class="btn-sm btn-default hs-s" data-toggle="modal" data-target="#" onclick="document.location='restaurant';">Back</button></li>
    </ul>
    <input type="hidden" value="" id="masterID">
  </div>
        
	<div class="vs-s"></div>    
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="row">
			<label for="restaurant_code" class="control-label col-md-1 no-pad-r" style="margin-top:5px;">Restaurant Code</label>
			<div class="col-md-1">
				<input name="restaurant_code" type="text" class="form-control" id="restaurant_code" value="<?php echo $model->dataParent["restaurant_code"] ?>" readonly>
			</div>
		</div>
		<div class="vs-xs"></div>  
		<div class="row">
			<label for="menu_name" class="control-label col-md-1 no-pad-r">Name</label>			
			<label id="menu_name" class="control-label col-md-3 no-pad-r"><?php echo $model->dataParent["restaurant_name"] ?></label>			
		</div>
		<div class="vs-xs"></div>  
		<div class="row">
			<label for="restaurant_location" class="control-label col-md-1 no-pad-r">Location</label>			
			<label id="restaurant_location" class="control-label col-md-2 no-pad-r" style="padding-right: 5px;"><?php echo $model->dataParent["location_name"] ?></label>			
			<label id="restaurant_city" class="control-label col-md-2 no-pad-r no-pad-l" style="padding-right: 5px;"><?php echo $model->dataParent["restaurant_city"] ?></label>			
			<label id="restaurant_country" class="control-label col-md-2 no-pad-r no-pad-l" style="padding-right: 5px;"><?php echo $model->dataParent["restaurant_country"] ?></label>
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
		<th>Curr.</th>
        <th>Price</th>
        <th>Memo</th>        
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Name</th>        
		<th>Curr.</th>
        <th>Price</th>
        <th>Memo</th> 
      </tr>
    </tfoot>
    
    <tbody>
      <?php foreach($model->directory() as $data) { ?>
      <tr onclick="setID('<?php echo $data["menu_code"]; ?>')">                 
          <td><?php echo $data["menu_name"]; ?></td>
		      <td><?php echo $model->dataParent["restaurant_currency"]; ?></td>
          <td><?php echo $data["menu_price"]; ?></td>                
		      <td><?php echo $data["menu_memo"]; ?></td>
      </tr>
      <?php } ?>      
    </tbody>    
  </table>
  
  <!-- Modal -->
  <div class="modal fade" id="formInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-primary">
          <?php include(_PATH_VIEW . "view_drestaurant_insert.php"); ?>
        </div>
      </div>    
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-success" id="updateFormContent">
          <?php include (_PATH_VIEW . "view_drestaurant_update.php"); ?>
        </div>    
      </div>
    </div>
  </div>  

  <!-- Modal -->	
  
  <div class="modal fade" id="formDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-danger" id="deleteFormContent">
          <?php include (_PATH_VIEW . "view_drestaurant_delete.php"); ?>
        </div>    
      </div>
    </div>
  </div>
 
</div>