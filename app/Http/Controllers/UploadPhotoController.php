<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RemoteImageUploader\Factory;
use Validator;


class UploadPhotoController extends Controller
{
    public function storageImage(Request $request)
    {
        // Tạo validate cho $request->upload:
        // - không được trống
        // - là file image
        // - max size là 2345678
        $validator = Validator::make($request->all(), [
            'upload' => 'required|image|size:2345678',
        ]);
        // Nếu validate fail thì return thông báo lỗi
        if ($validator->fails()) {
            // gộp mảng errors thành chuỗi, cách nhau bởi dấu cách
            $message = implode(' ', $validator->errors()->all());

            return [
                'status' => false,
                'url' => '',
                'message' => 'Upload fail! ' . $message,
            ];
        }

        try {
            // Thực hiện create và upload photo với config đã cài sẵn
            $result = Factory::create(config('uploadphoto.host'), config('uploadphoto.auth'))
                ->upload($request->upload->path());

            return view('uploadCKEditor', [
                'CKEditorFuncNum' => $request->CKEditorFuncNum,
                'data' => [
                    'url' => $url,
                    'message' => $message,
                ],
            ]);
        } catch (\Exception $ex) {
            // Nếu bị Exception thì trả về message của Exception đó
            // Exception ở đây có thể là:
            // - host không hợp lệ
            // - api không hợp lệ
            // - xác thực auth không thành công
            // - không có quyền upload
            // - php không enable curl
            return [
                'status' => false,
                'url' => '',
                'message' => 'Upload fail! ' . $ex->getMessage(),
            ];
        }
    }
}
