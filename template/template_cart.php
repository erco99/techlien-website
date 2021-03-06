<?php
if(isset($_POST["btn_trash"])){
$dbh -> dropToCart($_POST["id_product"], $_SESSION["id"]);
}

if(isset($_SESSION["id"]))
{
?>


<div class="container">
	<form id="checkoutForm" action="utils/checkout.php" method="POST"></form>
		<form id="trashForm" method="POST"></form>

	<div class="row cart-panel">
		<div class="col-xs-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-12 text-center" >
								<span class="glyphicon glyphicon-shopping-cart"></span>
								<h3>Il tuo carrello</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<?php
					$result = $dbh -> getCart($_SESSION["id"]);
					foreach ($result as $product): ?>
					<div class="row text-center">
						<input type="hidden" form="checkoutForm" name="id_prod[]" value="<?php echo $product["id"];?>">

						<!-- TODO fix this div with responsive mobile (don't work with visible-xs, find a solution) -->
						<div class="col-xs-12">
							<?php
							if(count(explode(";", $product["urlimage"])) > 1){
								require_once("template_carouselproduct.php");
							}
							else{ ?>
								<img class=" visible-xs"  alt="product image" src="<?php echo UPLOAD_DIR.$product["iduser"]."/".$product["urlimage"]; ?>" style="max-width:200px;" />
								<img class="products-align hidden-xs"  alt="product image" src="<?php echo UPLOAD_DIR.$product["iduser"]."/".$product["urlimage"]; ?>" style="max-width:300px;" />
							<?php } ?>
						</div>
						<div class=" col-xs-12 text-center pull-right" style="float:right;">
							<h4 class="product-name"><strong><?php echo $product["name"] ?></strong></h4>
							<h5><small><?php echo $product["description"] ?></small></h5>
						</div>
						<div class="col-xs-12 hidden-xs " style="float:right; ">
							<div class="col-xs-6 text-right">
								<h6><strong><?php echo $product["price"];?><span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" title="quantity" form="checkoutForm" name="quantity[]" class="form-control input-sm" value="<?php echo $product["quantity"] ?>" />
							</div>
							<div class="col-xs-2">
								<div class="col-xs-12">
									<input type="hidden" form="trashForm" name="id_product" value="<?php echo $product["id"];?>">
									<button type="submit" name="btn_trash" form="trashForm" class="btn btn-link btn-xs float-right" style="float:right;">
										<span class="glyphicon glyphicon-trash"> </span>
									</button>
								</div>
							</div>
						</div>
						<div class="col-xs-12 visible-xs"  style="margin-top:30px;">
							<div class="col-xs-2">
								<h6><strong><?php echo $product["price"];?><span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" title="quantity" form="checkoutForm" name="quantity[]" class="form-control input-sm" value="<?php echo $product["quantity"] ?>">
							</div>
							<div class="col-xs-12">
								<input type="hidden" form="trashForm" name="id_product" value="<?php echo $product["id"];?>">
								<button type="submit" form="trashForm" name="btn_trash" class="btn btn-link btn-xs float-right" style="float:right;">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<?php
				$total += $product["price"] * $product["quantity"];
			endforeach;
			?>
			<hr>
			<div class="row">
				<div class="text-center">

					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<div class="row text-center">
				<div class="col-xs-9">
					<h4 class="text-right">Total <strong>??? <?php echo $total ?></strong></h4>
				</div>
				<div class="col-xs-3">
					<button form="checkoutForm" class="btn btn-success btn-block">
						Checkout
					</button>
				</div>
			</div>
		</div>
	</div>

</div>

<?php
}
else{
header("Location: /unibowebsite/login.php");
}
 ?>
