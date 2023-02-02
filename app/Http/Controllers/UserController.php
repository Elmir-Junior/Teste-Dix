<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('users.edit', ['user'=>$user]); 
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => ['nullable'],
            'email' => ['nullable', 'email'],
            'password' => ['required', 'min:6', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['required', 'min:6']
        ]);
                
        $data['password'] = Hash::make($request->get('password'));;

        User::create($data);
        
        return redirect()->route('user.index')->with('msg', 'Usuário cadastrado com sucesso!');
    }    
    
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['nullable'],
            'email' => ['nullable', 'email'],            
            'password' => ['required', 'min:6', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['required', 'min:6']
        ]);

        $data['password'] = Hash::make($request->get('password'));;

        $user->update($data);

        return redirect()->route('user.index')->with('msg', 'Usuário atualizado com sucesso!');
    }
}
