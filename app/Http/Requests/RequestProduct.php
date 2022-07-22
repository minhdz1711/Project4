<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txttenxe'=>'required|unique:sanphams,tenxe'.$this->product_id,
            'txtid_loaixe'=>'required',
            'txtsoluong'=>'required',
            'txtgiaban'=>'required',
            'txtnoidung'=>'required',
            'txtmota'=>'required',
            'txtimage'=>'required',
            
        ];
    }
    public function messages(){
        return [
            'txttenxe.required'=>'không được để trống!',
            'txttenxe.unique'=>'sản phẩm đã tồn tại!',
            'txtid_loaixe.required'=>'không được để trống!',
            'txtsoluong.required'=>'không được để trống!',
            'txtgiaban.required'=>'không được để trống!',
            'txtnoidung.required'=>'không được để trống!',
            'txtmota.required'=>'không được để trống!',
            'txtimage.required'=>'không được để trống!',
        ];
    }
}
