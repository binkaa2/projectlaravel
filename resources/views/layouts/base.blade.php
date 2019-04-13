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
    navigation : true
})
});
</script>
