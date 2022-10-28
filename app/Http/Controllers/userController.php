<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input("email");
        $password = $request->input("password");
        $findEmail = DB::table('user')->select()->where('email', '=', $email)->get();
        if (count($findEmail) == 0) {
            return response()->json([
                'errors' => $validator->errors(),
                'response' => 'email không tồn tại hoặc chưa được đăng ký',
                'status' => '0'
            ]);
        } else {
            if (password_verify($password, $findEmail[0]->password)) {
                session()->put('user', $findEmail);
                return response()->json([
                    'response' => 'đăng nhập thành công',
                    'status' => '1',
                    'email' => $findEmail[0]
                ]);
            } else {
                return response()->json([
                    'error' => $validator->errors(),
                    'response' => 'sai mật khẩu',
                    'status' => '2'
                ]);
            }
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request()->all(), [
            'r-username' => 'required',
            'r-email' => 'required|email',
            'r-password' => 'required',
            'check-password' => 'required|same:password',
            'phone-number' => 'required',
            'gender' => 'required'
        ]);
        $username = $request->input('r-username');
        $email = $request->input('r-email');
        $password = $request->input('r-password');
        $checkpassword = $request->input('r-check-password');
        $phone_number = $request->input('r-phone-number');
        $gender = $request->input('gender');
        $insert = DB::table('user')->insert([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'phonenumber' => $phone_number,
            'gender' => $gender
        ]);
        if (!$insert) {
            return response()->json([
                'response' => 'Đăng ký thất bại',
                'status' => '0'
            ]);
        } else {
            return response()->json([
                'response' => 'Đăng ký thành công',
                'status' => '1'
            ]);
        }
    }
}
