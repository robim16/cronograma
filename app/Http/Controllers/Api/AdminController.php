<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function verify_admin(Request $request)
    {
        $isAdmin = 0;
        if (auth()->user()->role_id == Role::ADMINISTRADOR) {
            $isAdmin = 1;
        }
        return $isAdmin;
    }
}
