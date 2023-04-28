<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('admin.create',compact('user'));
    }

    public function store(AdminRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>$request->password,
        ]);
        return redirect()->route('admin.create')->with('message','登録しました。');
    }
}
