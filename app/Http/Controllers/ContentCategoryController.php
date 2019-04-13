<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentCategory;

class ContentCategoryController extends Controller
{

    public function __construct(ContentCategory $model)
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
        return view(config('controller.prefix_view') . config('controller.folder') . $this->model->route . '.index',['data_category'=>$this->model::paginate(10),'model'=>$this->model->route,'indexcontentcategory'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('controller.prefix_view').config('controller.folder').$this->model->route.'.create',['model'=>$this->model->route],['addcontentcategory'=>true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'name'=>'unique:content_categories',
          'alias'=>'unique:content_categories'
        ],[
          'name.unique'=>'Trùng tên',
          'alias.unique'=>'Trùng thể loại'
        ]);
        $data = new $this->model;
        $data->name = $request->name;
        $data->alias = $request->alias;
        $data->save();
        return redirect()->route('content-category.index')->with('thongbao','Đã thêm thành công!!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model::find($id);
        return view(config('controller.prefix_view').config('controller.folder').$this->model->route.'.edit',['data'=>$data,'model'=>$this->model->route]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $this->model::find($id);
      if($data->name == $request->name){
        if($data->alias == $request->alias){
          return redirect()->route('content-category.index')->with('thongbao','Không có sự thay đổi!!');
        }
        else{
          $this->validate($request,[
            'alias'=>'unique:content_categories'
          ],[
            'alias.unique'=>'Trùng alias'
          ]);
          $data->name = $request->name;
          $data->alias = $request->alias;
          $data->save();
          return redirect()->route('content-category.index')->with('thongbao','Đã sửa thành công!!');
        }
      }
      else{
        if($data->alias==$request->alias){
          $data->name = $request->name;
          $data->alias = $request->alias;
          $data->save();
          return redirect()->route('content-category.index')->with('thongbao','Đã sửa thành công!!');
        }
        else{
          $this->validate($request,[
            'name'=>'unique:content_categories'
          ],[
            'name.unique'=>'Trùng thể loại'
          ]);
          $data->name = $request->name;
          $data->alias = $request->alias;
          $data->save();
          return redirect()->route('content-category.index')->with('thongbao','Đã sửa thành công!!');
        }
      }
      return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = $this->model::find($id);
        $data->delete();
        return redirect()->route('content-category.index')->with('thongbao','Đã xóa thành công!!');
    }
}
