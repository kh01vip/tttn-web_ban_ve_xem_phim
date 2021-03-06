<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class adminController extends Controller
{
    public function admin()
    {

        return view('NV.loginAdmin');
        // return redirect('dsve');
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_nhanvien')->where('emailNV', $email)->where('passwordNV', $admin_password)->first();
        if ($result == true) {
            Session::put('idNV', $result->idNV);
            Session::put('tenNV', $result->tenNV);
            return Redirect::to('/dsve');
        } else {
            Session::put('fail', 'Email and Password Không đúng');
            return Redirect::to('/admin');
        }
    }

    public function profileadmin($idNV)
    {

        $nvprofile = DB::table('tbl_nhanvien')->where('idNV', $idNV)->get();

        return view('NV.profileNV')->with('nvprofile', $nvprofile);

        return view('NV.profileNV');
    }
    public function logout()
    {

        Session::put('idNV', null);
        Session::put('tenNV', null);

        return Redirect::to('/admin');
    }

    public function updateprofile($idNV, Request $request)
    {
        $cusprofile = DB::table('tbl_nhanvien')->where('idNV', $idNV)->get();
        $data = array();
        $data['tenNV'] = $request->name;
        $data['gioitinhNV'] = $request->gioitinhNV;
        $data['ngaysinhNV'] = $request->ngaysinh;
        $update_c = DB::table('tbl_nhanvien')->where('idNV', $idNV)->update($data);
        return back();
    }
    public function changepass()
    {
        return view('NV.changepassfrm');
    }

    public function updatepass(Request $request)
    {
        $nv_id = $request->hidden_nvid;
        $old = md5($request->old_password);

        $nv = DB::table('tbl_nhanvien')->where('idNV', $nv_id)->get();
        foreach ($nv as $key => $value) {
            $nv_old_pass = $value->passwordNV;
            break;
        }
        if (isset($nv_old_pass)) {
            $new = md5($request->new_password);
            $confirm = md5($request->confirm_password);
            if ($new == $confirm && $nv_old_pass == $old) {
                $data['passwordNV'] = $new;
                DB::table('tbl_nhanvien')->where('idNV', $nv_id)->update($data);
                return Redirect('/profileadmin/' . $nv_id);
            } else {
                echo "Nhập sai thông tin";
            }
        }
    }

    public function quanlykh()
    {

        $dskh = DB::table('tbl_khachhang')
            ->paginate(4);
        return view('NV.quanlykh', compact('dskh'));
    }

    public function profilekh($idKH)
    {
        $cusprofile = DB::table('tbl_khachhang')->where('idKH', $idKH)->get();

        return view('NV.profileKHcuaNV')->with('cusprofile', $cusprofile);
    }

    public function suakh($idKH, Request $request)
    {
        $cusprofile = DB::table('tbl_khachhang')->where('idKH', $idKH)->get();
        $data = array();
        $data['tenKH'] = $request->name;
        $data['gioitinhKH'] = $request->gioitinhKH;
        $data['ngaysinh'] = $request->ngaysinh;
        $update_c = DB::table('tbl_khachhang')->where('idKH', $idKH)->update($data);
        return Redirect::to('/quanlykh');
    }
    public function frmdoimatkhaukh($idKH)
    {
        return view('NV.changepassfrmKH', compact('idKH'));
    }
    public function doimatkhaukh(Request $request)
    {
        $cus_id = $request->hidden_cusid;
        $new = md5($request->new_password);
        $confirm = md5($request->confirm_password);
        
        if ($new == $confirm) {
            $data['passwordKH'] = $new;
            DB::table('tbl_khachhang')->where('idKH', $cus_id)->update($data);
            return Redirect('quanlykh');
        } else {
            //Session::put('change_fail', 'Password incorret!');
            //return Redirect('/change-password');
            echo '<h1 style="color:red">Mật khẩu nhập sai!!</h1>
		<a href="home">Trở về trang chủ</a>';
        }
    }

}
