<?php

namespace App\Http\Controllers\contact\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use App\Components\System;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->system = new System();
    }
    public function index()
    {
        //page: Contact

        $page = Page::where(['alanguage' => config('app.locale'), 'page' => 'contact'])->select('meta_title', 'meta_description', 'image', 'title')->first();
        $seo['canonical'] = url('/');
        $seo['meta_title'] = !empty($page['meta_title']) ? $page['meta_title'] : $page['title'];
        $seo['meta_description'] = !empty($page['meta_description']) ? $page['meta_description'] : '';
        $seo['meta_image'] = !empty($page['image']) ? url($page['image']) : '';
        $fcSystem = $this->system->fcSystem();

        return view('contact.frontend.index', compact('fcSystem', 'seo', 'page'));
    }
    public function store(Request $request)
    {
        if (config('app.locale') == 'vi') {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => ['required', 'numeric', 'regex:/^(03|02|05|07|08|09|01[2|6|8|9])+([0-9]{8})$/'],
                'message' => 'required',
            ], [
                'fullname.required' => 'Trường Họ và tên là trường bắt buộc.',
                'email.required' => 'Email là trường bắt buộc.',
                'email.email' => 'Email không đúng định dạng.',
                'phone.required' => 'Số điện thoại không được để trống.',
                'phone.regex'        => 'Số điện thoại không hợp lệ.',
                'phone.numeric' => 'Số điện thoại không đúng định dạng.',
                'message.required' => 'Nội dung là trường bắt buộc.',
            ]);
        } else if (config('app.locale') == 'gm') {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => ['required', 'numeric'],
                'message' => 'required',
            ], [
                'fullname.required' => 'Das Feld Nachname ist ein Pflichtfeld.',
                'email.required' => 'E-Mail ist ein Pflichtfeld.',
                'email.email' => 'E-Mail ungültig machen.',
                'phone.required' => 'Die Telefonnummer darf nicht leer bleiben.',
                'phone.numeric' => 'Die Telefonnummer hat nicht das richtige Format.',
                'message.required' => 'Inhalt ist ein Pflichtfeld.',
            ]);
        } else if (config('app.locale') == 'tl') {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => ['required', 'numeric'],
                'message' => 'required',
            ], [
                'fullname.required' => 'ช่องนามสกุลเป็นช่องบังคับ.',
                'email.required' => 'อีเมลเป็นฟิลด์บังคับ.',
                'email.email' => 'อีเมลไม่ถูกต้อง.',
                'phone.required' => 'หมายเลขโทรศัพท์ไม่สามารถเว้นว่างได้.',
                'phone.numeric' => 'หมายเลขโทรศัพท์ไม่อยู่ในรูปแบบที่ถูกต้อง.',
                'message.required' => 'เนื้อหาเป็นฟิลด์บังคับ.',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'message' => 'required',
            ]);
        }
        if ($validator->passes()) {
            $id = Contact::insertGetId([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'message' => $request->message,
                'type' => 'contact',
                'created_at' => Carbon::now()
            ]);
            if ($id > 0) {
                return response()->json(['status' => '200']);
            } else {
                return response()->json(['status' => '500']);
            }
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
    public function subcribers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'message' => 'required',
            // 'phone' => 'required',
            'email' => 'required|email',
            // 'product' => 'required',
            // 'checkbox' => 'required',
        ], [
            'email.required' => 'Email là trường bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            // 'product.required' => 'Sản phẩm là trường bắt buộc.',
            // 'checkbox.required' => 'Chấp nhận chính sách bảo mật là trường bắt buộc.',
        ]);
        // $message = '';
        // $message =  '<div><b>Sản phẩm:</b> ' . $request->product . '</div><div><b>Nội dung:</b> ' . $request->message . '</div>';
        if ($validator->passes()) {
            $id = Contact::insertGetId([
                'email' => $request->email,
                // 'phone' => $request->phone,
                // 'message' => $message,
                'type' => 'email',
                'created_at' => Carbon::now()
            ]);
            if ($id > 0) {
                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 500]);
            }
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
}
