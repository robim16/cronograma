<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
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
                    'identificacion' => 'required|unique:colaboradores',
                    'nombres' => 'required',
                    'apellidos' => 'required',
                    'direccion' => 'required',
                    'telefono' => 'required',
                    'email' => 'required'
                ];
                break;

            case 'PUT':
                $rules = [
                    'identificacion' => "required|unique:colaboradores,identificacion,{$this->colaboradore->id}",
                    'nombres' => 'required',
                    'apellidos' => 'required',
                    'direccion' => 'required',
                    'telefono' => 'required',
                    'email' => 'required'
                ];
                break;
            case 'PATCH':

            default: break;
        endswitch;

        return $rules;
    }
}
