$('document').ready(function(){
  //validate
  $("#registerform").validate({
    rules:
    {
      name:{
        required:true,
        minlength: 3
      },
      password:{
        required:true,
        minlength:8,
      },
      passwordcp:{
        required:true,
        equalTo: '#password'
      }

    },
    message:
    {
      name:{
        required:"Nhap ten",
        minlength:"Ten yeu cau tren 3 ki tu"
      },
      password:{
        required:"Nhap pass",
        minlength:"pass yeu can tren 8 ki tu",
      },
      passwordcp:{
        required:"Nhap lai pass",
        equalTo:"Pass khong dung voi pass tren"
      }
    },
    //submitHandler: submitForm
  });
});
