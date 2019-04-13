<nav class="navbar navbar-expand-sm bg-white navbar-white sticky-top">
   <div class="container">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
     <img src="{{asset('images/logo.png')}}" alt="Logo" style="width:40px;">
  </a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">PC</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">PS4</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">....</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        MORE NEWS
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">..</a>
        <a class="dropdown-item" href="#">..</a>
        <a class="dropdown-item" href="#">..</a>
      </div>
    </li>

    <!-- search bar -->
    <form class="form-inline" action="/action_page.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </ul>
</div>
</nav>
