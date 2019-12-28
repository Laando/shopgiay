<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){
    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
    	$product_info = DB::table('tbl_product')->join('tbl_khuyenmai','tbl_khuyenmai.khuyenmai_maSP','=','tbl_product.product_id')->where('product_id',$productId)->where('khuyenmai_maSP',$productId)->first(); 
        $product_info1 = DB::table('tbl_product')->where('product_id',$productId)->first(); 

    
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        if($product_info != NULL){
                $data['id'] = $product_info->product_id;
                $data['qty'] = $quantity;
                $data['name'] = $product_info->product_name;
                $data['price'] = $product_info->khuyenmai_giaKM;
                $data['weight'] = $product_info->product_price;
                $data['options']['image'] = $product_info->product_image;
                Cart::add($data);
               
        }else{

                $data['id'] = $product_info1->product_id;
                $data['qty'] = $quantity;
                $data['name'] = $product_info1->product_name;
                $data['price'] = $product_info1->product_price;
                $data['weight'] = $product_info1->product_price;
                $data['options']['image'] = $product_info1->product_image;
                Cart::add($data);
                 
        }
       return Redirect::to('/');
        // Cart::destroy();
       
       
    }
    public function show_cart(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get(); 

        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('all_slider',$all_slider);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
    
}
