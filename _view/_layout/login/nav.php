<nav class="container">  
  <?php if (isset($_SESSION[_SESSION_MENU])) { ?>
    <ul class="nav nav-tabs">      
    <?php foreach($_SESSION[_SESSION_MENU] as $menu) { ?>      
      <li role="presentation" <?php if ($menu->submenu != "" && count($menu->submenu) > 0) { ?>class="dropdown active"<?php } ?>>
        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $menu->$url; ?>" role="button" aria-expanded="false" onclick="<?php echo $menu->onclick; ?>'); return false;">
          <?php echo $menu->text; ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
        <?php foreach($menu->submenu as $submenu) { ?>
          <li><a href="<?php $submenu->url; ?>"><?php $submenu->text; ?></a></li>
        <?php } ?>
        </ul>
      </li>
    <?php } ?>
    </ul>
  <?php } ?>
  </ul>  
</nav>