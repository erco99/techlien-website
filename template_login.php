<div class="container">

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
    <input type="password" class="form-control" name="password" id="inputPassword" aria-describedby="emailHelp" placeholder="Password" />
    <small id="passwordHelp" class="form-text text-muted"></small>
  </div>
</div>
<div class="form-group centered">
  <div class="col-sm-12">
<button type="submit" class="btn btn-primary">Entra</button>
</div>
<div>
  <a href="#">Password dimenticata?</a>
</div>
<div>
  <a href="login.php?create_account">Non sei ancora registrato? Clicca qui.</a>
</div>
</div>
</form>

  </div>
    </div>
      </div>
        </div>
