<!DOCTYPE html>
<html>
  <head>
    @include('frontend.includes.head')
  </head>
  <body>
    @include('frontend.includes.header')
    @include('frontend.includes.left')
    <!-- Page Content -->
   <div class="container" style="margin-top:3%;">


       @yield('content')

       </div>
       <!-- /.row -->
   </div>
   <!-- end Page Content -->
   @include('frontend.includes.footer')
  </body>

</html>
