<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditComisionesRequest extends FormRequest
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
            "carreras_id" => "required|exists:carreras,id",
            "turno" => ['required',Rule::in(['mañana','tarde','noche'])],
            "cuatrimestre" => "required|integer|min:1|max:6",
            "division" => ['required',Rule::in(['A','B','C','D','E'])]
        ];
    }
}
