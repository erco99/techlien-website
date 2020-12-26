<div>
  <h1 class="form-title"> PROFILE</h1>

  <div class="container">
    <div class="row-header">
      <h2><?php echo $_SESSION["username"] ?></h2>
    </div>
    <div class="row">
      <div class="col-xs-4">
        <img src="<?php echo UPLOAD_DIR.$_SESSION["id"];?>/profile.jpg" alt="profile photo"  style="max-width:100px;"/>
      </div>
      <div class="col-xs-6">
        <label for="inputname"><?php echo $_SESSION["firstName"] ?></label>
      </div>
      <div class="col-xs-6">
        <label for="inputname"><?php echo $_SESSION["lastName"] ?></label>
      </div>
      <div class="col-xs-12">
        <label for="inputname"><?php echo $_SESSION["email"] ?></label>
      </div>
    </div>

    <?php if(isset($_GET["order"])) { ?>
      <div class="row">
        <div class="col-xs-4">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">My Order
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="/unibowebsite/profile.php">My Marketplace</a></li>
              </ul>
            </div>
          </div>
        </div>

        <?php
        require_once("template_myorder.php");
      }
      else{

        ?>
        <div class="row">
          <div class="col-xs-4">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">My Marketplace
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="/unibowebsite/profile.php?order">My Order</a></li>
                </ul>
              </div>
            </div>
          </div>
          <?php

          require_once("template_mymarketplace.php");
        }
        ?>
      </div>


    </div>


  </div>
