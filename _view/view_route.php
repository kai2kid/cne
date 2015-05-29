<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Master Route</label>
    <ul class="nav navbar-nav navbar-right">
          <li><button id="btnInsert" class="btn-sm btn-primary hs-s" data-toggle="modal" data-target="#formInsert" onclick="loadForm('route','insert')">Add</button></li>
          <!--<li><button id="btnUpdate" class="btn-sm btn-success hs-s" data-toggle="modal" data-target="#formUpdate" onclick="loadForm('route','update')" disabled>Update</button></li>-->
          <!--<li><button id="btnDelete" class="btn-sm btn-danger hs-s" data-toggle="modal" data-target="#formDelete" onclick="loadForm('route','delete')" disabled>Delete</button></li>-->
    </ul>
    <input type="hidden" value="" id="masterID">
  </div>
        
  <div class="vs-s"></div>    

<!--  <table class="tableList">-->
  <table class="table table-striped table-bordered table-font datatable" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th class="no-sort" width="25px">&nbsp;</th>
        <th>Title</th>
        <th>Path</th>       
        <th>1-4 Pax</th>       
        <th>5-9 Pax</th>       
        <th>10-14 Pax</th>       
        <th>15-19 Pax</th>       
        <th>20-42 Pax</th>       
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th class="no-sort" width="25px">&nbsp;</th>
        <th>Title</th>
        <th>Path</th>       
        <th>1-4 Pax</th>       
        <th>5-9 Pax</th>       
        <th>10-14 Pax</th>       
        <th>15-19 Pax</th>       
        <th>20-42 Pax</th>       
      </tr>
    </tfoot>
    
    <tbody>
      <?php foreach($model->directory() as $data) { ?>
      <tr onclick="setID('<?php echo $data["route_code"]; ?>')">
          <td>
            <img class='img_button' src="<?php echo _PATH_IMAGE?>icon_edit.png" data-toggle="modal" data-target="#formUpdate" onclick="openForm('route','update','<?php echo $data["route_code"]; ?>')" /> &nbsp;
            <img class='img_button' src="<?php echo _PATH_IMAGE?>icon_delete.png" data-toggle="modal" data-target="#formDelete" onclick="openForm('route','delete','<?php echo $data["route_code"]; ?>')" />
          </td>
          <td><?php echo $data["route_title"]; ?></td>
          <td><?php echo $data["route_path"]; ?></td>
          <td><?php echo $data["route_cost1"]; ?></td>
          <td><?php echo $data["route_cost2"]; ?></td>
          <td><?php echo $data["route_cost3"]; ?></td>
          <td><?php echo $data["route_cost4"]; ?></td>
          <td><?php echo $data["route_cost5"]; ?></td>
      </tr>
      <?php } ?>      
    </tbody>    
  </table>
  
  <!-- Modal -->
  <div class="modal fade" id="formInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-primary">
          <?php include(_PATH_VIEW . "view_route_insert.php"); ?>
        </div>
      </div>    
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-success" id="updateFormContent">
        </div>    
      </div>
    </div>
  </div>  

  <!-- Modal -->	
  <div class="modal fade" id="formDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-danger" id="deleteFormContent">
          <?php //include (_PATH_VIEW . "view_location_delete.php"); ?>
        </div>    
      </div>
    </div>
  </div>
</div>