<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Quotation List</label>
    <ul class="nav navbar-nav navbar-right">
          <li><button id="btnInsert" class="btn-sm btn-primary hs-s" data-toggle="modal" data-target="#formInsert" onclick="navigate('quotation_formInsert')">Add</button></li>
          <!--<li><button id="btnUpdate" class="btn-sm btn-success hs-s" data-toggle="modal" data-target="#formUpdate" onclick="navigate('quotation_formUpdate')" disabled>Update</button></li>-->
          <!--<li><button id="btnDelete" class="btn-sm btn-danger hs-s" data-toggle="modal" data-target="#formDelete" onclick="loadForm('quotation','delete')" disabled>Delete</button></li>-->
    </ul>
    <input type="hidden" value="" id="masterID" >
  </div>
        
  <div class="vs-s"></div>    

<!--  <table class="tableList">-->
  <table class="table table-striped table-bordered table-font datatable" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th class="no-sort" width="75px">&nbsp;</th>
        <th>Code</th>
        <th>Name</th>
        <th>Days</th>        
      </tr>
    </thead>
    
    <tbody>
      <?php foreach($model->directory() as $data) { ?>
      <tr>
          <td>
            <img class='img_button' src="<?php echo _PATH_IMAGE?>icon_edit.png" data-toggle="modal" data-target="#formUpdate" onclick="navigate('quotation~<?php echo $data["quotation_code"]; ?>_formUpdate')" /> &nbsp;
            <img class='img_button' src="<?php echo _PATH_IMAGE?>icon_delete.png" data-toggle="modal" data-target="#formDelete" onclick="openForm('quotation','delete','<?php echo $data["quotation_code"]; ?>')" />
			<img class='img_button' src="<?php echo _PATH_IMAGE?>icon_view.png" onclick="window.open('quotation~<?php echo $data["quotation_code"]; ?>_calculation');" />
			<img class='img_button' src="<?php echo _PATH_IMAGE?>icon_proposal.png" onclick="window.open('quotation~<?php echo $data["quotation_code"]; ?>_proposal');" />
            <!--<button onclick="window.open('quotation~<?php echo $data["quotation_code"]; ?>_preview');">Preview</button>
            <button onclick="window.open('quotation~<?php echo $data["quotation_code"]; ?>_proposal');">Proposal</button>-->
          </td>
          <td><?php echo $data["quotation_code"]; ?></td>
          <td><?php echo $data["quotation_name"]; ?></td>
          <td><?php echo $data["quotation_days"]; ?> Days</td>
      </tr>
      <?php } ?>      
    </tbody>    
  </table>
    
  <!-- Modal -->
  <div class="modal fade" id="formDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="pop-up">  
        <div class="panel panel-danger" id="deleteFormContent">
          <?php //include (_PATH_VIEW . "view_staff_delete.php"); ?>
        </div>    
      </div>
    </div>
  </div>
  
</div>