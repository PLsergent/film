<?php
/*
 * TP PHP
 * Vue menu
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * menu: http://www.w3schools.com/bootstrap/bootstrap_ref_comp_navs.asp
 */
?>
<!-- Menu du site -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
				<li <?php echo ($page=='index' ? 'class="active"':'')?>>
					<a href="index.php">
						<?= MENU_ACCUEIL ?>
					</a>
				</li>
      </ul>
      <?php if ($_SESSION['logged']==false){?>
        <ul class="nav navbar-nav navbar-right">
          <li>
  					<a href='index.php?page=login'>
  						<?= MENU_LOGIN ?>
            </a>
      </ul>
      <?php }?>
      <?php if ($_SESSION['logged']==true){?>
        <ul class="nav navbar-nav navbar-right">
          <li>
  					<a href='index.php?page=login'>
  						<?= MENU_LOGOUT ?>
            </a>
      </ul>
      <?php }?>

    <?php if ($_SESSION['logged']==true) { ?>
    <ul class="nav navbar-nav">
      <li>
        <a href='index.php?page=add'>
          <?= MENU_ADD ?>
        </a>
    </ul>
  <?php } ?>
  </div>
</nav>
