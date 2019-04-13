<!DOCTYPE html>
<html>
  <head>
    @include('frontend.includes.head')
    <!-- login page css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <!--Recaptcha google libary -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <!-- Form Mixin-->
      <!-- Input Mixin-->
      <!-- Button Mixin-->
      <!-- Pen Title-->
      <!-- Form Module-->
      <div class="module form-module">
        <div class="toggle"><i class="fa fa-times fa-pencil"></i>
        </div>
        <div class="form">
          <h2>Tạo tài khoản</h2>
          <form method="post" id="apply" action="{{route('postregister')}}">
            @csrf
            <input type="text" name="name" id="username" placeholder="Username" required oninvalid="this.setCustomValidity('3 từ tối thiểu')" oninput="this.setCustomValidity('')" pattern=".{3,30}" /><p class="d-none pbao" style="color:red;margin-bottom:8%;"></p><i class="fa fa-check d-none" style="margin-left: 12.8%;margin-top: -2.5%;position: fixed;"></i>
            <input type="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Xin Nhập Password')" oninput="this.setCustomValidity('')"/>
            <input type="email" name="email" placeholder="Email Address" required oninvalid="this.setCustomValidity('Xin Nhập đúng định dạng Email')" oninput="this.setCustomValidity('')"/>
            <input type="text" name="address" placeholder="Address" required oninvalid="this.setCustomValidity('Nhập địa chỉ')" oninput="this.setCustomValidity('')"/>
          <!-- <div class="g-recaptcha" data-theme="light" data-sitekey="6Le47mcUAAAAAJVwzjoyLvr2jE_JYPUSrs7PM3Vl" style="transform:scale(0.8);-webkit-transform:scale(0.8);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>-->
            <button id="button-register">Đăng kí</button>
          </form>
        </div>
        <div class="form">
          <h2>Đăng Nhập</h2>
          <form method="post" action="{{route('postlogin')}}">
            @csrf
            <input type="text" name="username" placeholder="Tên đăng nhập" required/>
            <input type="password" name="password" placeholder="Password" required/>
            <button>Login</button>
          </form>
        </div>
        <div class="cta"><a href="">Quên mật khẩu?</a></div>
        @foreach($errors->all() as $error)
          <div class="alert alert-danger" style="margin-bottom: 0%;" role="alert">
            {{$error}}
          </div>
        @endforeach
      </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
          <script  src="js/index.js"></script>
  </body>

  <script>
    $(document).ready(function(){
      $("#username").focusout(function() {
            $.ajax({
                type: 'POST',
                url: '{{url('checkname')}}', //geturl
                data: {
                  _token: "{{ csrf_token() }}", //sendtoken
                  'name': $('#username').val(),
                },
                success: function(data) {
                  if(data.check==0){
                    $('.pbao').removeClass('d-none').text('Tên đã có người sử dụng!!');
                    $('.fa-check').addClass('d-none');
                  }
                  if(data.check==1) {
                    $('.pbao').addClass('d-none');
                    $('.fa-check').removeClass('d-none');
                  }
                },
            }).fail(function(){
              alert('fail');
            });
        });
    });
    </script>
</html>
