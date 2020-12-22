<div class="container">
  <link rel="stylesheet" href="css/style.css">

  <div class="row">
    <div class="box">

      <div class="col-lg-12">
        <h1 style="text-align:center;">Login</h1>
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
              <button type="submit" class="btn btn-primary">Entra</button>
            </div>
            <div class="hidden-xs">
              <div>
                <a href="#">Password dimenticata?</a>
              </div>
              <div>
                <a href="login.php?create_account">Non sei ancora registrato? Clicca qui.</a>
              </div>
            </div>
            <br>
            <div class="visible-xs">
              <div class="col-lg-4">
                <div>
                  <form action="#" class="inline">
                    <input type="button" href value="Password dimenticata?" onclick="window.location='#';" style="float:right;" class="btn btn-warning float-right" />
                  </form>
                </div>
              </div>
              <hr>
              <div class="col-lg-4">
                <div>
                  <input type="button" value="Non sei ancora registrato? Clicca qui."  onclick="window.location='login.php?create_account';" style="float:right;" class="btn btn-info float-right" /></a>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
