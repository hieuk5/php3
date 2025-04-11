<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenController extends Controller
{
    public function postLogin(Request $req){
        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password
        ];
        if (Auth::attempt($dataUserLogin)) {
            // Logout hết các tài khoản khác
            Session::where('user_id', Auth::id())->delete();
            // tạo phiên đăng nhập mới
            session()->put('user_id', Auth::id());
            
            if (Auth::user()->role == '1') {
                $token = User::find(Auth::id())->createToken('AuthToken')->plainTextToken;
                return response()->json([
                    'token' => $token,
                    'message' => 'Đăng nhập thành công',
                    'status_code' => '200'
                ], 200);
            } 
        }

        return response()->json([
            'message' => 'Đăng nhập thất bại',
            'status_code' => '200'
        ], 200);
    }
}
