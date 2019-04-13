<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\registerRequest;

class UserController extends Controller
{
    public function __construct(User $model)
    {
        $this->model    = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_table = $this->model->paginate();
        return view(config('controller.prefix_view') . config('controller.folder') . $this->model->route . '.index', [
            'data_table' =>   $this->model->paginate(10),
            'model'      =>   $this->model->route,
            'indexuser' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('controller.prefix_view') . config('controller.folder') . $this->model->route . '.create',[
            'model'      =>   $this->model->route,
            'adduser' => true
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
          'name' =>'required|min:3|max:100|unique:users',
          'email'=>'unique:users',
        ],[
          'name.required'=>'Bạn chưa nhập tên thể loại',
          'name.unique'=>'Trùng Username',
          'name.min'=>'độ dài tên phải lớn hơn 3',
          'name.max'=>'độ dài tên phải bé hơn 100',
          'email'=>'Trùng Email'
        ]
        );
        $user = new $this->model;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->is_admin = 0;
        $user->save();
        return redirect()->route('user.index')->with('thongbao','Thêm Thành Công',[
            'model'      =>   $this->model->route,]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      $user = $this->model::find($id);
      return view(config('controller.prefix_view') . config('controller.folder') . $this->model->route . '.edit',['user'=>$user],[
        'model'      =>   $this->model->route,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = $this->model::find($id);
        if($user->name == $request->name){
          if($user->email == $request->email){
            $user->address=$request->address;
            $user->save();
          }
          else{
            $user->email=$request->email;
            $user->address=$request->address;
            $user->save();
          }
        }
        else{
          $this->validate($request,[
            'name' =>'required|min:3|max:100|unique:users',
            'email'=>'unique:users'
          ],[
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.unique'=>'Trùng Username',
            'name.min'=>'độ dài tên phải lớn hơn 3',
            'name.max'=>'độ dài tên phải bé hơn 100',
            'email'=>'Trùng Email'
          ]
        );
            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->save();
        }
        return redirect()->route('user.index')->with('thongbao','Cập Nhập Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model::find($id)->delete();
        return redirect()->route('user.index')->with('thongbao','Đã Xóa Thành Công');
    }
}
