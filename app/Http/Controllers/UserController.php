<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(User $user){
        return view('User/index')->with(['own_posts' => $user->getOwnPaginateBylimit(),'user' => $user->getOwnUser()]);
    }
    
    public function edit(User $user){
        return view('User/edit')->with(['user' => $user->getOwnUser()]);
    }
    
    public function update(Request $request, User $user){
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        
        return redirect('/user');
    }
}
