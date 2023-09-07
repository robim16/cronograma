<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoriaRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $method = $request->method();

        switch($method):

            case 'POST':
                $rules = [
                    'nombre' => 'required',
                    'descripcion' => 'required',
                ];
                break;

            case 'PUT':
                $rules = [
                    'nombre' => 'required',
                    'descripcion' => 'required',
                ];
                break;
            case 'PATCH':

            default: break;
        endswitch;

        return $rules;
    }
}
