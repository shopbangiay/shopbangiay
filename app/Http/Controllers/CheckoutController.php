<?php

namespace App\Http\Controllers;
use App\CateModel;
use App\Brand;
use DB;
use Cart;
use Session;
use App\Product;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as FacadesDB;
class CheckoutController extends Controller
{
    
	public function login_checkout(Request $request){
	 		 $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get(); 
    return view('pages.checkout/login_checkout')->with('data_cate', $data_cate)->with('data_brand', $data_brand);
		}
	public function add_customer(Request $request){

    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);

    	$customer_id = DB::table('customer')->insert($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
    	return Redirect::to('/checkout');


    }
     public function checkout(Request $request){
     	 $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get(); 
    	return view('pages.checkout.show_checkout')->with('data_cate', $data_cate)->with('data_brand', $data_brand);
    }
     public function save_checkout_customer(Request $request){
    	$data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_notes'] = $request->shipping_notes;
    	$data['shipping_address'] = $request->shipping_address;

    	$shipping_id = DB::table('shipping')->insert($data);

    	Session::put('shipping_id',$shipping_id);
    	
    	return Redirect::to('/payment');
    }
    public function payment(Request $request){



     		 $data_cate = CateModel::select('category_id', 'category_name')->get();

     		$data_cate = CateModel::select('category_id', 'category_name')->get();


     		 $data_cate = CateModel::select('category_id', 'category_name')->get();

     		$data_cate = CateModel::select('category_id', 'category_name')->get();


            $data_brand = Brand::select('brand_id', 'brand_name')->get(); 



     		$data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get(); 


     	 return view('pages.checkout.payment')->with('data_cate',$data_cate)->with('data_brand',$data_brand);
       

    }
     public function logout_checkout(){
    	Session::flush();
    	return Redirect::to('/login-checkout');
    }
     public function login_customer(Request $request){
    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('customer')->where('customer_email',$email)->where('customer_password',$password)->first();
    	
    	
    	if($result){
    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/checkout');
    	}else{
    		return Redirect::to('/login-checkout');
    	}
    	
   
    	

    }
   public function manage_order(){
     
       $all_order = DB::table('order')
        ->join('customer','order.customer_id','=','customer.customer_id')
        ->select('order.*','customer.customer_name')
        ->orderby('order.order_id','desc')->get();
        $manager_order  = view('admin.manager.manage_order')->with('all_order',$all_order);
        return view('admin.master')->with('admin.manager.manage_order', $manager_order);
    }
    public function view_order($orderId){
      
        $order_by_id = DB::table('order')
        ->join('customer','order.customer_id','=','customer.customer_id')
        ->join('shipping','order.shipping_id','=','shipping.shipping_id')
        ->join('order_details','order.order_id','=','order_details.order_id')
        ->select('order.*','customer.*','shipping.*','order_details.*')->first();

       $manager_order_by_id  = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
        
    }
    public function order_place(Request $request){
        //insert payment_method
        //seo 
        $meta_desc = "Đăng nhập thanh toán"; 
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo 
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = '0';
        $payment_id = DB::table('payment')->insert($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('order')->insert($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_quantity'] = $v_content->qty;
            DB::table('order_detail')->insert($order_d_data);
        }
        if($data['payment_method']==1){

            Cart::destroy();

           
             $data_cate = CateModel::select('category_id', 'category_name')->get();
                $data_brand = Brand::select('brand_id', 'brand_name')->get();  
            return view('pages.checkout.handcash')->with('data_cate',$data_cate)->with('data_brand',$data_brand);

        }elseif($data['payment_method']==2){
            Cart::destroy();

           
     		 $data_cate = CateModel::select('category_id', 'category_name')->get();



                $data_brand = Brand::select('brand_id', 'brand_name')->get();  
            return view('pages.checkout.handcash')->with('data_cate',$data_cate)->with('data_brand',$data_brand);

        $data_brand = Brand::select('brand_id', 'brand_name')->get();  
            return view('pages.checkout.handcash')->with('data_cate',$data_cate)->with('brand',$data_brand);


                $data_brand = Brand::select('brand_id', 'brand_name')->get();  
            return view('pages.checkout.handcash')->with('data_cate',$data_cate)->with('data_brand',$data_brand);

        $data_brand = Brand::select('brand_id', 'brand_name')->get();  
            return view('pages.checkout.handcash')->with('data_cate',$data_cate)->with('brand',$data_brand);


         $data_brand = Brand::select('brand_id', 'brand_name')->get();  
            return view('pages.checkout.handcash')->with('data_cate',$data_cate)->with('data_brand',$data_brand);


        }else{
            Cart::destroy();

           
             $data_cate = CateModel::select('category_id', 'category_name')->get();
                $data_brand = Brand::select('brand_id', 'brand_name')->get();  
            return view('pages.checkout.handcash')->with('data_cate',$data_cate)->with('data_brand',$data_brand);

        }
        
        return Redirect::to('/payment');
    }
    	
}