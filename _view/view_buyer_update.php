<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">      
    <div class="row">
      <div class="col-md-6">
        <label class="title">Add Buyer</label>
        <form class="form-horizontal" action="buyer_updating" method="post">
          <input name="buyer_code" type="hidden" class="form-control" id="buyer_code" value="<?php echo $data['buyer_code']; ?>" readonly>
          <div class="form-group">
            <label for="buyer_name" class="control-label col-md-2 no-pad-r">Name</label>
            <div class="col-md-6">
            <input name="buyer_name" type="text" class="form-control" id="buyer_name" placeholder="Name" value="<?php echo $data['buyer_name']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="buyer_name_korean" class="control-label col-md-2 no-pad-r">Korean Name</label>
            <div class="col-md-6">
            <input name="buyer_name_korean" type="text" class="form-control" id="buyer_name_korean" placeholder="&#51060;&#47492;" value="<?php echo $data['buyer_name_korean']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="buyer_type" class="control-label col-md-2 no-pad-r">Type</label>
            <div class="col-md-4">
            <select name="buyer_type" class="form-control min-padding" id="buyer_type">
              <option value="1" selected="selected">Company</option>
              <option value="2">Personal</option>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label for="buyer_address" class="control-label col-md-2 no-pad-r">Address</label>
            <div class="col-md-7" style="padding-right: 5px;">
            <input name="buyer_address" type="text" class="form-control" id="buyer_address" placeholder="Address" value="<?php echo $data['buyer_address']; ?>">
            </div>            
            <div class="col-md-3 no-pad-l">
            <input name="buyer_postal" type="text" class="form-control" id="buyer_postal" placeholder="Postal" value="<?php echo $data['buyer_postal']; ?>">
            </div>  
          </div>
          <div class="form-group">
            <label for="buyer_country" class="control-label col-md-2 no-pad-r">&nbsp;</label>
            <div class="col-md-4 no-pad-r" style="padding-right:5px;">
            <input name="buyer_country" type="text" class="form-control" id="buyer_country" placeholder="Country" value="<?php echo $data['buyer_country']; ?>">
            </div>   
            <div class="col-md-4 no-pad-l">
            <input name="buyer_city" type="text" class="form-control" id="buyer_city" placeholder="City" value="<?php echo $data['buyer_city']; ?>">
            </div>    
          </div> 
          <div class="form-group">
            <label for="buyer_country" class="control-label col-md-2 no-pad-r">Phone / Fax.</label>
            <div class="col-md-4 no-pad-r" style="padding-right:5px;">
            <input name="buyer_phone" type="text" class="form-control" id="buyer_phone" placeholder="Handphone" value="<?php echo $data['buyer_phone']; ?>">
            </div>   
            <label class="control-label col-md-1 no-pad-l no-pad-r" style="width: 10px; text-align: left;">/</label>
            <div class="col-md-4 no-pad-l">          
            <input name="buyer_fax" type="text" class="form-control" id="buyer_fax" placeholder="Fax" value="<?php echo $data['buyer_fax']; ?>">
            </div>    
          </div> 
          <div class="form-group">
            <label for="buyer_website" class="control-label col-md-2 no-pad-r">Website</label>
            <div class="col-md-5">
            <input name="buyer_website" type="text" class="form-control" id="buyer_website" placeholder="Website" value="<?php echo $data['buyer_website']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="buyer_email" class="control-label col-md-2 no-pad-r">Email</label>
            <div class="col-md-5">
            <input name="buyer_email" type="email" class="form-control" id="buyer_email" placeholder="Email" value="<?php echo $data['buyer_email']; ?>">            
            </div>
          </div>    
          <div class="form-group">
            <label for="buyer_memo" class="control-label col-md-2 no-pad-r">Memo</label>
            <div class="col-md-10">
            <textarea class="form-control" name="buyer_memo" id="buyer_memo" placeholder="Memo" rows="6" style="resize:none;"><?php echo $data['buyer_memo']; ?></textarea>
            </div>            
          </div>       
          <div class="form-group">
            <label class="control-label col-md-10">&nbsp;</label>
            <div class="col-md-2">
            <input type="submit" class="btn btn-primary btn-block" value="Save">
            </div>            
          </div>  
        </form>
      </div>
      
      <!-----PIC---------------------->
      
      <div class="col-md-6">  
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">PIC</h3>            
          </div>
          <div class="panel-body quotation-body">                      
            <div class="row">
              <form name="formInsertPIC" id="formInsertPIC" class="form-horizontal" action="buyer_insertPIC" method="post" enctype="multipart/form-data">
              <div class="col-md-8">            
                  <input name="pic_type_code" type="hidden" class="form-control" id="pic_type_code" value="<?php echo $data['buyer_code']; ?>" readonly>
                  <input name="pic_code" type="hidden" class="form-control" id="pic_code" value="" readonly>
                  <div class="form-group">
                    <label for="pic_name" class="control-label col-md-4 no-pad-r">Name</label>
                    <div class="col-md-8">
                    <input name="pic_name" type="text" class="form-control" id="pic_name" placeholder="PIC Name">
                    </div>            
                  </div>   
                  <div class="form-group">
                    <label for="pic_name_korean" class="control-label col-md-4 no-pad-r">Korean Name</label>
                    <div class="col-md-8">
                    <input name="pic_name_korean" type="text" class="form-control" id="pic_name_korean" placeholder="&#51060;&#47492;">
                    </div>            
                  </div>    
                  <div class="form-group">
                    <label for="pic_phone" class="control-label col-md-4 no-pad-r">Phone</label>
                    <div class="col-md-6">
                    <input name="pic_phone" type="text" class="form-control" id="pic_phone" placeholder="Phone">
                    </div>            
                  </div>
                  <div class="form-group">
                    <label for="pic_email" class="control-label col-md-4 no-pad-r">Email</label>
                    <div class="col-md-8">
                    <input name="pic_email" type="email" class="form-control" id="pic_email" placeholder="Email">
                    </div>            
                  </div>    
                  <div class="form-group">
                    <div id="pic_form_insert" style="display:block">
                      <label class="control-label col-md-9">&nbsp;</label>
                      <div class="col-md-3">
                          <input type="submit" class="btn btn-primary btn-block" value="Add">
                      </div>            
                    </div>
                    <div id="pic_form_update" style="display:none">
                      <label class="control-label col-md-6">&nbsp;</label>
                      <div class="col-md-3">
                        <input type="submit" class="btn btn-primary btn-block" value="Update">
                      </div>            
                      <div class="col-md-3">
                        <input type="button" class="btn btn-primary btn-block" value="Cancel" onclick="selectPIC();">
                      </div>            
                    </div>
                  </div>  
              </div>  
              
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12"><img id="pic_photo" class="img-photo" src="<?php echo _PATH_IMAGE?>user.png" height="150px" ></div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-3">            
                    <input type="file" class="btn btn-default btn-file" name="photo" id="photo" value="Browse" style="visibility: hidden;">
                  </div>          
                  <div class="col-md-4">
                    <input type="button" class="btn btn-default btn-file" value="Browse" onclick="$('#photo').click();">
                  </div>
                </div>  
              </div>
              </form>              
            </div>  
            <div class="row">
              <table class="table table-striped table-bordered table-font datatable" cellspacing="0" width="100%" id="table_master">
                <thead>
                  <tr>                  
                    <th class="no-sort" width="10px"></th>
                    <th>Name</th>       
                    <th>Phone</th>       
                    <th>Email</th>       
                  </tr>
                </thead>
                <tfoot>
                  <tr>                  
                    <th class="no-sort"></th>
                    <th>Name</th>
                    <th>Phone</th>       
                    <th>Email</th>       
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach($pic as $p) { ?>
                  <tr onclick="selectPIC('<?php echo $p["pic_code"]; ?>')">
                      <td>
                        <img class='img_button' src="<?php echo _PATH_IMAGE?>icon_delete.png" data-toggle="modal" data-target="#formDelete" onclick="deletePIC('<?php echo $p["pic_code"]; ?>')" />
                      </td>
                      <td><?php echo $p["pic_name"]; ?></td>
                      <td><?php echo $p["pic_phone"]; ?></td>
                      <td><?php echo $p["pic_email"]; ?></td>
                  </tr>
                  <?php } ?>      
                </tbody>
              </table>
              <?php foreach($pic as $p) { ?>
                <input type="hidden" id="picname_<?php echo $p["pic_code"]; ?>" value="<?php echo $p["pic_name"]; ?>">
                <input type="hidden" id="pickname_<?php echo $p["pic_code"]; ?>" value="<?php echo $p["pic_name_korean"]; ?>">
                <input type="hidden" id="picphone_<?php echo $p["pic_code"]; ?>" value="<?php echo $p["pic_phone"]; ?>">
                <input type="hidden" id="picemail_<?php echo $p["pic_code"]; ?>" value="<?php echo $p["pic_email"]; ?>">
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>