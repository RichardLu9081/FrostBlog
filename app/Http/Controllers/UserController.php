<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function AmendPasswordView()
    {
        return view('admin/user/AmendPassword');
    }
    public function AmendPassword(Request $request)
    {
        // 验证规则
        $rules = [
            'password' => 'required|min:6|confirmed',
        ];

        // 自定义错误消息（可选）
        $messages = [
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

        // 获取当前登录用户
        $user = auth()->user();

        // 更新密码
        $user->password = Hash::make($request->password);
        $user->save();

        /* $password = bcrypt(request('password'));
        
        $user = User::create(compact('name', 'email', 'password')); */
        return redirect('/home');
    }
    public function users()
    {
        // 查询user
        $records = User::orderBy('id', 'DESC')
            ->paginate(10);
        // 渲染模板并传递数据
        return view('admin/user/users')->with("records", $records);;
    }
    /**
     * 编辑user
     * @param $id
     */
    public function edit($id)
    {
        // 查询指定 id 的数据库记录
        $record = User::find($id);
        // 渲染模板并传递入数据
        return view("admin/user/UserEdit")->with("record", $record);
    }
    public function EditSubmit(Request $request, $id)
    {
        // 验证规则
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255',],
            'password' => 'required|min:6|confirmed',
        ];

        // 自定义错误消息（可选）
        $messages = [
            'password.required' => '密码不能为空',
            'password.min' => '密码至少需要6个字符',
        ];
        // 如果要更改密码，还需添加密码验证规则
        if ($request->filled('password')) {
            $rules['password'] = ['required', 'string', 'min:6', 'confirmed'];
        }
        // 创建验证器实例
        $validator = Validator::make($request->all(), $rules, $messages);

        // 如果验证失败
        if ($validator->fails()) {
            // 闪存旧输入和错误信息到session中以便重定向后获取
            Session::flashInput($request->input());
            return redirect()->back()->withErrors($validator);
        }
        // 验证通过后的逻辑...     

        $user = User::findOrFail($id);
        $user->fill($request->input());
        // 如果密码字段有值，则加密并更新密码
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }

        // 保存用户信息
        $user->save();
        // 更新成功，返回相应的响应
        return redirect()
            ->route('users')
            ->with('success', '用户信息已成功更新。');
    }
    public function destroy($id)
    {
        // 删除user
        User::destroy($id);
        // 返回之前页面并闪出提示信息
        return \Redirect::back()->with("success", "删除成功");
    }
}
