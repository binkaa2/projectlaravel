<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.header')
    <div class="container">
        @yield('content')
    </div>
</body>
<footer>
  @include('includes.footer')
</footer>
</html>
<script>
$(document).ready(function(){
  $("#owl-main").owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
})
});
</script>
