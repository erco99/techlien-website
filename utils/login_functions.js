function compareEmail(){
  const reEmail = document.getElementById('inputRepeatEmail');
  const email = document.getElementById('inputEmail');
  if(email.value != "" && email.value == reEmail.value ){
    $('#repeatEmailHelp').text('Email coincidono');
    document.getElementById('repeatEmailHelp').style.color = 'green';

   }
   else{
     $('#repeatEmailHelp').text('Email non coincidono');
     document.getElementById('repeatEmailHelp').style.color = 'red';
   }
}

function comparePassword(){
  const rePassword = document.getElementById('inputRepeatPassword');
  const password = document.getElementById('inputPassword');
  if(password.value != "" && password.value == rePassword.value){
    $('#repeatPasswordHelp').text('Le password coincidono');
    document.getElementById('repeatPasswordHelp').style.color = 'green';

   }
   else{
     $('#repeatPasswordHelp').text('Le password non coincidono');
     document.getElementById('repeatPasswordHelp').style.color = 'red';
   }
}
