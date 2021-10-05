<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr; //add this
use DB;

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
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User created Successfully!');

    }

    //added code
    public function show($id) 
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }


}
