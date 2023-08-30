<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('nombre')
            ->get();

        return response()->json($roles);
    }
}
