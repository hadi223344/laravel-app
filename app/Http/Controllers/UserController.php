<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\LoginRequest;
use App\Rules\UserOrEmail;
use App\Rules\ValidatePassword;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function login(LoginRequest $req)
    {
        // $rules= 'required';
        // if(filter_var($req->emailOrUser, FILTER_VALIDATE_EMAIL))
        //     $rules = $rules.'| exists:users,email';
        // else  $rules = $rules.'|exists:users,name';
        // $validator = Validator::make($req->all(), [
        //     // 'emailOrUser' => $rules,
        //     'emailOrUser' => ['required ', new UserOrEmail],
        //     'loginPassword' => ['required ']
        // ]);
        // $user = User::where('email', $req->emailOrUser)->orwhere('name', $req->emailOrUser)->first();
        // $validator->after(function ($validator) use ($user) {
        //     if ($validator->failed()) return;
        //     // $user = User::where('email', $req->emailOrUser)->orwhere('name', $req->emailOrUser)->first();
        //     if (!Hash::check(request()->loginPassword, $user->password)) {
        //         $validator->errors()->add('loginPassword', 'invalid password');
        //     }
        //     // } else {
        //     //     session()->put('user', $user);
        //     //     return redirect('/');
        //     // }
        // })->validate();
        // session()->put('user', $user);
        // // return redirect('/');

        // $user = User::where('email', $req->emailOrUser)->orwhere('name', $req->emailOrUser)->first();
        // if ($user->exists() and Hash::check($req->loginPassword, $user->password)) {
        $user = $req->getUserAc();
        session()->put('user', $user);
        return redirect('/');
        // }
        // else {
        // return redirect('/login')->with('password', 'wrong');
        //     return redirect('/login')->with('userAc', $req-> emailOrUser);

        // }
        // }

    }

    function signIn(SignInRequest $req)
    {
        // User::insert(['name' => $req->username, 'email' => $req->email, 'password' => Hash::make($req->password)]);

        // $validated = $req->validated();
        // $validated = $validate->safe->all();

        $user = new User;
        $user->name = $req->username;
        $user->email = $req['email'];
        $user->password = Hash::make($req->SigninPassword);
        $user->save();
        // session()->flash('newUser', $req->username);
        session()->put('user', $user);
        return redirect('')->with('user', $user);
    }

    // function showData()
    // {
    //     $users = DB::table('usersInfo')->get();

    //     $users = User::all();

    //     return User::find(1)->getCompany;

    //     return view('user', ['datas' => $users]);
    // }

    // function saveData(Request $req)
    // {
    //     $req->validate([
    //         'uid' => 'required | max:10',
    //         'email' => 'required | Email',
    //         'pwd' => 'required | min:5 '
    //     ]);



    //     $user = new User;
    //     $user->name = $req->input('uid');
    //     $user->email = $req->input('email');
    //     $user->adress = 0;
    //     // $user->pwd = password_hash($req->pwd, PASSWORD_DEFAULT);
    //     $user->pwd = Hash::make($req->pwd);
    //     $user->save();



    //     session()->flash('user', $req->uid);
    //     return redirect('user');

    // $newId = User::insertGetId([
    //     'name' => $req->uid,
    //     'email' => $req->email,
    //     'adress' => 0,
    //     'pwd' => password_hash($req->pwd, PASSWORD_DEFAULT)
    // ]);

    // $user = new User;
    // $user->name = $req->uid;
    // $user->email = $req->email;
    // $user->save();
    // }

    //     function delete($id)
    //     {
    //         $user = User::find($id);
    //         $user->delete();
    //         session()->flash('delete', $id);
    //         return redirect('user');
    //     }
    //     function edit($id)
    //     {
    //         // $updateUser = User::find($id);
    //         $updateUser = DB::table('usersInfo')->find($id);
    //         session()->flash('edit', $updateUser);
    //         return redirect('user');
    //     }
    //     function updateUser(Request $req)
    //     {
    //         // $user = User::where('id', $req->id);
    //         // $user->update(['name' => $req->uid, 'email' => $req->email]);
    //         // session()->flash('update', $req->id);
    //         // return redirect('user');

    //         $user = User::find($req->id);
    //         $user->name = $req->uid;
    //         $user->email = $req->email;

    //         $user->pwd = Hash::make($req->newPassword);
    //         $user->save();

    //         session()->flash('update', $req->id);
    //         return redirect('user');
    //     }

    //     public function showData1(User $key){
    //         return $key->email;
    //     }

}
