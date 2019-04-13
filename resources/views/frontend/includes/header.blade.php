
<!-- Set up your HTML -->

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a href="#menu-toggle" style="margin-right: 42px;" id="menu-toggle"><i class="fa fa-align-justify"></i></a>
  <a class="navbar-brand" href="#">
    <img src="{{asset('images/logo.png')}}" alt="test" style="width:40px;">
  </a>
  <!-- Menu Toggle Script -->
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link hvr-icon-pulse-grow" href="{{route('home')}}">Trang Chủ <i class="fa fa-home hvr-icon"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link hvr-pulse-grow" href="{{route('gioithieu')}}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
         <button type="submit" class="btn btn-default hvr-pulse-grow"><i class="fa fa-search"></i></button>
      </form>
    </ul>
    @if(Auth::check())
     <ul class="navbar-nav ml-auto">
    <li>
        <li class="nav-item dropdown">
            <a class="nav-link hvr-pulse-grow" data-toggle="dropdown" href="#">  <i class="fa fa-user fa-fw"></i>
              {{Auth::user()->name}}
               <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a class="nav-link"  href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a  class="nav-link" href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a class="nav-link" href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </li>

    @if(Auth::user()->is_admin==1)
    <li class="nav-item">
      <a  class="nav-link hvr-pulse-grow" href="{{route('admin')}}"><i class="fa fa-unlock-alt"></i> Admin Page</a>
    </li>
    @endif

      </ul>
    @else
        <ul class="navbar-nav ml-auto">
            <li class="nav-item hvr-pulse-grow">
                <a class="nav-link" href="{{route('login')}}">Đăng Nhập</a>
            </li>
            <li class="nav-item hvr-pulse-grow">
                <a class="nav-link" href="{{route('register')}}">Đăng kí</a>
            </li>
        </ul>
  @endif
      </div>
  </div>
  </div>
</nav>
<div id="wrapper">
  <!-- Sidebar -->
  <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
          <li class="sidebar-brand">
              <a href="#">
              </a>
          </li>
          <li>
              <a href="{{route('home')}}">Trang Chủ</a>
          </li>
          <li>
              <a href="#">About</a>
          </li>
          <li>
              <a href="#">Chi Tiết</a>
          </li>
          <li>
              <a href="#">...</a>
          </li>
          <li>
              <a href="#">...</a>
          </li>
          <li>
              <a href="#">...</a>
          </li>
          <li>
              <a href="#">Contact</a>
          </li>
      </ul>
  </div>

  <!-- /#sidebar-wrapper -->
