 //-- check validation --//
        $(function(){
          $("#full-name-error-message").hide();
          $("#email-error-message").hide();
          $("#Password-error-message").hide();
          $("#Password-error-message-again").hide();
          $("#login-email-error-message").hide();
          $("#login-Password-error-message").hide();

          var btnSignIn = document.getElementById('SignIn')
          var btnRegister = document.getElementById('Register')
          var error_fullname = true;
          var error_email = true;
          var error_password = true;
          var error_password_again = true;
          var error_login_email = true;
          var error_login_password = true;

          $("#full-name").focusout(function(){
            check_fullname();
          });
          $("#register-email").focusout(function(){
            check_email();
          });

          $("#register-password_1").focusout(function(){
            check_password();          
          });
          $("#register-password_2").focusout(function(){
            check_password_again();          
          });
          $("#login-email").focusout(function(){
            check_loginEmail();
          });
          $("#login-password").focusout(function(){
            check_loginpassword();
          });


          function check_loginEmail(){
            var pattern = new RegExp(/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/igm);

            if(pattern.test($("#login-email").val())){
             $("#login-email-error-message").hide();
             error_login_email = false;
           }else {
             $("#login-email-error-message").html("Email không hợp lệ!!!");
             $("#login-email-error-message").show();
             error_login_email = true;       
           }
         }
         function check_loginpassword(){
          var check_password_length = $("#login-password").val().length;
          if(check_password_length < 5|| check_password_length >20){
            $("#login-Password-error-message").html("Password  phải có  trên 5 ký tự và dưới 20 ký tự!!!");
            $("#login-Password-error-message").show();
            error_login_password=true;
          }else{
           $("#login-Password-error-message").hide();
           error_login_password=false;

         }
       }


       function check_email(){
        var pattern = new RegExp(/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/igm);

        if(pattern.test($("#register-email").val())){
         $("#email-error-message").hide();
         error_email = false;
       }else {
         $("#email-error-message").html("Email không hợp lệ!!!");
         $("#email-error-message").show();
         error_email = true;       
       }
     }

     function check_password(){
      var check_password_length = $("#register-password_1").val().length;
      if(check_password_length < 5|| check_password_length >20){
        $("#Password-error-message").html("Password  phải có  trên 5 ký tự và dưới 20 ký tự!!!");
        $("#Password-error-message").show();
        error_password=true;
      }else{
       $("#Password-error-message").hide();
       error_password=false;

     }
   }

   function check_password_again(){
    var check_password_1 = $("#register-password_1").val();
    var check_password_2 = $("#register-password_2").val();
    if(check_password_1 != check_password_2){
      $("#Password-error-message-again").html("Password  Không giống nhau!!!");
      $("#Password-error-message-again").show();
      error_password_again=true;
    }else{
     $("#Password-error-message-again").hide();
     error_password_again=false;

   }
 }
// ko cho submit  khi  gia tri mat dinh chua dung
btnRegister.addEventListener('click',function(e){
  if (error_email == false && error_password == false && error_password_again == false){

  }else{
    e.preventDefault();
  }
},false);

btnSignIn.addEventListener('click',function(e){
  if ( error_login_email == false && error_login_password == false){

  }else{
    e.preventDefault();
  }
},false);

});