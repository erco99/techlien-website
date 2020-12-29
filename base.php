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
</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="hidden-xs">
                <div class="row info-bar">
                    <div class="col-sm-5 col-sm-offset-6">
                        <div class="text-right">
                            <a href="login.php">Login</a>
                            &nbsp-&nbsp
                            <a href="template_register.php">Create account</a>
                        </div>
                    </div>
                </div>
                <div class="row row-header">
                    <div class="col-sm-6" id="logo-big">
                        <div class="text-center">
                            <a href="home.php"><img src="img/icons/logo.svg" alt="logo" id="logo"></a>
                        </div>
                    </div>
                    <div class="col-sm-6 cart-big" id="cart-big">
                        <div class="text-center link-distancing">
                            <a href="shop.php">Shop</a>
                            <?php
                            if(isset($_SESSION["id"])){
                                echo '<a href="/unibowebsite/profile.php">'.$_SESSION["username"].'</a>';
                            }
                            else{
                                echo '<a href="/unibowebsite/login.php">Log in/Sign in</a>';
                            }
                            ?>
                            <a href="#">Contact</a>
                            <a href="cart.php"><img src="img/icons/cart.png" alt="cart" height="45px"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-full-height visible-xs home-mobile">

                <div class="col-xs-2 home-mobile">
                    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#first">
                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                    </button>
                </div>

                <div class="col-xs-6">
                    <a href="home.php"><img src="img/icons/logo.svg" alt="logo" id="mobile-logo"></a>
                </div>
                <div class="col-xs-2">
                    <img src="img/icons/login.png" alt="login">
                </div>
                <div class="col-xs-2">
                    <img src="img/icons/cart.png" alt="cart">
                </div>
            </div>

            <div class="row visible-xs text-center menu-options">
                <div id="first" class="collapse">
                    <hr/>
                    <div class="row">
                        <a href="#"><h4>Account</h4></a>
                    </div>
                    <hr/>
                    <div class="row">
                        <a href="shop.php"><h4>Shop</h4></a>
                        <a href="#" data-toggle="collapse" data-target="#second"><h4 id="plus">+</h4></a>
                        <div id="second" class="collapse">
                            <?php $templateParams["macrocategories"    ] = $dbh->getMacrocategories(); ?>
                            <?php foreach($templateParams["macrocategories"] as $macrocategory) : ?>
                                <?php $macro = $macrocategory["id"];
                                $templateParams["categories"] = $dbh->getCategoriesByMacro($macro);;
                                ?>
                                <h5>
                                    <strong><?php echo $macrocategory["name"]; ?></strong>
                                </h5>
                                <?php foreach($templateParams["categories"] as $category): ?>
                                <p>
                                    <a href="shop.php?macrocategoryid=<?php echo $macrocategory["id"]?>&categoryid=<?php echo $category["id"] ;?>">
                                        <?php echo $category["name"]?>
                                    </a>
                                </p>
                                <?php endforeach; ?>
                                <?php $i++;
                                if($i != 3){ echo "<hr/>"; } ?>
                            <?php endforeach; ?>
                    </div>
                    <hr/>
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
                                <a href="#">About us</a>
                            </p>
                            <p>
                                <a href="#">Contact</a>
                            </p>
                            <p>
                                <a href="#">Technical information</a>
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
                                <a href="#">The story</a>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row hidden-xs footer-sm-style">
                <div class="row text-center">
                    <h3><strong>Information</strong></h3>
                    <p>
                        <a href="#">About us</a>
                    </p>
                    <p>
                        <a href="#">Contact</a>
                    </p>
                    <p>
                        <a href="#">Technical information</a>
                    </p>

                    <hr width="15%">

                    <h3><strong>Altro</strong></h3>
                    <p>
                        <a href="#">The story</a>
                    </p>
                </div>
            </div>
            <div class="row last-row">
                    <h7>© Designed and created by Giovanni Messina and Francesco Ercolani</h7>
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

