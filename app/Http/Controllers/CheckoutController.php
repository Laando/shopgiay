<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
     public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function view_order($orderId){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')
        ->orderby('tbl_order.order_id','desc')->where('tbl_order.order_id',$orderId)->get();

        $manager_order_by_id  = view('admin.view_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
        
    }
    public function login_checkout(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();


        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('all_slider',$all_slider);
    }
    public function add_customer(Request $request){

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/checkout'); 


    }
    public function checkout(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
         $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();


        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('all_slider',$all_slider);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        
        return Redirect::to('/payment');
    }
    public function payment(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();

        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)->with('all_slider',$all_slider);

    }
    


    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        
        
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/');
        }else{
            return Redirect::to('/login-checkout');
        }

    }

    public function edit_customer(){

      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
      $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();
      $id_customer = Session::get('customer_id');
      $all_customer = DB::table('tbl_customers')->where('customer_id', $id_customer)->get();

     return view('pages.checkout.edit_customer')->with('category',$cate_product)->with('brand',$brand_product)->with('all_slider',$all_slider)->with('all_customer',$all_customer);
    }

    public function update_customer(Request $request){
        $id_customer = Session::get('customer_id');


     $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        DB::table('tbl_customers')->where('customer_id',$id_customer)->update($data);
         Session::put('message-update-customer','cập nhật thông tin customer thành công !!');

       
        return Redirect::to('/checkout'); 
    }


      // back end---------------------------------
    public function manage_order(){
        
        $this->AuthLogin();
        $all_order = (DB::table('tbl_order')
                ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
                ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                ->select('tbl_order.*','tbl_customers.customer_name','tbl_order_details.product_name','tbl_order_details.product_sales_quantity')
                ->orderby('tbl_order.order_id','desc')->get())->toArray();

        $user_order = array();
        foreach ($all_order as $key => $value) {
            if(in_array($value->order_id,array_column(($user_order),"order_id"))){
                $keyOrderInArray = array_search($value->order_id, array_column($user_order,"order_id"));
                $user_order[$keyOrderInArray]['product_name'] .= ", ".$value->product_name;
                $user_order[$keyOrderInArray]['count_product'] .= ", ".$value->product_name.' x '.$value->product_sales_quantity;

            }else{
                $user_order_new = [
                'order_id'  => $value->order_id,
                'user_name' => $value->customer_name,
                'user_total' => $value->order_total,
                'product_name' => $value->product_name,
                'order_status' => $value->order_status,
                'count_product' => $value->product_name.' x '.$value->product_sales_quantity.' đôi'];
                $user_order[] = $user_order_new;

            }
        }

        $manager_order  = view('admin.manage_order')->with('all_order',$user_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
    public function order_place(Request $request){
        //insert payment_method
     
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 0;
        $order_id = DB::table('tbl_order')->insertGetId($order_data); 

        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method']==2){

            return Redirect::to('/lienhe')->with('message', 'Bạn vui chuyển khoản cho chúng tôi! Chúng tôi sẽ liên hệ sớm nhất.');

        }else{
            Cart::destroy();

            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
            $all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->get();

            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product)->with('all_slider',$all_slider);

        }
        
        //return Redirect::to('/payment');
    }

      public function unactive_order($order_id){
         $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status'=>0]);
        Session::put('message','Không kích hoạt order thành công');
        return Redirect::to('manage-order');

    }

    public function active_order($order_id){
         $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status'=>1]);
        Session::put('message','Kích hoạt order thành công');
        return Redirect::to('manage-order');
    }

    public function delete_order($order_id){
        $this->AuthLogin();
        DB::table('tbl_order_details')->where('order_id',$order_id)->delete();
        DB::table('tbl_order')->where('order_id',$order_id)->delete();
        Session::put('message','Xóa order thành công');
        return Redirect::to('manage-order');

    }

    public function all_user(){
         $this->AuthLogin();
        $all_user = DB::table('tbl_customers')->orderby('customer_id','desc')->get();
        $manager_user  = view('admin.all_customers')->with('all_user',$all_user);
    
        return view('admin_layout')->with('admin.all_customers', $manager_user);
    }

    public function delete_user($customer_id){
         $this->AuthLogin();
        DB::table('tbl_customers')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa order thành công');
        return Redirect::to('all-user');
    }

}
