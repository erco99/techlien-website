<?php
$order = $dbh -> getSelledProduct($_SESSION["id"]);
if(empty($order)){
   echo '<p class="form-title">You have selled  nothing yet :(</p>';
}
else {
   foreach ($order as $product) :
      ?>

                                                      <!-- WATCH PRODUCT -->


      <!-- DESKTOP VERSION -->
      <div id="watch-product_<?php echo $product["id"]; ?>" >
         <div class="hidden-xs" >
            <div class="card col-lg-12 col-xs-12" style=" margin: 10px 10px; border-style: solid; border-color:grey;" id="desktopwatch-product_<?php echo $product["id"] ?>">
               <div class="panel-title">
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
                        <h3><b># sold:</b></h3>
                        <h4><?php echo $product["sold"]; ?></h4>
                     </div>
                  </div>
               </div>
               <div class="row" style=" margin: 10px 10px; border-style: solid; border-color:green;">
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
                  <div class="col-lg-4 col-xs-2 text-center" >
                     <h4><strong><?php echo $product["name"] ?></strong></h4>
                     <h5><?php echo $product["description"] ?></h5>
                  </div>
                  <div class="col-lg-6"></div>
                  <div class="col-lg-6"></div>

                  <div class="text-right">
                     <div class="col-xs-6" style="float: right;">
                        <h3><b>Tracking</b></h3>
                     </div>
                     <div class="col-xs-6" style="float: right;">
                        <h4><?php echo empty($product["tracknumber"]) ? 'NO TRACKING NUMBER' : $product["tracknumber"]; ?></h4>
                     </div>

                     <div class="col-xs-6" style="float: right;">
                        <h3><b>Total price</b></h3>
                     </div>
                     <div class="col-xs-6" style="float: right;">
                        <h4><?php echo $product["price"] ?> €</h4>
                     </div>
                     <div class"col-xs-12 text-right">
                        <button id="btn_editproduct" class="btn btn-default btn-lg pull-right" onclick="editProductToSell(<?php echo $product["id"] ?>)">
                           <span class="glyphicon glyphicon-pencil"></span> Edit product
                        </button>
                     </div>
                  </div>
               </div>

            </div>
         </div>
         <!-- MOBILE VERSION  -->
         <div class="visible-xs"  >
            <div class="container" id="mobilewatch-product_<?php echo $product["id"]; ?>">
               <div class="row">
                  <div class="col-sm-12 col-md-10 col-md-offset-1" style=" margin: 10px 10px; border-style: solid; border-color:grey;">

                     <table class="table table-hover">
                        <thead>
                           <tr>
                              <th class="text-center" headers="orderquantity">Quantity</th>
                              <th class="text-center" headers="ordernumber">Order number</th>
                              <th class="text-center" headers="ordersold"># solded</th>
                           </tr>
                        </thead>
                        <tbody>
                           <td class="col-sm-3 col-md-6 text-center" headers="orderquantity">
                              <h5><?php echo $product["stock"]; ?></h5>
                           </td>
                           <td class="col-sm-8 col-md-6 text-center" headers="ordernumber">
                              <h5><?php echo $product["id"]; ?></h5>
                           </td>
                           <td class="col-sm-3 col-md-6 text-center" headers="ordersold">
                              <h5><?php echo $product["sold"]; ?></h5>
                           </td>
                        </tbody>
                        <tbody>
                           <tr>
                              <td class="col-xs-4 form-title">
                                 <div class="media">
                                    <?php	if(count(explode(";", $product["urlimage"])) > 1){
                                       require_once("template_carouselproduct.php");
                                    }
                                    else{ ?>
                                       <img src="<?php echo UPLOAD_DIR.$_SESSION["id"].'/'.$product["urlimage"] ?>" alt="" width="100px" height="100px">
                                    <?php } ?>
                                 </div>
                              </td>
                              <td class="col-xs-4 text-left">

                                 <div class="col-xs-12">
                                    <h5><strong><?php echo $product["name"] ?></strong></h5>
                                 </div>
                                 <div class="col-xs-12">
                                    <h5><?php echo $product["description"] ?></h5>
                                 </div>
                              </td>
                              <td class="col-xs-6 text-right">

                                 <div class="col-xs-12">
                                    <span><b>Tracking #: </b></span>
                                 </div>
                                 <div class="col-xs-12">
                                    <h6><?php echo empty($product["tracknumber"]) ? 'NO TRACKING NUMBER' : $product["tracknumber"]; ?></h6>
                                 </div>

                                 <div class="col-xs-12">
                                    <h4><b>Total price</b></h4>
                                 </div>

                                 <div class="col-xs-12">
                                    <h5><?php echo $product["price"] ?> €</h5>
                                 </div>
                                 <div class"col-xs-12 text-right">
                                    <button id="btn_editproduct" class="btn btn-default btn-md pull-right" onclick="editProductToSell(<?php echo $product["id"] ?>)">
                                       <span class="glyphicon glyphicon-pencil"></span> Edit product
                                    </button>
                                 </div>

                              </td>
                           </tbody>
                        </table>

                     </div>
                  </div>

               </div>
            </div>
         </div>

                                                      <!-- EDIT PRODUCT -->


         <!-- DESKTOP EDIT VERSION -->
      <div id="edit-product_<?php echo $product["id"]; ?>" style="display:none;">

         <form action="<?php echo UTILS_DIR.'addProduct.php' ?>" method="POST" >
            <input type="input" class="hidden" name="update" />
            <input type="input" class="hidden" name="idtext" value="<?php echo $product["id"]; ?>" />
            <div class="card col-lg-12 col-xs-12" style=" margin: 10px 10px; border-style: solid; border-color:grey;"  id="desktopedit-product_<?php echo $product["id"]; ?>">
               <div class="panel-title">
                  <div class="row">
                     <div class="col-lg-4 col-xs-4 form-title">
                        <label for="quantity_text" ><b>Quantity</b></label>
                        <input type="text" name="stocktext" class="label-info" id="stock_text_<?php echo $product["id"] ?>" value="<?php echo $product["stock"]; ?>" ></input>
                     </div>
                     <div class="col-lg-4 col-xs-4 form-title">
                        <h3><b>Order Number</b></h3>
                        <h4><?php echo $product["id"]; ?></h4>
                     </div>
                     <div class="col-lg-4 col-xs-4 form-title">
                        <h3><b># sold:</b></h3>
                        <h4><?php echo $product["sold"]; ?></h4>
                     </div>
                  </div>
               </div>
               <div class="row" style=" margin: 10px 10px; border-style: solid; border-color:green;">
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
                  <div class="col-lg-4 col-xs-2 text-center" >
                     <input type="text" name="nametext" class="label-info" id="name_text_<?php echo $product["id"] ?>" value="<?php echo $product["name"] ?>"></input>
                     <textarea class="label-info" name="descriptiontext" id="description_text_<?php echo $product["id"] ?>"><?php echo $product["description"] ?></textarea>
                  </div>
                  <div class="col-lg-6"></div>
                  <div class="col-lg-6"></div>

                  <div class="text-right">
                     <div class="col-xs-6" style="float: right;">
                        <h3><b>Tracking</b></h3>
                     </div>
                     <div class="col-xs-6" style="float: right;">
                        <input type="text" class="label-info" id="tracking_text_<?php echo $product["id"] ?>" value="<?php echo empty($product["tracknumber"]) ? 'NO TRACKING NUMBER' : $product["tracknumber"]; ?>" ></input>
                     </div>

                     <div class="col-xs-6" style="float: right;">
                        <h3><b>Total price</b></h3>
                     </div>
                     <div class="col-xs-6" style="float: right;">
                        <input type="text" name="pricetext" class="label-info" id="price_text_<?php echo $product["id"] ?>" value="<?php echo $product["price"] ?>" ></input>
                     </div>
                     <div class"col-xs-12 text-right">
                        <button id="btn_undoproduct_<?php echo $product["id"] ?>" class="btn btn-warning btn-lg pull-left" onclick="editProductToSell(<?php echo $product["id"] ?>)">
                           <span class="glyphicon glyphicon-remove-sign"></span> Cancel
                        </button>
                        <button type="submit" id="btn_confirmproduct_<?php echo $product["id"] ?>" class="btn btn-success btn-lg pull-right" >
                           <span class="glyphicon glyphicon-ok"></span> Confirm
                        </button>
                     </div>
                  </div>
               </div>

            </div>
         </form>

         <!-- MOBILE EDIT VERSION  -->
         <form action="<?php echo UTILS_DIR.'addProduct.php' ?>" method="POST" >
            <input type="input" class="hidden" name="update" />
            <input type="input" class="hidden" name="idtext" value="<?php echo $product["id"]; ?>" />

         <div class="container"  id="mobileedit-product_<?php echo $product["id"]; ?>" style="display:none; margin-top:10px;">
            <div class="row">
               <div class="col-sm-12 col-md-10 col-md-offset-1" style=" margin: 10px 10px; border-style: solid; border-color:grey;">

                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th class="text-center" headers="orderquantity">Quantity</th>
                           <th class="text-center" headers="ordernumber">Order number</th>
                           <th class="text-center" headers="ordersold"># solded</th>
                        </tr>
                     </thead>
                     <tbody>
                        <td class="col-sm-3 col-md-6 text-center" headers="orderquantity">
                           <input type="text" name="stocktext" class="label-warning" id="mobilestock_text_<?php echo $product["id"]; ?>" value="<?php echo $product["stock"]; ?>"></input>
                        </td>
                        <td class="col-sm-8 col-md-6 text-center" headers="ordernumber">
                           <h5><?php echo $product["id"]; ?></h5>
                        </td>
                        <td class="col-sm-3 col-md-6 text-center" headers="ordersold">
                           <h5><?php echo $product["sold"]; ?></h5>
                        </td>
                     </tbody>
                     <tbody>
                        <tr>
                           <td class="col-xs-4 form-title">
                              <div class="media">
                                 <?php	if(count(explode(";", $product["urlimage"])) > 1){
                                    require_once("template_carouselproduct.php");
                                 }
                                 else{ ?>
                                    <img src="<?php echo UPLOAD_DIR.$_SESSION["id"].'/'.$product["urlimage"] ?>" alt="" width="100px" height="100px">
                                 <?php } ?>
                              </div>
                           </td>
                           <td class="col-xs-4 text-left">

                              <div class="col-xs-12">
                                 <input type="text" name="nametext" class="label-warning"  id="mobilename_text_<?php echo $product["id"]; ?>" value="<?php echo $product["name"] ?>"></input>
                              </div>
                              <div class="col-xs-12">
                                 <input type="text" name="descriptiontext" class="label-warning"  id="mobiledescription_text_<?php echo $product["id"]; ?>"  value="<?php echo $product["description"] ?>"></input>
                              </div>
                           </td>
                           <td class="col-xs-6 text-right">

                              <div class="col-xs-12">
                                 <span><b>Tracking #: </b></span>
                              </div>
                              <div class="col-xs-12">
                                 <input type="text" class="label-info" id="tracking_text_<?php echo $product["id"] ?>" value="<?php echo empty($product["tracknumber"]) ? 'NO TRACKING NUMBER' : $product["tracknumber"]; ?>" ></input>
                              </div>

                              <div class="col-xs-12">
                                 <h4><b>Total price</b></h4>
                              </div>

                              <div class="col-xs-12">
                                 <input type="text" name="pricetext" class="label-info" id="price_text_<?php echo $product["id"] ?>" value="<?php echo $product["price"] ?>" ></input>
                              </div>
                              <div class"col-xs-12 text-right">
                                 <button id="btn_editproduct" class="btn btn-default btn-md pull-right" onclick="editProductToSell(<?php echo $product["id"] ?>)">
                                    <span class="glyphicon glyphicon-ok"></span> Confirm
                                 </button>
                              </div>

                           </td>
                        </tbody>
                     </table>

                  </div>
               </div>

            </div>
            </form>
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
      <label for="stockProduct">Stock:</label>
      <input type="text" class="form-control" name="stockProduct" id="inputStockProduct" aria-describedby="stockProductHelp" placeholder="es. 56" required  onfocusout="parseInputStock()">
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
