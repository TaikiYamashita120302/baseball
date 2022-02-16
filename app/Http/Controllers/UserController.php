<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth; //Userクラス定義の前に追加
use Storage;

class UserController extends Controller
{
    public function index(User $user){
        return view('User/index')->with(['own_posts' => $user->getOwnPaginateBylimit(),'user' => $user->getOwnUser()]);
    }
    
    public function edit(User $user){
        return view('User/edit')->with(['user' => $user->getOwnUser()]);
    }
    
    public function update(Request $request, User $user){
        
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの'baseball_folder/'フォルダへアップロード
        $path = Storage::disk('s3')->putFile('baseball_folder', $image, 'public');
        //dd($path);
        // アップロードした画像のフルパスを取得
        $image_path = Storage::disk('s3')->url($path);
        //dd($image_path);

        $input_user = $request['user'];
        $input_user += ['image_path' => $image_path];
        //dd($input_user);
        $user->fill($input_user)->save();
        //dd($user);
        
        return redirect('/user');
    }
    
    public function other_index(User $user){
        if($user == Auth::user()){
            return view('User/index')->with(['own_posts' => $user->getOwnPaginateBylimit(),'user' => $user->getOwnUser()]);//自分のプロフィールをクリックしたらマイページへ飛ぶ
        }
        else{
            return view('User/other_index')->with(['user' => $user]);
        }
    }
    
    public function follow(User $user){
        Auth::user()->followings()->attach($user);
        return redirect()->back();
    }
    
    public function unfollow(User $user){
        Auth::user()->followings()->detach($user);
        return redirect()->back();
    }
    
    public function showfollow(User $user){
        $follows = $user->followings()->get();
        return view('User/showfollow')->with(['user' => $user, 'follows' => $follows]);
    }
    
     public function showfollower(User $user){
        $followers = $user->followers()->get();
        return view('User/showfollower')->with(['user' => $user, 'followers' => $followers]);
    }
}
