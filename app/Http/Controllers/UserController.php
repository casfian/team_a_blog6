<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr; //add this

class UserController extends Controller
{
    public function index(Request $request)
    {
        //get the data and display in a pagination
        $data = User::orderBy('id', 'DESC')->paginate(5);
        //dd($data); //debug
        return view('users.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        //dd($roles); //debug
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        //1. validate data yg sampai
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        //2. simpan data ke dlm database
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input); //create a single entry
        $user->assignRole($request->input('role'));

        return redirect()->route('users.index')->with('success', 'User created Successfully!');

    }

}
