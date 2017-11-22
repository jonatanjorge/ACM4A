<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTalleresRequest extends FormRequest
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
            "nombre" => "required|string|between:5,100",
            "profesor_id" => "exists:users,id|required",
            "horarios" => "",
            "cantidad_horas" => "",
            "fecha_inicio" => ""
        ];
    }
}
