<?php

namespace App\Http\Controllers\ship\backend;

use App\Http\Controllers\Controller;
use App\Models\ShipAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class ShipAddressController extends Controller
{
    protected $table = 'ship_addresses';
    public function create()
    {
        $module = $this->table;
        $getCity = DB::table('vn_province')->orderBy('id', 'asc')->get();
        $listCity[''] = 'Tỉnh/Thành Phố';
        if (isset($getCity)) {
            foreach ($getCity as $key => $val) {
                $listCity[$val->id] = $val->name;
            }
        }
        return view('ship.backend.address.create', compact('module', 'listCity'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'cityid' => 'required',
            'districtid' => 'required',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'cityid.required' => 'Tỉnh/Thành phố là trường bắt buộc.',
            'districtid.required' => 'Quận/Huyện là trường bắt buộc.',

        ]);
        $validator->validate();
        $this->submit($request, 'create', 0);
        return redirect()->route('ships.index')->with('success', "Thêm mới địa chỉ thành công");
    }
    public function edit($id)
    {
        $detail  = ShipAddress::find($id);
        if (!isset($detail)) {
            return redirect()->route('ships.index')->with('error', "Địa chỉ không tồn tại");
        }
        $module = $this->table;
        $getCity = DB::table('vn_province')->orderBy('id', 'asc')->get();
        $listCity[''] = 'Tỉnh/Thành Phố';
        if (isset($getCity)) {
            foreach ($getCity as $key => $val) {
                $listCity[$val->id] = $val->name;
            }
        }
        return view('ship.backend.address.edit', compact('detail', 'module', 'listCity'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'cityid' => 'required',
            'districtid' => 'required',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'cityid.required' => 'Tỉnh/Thành phố là trường bắt buộc.',
            'districtid.required' => 'Quận/Huyện là trường bắt buộc.',

        ]);
        $validator->validate();
        $this->submit($request, 'update', $id);
        return redirect()->route('ships.index')->with('success', "Cập nhập hãng vận chuyển thành công");
    }
    public function submit($request = [], $action = '', $id = 0)
    {
        if ($action == 'create') {
            $time = 'created_at';
            $user = 'userid_created';
        } else {
            $time = 'updated_at';
            $user = 'userid_updated';
        }
        $_data = [
            'title' => $request['title'],
            'cityid' => $request['cityid'],
            'districtid' => $request['districtid'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
        ];
        if ($action == 'create') {
            $id = ShipAddress::insertGetId($_data);
        } else {
            ShipAddress::find($id)->update($_data);
        }
    }
    public function publish(Request $request)
    {
        $id = (int) $request->param['id'];
        DB::table('ship_addresses')->update(array('publish' => 0));
        $object = ShipAddress::where('id', $id)->first();
        $_update['publish'] = (($object->publish == 1) ? 0 : 1);
        DB::table('ship_addresses')->where('id', $id)->update($_update);
        return response()->json([
            'code' => 200,
        ], 200);
    }
}
