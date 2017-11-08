<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarrerasRequest extends FormRequest
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
            "nombre" => "required|string",
            "alias" => "required|string|between:2,4",
            "coordinador" => "required|exists:users,id"
        ];
    }

    public function messages(){
        return [
            "required" => "El campo :attribute es obligatorio",
            "string" => "El campo :attribute debe ser una cadena de texto",
            "between" => "El campo :attribute tiene que tener mas de :min y menos de :max caracteres",
            "coordinador.exists" => "El campo coordinador debe ser un coordinador válido"
        ];
    }
}
