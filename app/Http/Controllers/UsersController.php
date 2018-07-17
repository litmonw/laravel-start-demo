<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    // Laravel 会自动解析定义在控制器方法（变量名匹配路由片段）中的 Eloquent 模型类型声明
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * @param Request $request
     * 处理表单数据提交方法
     * @return array
     */
    public function store(Request $request)
    {
        // validator 验证 用户输入数据，该输入数据的验证规则
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        // 创建用户模型
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 注册成功后自动登录
        Auth::login($user);

        session()->flash('success', '欢迎, 您将在这里开启一段新的旅程~');
        // 这里是一个 [约定优于配置] 的体现， $user 是 User 模型对象的实例
        // route() 方法会自动获取 Model 的主键，也就是数据表 users 的主键 id
        // [$user] 等同于 [$user->id]
        return redirect()->route('users.show', [$user]);
    }
}
