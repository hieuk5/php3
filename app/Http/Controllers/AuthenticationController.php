<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;

class AuthenticationController extends Controller
{
    public function login()
    {
        $title = "Đăng nhập";
        return view('admin.login', compact('title'));
    }
    public function postLogin(UserLoginRequest $req)
    {     
        // đoạn bài 2
        // $req->setUserId(5);


        // validate cách 1:
        // $req->validate([
        //     'email' =>'required|email|exists:users,email',
        //     'password' => 'required|string|min:8'
        // ], [
        //     'email.required' => 'Không được để trống email',
        //     'email.email' => 'Email không đúng định dạng',
        //     'email.exists' => 'Email chưa được đăng ký',
        //     'password.required' => 'Không được để trống password',
        //     'password.string' => 'Password không phải là chuỗi',
        //     'password.min' => 'Password phải có ít nhất 8 ký tự' 
        // ]);

        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password
        ];
        if (Auth::attempt($dataUserLogin)) {
            // Logout hết các tài khoản khác
            Session::where('user_id', Auth::id())->delete();
            // tạo phiên đăng nhập mới
            session()->put('user_id', Auth::id());
            
            if (Auth::user()->role == '2') {
                return redirect()->route('admin.products.index')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            } else {
                echo "Đăng nhập vào user";
            }
        } else {
            return redirect()->back()->with([
                'message' => 'Email hoặc password không đúng'
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with([
            'message' => 'Đăng xuất thành công'
        ]);
    }
    public function register()
    {
        return view('admin.register');
    }
    public function postRegister(Request $req)
    {
        $check = User::where('email', $req->email)->exists();
        if ($check) {
            return redirect()->back()->with([
                'message' => 'Email đã tồn tại'
            ]);
        } else {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'address' => $req->address,
            ];
            $newUser = User::create($data);

            return redirect()->route('admin.login')->with([
                'message' => 'Đăng ký thành công vui lòng đăng nhập'
            ]);
        }
    }
}