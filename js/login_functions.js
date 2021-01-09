function compareEmail(){
  const reEmail = document.getElementById('inputRepeatEmail');
  const email = document.getElementById('inputEmail');
  if(email.value != "" && email.value == reEmail.value ){
    $('#RepeatEmail').text('Email coincidono');
    document.getElementById('RepeatEmail').style.color = 'green';
    $('button.status').prop('disabled', false);
  }
  else{
    $('#RepeatEmail').text('Email non coincidono');
    document.getElementById('RepeatEmail').style.color = 'red';
    $('button.status').prop('disabled', true);
  }
}

function comparePassword(){
  const rePassword = document.getElementById('inputRepeatPassword');
  const password = document.getElementById('inputPassword');
  if(password.value != "" && password.value == rePassword.value){
    $('#RepeatPassword').text('Le password coincidono');
    document.getElementById('RepeatPassword').style.color = 'green';
    $('button.status').prop('disabled', false);
  }
  else{
    $('#RepeatPassword').text('Le password non coincidono');
    document.getElementById('RepeatPassword').style.color = 'red';
    $('button.status').prop('disabled', true);
  }
}