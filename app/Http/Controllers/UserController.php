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
    /*
    value="<?php if($user==null){echo "２００字以内で入力してください。"};else{ {{ $user->profile }} };?>"> edit.blade.phpで最初に書いてたやつ
    <input type='text' name='user[profile]' value='{{ $user->profile }}'>
    ↓一番新しいやつ、これじゃだめ？
    <?php if({{ $user->profile }}==null){
                <textarea name="user[profile]" placeholder="200字以内で入力してください"></textarea>;
                }else{
                <textarea name="user[profile]" value=" {{ $user->profile }} "></textarea>;
                }
                ?>
    */
    
    public function update(Request $request, User $user){
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        
        return redirect('/user');
    }
}
