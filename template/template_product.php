<?php

if(isset($_POST['btn_add'])){
  $btn_add = 'style="display:none;"';
  $btn_drop = 'style="display:block;"';
  $dbh->addToCart((int)$_GET["id"], $_SESSION["id"], $_POST["quantity"]);

}
else {
  if(isset($_POST['btn_drop'])){
    $dbh->dropToCart((int)$_GET["id"], $_SESSION["id"], $_POST["quantity"]);

  }
  $btn_add = 'style="display:block;"';
  $btn_drop = 'style="display:none;"';
}


$result = $dbh -> getProductFromId($_GET["id"]);
foreach($result as $product):
  ?>
  <div class="card">

    <div class="row text-center" style=" margin: 40px 10px;">
      <div class="col-lg-2 col-xs-4 form-title">
        <div class="img-thumbnail">
          <?php	if(count(explode(";", $product["urlimage"])) > 1){
            require_once("template_carouselproduct.php");
          }
          else{ ?>
            <img class="img-thumbnail" src="<?php echo UPLOAD_DIR.$_SESSION["id"].'/'.$product["urlimage"] ?>" alt="" style="border-color:grey;">
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-xs-2 text-center" >
        <h4><strong><?php echo $product["name"] ?></strong></h4>
        <h5><?php echo $product["description"] ?></h5>
      </div>
      <div class="col-lg-6">
        <h4>Remaining:</h4>
      </div>
      <div class="col-lg-6">
        <h5><?php echo $product["stock"] ?></h5>
      </div>
      <form method="POST">
    
      <div class="col-lg-6">
        <p>Select quantity:<br/>
        <select name="quantity">
          <?php for($i=0;$i<=10;$i++){
          echo '<option value="'.$i.'" >'.$i.'</option>';
            }
          ?>

        </select>
        </p>
      </div>

      <div class="text-right pull-right">
        <div class="col-xs-12">
          <h3><b>Total price</b></h3>
        </div>
        <div class="col-xs-12">
          <h4><?php echo $product["price"] ?> €</h4>
        </div>
          <div class="col-xs-12">
            <button  name="btn_add" id="btn_add" class="btn btn-info pull-right" <?php echo $btn_add;?>><span class="glyphicon glyphicon-plus">Add to Cart</span></button>
            <button name="btn_drop" id="btn_remove" class="btn btn-info pull-right" <?php echo $btn_drop;?>><span class="glyphicon glyphicon-remove">Remove to Cart</span></button>

          </div>
        </form>
      </div>
    </div>
  </div>



  <?php
endforeach;

?>
