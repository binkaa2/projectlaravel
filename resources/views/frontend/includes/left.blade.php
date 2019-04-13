<!-- Indicators -->
</div>
<div class="container-fluid">
  <div class="row">
  <div class="owl-carousel owl-theme" style="padding-top:3%;">
      @foreach($data_slide as $key)
      <div class="item"><img src="{{$key->img}}" alt="{{$key->title}}" width=500 height=600><a href="" class="text">{{$key->title}}</a></div>
      @endforeach
  </div>
</div>
</div>
