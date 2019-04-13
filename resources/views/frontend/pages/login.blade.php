<!DOCTYPE html>
<html>
  <head>
    @include('frontend.includes.head')
    <!-- login page css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!--Recaptcha google libary -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
        <form action="{{route('postlogin')}}" method="post">
          @csrf
          <h2>Đăng Nhập</h2>
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required oninvalid="this.setCustomValidity('3 từ tối thiểu')" oninput="this.setCustomValidity('')" pattern=".{3,30}"/>
            <input type="password" id="password" name="password" placeholder="Mật Khẩu" required oninvalid="this.setCustomValidity('Xin Nhập Password')" oninput="this.setCustomValidity('')"/>
            <button type="submit" id="buttonlogin">Login</button>
        </form>
        </div>

        <div class="form">
          <h2>Tạo Tài Khoản</h2>
          <form method="post" action="{{route('postregister')}}">
            @csrf
            <input type="text" name="name" placeholder="Username" required oninvalid="this.setCustomValidity('3 từ tối thiểu')" oninput="this.setCustomValidity('')" pattern=".{3,30}"/>
            <input type="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Xin Nhập Password')" oninput="this.setCustomValidity('')"/>
            <input type="email" name="email" placeholder="Email Address" required oninvalid="this.setCustomValidity('Xin Nhập đúng định dạng Email')" oninput="this.setCustomValidity('')"/>
            <input type="text" name="address" placeholder="Address" required oninvalid="this.setCustomValidity('Nhập địa chỉ')" oninput="this.setCustomValidity('')"/>
            <button>Register</button>
          </form>
        </div>
        <div class="cta"><a href="">Quên mật khẩu?</a></div>
      @if(Session::get('loi'))
      <div class="alert alert-danger"role="alert">
        {{Session::get('loi')}}
      </div>
      @endif
      @if(Session::get('register'))
      <div class="alert alert-success" role="alert">
        {{Session::get('register')}}
      </div>
      @endif
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script  src="js/index.js"></script>
  </body>
</html>
