<div class="login-page">            
  <img src="<?php echo _PATH_IMAGE; ?>logo2.jpg" width="350px">
  <br><br><br><br>    
  <div class="login-form">
    <form class="form-horizontal" method=post action="credential_authenticate">
      <div class="form-group" style="margin-left: auto; margin-right: auto;">    
        <div class="col-md-12">
          <input class="form-control glyphicon login-input" type="text"  placeholder="&#57352; username" name='login_username' />
        </div>
      </div>
      <div class="form-group" style="margin-left: auto; margin-right: auto;">    
        <div class="col-md-12">
          <input class="form-control glyphicon login-input" type="password"  placeholder="&#57395; password" name='login_password' />
        </div>
      </div>
      <div class="form-group" style="margin-left: auto; margin-right: auto;">    
        <div class="col-md-12">
          <div class="checkbox">
            <label style="font-size:14px"><input type="checkbox"> Remember me</label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-6">&nbsp;</label>
        <div class="col-md-5 no-pad-r">
          <input type="submit" class="btn btn-primary btn-block" value="Login">
        </div>            
        <label class="control-label col-md-1">&nbsp;</label>
      </div>
    </form>  
  </div>
</div>