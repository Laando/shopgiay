<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class sliderController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_slider(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
       

        return view('admin.add_slider')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
        

    }
    public function all_slider(){
          $this->AuthLogin();
        $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();
        $manager_slider  = view('admin.all_slider')->with('all_slider',$all_slider);
    
        return view('admin_layout')->with('admin.all_slider', $manager_slider);

    }
    public function save_slider(Request $request){
          $this->AuthLogin();
        $data = array();
        $data['slider_tieude'] = $request->slider_tieude;
        $data['slider_noidung'] = $request->slider_noidung;
        $data['slider_chenlinkSP'] = $request->slider_chenlinkSP;
        $data['slider_hinhanhSP'] = $request->slider_hinhanhSP;
        $get_image = $request->file('slider_hinhanhSP');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $data['slider_hinhanhSP'] = $new_image;
            DB::table('tbl_slider')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-slider');
        }
        $data['slider_hinhanhSP'] = '';

        DB::table('tbl_slider')->insert($data);
        Session::put('message','Thêm Slider sản phẩm thành công');
        return Redirect::to('add-slider');
    }
      public function edit_slider($slider_id){
         $this->AuthLogin(); 
          $edit_slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->get();
        $manager_slider  = view('admin.edit_slider')->with('edit_slider',$edit_slider);
    
        return view('admin_layout')->with('admin.edit_slider', $manager_slider);
    }

     public function update_slider(Request $request,$slider_id){
          $this->AuthLogin();
        $data = array();
        $data['slider_tieude'] = $request->slider_tieude;
        $data['slider_noidung'] = $request->slider_noidung;
        $data['slider_chenlinkSP'] = $request->slider_chenlinkSP;
        $data['slider_hinhanhSP'] = $request->slider_hinhanhSP;
        $get_image = $request->file('slider_hinhanhSP');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $data['slider_hinhanhSP'] = $new_image;
            DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
            Session::put('message','Cập nhật phẩm thành công');
            return Redirect::to('all-slider');
        }
        $data['slider_hinhanhSP'] = '';

        DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
        Session::put('message','Cập nhật slider sản phẩm thành công');
        return Redirect::to('all-slider');
    }

    public function delete_slider($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
        Session::put('message','Xóa sản  slider thành công');
        return Redirect::to('all-slider');
    }
    
  
 
    //End Admin Page
    
}
