<?php
include("base.php");
define("UPLOAD_DIR", "img/UPLOAD/");
$total=0;
$_GLOBAL["idUser"] = 1;
<script src="utils/cart_functions.js"></script>
 ?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
									<span class="glyphicon glyphicon-shopping-cart"></span> Il tuo carrello
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<?php
					require_once("db/database.php");
					$dbh = new DatabaseHelper();
					$result = $dbh -> getCart($_GLOBAL["idUser"]);
					foreach ($result as $product): ?>
					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="<?php echo UPLOAD_DIR.$product["iduser"]."/".$product["urlimage"]; ?>">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong><?php echo $product["name"] ?></strong></h4>
							<h4><small><?php echo $product["description"] ?></small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong><?php echo $product["price"];?><span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" value="<?php echo $product["quantity"] ?>">
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
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
							<div class="col-xs-9">
								<h6 class="text-right">Added items?</h6>
							</div>
							<div class="col-xs-3">
								<button type="button" class="btn btn-default btn-sm btn-block">
									Update cart
								</button>
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
							<button type="button" class="btn btn-success btn-block">
								Checkout
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
