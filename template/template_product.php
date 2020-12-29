<?php

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

      <div class="text-right pull-right">
        <div class="col-xs-12">
          <h3><b>Total price</b></h3>
        </div>
        <div class="col-xs-12">
          <h4><?php echo $product["price"] ?> €</h4>
        </div>
        <div class="col-xs-12">
          <button type="button" id="btn_add" class="btn btn-info" onclick="<?php echo 'added()'; ?>"><span class="glyphicon glyphicon-plus">Add to Cart</span></button>
        </div>
      </div>
    </div>
  </div>



  <?php
endforeach;
?>
