<?php
$order = $dbh -> getOrders($_SESSION["id"]);
if(empty($order)){
    echo '<p class="form-title">You have no Order yet :(</p>';
}
else {
    foreach ($order as $product) :
        ?>
        <div class="card col-lg-12 col-xs-12" style=" margin: 10px 10px; border-style: solid; border-color:grey;">
           <div class="row">
               <div class="col-lg-4 col-xs-4 form-title">
                    <h3><b>Order Date</b></h3>
                    <h4><?php echo date("d/M/y",strtotime($product["orderdate"])); ?></h4>
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
