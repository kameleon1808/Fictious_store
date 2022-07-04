<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    function createe(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',

            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return redirect()->back()->with('success', 'You are now registered successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }


    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists on users table'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function edit()
    {
        return view('dashboard.user.editPwd');
    }

    public function update(Request $request, $id)
    {
        $pwd = $request->input('pwd');
        $pwd_old = $request->input('pwd_old');
        $pwd_new = $request->input('pwd_new');

        $data = User::find($id);

        if (Hash::check($pwd_old, $pwd)) {
            $data->password = Hash::make($pwd_new);
            $data->update();

            return redirect('user/home')->with('status', 'Sifra izmenjena');
        } else {
            return redirect('user/edit-pwd');
        }
    }

    function delete()
    {
        $id = Auth::id();
        user::where('id', $id)->delete();

        return redirect('/');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
