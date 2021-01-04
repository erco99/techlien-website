<?php
$order = $dbh -> getOrders($_SESSION["id"]);
if(empty($order)){
  echo '<strong><p class="form-title" style="padding: 40px 0">You have no order yet</p></strong>';
}
else {
  foreach ($order as $product) :
    ?>
    <!-- DESKTOP VERSION ORDERS -->
    <div class="hidden-xs">
      <div class="card col-lg-12 col-xs-12" style=" margin: 10px 10px; border-style: solid; border-color:grey;">
        <div class="panel-title">
          <div class="row">
            <div class="col-lg-4 col-xs-4 form-title">
              <h3><strong>Order Date</strong></h3>
              <h4><?php echo date("d/M/y",strtotime($product["orderdate"])); ?></h4>
            </div>
            <div class="col-lg-4 col-xs-4 form-title">
              <h3><strong>Order Number</strong></h3>
              <h4><?php echo $product["idorder"]; ?></h4>
            </div>
            <div class="col-lg-4 col-xs-4 form-title">
              <h3><strong>Quantity: </strong></h3>
              <h4><?php echo $product["quantity"]; ?></h4>
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
                <img alt="product image" src="<?php echo UPLOAD_DIR.$product["iduser"].'/'.$product["urlimage"] ?>" alt="" class="img-thumbnail" />
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
              <h3><strong>Tracking</strong></h3>
            </div>
            <div class="col-xs-6" style="float: right;">
              <h4><?php echo empty($product["tracknumber"]) ? 'NO TRACKING NUMBER' : $product["tracknumber"]; ?></h4>
            </div>

            <div class="col-xs-8" style="float: right;">
              <h3><strong>Total price</strong></h3>
            </div>
            <div class="col-xs-6" style="float: right;">
              <h4><?php echo $product["price"] ?> €</h4>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php
    //if you delete this, in desktop will see only one product. idk why???
  endforeach;

  ?>

  <!-- MOBILE VERSION ORDERS -->
  <div class="visible-xs" style="margin-top:10px;">
    <div class="container">
      <?php foreach ($order as $product) : ?>
        <div class="row">
          <div class="table-responsive" style=" margin: 10px 10px; border-style: solid; border-color:grey;">

            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center" id="orderdateth_<?php echo $product["idorder"] ?>">Order date</th>
                  <th class="text-center" id="ordernumberth_<?php echo $product["idorder"] ?>">Order number</th>
                </tr>
              </thead>
              <tbody>
                <td class="col-sm-3 col-md-6 text-center" headers="orderdateth_<?php echo $product["idorder"] ?>">
                  <h5><?php echo date("d/M/y",strtotime($product["orderdate"])); ?></h5>
                </td>
                <td class="col-sm-8 col-md-6 text-center" headers="ordernumberth_<?php echo $product["idorder"] ?>">
                  <h5><?php echo $product["idorder"]; ?></h5>
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
                        <img alt="product image" src="<?php echo UPLOAD_DIR.$product["iduser"].'/'.$product["urlimage"] ?>" alt="" width="100" height="100" />
                      <?php } ?>
                    </div>
                  </td>
                  <td class="col-xs-4 text-left">

                    <div class="col-xs-12">
                      <h5><strong><?php echo $product["name"] ?></strong></h5>
                    </div>
                    <div class="col-xs-12">
                      <h5>Quantity: <?php echo $product["quantity"] ?></h5>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="col-xs-2 pull-right">

                    <div class="col-xs-12">
                      <span><strong>Tracking #: </strong></span>
                    </div>
                    <div class="col-xs-12">
                      <h6><?php echo empty($product["tracknumber"]) ? 'NO TRACKING NUMBER' : $product["tracknumber"]; ?></h6>
                    </div>

                    <div class="col-xs-12">
                      <h4><strong>Total price</strong></h4>
                    </div>

                    <div class="col-xs-12">
                      <h5><?php echo $product["price"] ?> €</h5>
                    </div>
                  </td>
                </tr>
              </div>
            </div>
          </tbody>
        </table>
      </div>
    </div>


  <?php endforeach;
}
?>
