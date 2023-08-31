<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:64',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password',
            'contact_number' => 'required',
            'address' => 'required',
            'city' => 'required'
        ]);

        try {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->contact_number = $request->contact_number;
        $admin->address = $request->address;
        $admin->city = $request->city;
        $admin->save();

        return redirect()->Route('login');
        } catch (\exception $th) {
            return back()->withError($th->getMessage());
        }
    }

    public function login()
    {
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $check_email = Admin::where('email', $request->email)->first();

        if ($check_email) {
            if(Hash::check($request->password, $check_email->password)) {

                session([
                    'admin_id'=> $request->admin_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password
                ]);

                return redirect()->Route('product');
                // echo "You Have Loged In Successfully";

            } else {
                return back()->withError('invalid Password');
            }

        } else {
            return back()->withError('invalid email');
        }

    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect()->route('login');
    }
}
