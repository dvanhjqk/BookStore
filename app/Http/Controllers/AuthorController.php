<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    //
    public function index()
    {
        $author = Author::all();
        return view('admin/author.index', compact('author'));
    }
    public function add(AuthorRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('hinh', $request->file('image'));
            }
            $author = Author::create($params);
            if ($author->id) {
                Session::flash('success', 'thêm mới thành công tác giả');
                return redirect()->route('author_add');
            }
        }
        return view('admin/author.add');
    }
    public function edit(AuthorRequest $request, $id)
    {
        $author = Author::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDL = Storage::delete('/public/'.$author->image);
                if ($resultDL) {
                    $params['image'] = uploadFile('hinh', $request->file('image'));
                }
            } else {
                $params['image'] = $author->image;
            }
            $result = Author::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công tác giả');
                return redirect()->route('author_edit', ['id' => $id]);
            }
        }
        return view('admin/author.edit', compact('author'));
    }
    public function delete($id)
    {
        Author::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công tác giả');
        return redirect()->route('author_index');
    }
}
