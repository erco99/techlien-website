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

        <title> WEBSITE - An electronic e-commerce</title>
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
                        <div class="col-sm-6">
                            <div class="text-center">
                                <a href="home.php"><img src="img/icons/logo.svg" alt="logo" height="70px"></a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-center link-distancing">
                                <a href="#">Shop</a>
                                <a href="#">Log in/Sign in</a>
                                <a href="#">Contact</a>
                                <img src="img/icons/cart.svg" alt="cart" height="45px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-full-height visible-xs">
                    <div class="col-xs-2">
                        <div class="dropdown">
                            <button button class="btn btn-dafault dropdown-toggle" type="button" 
                            id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <img src="img/icons/logo.svg" alt="logo" id="logo">
                    </div> 
                    <div class="col-xs-2">  
                        <img src="img/icons/login.svg" alt="login">
                    </div>
                    <div class="col-xs-2">
                        <img src="img/icons/cart.svg" alt="cart">
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
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Information
                            </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                this website bla bla
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
                                Altra
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs footer-sm-style">
                    <div class="text-center">
                        <h4>Information</h4>
                        <a href="#">Contact</a>

                        <hr width="15%">
                        <h4>Altro</h4>
                        <a href="#">Contact</a>
                    </div>
                </div>
            </footer>
        </div>

        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        
        <!-- Personal javascript files-->
        <script src="js/login_functions.js"></script>
    </body>
</html>
