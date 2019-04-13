<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubContentCategory;
use App\ContentCategory;
class SubContentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(SubContentCategory $model){
      return $this->model = $model;
    }



    public function index()
    {
        return view(config('controller.prefix_view').config('controller.folder').$this->model->route.'.index',['data'=>$this->model::paginate(10),'model'=>$this->model->route,'indexsubcontent' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_category = ContentCategory::all();
        return view(config('controller.prefix_view').config('controller.folder').$this->model->route.'.create',['data'=>$this->model::paginate(10),'data_category'=>$data_category,'addsubcontent' => true,'model' => $this->model->route]);
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
          'name' => 'unique:sub_content_categories',
          'alias' => 'unique:sub_content_categories'
        ],[
          'name.unique' => 'Trùng thể loại',
          'alias.unique' => 'Trùng alias'
        ]);
        $data = new $this->model;
        $data->name = $request->name;
        $data->alias = $request->alias;
        $data->content_category_id = $request->id_category;
        $data->save();
        return redirect()->route('sub-content-category.index')->with('thongbao','Thêm thành công!!');
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
        $data_category = ContentCategory::all();
        return view(config('controller.prefix_view').config('controller.folder').$this->model->route.'.edit',['data'=>$data,'data_category'=>$data_category,'model'=>$this->model->route]);
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
          if($data->category_id == $request->id_category){
            return redirect()->route('sub-content-category.index')->with('thongbao','Không có sự thay đổi!!');
          }
          else{
            $data->category_id = $request->id_category;
            $data->save();
            return redirect()->route('sub-content-category.index')->with('thongbao','Đã sửa thành công!!');
          }
        }
        else{
          $this->validate($request,[
            'alias'=>'unique:content_categories'
          ],[
            'alias.unique'=>'Trùng alias'
          ]);
          $data->name = $request->name;
          $data->alias = $request->alias;
          $data->category_id = $request->id_category;
          $data->save();
          return redirect()->route('sub-content-category.index')->with('thongbao','Đã sửa thành công!!');
        }
      }
      else{
        if($data->alias==$request->alias){
          $data->name = $request->name;
          $data->alias = $request->alias;
          $data->category_id = $request->id_category;
          $data->save();
          return redirect()->route('sub-content-category.index')->with('thongbao','Đã sửa thành công!!');
        }
        else{
          $this->validate($request,[
            'name'=>'unique:content_categories'
          ],[
            'name.unique'=>'Trùng tên thể loại'
          ]);
          $data->name = $request->name;
          $data->alias = $request->alias;
          $data->category_id = $request->id_category;
          $data->save();
          return redirect()->route('sub-content-category.index')->with('thongbao','Đã sửa thành công!!');
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
        $data = $this->model::find($id);
        $data->delete();
        return redirect()->route('sub-content-category.index')->with('thongbao','Xóa thành công!!');
    }
}
