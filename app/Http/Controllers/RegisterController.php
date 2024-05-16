<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin/register/index');
    }

    public function register(Request $request)
    {
        /* $validated = $request->validate([
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|confirmed',
        ]);
 */
        // 验证规则
        $rules = [
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6|confirmed',
        ];

        // 自定义错误消息（可选）
        $messages = [
            'email.required' => '邮箱地址不能为空',
            'email.email' => '请输入有效的邮箱地址',
            'password.required' => '密码不能为空',
            'password.min' => '密码至少需要6个字符',
        ];

        // 创建验证器实例
        $validator = Validator::make($request->all(), $rules, $messages);

        // 如果验证失败
        if ($validator->fails()) {
            // 闪存旧输入和错误信息到session中以便重定向后获取
            Session::flashInput($request->input());
            return redirect()->back()->withErrors($validator);
        }

        // 验证通过后的逻辑...
        $password = bcrypt(request('password'));
        $name = request('name');
        $email = request('email');
        $user = User::create(compact('name', 'email', 'password'));
        return redirect('/login');
    }
}
