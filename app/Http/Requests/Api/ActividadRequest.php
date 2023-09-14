<?php

namespace App\Http\Requests\Api;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ActividadRequest extends FormRequest
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
                // $rules = [
                //     'descripcion' => 'required',
                //     'fecha_inicio' => 'required',
                //     'fecha_inicio' => 'required',
                //     'categoria_id' => 'required',
                //     'colaborador_id' => 'required',
                //     'estado_id' => 'required'
                // ];

                $rules = [
                    'nombre' => 'required',
                    'descripcion' => 'required',
                    'fecha_inicio' => 'required',
                    'fecha_fin' => 'required',
                    'categoria_id' => 'required',
                    'colaborador_id' => 'required',
                    'estado_id' => 'required',
                ];

                if (auth()->user()->role_id != Role::ADMINISTRADOR) {
                    $rules['observaciones'] = 'required';
                }

                break;

            case 'PUT':
                // $rules = [
                //     'descripcion' => 'required',
                //     'fecha_inicio' => 'sometimes',
                //     'fecha_inicio' => 'sometimes',
                //     'categoria_id' => 'required',
                //     'colaborador_id' => 'required',
                //     'estado_id' => 'required'
                // ];

                $rules = [
                    // 'descripcion' => 'required',
                    // 'fecha_inicio' => 'sometimes',
                    // 'fecha_fin' => 'sometimes',
                    // 'categoria_id' => 'required',
                    // 'colaborador_id' => 'required',
                    'estado_id' => 'required',
                    
                ];

                if (auth()->user()->role_id != Role::ADMINISTRADOR) {
                    $rules['observaciones'] = 'required';
                }
                else{
                    $rules['nombre'] = 'required';
                    $rules['descripcion'] = 'required';
                    $rules['fecha_inicio'] = 'required';
                    $rules['fecha_fin'] = 'required';
                    $rules['categoria_id'] = 'required';
                    $rules['colaborador_id'] = 'required';
                }
                
                break;
            case 'PATCH':

            default: break;
        endswitch;

        return $rules;
    }
}
