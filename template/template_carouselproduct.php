<?php
$index = 0;
$images = explode(";", $product["urlimage"]);
?>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="max-width:200px; max-height: 200px; min-height:200px">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php  for($i = 0; $i < count($images); $i++){
        if($i == 0){ ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo $i ;?>" class="active"></li>
          <?php
        }
        else{ ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo $i ;?>" ></li>
          <?php
        }
      }?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php  for($i = 0; $i < count($images); $i++){
        if($i == 0){ ?>
          <div class="item active">
            <img src=" <?php echo UPLOAD_DIR.$product["iduser"]."/".$images[$i];?>" alt="image product" style="width:100%">
          </div>
          <?php
        }
        else{ ?>
          <div class="item">
            <img src=" <?php echo UPLOAD_DIR.$product["iduser"]."/".$images[$i];?>" alt="" style="width:100%">
          </div>
          <?php
        }

      }?>

    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
