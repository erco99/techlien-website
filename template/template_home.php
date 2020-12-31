<div class="row">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicatori-->
        <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/home_images/keyboard.png" alt="keyboard">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="item">
            <img src="img/home_images/motherboard.jpg" alt="motherboard">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="item">
            <img src="img/home_images/headphones.jpg" alt="motherboard">
            <div class="carousel-caption">
            </div>
        </div>
        </div>
    
        <!-- Frecce destra e sinistra -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<h4 class="home-subtitle">Most Sold Products</h4>
<?php for($i = 0; $i < $mostSoldLimit; $i = $i + 2): ?> 
<div class="row">
    <div class="col-xs-12 col-sm-6 product-spacing">
        <div class="products-align">
            <img src="<?php echo "img/home_images/".$product[$i]["urlimage"] ?>" alt="home_image">
            <h5><strong><?php echo $product[$i]["name"]?></strong></h5>
            <h6>€<?php echo $product[$i]["price"]?></h6>
        </div>
    </div>
    <?php if($mostSoldLimit != $i + 1) 
        {
            echo '<div class="col-xs-12 col-sm-6 product-spacing">
                <div class="products-align">
                <img src="img/home_images/'.$product[$i+1]["urlimage"].'" alt="home_image">
                    <h5><strong>'.$product[$i+1]["name"].'</strong></h5>
                    <h6>€'.$product[$i+1]["price"].'</h6>
                </div>
            </div>';
        }
     ?>
</div>
<?php endfor ;?>