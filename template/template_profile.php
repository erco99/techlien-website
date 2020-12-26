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
  </div>


</div>
