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

            <div class="col-lg-2">
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

<button id="btn_addproduct" class="btn btn-default btn-lg" onclick="addProductToSell()">
   <span class="glyphicon glyphicon-plus-sign"></span> Sell new product
</button>

<!-- CREATE A PRODUCT FORM (hidden default)-->
<form id="form_addproduct" style="display:none;" action="<?php echo UTILS_DIR.'addProduct.php' ?>" method="POST" enctype="multipart/form-data">
   <div class="col-sm-12 form-text">
      <label for="nameProduct">Product name:</label>
      <input type="input" class="form-control" name="nameProduct" id="inputNameProduct" aria-describedby="nameProductHelp" placeholder="es. scheda video GTX XXXTI " required/>
      <small id="inputNameProduct_control" class="form-text text-muted"></small>

   </div>
   <div class="col-sm-12 form-text">
      <label for="descriptionProduct">Product description:</label>
      <input type="text" class="form-control" name="descriptionProduct" id="inputDescriptionProduct" aria-describedby="descriptionProductHelp" placeholder="es. scheda video GTX XXXTI modello X anno 2015 usato" required/>
      <small id="inputDescriptionProduct_control" class="form-text text-muted"></small>

   </div>
   <div class="col-sm-12 form-text">
      <label for="stockproduct">Stock:</label>
      <input type="text" class="form-control" name="stockproduct" id="inputStockProduct" aria-describedby="stockProductHelp" placeholder="es. 56" required  onfocusout="parseInputStock()">
      <small id="inputStockProduct_control" class="form-text text-muted"></small>

   </div>
   <div class="col-sm-12 form-text">
      <label for="priceProduct">Price:</label>
      <input type="text" class="form-control" name="priceProduct" id="inputPriceProduct" aria-describedby="priceProductHelp" placeholder="es. 300,99 " required  onfocusout="parseInputPrice()">
      <small id="inputPriceProduct_control" class="form-text text-muted"></small>

   </div>
   <div class="col-sm-12 form-text">
      <label for="urlimageProduct">Upload image of the product:</label>
      <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
   </div>

   <div class="col-sm-12 form-text">
<label for="categoryProduct_label">Choose a category:</label>
   <select name="categoryProduct" id="category" required>
      <?php foreach ($dbh->getCategories() as $category) : ?>
      <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
   <?php endforeach; ?>
   </select>
   </div>

   <button type="submit" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-upload"></span> SELL</button>
</form>
