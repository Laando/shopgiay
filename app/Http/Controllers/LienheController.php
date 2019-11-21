<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class LienheController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_khuyenmai(){
        $this->AuthLogin();
        $lienhe = DB::table('tbl_lienhe')->orderby('lienhe_id','desc')->get(); 
       

        return view('admin.add_lienhe')->with('lienhe', $lienhe);
    	

    }
   
   
    public function update_khuyenmai(Request $request,$lienhe_id){
         $this->AuthLogin();
                $this->AuthLogin();
        $data = array();
        $data['lienhe_noidung'] = $request->lienhe_noidung;
        $data['lienhe_link'] = $request->lienhe_link;
        
        DB::table('tbl_lienhe')->where('lienhe_id',$lienhe_id)->update($data);
        Session::put('message','Cập nhật liên hệ thành công');
        return Redirect::to('add-lienhe');
    }
    
    //End Admin Page
   
    
}
