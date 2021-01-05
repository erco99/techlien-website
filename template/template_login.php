<div class="container">
  <div class="row login-box">
    <div class="box">
      <div class="col-lg-12 form-title">
        <h2>Login</h2>
      </div>
      <div>
        <form action="utils/user_credential.php" method="POST">
          <div class="form-group centered">
            <div>
              <input type="hidden" value="1" name="login" />
            </div>
            <div class="col-sm-12 form-text">
              <label for="inputEmail">Email:</label>
              <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelp" placeholder="es. mariorossi@email.com" />
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
          </div>
          <div class="form-group centered">
            <div class="col-sm-12 form-text">
              <label for="inputPassword">Password:</label>
              <input type="password" class="form-control" name="password" id="inputPassword" aria-describedby="passwordHelp" placeholder="Password" />
              <small id="passwordHelp" class="form-text text-muted"></small>
            </div>
          </div>
          <div class="form-group centered">
            <div class="col-sm-12 text-center login-buttons">
              <button type="submit" class="btn btn-primary hidden-xs enter-desktop">Enter</button>
              <button type="submit" class="btn btn-primary visible-xs enter-mobile">Enter</button>
            </div>
          </div>
          <div class="row text-center">
            <a href="password_recovery.php">Forgot your password?</a>
          </div>
          <div class="row text-center hidden-xs">
            <a href="login.php?create_account">Not registered yet? Click here.</a>
          </div>
          <div class="form-title visible-xs login-create-new">
            <h3 class="text-center">Are you new to Techlien ?</h3>
              <div class="text-center">
                <input type="button" value="Create new account" onclick="window.location='login.php?create_account';" class="btn btn-success float-right"/>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
