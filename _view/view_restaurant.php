<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Master restaurant</label>
    <ul class="nav navbar-nav navbar-right">
          <li><button id="btnInsert" class="btn-sm btn-primary hs-s" data-toggle="modal" data-target="#formInsert" onclick="loadForm('restaurant','insert')">Add</button></li>
          <li><button id="btnUpdate" class="btn-sm btn-success hs-s" data-toggle="modal" data-target="#formUpdate" onclick="loadForm('restaurant','update')" disabled>Update</button></li>
          <li><button id="btnDelete" class="btn-sm btn-danger hs-s" data-toggle="modal" data-target="#formDelete" onclick="loadForm('restaurant','delete')" disabled>Delete</button></li>
		  <li><button id="btnDetail" class="btn-sm btn-default hs-s" data-toggle="modal" data-target="#formDetail" onclick="document.location='drestaurant~' + $('#masterID').val();" disabled>Detail Menu</button></li>
    </ul>
    <input type="hidden" value="" id="masterID">
  </div>
        
  <div class="vs-s"></div>    

<!--  <table class="tableList">-->
  <table class="table table-striped table-bordered table-font datatable" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th>Name</th>        
        <th>Phone</th>
        <th>Email</th>
        <th>Country</th>
        <th>City</th>
		    <th>Location</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Name</th>        
        <th>Phone</th>
        <th>Email</th>
        <th>Country</th>
        <th>City</th>
        <th>Location</th>
      </tr>
    </tfoot>
    
    <tbody>
      <?php foreach($model->directory() as $data) { ?>
      <tr onclick="setID('<?php echo $data["restaurant_code"]; ?>')">
          <td><?php echo $data["restaurant_name"]; ?></td>          
          <td><?php echo $data["restaurant_phone"]; ?></td>
          <td><?php echo $data["restaurant_email"]; ?></td>          
          <td><?php echo $data["restaurant_country"]; ?></td>
		  <td><?php echo $data["restaurant_city"]; ?></td>
		  <td><?php echo $data["restaurant_location"]; ?></td>
      </tr>
      <?php } ?>      
    </tbody>    
  </table>
  
  <!-- Modal -->
  <div class="modal fade" id="formInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-primary">
          <?php include(_PATH_VIEW . "view_restaurant_insert.php"); ?>
        </div>
      </div>    
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-success" id="updateFormContent">
          <?php include (_PATH_VIEW . "view_restaurant_update.php"); ?>
        </div>    
      </div>
    </div>
  </div>  

  <!-- Modal -->	
  
  <div class="modal fade" id="formDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-danger" id="deleteFormContent">
          <?php include (_PATH_VIEW . "view_restaurant_delete.php"); ?>
        </div>    
      </div>
    </div>
  </div>
 
</div>