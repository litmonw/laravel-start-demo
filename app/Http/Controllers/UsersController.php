<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function create() {
        return view('users.create');
    }

    // Laravel 会自动解析定义在控制器方法（变量名匹配路由片段）中的 Eloquent 模型类型声明
    public function show(User $user) {
        return view('users.show', compact('user'));
    }
}
