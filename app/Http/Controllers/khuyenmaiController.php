<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class khuyenmaiController extends Controller
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
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
       

        return view('admin.add_khuyenmai')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
    	

    }
    public function all_khuyenmai(){
        $this->AuthLogin();
    	$all_khuyenmai = DB::table('tbl_khuyenmai')->get();
    	$manager_khuyenmai  = view('admin.all_khuyenmai')->with('all_khuyenmai',$all_khuyenmai);
    	return view('admin_layout')->with('admin.all_khuyenmai', $manager_khuyenmai);

    }
    public function save_khuyenmai(Request $request){
         $this->AuthLogin();
    	$data = array();
        $id_SPKM = $request->khuyenmai_maSP;
         
        $prodict_all =  DB::table('tbl_product')->where('product_id',$id_SPKM)->get();
           foreach($prodict_all as $key => $value){
            $prodict_image = $value->product_image;
        }
        print_r($prodict_image);
        
      
    	$data['khuyenmai_name'] = $request->khuyenmai_name;
        $data['khuyenmai_maSP'] = $request->khuyenmai_maSP;
    	$data['khuyenmai_giaSP'] = $request->khuyenmai_giaSP;
    	$data['khuyenmai_giaKM'] = $request->khuyenmai_giaKM;
        $data['khuyenmai_hinhanhSP'] = $prodict_image;

        // $get_image = $request->file('khuyenmai_hinhanhSP');
      
        // if($get_image){
        //     $get_name_image = $get_image->getClientOriginalName();
        //     $name_image = current(explode('.',$get_name_image));
        //     $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('public/uploads/khuyenmai',$new_image);
        //     $data['khuyenmai_hinhanhSP'] = $new_image;
        //     DB::table('tbl_khuyenmai')->insert($data);
        //     Session::put('message','Thêm khuyến mãi thành công');
        //     return Redirect::to('add-khuyenmai');
        // }
        // $data['khuyenmai_hinhanhSP'] = '';
    	DB::table('tbl_khuyenmai')->insert($data);
    	Session::put('message','Thêm khuyến mãi thành công');
    	return Redirect::to('all-khuyenmai');
    }
 
    public function edit_khuyenmai($khuyenmai_id){
         $this->AuthLogin(); 
    

        $edit_khuyenmai = DB::table('tbl_khuyenmai')->where('khuyenmai_id',$khuyenmai_id)->get();

        $manager_khuyenmai  = view('admin.edit_khuyenmai')->with('edit_khuyenmai',$edit_khuyenmai);
        return view('admin_layout')->with('admin.edit_khuyenmai', $manager_khuyenmai);
    }
    public function update_khuyenmai(Request $request,$khuyenmai_id){
         $this->AuthLogin();
                $this->AuthLogin();
        $data = array();
        // $data['khuyenmai_name'] = $request->khuyenmai_name;
        // $data['khuyenmai_maSP'] = $request->khuyenmai_maSP;
        // $data['khuyenmai_giaSP'] = $request->khuyenmai_giaSP;
        // $data['khuyenmai_giaKM'] = $request->khuyenmai_giaKM;
        // $data['khuyenmai_hinhanhSP'] = $request->khuyenmai_hinhanhSP;
        // $get_image = $request->file('khuyenmai_hinhanhSP');
      
        // if($get_image){
        //     $get_name_image = $get_image->getClientOriginalName();
        //     $name_image = current(explode('.',$get_name_image));
        //     $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('public/uploads/khuyenmai',$new_image);
        //     $data['khuyenmai_hinhanhSP'] = $new_image;
        //     DB::table('tbl_khuyenmai')->where('khuyenmai_id',$khuyenmai_id)->update($data);
        //     Session::put('message','cap nhap phẩm thành công');
        //     return Redirect::to('all-khuyenmai');
        // }
       
        $id_SPKM = $request->khuyenmai_maSP;
         
        $prodict_all =  DB::table('tbl_product')->where('product_id',$id_SPKM)->get();
           foreach($prodict_all as $key => $value){
            $prodict_image = $value->product_image;
        }
        print_r($prodict_image);
        
      
        $data['khuyenmai_name'] = $request->khuyenmai_name;
        $data['khuyenmai_maSP'] = $request->khuyenmai_maSP;
        $data['khuyenmai_giaSP'] = $request->khuyenmai_giaSP;
        $data['khuyenmai_giaKM'] = $request->khuyenmai_giaKM;
        $data['khuyenmai_hinhanhSP'] = $prodict_image;
            
        DB::table('tbl_khuyenmai')->where('khuyenmai_id',$khuyenmai_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-khuyenmai');
    }
    public function delete_khuyenmai($khuyenmai_id){
        $this->AuthLogin();
        DB::table('tbl_khuyenmai')->where('khuyenmai_id',$khuyenmai_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-khuyenmai');
    }
    //End Admin Page
    public function show_khuyenmai_home(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        

        $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();

        $all_khuyenmai =  DB::table('tbl_khuyenmai')->orderby('khuyenmai_id','desc')->get(); 



        return view('pages.sanphamhot.showkhuyenmai')->with('category',$cate_product)->with('brand',$brand_product)->with('all_slider',$all_slider)->with('all_khuyenmai',$all_khuyenmai);
    }

    public function details_khuyenmai($khuyenmai_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $details_khuyenmai = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->join('tbl_khuyenmai','tbl_khuyenmai.khuyenmai_maSP','=','tbl_product.product_id')
        ->where('tbl_product.product_id',$khuyenmai_id)->where('tbl_khuyenmai.khuyenmai_maSP',$khuyenmai_id)->get();
        foreach($details_khuyenmai as $key => $value){
            $khuyenmai_id = $value->khuyenmai_id;
        }
       
      
        $all_KmHinhAnh =  DB::table('tbl_khuyenmai')->orderby('khuyenmai_id','desc')->limit(3)->get(); 

        $all_khuyenmai =  DB::table('tbl_khuyenmai')->orderby('khuyenmai_id','desc')->get(); 
        

        $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();
        
        // $related_khuyenmai = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$khuyemai_id])->get();

        $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();
        $gia_Km =DB::table('tbl_khuyenmai')->where('khuyenmai_maSP','$product_id')->limit(1)->get(); 

         Session::push('giakm',$gia_Km);



        return view('pages.sanphamhot.show-sanphamKM')->with('category',$cate_product)->with('brand',$brand_product)->with('khuyenmai_details',$details_khuyenmai)->with('all_slider',$all_slider)->with('all_khuyenmai',$all_khuyenmai)->with('all_KmHinhAnh',$all_KmHinhAnh);
    }
}
