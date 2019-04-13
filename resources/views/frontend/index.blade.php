@extends('frontend.layouts.default')
@section('content')

<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-10">
<div class="alert alert-info" style="text-align:center;margin-bottom: 1%;" role="alert">
  Bản Tin
</div>
<div class="panel panel-default">
	            	<div class="panel-body">
	            		<!-- item -->
              @foreach($data_content as $key)
					    <div class="row-item row">
		             <div class="col-md-5">
                  <a class="aindex" href="{{ url($key->alias.'/'.$key->id)}}"><img src="{{$key->img}}" alt="{{$key->title}}"></a>
		             </div>
							<div class="col-md-7">
                <a href="{{route('pagedetail',[$key->alias,$key->id])}}"><p>{{$key->title}}</p></a>
								{!!  substr(strip_tags($key->content), 0, 204) !!}
							</div>
				       <div class="break"></div>
		          </div>
              @endforeach
		                <!-- end item -->
					</div>
	            </div>
</div>
</div>
</div>
@endsection
