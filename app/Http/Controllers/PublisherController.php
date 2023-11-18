<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\PublisherRequest;
use Illuminate\Support\Facades\Session;
class PublisherController extends Controller
{
    //
    public function index(){
        $publisher = Publisher::all();
        
    return view('admin/publisher.index', compact('publisher'));
    }
    public function add(PublisherRequest $request)
    {
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            $params = $request->except('_token');
            $publisher = Publisher::create($params);
            if ($publisher->id) {
                Session::flash('success', 'thêm mới thành công nhà xuất bản');
                return redirect()->route('publisher_add');
            }
        }
        return view('admin/publisher.add');
    }
    public function edit(PublisherRequest $request, $id)
    {
        $publisher = Publisher::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $result = Publisher::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công nhà xuất bản');
                return redirect()->route('publisher_edit', ['id' => $id]);
            }
        }
        return view('admin/publisher.edit', compact('publisher'));
    }
    public function delete($id)
    {
        Publisher::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công nhà xuất bản');
        return redirect()->route('publisher_index');
    }
}
