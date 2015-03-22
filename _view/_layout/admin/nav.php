<nav class="container">  
  <?php if (isset($_SESSION[_SESSION_MENU])) { ?>
    <ul class="nav nav-tabs"> 
    <?php foreach($_SESSION[_SESSION_MENU] as $key=>$menu) { ?>      
    <?php $sub = ($menu->submenu != "" && count($menu->submenu) > 0 ? 1 : 0); ?>
    <?php $liclass = ""; ?>
    <?php if ($sub) { $liclass .= "dropdown "; } ?>
    <?php if (isset($_SESSION[_SESSION_MENU_ACTIVE]) && $key == $_SESSION[_SESSION_MENU_ACTIVE]) { $liclass .= "active "; } ?>
      <li id='a' role="presentation" class="<?php echo $liclass ; ?>" >
        <a href="<?php echo $menu->url; ?>" <?php if ($sub) { ?>class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"<?php } ?> <?php echo ($menu->onclick != "" ? "onclick=\"".$menu->onclick."\"": "") ?>>
          <?php echo $menu->text; ?> 
            <?php if ($sub) { ?>
              <span class="caret"></span>
            <?php } ?>
        </a>
        <?php if ($sub) { ?>
          <ul class="dropdown-menu" role="menu">
          <?php foreach($menu->submenu as $submenu) { ?>
            <li><a href="<?php echo $submenu->url; ?>" <?php echo ($submenu->onclick != "" ? "onclick=\"".$submenu->onclick."\"": "") ?>><?php echo $submenu->text; ?></a></li>
          <?php } ?>
          </ul>
          <?php } ?>
      </li>
    <?php } ?>
    </ul>
  <?php } ?>
  </ul>  
</nav>