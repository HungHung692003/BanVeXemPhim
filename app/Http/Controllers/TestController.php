<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Models\ChucNang;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class TestController extends Controller
{

    public function viewSendMail(){
        return view('mail.view_send_mail');
    }

    public function SendMail(Request $request){
        $ds_mail = explode(";", $request->list_mail);
        foreach($ds_mail as $k => $v) {

            $xxx['tieu_de']     =   $request->tieu_de;
            $xxx['noi_dung']    =   $request->noi_dung;

            SendMailJob::dispatch($v, $request->tieu_de, 'mail.mail_nhanh', $xxx);
        }
        toastr()->success("Đã Gửi Mail Thành Công!");
        return redirect()->back();
    }

    public function mail_1()
    {
        return view('mail.kich_hoat');
    }

    public function mail_2()
    {
        return view('mail.quen_mat_khau');
    }

    public function mail_3()
    {
        return view('mail.dat_ve');
    }


    public function demo()
    {
        return view('admin.page.phan_quyen.index');
    }

    public function dataDemo(Request $request)
    {
        $data   = ChucNang::get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function index()
    {
        return view('admin.page.lich_chieu.index');
    }

    public function create()
    {
        // Tạo session tên là s_1 có giá trị là dzfullstack
        // Session::start();
        Session::put('s_1', 'dzfullstack');
        Session::put('s_2', 'quoclongdn222g@gmail.com');
        Session::save();
        // Tạo cookie tên là c_1 có giá trị 32 Xuân Diệu
        // Vì cookie lưu ở client (trình duyệt) cho nên chúng ta phải return respone

        return response('x')->withCookie(Cookie('c_1', '32 Xuân Diệu', 1440));
    }

    public function read(Request $request)
    {
        // Lấy giá trị s_1 của session. Không cần Request vì Session nó được lưu ở Server
        $value        =   Session::get('auth');
        dd($value);
    }
}
