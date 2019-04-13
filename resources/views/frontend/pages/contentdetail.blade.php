<!DOCTYPE html>
<html>
  <head>
    @include('frontend.includes.head')
    <link href="https://fonts.googleapis.com/css?family=Tinos" rel="stylesheet">
  </head>
  <body>
    @include('frontend.includes.header')
    <!-- Page Content -->
      <div class="container" style="margin-top: 4%;">
        <div class="row">
        <div class="col-md-9">
        <div>
          <p>category :
            <a href="#" class="badge badge-light">some category</a>
            <a href="#" class="badge badge-light">some category</a>
            <a href="#" class="badge badge-light">some category</a>
            <a href="#" class="badge badge-light">some category</a>
          </p>
        </div>
        <h1 style="font-weight: bold;">
          {{$data_content->title}}
        </h1>
        <div class="like-top">
          <p>Author : ..... | Ngày Đăng : {{$data_content->content_date}}  </p>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-3">
        <ul class="list-group" style="margin-top:12%;">
          <li class="list-group-item list-group-item-success lefttin">
            <p>Tên Bài viết</p>
            <p>ảnh đặt here</p>
          </li>
          <li class="list-group-item list-group-item-success lefttin">
            <p>Tên Bài viết</p>
            <p>ảnh đặt here</p>
          </li>
          <li class="list-group-item list-group-item-success lefttin">
            <p>Tên Bài viết</p>
            <p>ảnh đặt here</p>
          </li>
        </ul>
        </div>
        <div class="col-md-9">
        <div class="detailcontent" style="font-family: 'Tinos', serif;font-size:120%;">
          {!!$data_content->content!!}
          <p>Nguồn : .... </p>
        </div>
        </div>
        </div>
        <hr>
        <p>ads place here </p>
        <p class="baidangtittle">Bài Đăng Nổi Bậc </p>
        <div class="row">
        <div class="col-md-12">
        <ul class="trendrow">
          @foreach($data_trend_content as $key)
          <li class="trendcontent text-center">
            <a href="{{ url($key->alias.'/'.$key->id)}}">
              <img src="{{$key->img}}" alt="">
            </a>
            <a class="trend_hover" href="{{ url($key->alias.'/'.$key->id)}}">{{$key->title}}</a>
          </li>
          @endforeach
        </ul>
          </div>
        </div>
        <hr>
        <div class="formcomment">
          <p class="binhluantittle">Bình Luận </p>
          <div class="row">
            <div class="col-md-2">
              <img src="" alt="">
            </div>
             {{-- COMMENT --}}
          {{-- COMMENT LIST --}}
          <div class="container">
            <div class="row">
              <div class="comments col-md-9" id="comments">
                  <h3 class="mb-2">Comments {{ $count }}</h3>
                  <!-- comment -->
                  @foreach($comments as $comment)
                  <div class="comment mb-2 row">
                      <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
                          <a href=""><img class="mx-auto rounded-circle img-fluid" src="http://demos.themes.guide/bodeo/assets/images/users/m103.jpg" alt="avatar"></a>
                      </div>
                      <div class="comment-content col-md-11 col-sm-10">
                          <h6 class="small comment-meta"><a href="#">{{ $comment->user->name }}</a> Today, 2:38</h6>
                          <div class="comment-body">
                              <p>
                                  {{ $comment->content }}
                                  <br>
                                  <a href="" class="text-right small"><i class="ion-reply"></i> Reply</a>
                              </p>
                          </div>
                      </div>
                  </div>
                  @endforeach
                  <!-- /comment -->


              </div>
            </div>
        </div>
      </div>
      <hr>
      {{-- INSERT comment --}}
      <div class="col-md-10">
        <h3 style="color: black;font-weight: 300;">Ghi bình luận của bạn vào đây</h3>
        <form class="d-none" id="is_login" action="{{ route('postComment') }}" method="post">
          @csrf
          {{ method_field('POST') }}
          <textarea id="message" name="content"></textarea>
          <input id="commentinput" type="submit" value="Gửi bình luận!" />
        </form>
      </div>
       <!-- /.row -->
      <div class="row">
      <div class="col-md-3">

      </div>
      <div class="col-md-6 text-center" id="is_error_login">
        <div class="alert alert-info">
          Bạn phải <a href="">đăng nhập</a> để comment ~~
        </div>
      </div>
    </div>
   </div>
   {{-- END-COMMENT --}}

   <!-- end Page Content -->
   @include('frontend.includes.footer')

  <!-- CK Editor -->
  <script>
    $(document).ready(function(){
      @if(Auth::check())
        $('#is_login').removeClass('d-none');
        $('#is_error_login').addClass('d-none');
      @endif
      window.scrollTo(500, 0);
    });
  </script>
  </body>
</html>
