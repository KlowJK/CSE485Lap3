<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // public function loginForm()
    public function loginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(AuthRequest $request)
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('tasks.index')->with('success', 'Đăng nhập thành công!');
        } else {
            // Nếu đăng nhập thất bại, quay lại trang login
            return redirect()->route('login')->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác!');
        }
    }
    public function register()
    {
        return view('auth.register');
    }
    public function storeUsers(RegisterRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect()->route('login')->with('success', 'Tạo tài khoản thành công!');
    }
    // Xử lý đăng xuất

    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'Đăng xuất thành công!');
    }
}
