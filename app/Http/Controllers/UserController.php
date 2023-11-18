<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        return view('admin/user.index', compact('user'));
    }
    public function add(UserRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('hinh', $request->file('image'));
            }
            $user = User::create($params);
            if ($user->id) {
                Session::flash('success', 'thêm mới thành công người dùng');
                return redirect()->route('user_add');
            }
        }
        return view('admin/user.add');
    }
    public function edit(UserRequest $request, $id)
    {
        $user = User::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDL = Storage::delete('/public/'.$user->image);
                if ($resultDL) {
                    $params['image'] = uploadFile('hinh', $request->file('image'));
                }
            } else {
                $params['image'] = $user->image;
            }
            $result = User::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công người dùng');
                return redirect()->route('user_edit', ['id' => $id]);
            }
        }
        return view('admin/user.edit', compact('user'));
    }
    public function delete($id)
    {
        User::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công người dùng');
        return redirect()->route('user_index');
    }
}
