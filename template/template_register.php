<div class="container">

  <div class="row">
    <div class="box">

      <div class="col-lg-12">
        <h1 style="text-align:center;">Register</h1>
      </div>
      <hr>
      <div>
        <form action="utils/user_credential.php" method="POST">
          <div class="form-group centered">
            <div class="col-md-6 mb-3">
              <label for="inputFirstName">First Name:</label>
              <input type="text" name="firstName" class="form-control is-valid" id="inputFirstName" aria-describedby="FirstName" placeholder="es. Mario" required />
            </div>
            <div class="col-md-6 mb-3">
              <label for="inputLastName">Last Name:</label>
              <input type="text" name="lastName" class="form-control is-valid" id="inputLastName" aria-describedby="LastName" placeholder="es. Rossi" required />
            </div>

            <div class="col-sm-12">
              <label for="inputUsername">Username:</label>
              <input type="text" name="username" class="form-control is-valid" id="inputUsername" aria-describedby="Username" placeholder="es. mrossi00" required />
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>

            <div class="col-sm-12">
              <label for="inputEmail">Email:</label>
              <input type="email" name="email" class="form-control is-valid" id="inputEmail" aria-describedby="Email" placeholder="es. mariorossi@email.com" required />
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group centered">
              <div class="col-sm-12">
                <label for="inputRepeatEmail">Repeat Email:</label>
                <input type="email" class="form-control" id="inputRepeatEmail" aria-describedby="RepeatEmail" placeholder="es. mariorossi@email.com" onfocusout="compareEmail()" required/>
                <small id="repeatEmailHelp" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-group centered">
              <div class="col-sm-12">
                <label for="inputPassword">Password:</label>
                <input type="password" name="password" class="form-control" id="inputPassword" aria-describedby="Password" placeholder="Password" required/>
                <small id="passwordHelp" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-group centered">
              <div class="col-sm-12">
                <label for="inputRepeatPassword">Password:</label>
                <input type="password" class="form-control" id="inputRepeatPassword" aria-describedby="RepeatPassword" placeholder="Repeat Password"  onfocusout="comparePassword()" required/>
                <small id="repeatPasswordHelp" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-group centered">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" aria-describedby="ButtonRegister">Registrati</button>
              </div>
              <div class="hidden-xs">
                <a href="login.php">Già registrato? Clicca qui.</a>
              </div>
              <div class="visible-xs">
                <input type="button" value="Già registrato? Clicca qui."  onclick="window.location='login.php';" style="float:right;" class=" btn btn-info float-right" /></a>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>