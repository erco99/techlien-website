<div class="row text-center">
  <h2>Shop</h2>
</div>
<div class="row hidden-xs">
  <ul class="nav nav-pills nav-justified shop-nav">
    <div class="row row-adjust">
      <?php foreach($templateParams["macrocategories"] as $macrocategory) : ?>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#<?php echo $macrocategory["name"];?>" aria-expanded="false" aria-controls="<?php echo $macrocategory["name"];?>">
        <?php echo $macrocategory["name"]; ?>
        </button>
      <?php endforeach; ?>
    </div>
    <?php foreach($templateParams["macrocategories"] as $macrocategory) : ?>
      <?php $macro = $macrocategory["id"];
      $templateParams["categories"] = $dbh->getCategoriesByMacro($macro);
      ?>
      <div class="row row-adjust">
        <div class="collapse collapse-category" id="<?php echo $macrocategory["name"]; ?>">
          <div class="well">
            <h3><?php echo $macrocategory["name"]; ?></h4>
            <?php foreach($templateParams["categories"] as $category): ?>
              <p>
                <a href="shop.php?macrocategoryid=<?php echo $macrocategory["id"]?>&categoryid=<?php echo $category["id"] ;?>">
                  <?php echo $category["name"]?>
                </a>
              </p>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </ul>
</div>

<?php for($i = 0; $i < $limit; $i = $i + 3):?>
<div class="row text-center">
  <div class="col-xs-12 col-sm-4 products-align">
    <div class="products-align">
      <img src="<?php echo "img/UPLOAD/".$product[$i]["idseller"].'/'.$product[$i]["urlimage"] ?>" alt="home_image">
        <a href="/unibowebsite/product.php?id=<?php echo $product[$i]["id"]?>" ><h5><strong><?php echo $product[$i]["name"]?></strong></h5></a>
      <h6>€<?php echo $product[$i]["price"]?></h6>
    </div>
  </div>
  <?php if($limit > $i + 1 ){
    echo '<div class="col-xs-12 col-sm-4 products-align">
      <div class="products-align">
        <img src="img/UPLOAD/'.$product[$i+1]["idseller"].'/'.$product[$i+1]["urlimage"].'" alt="home_image">
      <a href="/unibowebsite/product.php?id='.$product[$i + 1]["id"].' "> <h5><strong>'.$product[$i + 1]["name"].'</strong></h5></a>
        <h6>€'.$product[$i + 1]["price"].'</h6>
      </div>
    </div>';
  }
  ?>
  <?php if($limit > $i + 2){
    echo '<div class="col-xs-12 col-sm-4 products-align">
      <div class="products-align">
        <img src="img/UPLOAD/'.$product[$i+2]["idseller"].'/'.$product[$i+2]["urlimage"].'" alt="home_image">
        <a href="/unibowebsite/product.php?id='.$product[$i + 2]["id"].' "><h5><strong>'.$product[$i + 2]["name"].'</strong></h5></a>
        <h6>€'.$product[$i + 2]["price"].'</h6>
      </div>
    </div>';
  }
  ?>
</div>
<?php endfor ;?>
<?php if($limit == 0){
       echo '<div class="row text-center" style="padding: 50px 0px 80px"><h2>No products yet</h2></div>';
      }?>
