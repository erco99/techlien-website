<?php
$order = $dbh -> getSelledProduct($_SESSION["id"]);
if(empty($order)){
   echo '<p class="form-title">You have selled  nothing yet :(</p>';
}
else {
   foreach ($order as $product) :
      ?>
      <div class="card col-lg-12 col-xs-12" style=" margin: 10px 10px; border-style: solid; border-color:grey;">
         <div class="row">
            <div class="col-lg-4 col-xs-4 form-title">
               <h3><b>Quantity</b></h3>
               <h4><?php echo $product["stock"]; ?></h4>
            </div>
            <div class="col-lg-4 col-xs-4 form-title">
               <h3><b>Order Number</b></h3>
               <h4><?php echo $product["id"]; ?></h4>
            </div>
            <div class="col-lg-4 col-xs-4 form-title">
               <h3><b>Selled by:</b></h3>
               <h4><?php echo $product["uservendor"]; ?></h4>
            </div>

         </div>
         <div class="row">
            <div class="col-lg-2 col-xs-4 form-title">
               <div class="home-products">
                  <?php	if(count(explode(";", $product["urlimage"])) > 1){
                     require_once("template_carouselproduct.php");
                  }
                  else{ ?>
                     <img src="<?php echo UPLOAD_DIR.$_SESSION["id"].'/'.$product["urlimage"] ?>" alt="">
                  <?php } ?>
               </div>
            </div>

            <div class="col-lg-2 ">
               <h4><strong><?php echo $product["name"] ?></strong></h4>
               <h5><?php echo $product["description"] ?></h5>
            </div>

            <div class="col-lg-2 " style="text-align:right;">
               <h3><b>Tracking</b></h3>
            </div>
            <div class="col-lg-2 " style="text-align:right;">
               <h4><?php echo empty($product["tracknumber"]) ? 'NO TRACKING NUMBER' : $product["tracknumber"]; ?></h4>
            </div>

            <div class="col-lg-2" style="text-align:right;">
               <h3><b>Total price</b></h3>
            </div>
            <div class="col-lg-12" style="text-align:right;">
               <h4><?php echo $product["price"] ?> €</h4>
            </div>
         </div>

      </div>
   <?php endforeach;

}

?>


<button type="button" class="btn btn-default btn-lg" onclick="addProductToSell()">
   <span class="glyphicon glyphicon-plus-sign"></span> Sell new product
</button>

<!-- CREATE A PRODUCT FORM (hidden default)-->
<form class="hidden" action="/addProduct.php" method="POST">
   <div class="col-sm-12 form-text">
      <label for="nameProduct">Product name:</label>
      <input type="input" class="form-control" name="textname" id="inputText" aria-describedby="nameProductHelp" placeholder="es. scheda video GTX XXXTI " />
   </div>
   <div class="col-sm-12 form-text">
      <label for="nameProduct">Product description:</label>
      <input type="text" class="form-control" name="textname" id="inputText" aria-describedby="descriptionProductHelp" placeholder="es. scheda video GTX XXXTI modello X anno 2015 usato" />
   </div>
   <div class="col-sm-12 form-text">
      <label for="nameProduct">Price:</label>
      <input type="text" class="form-control" name="textname" id="inputText" aria-describedby="priceProductHelp" placeholder="es. 300,99 " > €</input>
   </div>
   <button type="submit" class="form-hide">SELL</button>
</form>
