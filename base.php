<!DOCTYPE html>
<html lang="it">
    <head>
        <!-- Require meta tags -->
        <meta name="description" content="Initial description">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <!-- Personal customized css -->
        <link rel="stylesheet" href="css/style.css">

        <title> TECHLIEN - An electronic e-commerce website</title>
        <link rel="icon" type="image/png" href="/unibowebsite/img/icons/favicon.ico"/>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <div class="hidden-xs">
                    <div class="row info-bar">
                        <div class="col-sm-5 col-sm-offset-6">
                            <div class="text-right">
                                <?php
                                if(isset($_SESSION["id"])){
                                    echo '<a href="login.php?logout">Logout</a>';
                                }
                                else{
                                    echo '<a href="login.php">Login</a>
                                    &nbsp;-&nbsp;
                                    <a href="login.php?create_account">Create account</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row row-header">
                        <div class="col-sm-6" id="logo-big">
                            <div class="text-center">
                                <a href="."><img src="img/icons/logo.svg" alt="logo" id="logo"></a>
                            </div>
                        </div>
                        <div class="col-sm-6 cart-big" id="cart-big">
                            <div class="text-center link-distancing">
                                <a href="shop.php">Shop</a>
                                <a href="contact.php">Contact</a>
                                <?php
                                if(isset($_SESSION["id"])){
                                    echo '<a href="/unibowebsite/profile.php">'.$_SESSION["username"].'</a>';
                                }
                                else{
                                    echo '<a href="/unibowebsite/login.php">Account</a>';
                                }
                                ?>
                                <a href="cart.php"><img src="img/icons/cart.png" alt="cart" id="cart"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row visible-xs mobile-banner">
                    <h6>Advanced electronic marketplace</h6>
                </div>
                <div class="row row-full-height visible-xs home-mobile">

                    <div class="col-xs-3 ">
                        <button type="button" class="btn-menu" data-toggle="collapse" data-target="#first">
                            <img src="img/icons/menu.png" alt="menu">
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <a href="."><img src="img/icons/logo.svg" alt="logo" id="mobile-logo"></a>
                    </div>
                    <div class="col-xs-3">
                        <a href="cart.php"><img src="img/icons/cart.png" alt="cart"></a>
                    </div>
                </div>

                <div class="row visible-xs text-center menu-options">
                    <div id="first" class="collapse">
                        <div class="row">
                            <?php
                            if(isset($_SESSION["id"])){
                                echo '<a href="profile.php"><h4>'.$_SESSION["username"].'</h4></a>';
                            }
                            else{
                                echo '<a href="profile.php"><h4>Account</h4></a>';
                            }
                            ?>

                        </div>
                        <hr/>
                        <div class="row">
                            <a href="shop.php"><h4>Shop</h4></a>
                            <a href="#" data-toggle="collapse" data-target="#second"><h4 id="plus">+</h4></a>
                            <div id="second" class="collapse">
                                <?php $templateParams["macrocategories"    ] = $dbh->getMacrocategories(); ?>
                                <?php foreach($templateParams["macrocategories"] as $macrocategory) : ?>
                                    <?php $macro = $macrocategory["id"];
                                    $templateParams["categories"] = $dbh->getCategoriesByMacro($macro);
                                    ?>
                                    <h5>
                                        <strong><?php echo $macrocategory["name"]; ?></strong>
                                    </h5>
                                    <?php foreach($templateParams["categories"] as $category): ?>
                                        <p>
                                            <a href="shop.php?macrocategoryid=<?php echo $macrocategory["id"];?>&categoryid=<?php echo $category["id"] ;?>">
                                                <?php echo $category["name"];?>
                                            </a>
                                        </p>
                                    <?php endforeach; ?>
                                    <?php $i=0; 
                                    $i++;
                                    if($i != 3){ echo "<hr/>"; } ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <a href="contact.php"><h4>Contact</h4></a>
                        </div>
                        <?php
                            if(isset($_SESSION["id"])){
                                echo '<hr/><div class="row"> <a href="login.php?logout"><h4>Logout</h4></a></div>';
                            }
                        ?>
                    </div>
                </div>
            </header>

            <main>
                <?php
                if(isset($templateParams["file"])){
                    require($templateParams["file"]);
                }
                ?>
            </main>

            <footer>
                <div class="row visible-xs">
                    <div class="panel-group footer-xs-style" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Information
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>
                                        <a href="about.php">About us</a>
                                    </p>
                                    <p>
                                        <a href="contact.php">Contact</a>
                                    </p>
                                    <p>
                                        <a href="techinfo.php">Technical information</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Altro
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>
                                        <a href="story.php">The story</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs text-center footer-sm-style">
                    <h3><strong>Information</strong></h3>
                    <p><a href="contact.php">Contact us</a></p>
                    <p><a href="about.php">About us</a></p>
                    <p><a href="techinfo.php">Technical information</a></p>
                    <hr>
                    <h3><strong>Altro</strong></h3>
                    <p><a href="story.php">The story</a></p>
                </div>
                <div class="row last-row">
                    <h4>?? Designed and created by Giovanni Messina and Francesco Ercolani</h4>
                </div>
            </footer>
        </div>

        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

        <!-- Personal javascript files-->
        <script src="js/login_functions.js"></script>
        <script src="js/market_functions.js"></script>
        <script src="js/shop_functions.js"></script>
        <script src="js/general_functions.js"></script>
    </body>
</html>
