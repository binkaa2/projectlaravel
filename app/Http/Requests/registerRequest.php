<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class registerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //The authorize method can for example check if the user is allowed to do this request.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
          'name'=>'unique:users', // :users is table name in sql
          'email'=>'unique:users',
          'g-recaptcha-response' => 'recaptcha'
        ];

        return $rules;
    }
    /**
    *
    * @return messages
    */
    public function messages()
    {
      return [
          'name.unique'  => 'Tên đã được lấy!!',
          'email.unique' => 'Email đã được lấy!!',
          'recaptcha' => 'Recaptcha sai!!!'
      ];
    }

    /**
    *@return trang_cam_nguoi_dung
    *
    */

    public function pageForbidden(){
      return $this->redirector->to('index');
    }


}
