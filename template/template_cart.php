<?php
if(isset($_POST["btn_trash"])){
$dbh -> dropToCart($_POST["id_product"], $_SESSION["id"]);

}
?>


<div class="container">
	<form action="utils/checkout.php" method="POST">
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
					<div class="row">
						<input type="hidden" name="id_prod[]" value="<?php echo $product["id"];?>"</input>

						<!-- TODO fix this div with responsive mobile (don't work with visible-xs, find a solution) -->
						<div class="col-xs-4">
							<?php
							if(count(explode(";", $product["urlimage"])) > 1){
								require_once("template_carouselproduct.php");
							}
							else{ ?>
								<img class=" visible-xs" src="<?php echo UPLOAD_DIR.$product["iduser"]."/".$product["urlimage"]; ?>" style="max-width:200px;">
								<img class="products-align hidden-xs" src="<?php echo UPLOAD_DIR.$product["iduser"]."/".$product["urlimage"]; ?>" style="max-width:300px;">
							<?php } ?>
						</div>
						<div class=" col-xs-4 text-center pull-right" style="float:right;">
							<h4 class="product-name"><strong><?php echo $product["name"] ?></strong></h4>
							<h4><small><?php echo $product["description"] ?></small></h4>
						</div>
						<div class="col-xs-6 hidden-xs " style="float:right; ">
							<div class="col-xs-6 text-right">
								<h6><strong><?php echo $product["price"];?><span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" name="quantity[]" class="form-control input-sm" value="<?php echo $product["quantity"] ?>" />
							</div>
							<div class="col-xs-2">
								<form method="POST">
								<div class="col-xs-12">
									<input type="hidden" name="id_product" value="<?php echo $product["id"];?>"</input>
									<button name="btn_trash" class="btn btn-link btn-xs float-right" style="float:right;">
										<span class="glyphicon glyphicon-trash"> </span>
									</button>
								</div>
								</form>
							</div>
						</div>
						<div class="col-xs-12 visible-xs"  style="margin-top:30px;">
							<div class="col-xs-2">
								<h6><strong><?php echo $product["price"];?><span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text"  name="quantity[]" class="form-control input-sm" value="<?php echo $product["quantity"] ?>">
							</div>
							<form method="POST">
							<div class="col-xs-12">
								<input type="hidden" name="id_product" value="<?php echo $product["id"];?>"</input>
								<button name="btn_trash" class="btn btn-link btn-xs float-right" style="float:right;">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
							</form>
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
					<h4 class="text-right">Total <strong>€ <?php echo $total ?></strong></h4>
				</div>
				<div class="col-xs-3">
					<button type="submit" class="btn btn-success btn-block">
						Checkout
					</button>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
</div>
</div>
