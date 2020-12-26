<div class="container">
  <link rel="stylesheet" href="css/style.css">

  <div class="row">
    <div class="box">

      <div class="col-lg-12 form-title">
        <h1>Login</h1>
      </div>
      <hr>
      <div>
        <form action="utils/user_credential.php" method="POST">
          <div class="form-group centered">
            <div>
              <input type="hidden" value="1" name="login" />
            </div>
            <div class="col-sm-12">
              <label for="inputEmail">Email:</label>
              <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelp" placeholder="es. mariorossi@email.com" />
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
          </div>
          <div class="form-group centered">
            <div class="col-sm-12">
              <label for="inputPassword">Password:</label>
              <input type="password" class="form-control" name="password" id="inputPassword" aria-describedby="passwordHelp" placeholder="Password" />
              <small id="passwordHelp" class="form-text text-muted"></small>
            </div>
          </div>
          <div class="form-group centered">
            <div class="col-sm-12">
              <br>
              <button type="submit" class="btn btn-primary hidden-xs enter-desktop">Entra</button>
              <button type="submit" class="btn btn-primary visible-xs enter-mobile">Entra</button>
            </div>
          </div>
          <div>
              <div>
                <a href="#">Password dimenticata?</a>
              </div>
              <div class="hidden-xs">
                <a href="login.php?create_account">Non sei ancora registrato? Clicca qui.</a>
              </div>
            <br>
            <div class="visible-xs" style="text-align:center;">
              <div class="col-lg-4">
              <h3 >Are you new to Techlien ?</h3>
                <div>
                  <form action="#" class="inline">
                    <input type="button" href value="CREATE A NEW ACCOUNT" onclick="window.location='login.php?create_account';" class="btn btn-success float-right" style="margin-bottom:80px;" />
                  </form>
                </div>
              </div>
              </div>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>
