<header class=container>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <img src="<?php echo _PATH_IMAGE; ?>logo.jpg" height="60px">    
    <ul class="nav navbar-nav navbar-right">
      <li>
        <label class="welcome-msg"><?php echo $_SESSION[_SESSION_NAME] ?></label>
        <div class="circular"><img src="<?php echo _PATH_IMAGE; ?>user.png" height="100%"></div>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret account"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li><a href="#">Profil</a></li>
        <li><a href="#">Change Password</a></li>            
        <li class="divider"></li>
        <li><a href="credential_logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>            
</header>