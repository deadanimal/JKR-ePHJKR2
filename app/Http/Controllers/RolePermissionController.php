<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    //
    public function create(){

        return view('blade');
    }

    public function store(Request $request){

        Role::create([
            'name' => 'create-post',
            'display_name' => 'Create Posts', // optional
            'description' => 'create new blog posts', // optional
        ]);
    }

    public function edit(Request $request){

        // $role=Role::find($id);
            return view('blade',[
                // 'peranan' => $role
            ]);
    }
}
