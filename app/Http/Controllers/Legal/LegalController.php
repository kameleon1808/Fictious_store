<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Legal;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LegalController extends Controller
{
    function createe(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email|unique:legals,email',
            'username' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'age' => 'required',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);
        $legal = new Legal();
        $legal->name = $request->name;
        $legal->company_name = $request->company_name;
        $legal->email = $request->email;
        $legal->username = $request->username;
        $legal->address = $request->address;
        $legal->phone = $request->phone_number;
        $legal->age = $request->age;
        $legal->password = Hash::make($request->password);
        $save = $legal->save();

        if ($save) {
            return redirect()->back()->with('success', 'You are now registered successfully as Legals');
        } else {
            return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
        }
    }
    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:legals,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists in legals table'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('legal')->attempt($creds)) {
            return redirect()->route('legal.home');
        } else {
            return redirect()->route('legal.login')->with('fail', 'Incorrect Credentials');
        }
    }

    public function edit()
    {
        return view('dashboard.legal.editPwd');
    }

    public function update(Request $request, $id)
    {
        $pwd = $request->input('pwd');
        $pwd_old = $request->input('pwd_old');
        $pwd_new = $request->input('pwd_new');

        $data = Legal::find($id);

        if (Hash::check($pwd_old, $pwd)) {
            $data->password = Hash::make($pwd_new);
            $data->update();

            return redirect('legal/home')->with('status', 'Sifra izmenjena');
        } else {
            return redirect('legal/edit-pwd');
        }
    }

    function delete()
    {
        $id = Auth::id();
        Legal::where('id', $id)->delete();

        return redirect('/');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
