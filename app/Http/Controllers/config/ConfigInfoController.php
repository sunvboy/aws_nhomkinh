<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use App\Models\ConfigInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfigInfoController extends Controller
{
    protected $module = 'config_infos';
    public function index()
    {
        $module  = $this->module;
        $data = ConfigInfo::orderBy('id', 'desc')->get();
        return view('config.info.index', compact('module', 'data'));
    }


    public function create()
    {
        $module  = $this->module;
        return view('config.info.create', compact('module'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $_data = [
            'title' => $request->title,
            'data' => !empty($request->email) ? json_encode($request->email) : '',
            'created_at' => Carbon::now(),
        ];
        $id = ConfigInfo::insertGetId($_data);
        if ($id > 0) {
            return redirect()->route('config_infos.index')->with('success', "Thêm mới thành công");
        }
    }

    public function edit($id)
    {
        $detail  = ConfigInfo::find($id);
        if (!isset($detail)) {
            return redirect()->route('config_infos.index')->with('error', "Không tồn tại");
        }
        $module = $this->module;
        return view('config.info.edit', compact('module', 'detail'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $_data = [
            'title' => $request->title,
            'data' => !empty($request->email) ? json_encode($request->email) : '',
            'updated_at' => Carbon::now(),
        ];
        $check = ConfigInfo::find($id)->update($_data);
        if ($check) {
            return redirect()->route('config_infos.index')->with('success', "Cập nhập thành công");
        }
    }


    public function destroy($id)
    {
    }
}
