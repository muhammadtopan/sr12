<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahMitraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nama_gudang" => ["required"],
            "no_wa" => ["required"],
            "email" => ["required", "unique:tb_gudang,email"],
            "password" => ["required"],
            "nik" => ["required", "unique:tb_gudang,nik"],
            "tanggal_lahir" => ["required"],
            "kelamin" => ["required"],
            "prov_id" => ["required"],
            "kota_id" => ["required"],
            "alamat" => ["required"],
            "photo_toko" => ["mimes:png,jpg,jpeg"],
            "selfie_ktp" => ["mimes:png,jpg,jpeg"],
        ];
    }
}
