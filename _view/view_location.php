<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Master Location</label>
    <ul class="nav navbar-nav navbar-right">
          <li><button id="btnInsert" class="btn-sm btn-primary hs-s" data-toggle="modal" data-target="#formInsert" onclick="loadForm('location','insert')">Add</button></li>
          <li><button id="btnUpdate" class="btn-sm btn-success hs-s" data-toggle="modal" data-target="#formUpdate" onclick="loadForm('location','update')" disabled>Update</button></li>
          <!--<li><button id="btnDelete" class="btn-sm btn-danger hs-s" data-toggle="modal" data-target="#formDelete" onclick="loadForm('location','delete')" disabled>Delete</button></li>-->
    </ul>
    <input type="hidden" value="" id="masterID">
  </div>
        
  <div class="vs-s"></div>    

<!--  <table class="tableList">-->
  <table class="table table-striped table-bordered table-font datatable" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th>Code</th>
        <th>Name</th>       
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Code</th>
        <th>Name</th>
      </tr>
    </tfoot>
    
    <tbody>
      <?php foreach($model->directory() as $data) { ?>
      <tr onclick="setID('<?php echo $data["location_code"]; ?>')">
          <td><?php echo $data["location_code"]; ?></td>
          <td><?php echo $data["location_name"]; ?></td>          
      </tr>
      <?php } ?>      
    </tbody>    
  </table>
  
  <!-- Modal -->
  <div class="modal fade" id="formInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-primary">
          <?php include(_PATH_VIEW . "view_location_insert.php"); ?>
        </div>
      </div>    
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-success" id="updateFormContent">
          <?php include (_PATH_VIEW . "view_location_update.php"); ?>
        </div>    
      </div>
    </div>
  </div>  

  <!-- Modal -->	
  <!--
  <div class="modal fade" id="formDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-danger" id="deleteFormContent">
          <?php //include (_PATH_VIEW . "view_location_delete.php"); ?>
        </div>    
      </div>
    </div>
  </div>
  -->
</div>