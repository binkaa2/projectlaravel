<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Comment;
use Auth;

class mainController extends Controller
{
    public function __construct(Content $model){
      return $this->model=$model;
    }
    public function getTrangChu(){
      return view('frontend.index',['data_content'=>$this->model::paginate(10),'data_slide'=>$this->model::orderBy('content_date','DESC')->take(3)->get()]);
    }
    public function getGioiThieu(){
      return view('frontend.pages.gioithieu');
    }
    public function getAdmin(){
      return view('admin.layouts.app');
    }

    // Post comment
    public function postComment(Request $request){
      $content_id = session('content_id');
      $request->merge([
        'user_id'     =>  Auth::user()->id,
        'content_id'  =>  $content_id,
        'parent'      => 0,
      ]);
      Comment::create($request->all());
      session()->forget('content_id');
      // dd($content_id, $request->all());
      return back();
    }
    // End Post-comment
    public function getPageDetail($alias,$id){
      //dd($this->model::where('is_trend','1')->get());
      $comments = $this->model::find($id)->comments()->where('parent',0)->orderBy('id')->paginate();
      $count    = $comments->count();
      session()->put('content_id', $id);
      // dd($comments);
      return view('frontend.pages.contentdetail',[
        'data_content' => $this->model::find($id),
        'comments'     => $comments,
        'count'        => $count,
        'data_trend_content' => $this->model::where('is_trend','1')->get(),
        ]);
    }
}
