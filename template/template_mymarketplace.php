<?php
$order = $dbh -> getSelledProduct($_SESSION["id"]);
if(empty($order)){
  echo '<p class="form-title">You have selled  nothing yet :(</p>';
}
elseif(isset($_POST["id_remove"]) && isset($_POST["btn_remove"])){
  $dbh -> removeProduct($_POST["id_remove"]);
  header("Location: /unibowebsite/profile.php");


}
else{
  foreach ($order as $product) :
    ?>

    <?php
    $prod_page = "/unibowebsite/product.php?id=".$product["id"];
    ?>
    <!-- WATCH PRODUCT -->


    <!-- DESKTOP VERSION -->
    <div id="watch-product_<?php echo $product["id"]; ?>" >
      <a id="myproduct_<?php echo $product["id"]; ?>"></a>
      <div class="hidden-xs">
        <div class="card col-lg-12 col-xs-12" style=" margin: 10px 10px; border-style: solid; border-color:grey;" id="desktopwatch-product_<?php echo $product["id"] ?>">
          <div class="panel-title">
            <div class="row">
              <div class="col-lg-4 col-xs-4 form-title">
                <h3><strong>Quantity</strong></h3>
                <h4><?php echo $product["stock"]; ?></h4>
              </div>
              <div class="col-lg-4 col-xs-4 form-title">
                <h3><strong># sold:</strong></h3>
                <h4><?php echo $product["sold"]; ?></h4>
              </div>
            </div>
          </div>
          <div class="row" style=" margin: 10px 10px; border-style: solid; border-color:green;">
            <div class="col-lg-2 col-xs-4 form-title">
              <div class="products-align">
                <?php	if(count(explode(";", $product["urlimage"])) > 1){
                  require_once("template_carouselproduct.php");
                }
                else{ ?>
                  <img class="products-align" alt="product image" src="<?php echo UPLOAD_DIR.$_SESSION["id"].'/'.$product["urlimage"] ?>" alt="">
                <?php } ?>
              </div>
            </div>
            <div class="col-lg-4 col-xs-2 text-center" >
              <h4><a href="<?php echo $prod_page; ?>"><strong><?php echo $product["name"] ?></strong></a></h4>
              <h5><?php echo $product["description"] ?></h5>
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-6"></div>

            <div class="text-right">


              <div class="col-xs-6" style="float: right;">
                <h3><strong>Total price</strong></h3>
              </div>
              <div class="col-xs-6" style="float: right;">
                <h4><?php echo $product["price"] ?> €</h4>
              </div>
              <div class="col-xs-12 text-right">
                <button id="btn_editproduct_<?php echo $product['id'] ?>" class="btn btn-default btn-lg pull-right" onclick="editProductToSell( <?php echo $product['id'] ?>)">
                  <span class="glyphicon glyphicon-pencil"></span> Edit product
                </button>
                <form method="POST">
                  <input type="hidden" name="id_remove" value="<?php echo $product["id"]; ?>"></input>

                  <button id="btn_removeproduct<?php echo $product['id'] ?>" name="btn_remove" class="btn btn-default btn-lg pull-left" >
                    <span class="glyphicon glyphicon-remove-sign"></span> Remove product
                  </button>

                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- MOBILE VERSION  -->
      <div class="visible-xs"  >
        <a id="mobilemyproduct_<?php echo $product["id"]; ?>"></a>
        <div class="container" id="mobilewatch-product_<?php echo $product["id"]; ?>">
          <div class="row mymarket-products">
            <div class="table-responsive" style=" margin: 10px 10px; border-style: solid; border-color:grey;">

              <table class="table table-condensed">
                <thead>
                  <tr>
                    <th class="text-center" id="orderquantity_<?php echo $product["id"]; ?>">Quantity</th>
                    <th class="text-center" id="ordersold_<?php echo $product["id"]; ?>"># sold</th>
                  </tr>
                </thead>
                <tbody>
                  <td class="col-sm-3 col-md-6 text-center" headers="orderquantity_<?php echo $product["id"]; ?>">
                    <h5><?php echo $product["stock"]; ?></h5>
                  </td>
                  <td class="col-sm-3 col-md-6 text-center" headers="ordersold_<?php echo $product["id"]; ?>">
                    <h5><?php echo $product["sold"]; ?></h5>
                  </td>
                </tbody>
                <tbody>
                  <tr>
                    <td class="col-xs-4 text-left">

                      <div class="col-xs-12">
                        <h5><a href="<?php echo $prod_page; ?>"><strong><?php echo $product["name"] ?></a></strong></h5>
                      </div>
                      <div class="col-xs-12">
                        <h5><?php echo $product["description"] ?></h5>
                      </div>
                    </td>
                    <td class="col-xs-6 text-right">


                      <div class="col-xs-12">
                        <h4><strong>Total price</strong></h4>
                      </div>

                      <div class="col-xs-12">
                        <h5><?php echo $product["price"] ?> €</h5>
                      </div>
                    </tr>
                    <tr><td class="col-xs-4 form-title">
                      <div class="products-align">
                        <?php	if(count(explode(";", $product["urlimage"])) > 1){
                          require_once("template_carouselproduct.php");
                        }
                        else{ ?>
                          <img alt="product image"  src="<?php echo UPLOAD_DIR.$_SESSION["id"].'/'.$product["urlimage"] ?>" width="100" height="100">
                        <?php } ?>
                      </div>
                    </td>
                    <div class="col-xs-12 text-center">
                      <button id="mobilebtn_editproduct_<?php echo $product['id'] ?>" class="btn btn-default btn-md" onclick="editProductToSell( <?php echo $product['id'] ?>)">
                        <span class="glyphicon glyphicon-pencil"></span> Edit product
                      </button>
                      <form method="POST">
                        <input type="hidden" name="id_remove" value="<?php echo $product["id"]; ?>"></input>
                        <button id="btn_removeproduct_<?php echo $product['id'] ?>" name="btn_remove" class="btn btn-default btn-md" onclick="removeProductToSell( <?php echo $product['id'] ?>)">
                          <span class="glyphicon glyphicon-pencil"></span> Remove product
                        </button>
                      </form>
                    </div>
                  </tr>
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
      <input type="hidden" name="update" />
      <input type="hidden" name="idtext" value="<?php echo $product["id"]; ?>" />
      <div class="card col-lg-12 col-xs-12" style=" margin: 10px 10px; border-style: solid; border-color:grey;"  id="desktopedit-product_<?php echo $product["id"]; ?>">
        <div class="panel-title">
          <div class="row">
            <div class="col-lg-4 col-xs-4 form-title">
              <label for="stock_text_<?php echo $product["id"] ?>" ><strong>Quantity</strong></label>
              <input type="text" name="stocktext" title="stock input" class="label-info form-control" id="stock_text_<?php echo $product["id"] ?>" value="<?php echo $product["stock"]; ?>" ></input>
            </div>
            <div class="col-lg-4 col-xs-4 form-title">
              <h3><strong>Order Number</strong></h3>
              <h4><?php echo $product["id"]; ?></h4>
            </div>
            <div class="col-lg-4 col-xs-4 form-title">
              <h3><strong># sold:</strong></h3>
              <h4><?php echo $product["sold"]; ?></h4>
            </div>
          </div>
        </div>
        <div class="row" style=" margin: 10px 10px; border-style: solid; border-color:green;">
          <div class="col-lg-2 col-xs-4 form-title">
            <div class="products-align">
              <?php	if(count(explode(";", $product["urlimage"])) > 1){
                require_once("template_carouselproduct.php");
              }
              else{ ?>
                <img alt="product image" src="<?php echo UPLOAD_DIR.$_SESSION["id"].'/'.$product["urlimage"] ?>" >
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-4 col-xs-2 text-center" >
            <input type="text" name="nametext" title="name input" style="width:150px;" class="label-info " id="name_text_<?php echo $product["id"] ?>" value="<?php echo $product["name"] ?>"></input>
            <textarea class="label-info inputbox" title="description input" style="width:150px;" name="descriptiontext" id="description_text_<?php echo $product["id"] ?>"><?php echo $product["description"] ?></textarea>
          </div>
          <div class="col-lg-6"></div>
          <div class="col-lg-6"></div>

          <div class="text-right">

            <div class="col-xs-12" style="float: right;">
              <h4><strong>Total price</strong></h4>
            </div>
            <div class="col-xs-6" style="float: right;">
              <input type="text" name="pricetext" title="price input" class="label-info form-control" id="price_text_<?php echo $product["id"] ?>" value="<?php echo $product["price"] ?>" ></input>
            </div>
            <div class="col-xs-12 text-right">
              <button  type="button" class="btn btn-warning btn-md pull-left" onclick="editProductToSell( <?php echo $product['id'] ?>)">
                <span class="glyphicon glyphicon-remove-sign"></span> Cancel
              </button>
              <button type="submit" class="btn btn-success btn-md pull-right" >
                <span class="glyphicon glyphicon-ok"></span> Confirm
              </button>
            </div>
          </div>
        </div>

      </div>
    </form>

    <!-- MOBILE EDIT VERSION  -->
    <form action="<?php echo UTILS_DIR.'addProduct.php' ?>" method="POST" >
      <input type="hidden" name="update" />
      <input type="hidden" name="idtext" value="<?php echo $product["id"]; ?>" />

      <div class="container"  id="mobileedit-product_<?php echo $product["id"]; ?>" style="display:none; margin-top:10px;">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1" style=" margin: 10px 10px; border-style: solid; border-color:grey;">

            <table class="table table-condensed">
              <thead>
                <tr>
                  <th class="text-center" id="edit_orderquantity_<?php echo $product["id"]; ?>">Quantity</th>
                  <th class="text-center" id="edit_ordersold_<?php echo $product["id"]; ?>"># Solded</th>
                </tr>
              </thead>
              <tbody>
                <td class="col-sm-3 col-md-6 text-center" headers="edit_orderquantity_<?php echo $product["id"]; ?>">
                  <input type="text" name="stocktext" title="stock input" class="form-control" value="<?php echo $product["stock"]; ?>"/>
                </td>
                <td class="col-sm-3 col-md-6 text-center" headers="edit_ordersold_<?php echo $product["id"]; ?>">
                  <h5><?php echo $product["sold"]; ?></h5>
                </td>
              </tbody>
              <tbody>
                <tr>
                  <td class="col-xs-4 text-left">

                    <div class="col-xs-12">
                      <input type="text" name="nametext" title="name product input" value="<?php echo $product["name"] ?>" class="form-control"/>
                    </div>
                    <div class="col-xs-12">
                      <input type="text" class="inputbox" name="descriptiontext" title="description product input" value="<?php echo $product["description"] ?>"/>
                    </div>
                  </td>
                  <td class="col-xs-6 text-right">


                    <div class="col-xs-12">
                      <h4><strong>Total price</strong></h4>
                    </div>

                    <div class="col-xs-12">
                      <input type="text" name="pricetext" title="price input" class="form-control" value="<?php echo $product["price"] ?>"/>
                    </div>
                  </tr>
                  <tr><td class="col-xs-4 form-title">
                    <div class="products-align">
                      <?php	if(count(explode(";", $product["urlimage"])) > 1){
                        require_once("template_carouselproduct.php");
                      }
                      else{ ?>
                        <img alt="product image" src="<?php echo UPLOAD_DIR.$_SESSION["id"].'/'.$product["urlimage"] ?>" width="100" height="100">
                      <?php } ?>
                    </div>
                  </td>
                  <div class="col-xs-12 text-right">
                    <button  type="submit" id="btn_confirmproduct_<?php echo $product['id'] ?>" class="btn btn-default btn-md pull-left" onclick="editProductToSell( <?php echo $product['id'] ?>)">
                      <span class="glyphicon glyphicon-pencil"></span> Confirm
                    </button>
                    <form method="POST">
                      <input type="hidden" name="id_remove" value="<?php echo $product["id"]; ?>"></input>
                      <button id="btn_cancelproduct_<?php echo $product['id'] ?>" name="btn_remove" class="btn btn-default btn-md pull-right" onclick="removeProductToSell( <?php echo $product['id'] ?>)">
                        <span class="glyphicon glyphicon-pencil"></span> Cancel
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
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
<div class="row text-center">
  <button id="btn_addproduct" class="btn btn-default btn-lg" onclick="addProductToSell()">
    <span class="glyphicon glyphicon-plus-sign"></span> Sell new product
  </button>
</div>
<!-- CREATE A PRODUCT FORM (hidden default)-->
<form id="form_addproduct" style="display:none;" action="<?php echo UTILS_DIR.'addProduct.php' ?>" method="POST" enctype="multipart/form-data">
  <div class="col-sm-12 form-text">
    <label for="inputNameProduct" >Product name:</label>
    <input type="text" class="form-control" name="nameProduct" title="name product input" id="inputNameProduct" aria-describedby="inputNameProduct_control" placeholder="es. scheda video GTX XXXTI " required/>
    <small id="inputNameProduct_control" class="form-text text-muted"></small>

  </div>
  <div class="col-sm-12 form-text">
    <label for="inputDescriptionProduct" >Product description:</label>
    <input type="text" class="form-control" name="descriptionProduct" title="description input" id="inputDescriptionProduct" aria-describedby="inputDescriptionProduct_control" placeholder="es. scheda video GTX XXXTI modello X anno 2015 usato" required/>
    <small id="inputDescriptionProduct_control" class="form-text text-muted"></small>

  </div>
  <div class="col-sm-12 form-text">
    <label for="inputStockProduct">Stock:</label>
    <input type="text" class="form-control" name="stockProduct" title="stock input" id="inputStockProduct" aria-describedby="inputStockProduct_control" placeholder="es. 56" required  onfocusout="parseInputStock()">
    <small id="inputStockProduct_control" class="form-text text-muted"></small>

  </div>
  <div class="col-sm-12 form-text">
    <label for="inputPriceProduct">Price:</label>
    <input type="text" class="form-control" name="priceProduct" title="price input" id="inputPriceProduct" aria-describedby="inputPriceProduct_control" placeholder="es. 300,99 " required  onfocusout="parseInputPrice()">
    <small id="inputPriceProduct_control" class="form-text text-muted"></small>

  </div>
  <div class="col-sm-12 form-text">
    <label for="fileToUpload">Upload image of the product:</label>
    <input type="file" name="fileToUpload" title="upload file input" id="fileToUpload" accept="image/*">
  </div>

  <div class="col-sm-12 form-text">
    <label for="category">Choose a category:</label>
    <select name="categoryProduct" id="category" title="select category of product" required>
      <?php foreach ($dbh->getMacrocategories() as $macrocategory) :?>
        <optgroup label="<?php echo $macrocategory["name"]?>">
          <?php foreach ($dbh->getCategoriesByMacro($macrocategory["id"]) as $category) : ?>
            <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
          <?php endforeach; ?>
        </optgroup>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="row text-center">
    <button type="submit" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-upload"></span> SELL</button>
  </div>
</form>
