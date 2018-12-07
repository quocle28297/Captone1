 //-- check validation --//
 $(function(){
  $("#full-name-error-message").hide();
  $("#email-error-message").hide();
  $("#Password-error-message").hide();
  $("#Password-error-message-again").hide();
  $("#login-email-error-message").hide();
  $("#login-Password-error-message").hide();
  $("#Name-error-message").hide();
  $("#phone-error-message").hide();
  $("#phone-h-error-message").hide();
  $("#error-message-gia-e").hide(); 
  $("#error-message-date-e").hide();

  var btnSaveF= document.getElementById('save-f')
  var btnSignIn = document.getElementById('SignIn')
  var btnRegister = document.getElementById('Register')
  var error_fullname = true;
  var error_email = true;
  var error_password = true;
  var error_password_again = true;
  var error_login_email = true;
  var error_login_password = true;
  var error_name_frofile=false;
  var error_phone_fofile=false;
  var error_phone_h=true;

  $("#date-e-e").focusout(function(){
    //check ngày kết thúc
    check_date_end();
  });

  $("#gia-e").focusout(function(){
    //check ngày kết thúc
    check_price_end();
  });
  $("#full-name").focusout(function(){
    check_full_name_h();
  });
  $("#phone-h").focusout(function(){
    check_phone_h();
  });
  $("#phone-f").focusout(function(){
    check_phone_f();
  });

  $("#name-f").focusout(function(){
    check_name_f();
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

  function  check_phone_f()
  {
    var pattern = new RegExp( /^0(1\d{9}|9\d{8})$/);
    if(pattern.test($("#phone-f").val()))
    {
     $("#phone-error-message").hide();
     error_phone_fofile = false;  
     //error_phone_fofile = false;
   }
   else 
   {
     $("#phone-error-message").html("Vui lòng nhập đúng số điện thoại!!!");
     $("#phone-error-message").show();
    // error_phone_fofile = true;  
    error_phone_fofile = true;     
  }
}



function  check_phone_h()
{
  var pattern = new RegExp( /^0(1\d{9}|9\d{8})$/);
  if(pattern.test($("#phone-h").val()))
  {
   $("#phone-h-error-message").hide();
   error_phone_h = false;  
     //error_phone_fofile = false;
   }
   else 
   {
     $("#phone-h-error-message").html("Vui lòng nhập đúng số điện thoại!!!");
     $("#phone-h-error-message").show();
    // error_phone_fofile = true;  
    error_phone_h = true;     
  }
}


function  check_full_name_h()
{
  var pattern = new RegExp( /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/);
  if(pattern.test($("#full-name").val()))
  {
   $("#full-name-error-message").hide();
  // error_name_forfile = false;
  error_fullname = false;
}
else 
{
 $("#full-name-error-message").html("Vui lòng kiểm tra lại tên bạn!!");
 $("#full-name-error-message").show();
   // error_name_forfile = true;    
   error_fullname = true;   
 }
}

function  check_name_f()
{
  var pattern = new RegExp( /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/);
  if(pattern.test($("#name-f").val()))
  {
   $("#Name-error-message").hide();
  // error_name_forfile = false;
  error_name_frofile = false;
}
else 
{
 $("#Name-error-message").html("Vui lòng kiểm tra lại tên bạn!!");
 $("#Name-error-message").show();
   // error_name_forfile = true;    
   error_name_frofile = true;   
 }
}

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

function check_price_end(){
  var check_price = $("#gia-e").val();
  if(check_price <0){
    $("#error-message-gia-e").html("Giá tiền không chính xác");
    $("#error-message-gia-e").show();
  }else{
    $("#error-message-gia-e").hide();
  }
}

// chck dat end
function check_date_end(){
  var date_s = $("#date-s-e").val();
  var date_e = $("#date-s-s").val();
  if(date_e < date_s){
   $("#error-message-date-e").html("Ngày kết thúc không chính xác");
    $("#error-message-date-e").show();
  }else{
    $("#error-message-date-e").hide();
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
  if (error_email == false && error_password == false && error_password_again == false && error_fullname==false && error_phone_h==false){

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

btnSaveF.addEventListener('click',function(e){
  if ( error_phone_fofile == true || error_name_frofile == true){
    e.preventDefault();
  }
},false);

});
 
