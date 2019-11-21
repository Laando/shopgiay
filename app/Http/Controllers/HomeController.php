<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        
        
         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(8)->get(); 
         $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get(); 
         $all_khuyenmai = DB::table('tbl_khuyenmai')->orderby('khuyenmai_id','desc')->get(); 
         $four_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->get(); 
          
    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('all_slider',$all_slider)->with('all_khuyenmai',$all_khuyenmai)->with('four_product',$four_product);
    }
    public function search(Request $request){
        
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 
        $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get(); 


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('all_slider',$all_slider);

    }

     public function lienhe(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get(); 
         $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get(); 
         $all_khuyenmai = DB::table('tbl_khuyenmai')->orderby('khuyenmai_id','desc')->get(); 
         $all_lienhe = DB::table('tbl_lienhe')->orderby('lienhe_id','desc')->get(); 
        
        return view('pages.lienhe.lienhe')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('all_slider',$all_slider)->with('all_khuyenmai',$all_khuyenmai)->with('all_lienhe',$all_lienhe);

        
    }
}
