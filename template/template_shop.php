<div class="row hidden-xs">
  <ul class="nav nav-pills nav-justified shop-nav">
    <div class="row">
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
      <div class="row">
        <div class="collapse collapse-category" id="<?php echo $macrocategory["name"]; ?>">
          <div class="well">
          <h3><?php echo $macrocategory["name"]; ?></h4>
          <?php foreach($templateParams["categories"] as $category): ?>
            <a href="shop.php?macrocategoryid=<?php echo $macrocategory["id"]?>&categoryid=<?php echo $category["id"] ;?>">
              <?php echo $category["name"]?>
            </a>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </ul>
</div>

<?php for($i = 0; $i < 2; $i = $i + 3):?>
<div class="row text-center">
    <div class="col-xs-12 col-sm-4 products-align">
      <div class="products-align">
        <img src="<?php echo "img/home_images/".$product[$i]["urlimage"] ?>" alt="home_image">
        <h5><strong><?php echo $product[$i]["name"]?></strong></h5>
        <h6><?php echo $product[$i]["price"]?></h6>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 products-align">
      <div class="products-align">
        <img src="<?php echo "img/home_images/".$product[$i + 1]["urlimage"] ?>" alt="home_image">
        <h5><strong><?php echo $product[$i + 1]["name"]?></strong></h5>
        <h6><?php echo $product[$i + 1]["price"]?></h6>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 products-align">
      <div class="products-align">
        <img src="<?php echo "img/home_images/".$product[$i + 2]["urlimage"] ?>" alt="home_image">
        <h5><strong><?php echo $product[$i + 2]["name"]?></strong></h5>
        <h6><?php echo $product[$i + 2]["price"]?></h6>
      </div>
    </div>
  </div>
  <?php endfor ;?>