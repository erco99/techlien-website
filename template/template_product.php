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

<div class="card product-page">

  <div class="row text-center">
    <div class="col-12 form-title">
      <div class="img-thumbnail">
        <?php	if(count(explode(";", $product["urlimage"])) > 1){
          require_once("template_carouselproduct.php");
        }
        else{ ?>
          <img class="img-thumbnail" src="<?php echo UPLOAD_DIR.$product["iduser"].'/'.$product["urlimage"] ?>" alt="" style="border-color:grey;">
        <?php } ?>
      </div>
    </div>
  </div>


  <div class="row text-center">
    <div class="col-12 text-center" >
      <h3><strong><?php echo $product["name"] ?></strong></h3>
      <h5><?php echo $product["description"] ?></h5>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-12">
      <h4>Remaining:</h4>
      <h5><?php echo $product["stock"] ?></h5>
    </div>
  </div>
  <form method="POST"> 
    <div class="row text-center">
        <div class="col-12">
          <p>Select quantity:
          <select name="quantity">
            <?php for($i=1;$i<=10;$i++){
            echo '<option value="'.$i.'" >'.$i.'</option>';
              }
            ?>
          </select>
          </p>
        </div>
    

      <div class="row text-center">
        <div class="col-xs-12">
          <h3><b>Total price</b></h3>
          <h4><?php echo $product["price"] ?> €</h4>
            <div class="row text-center add-to-cart">
              <?php
              if(isset($_SESSION["id"])){
                echo '
                <button  name="btn_add" id="btn_add" class="btn btn-info pull-right" '.$btn_add.'><span class="glyphicon glyphicon-plus">Add to Cart</span></button>
                <button name="btn_drop" id="btn_remove" class="btn btn-info" '.$btn_drop.'><span class="glyphicon glyphicon-remove">Remove to Cart</span></button>
                ';
              }
              else{
                echo '<a href="login.php"><h4 class="text-center">Loggati per aggiungere il prodotto al carrello.</h4></a>';
              }
              ?>
            </div>
        </div>

      </div>
    </div>
  </form>
</div>



<?php
endforeach;
?>
