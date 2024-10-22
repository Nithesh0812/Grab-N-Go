<?php

namespace App\Http\Controllers;
use App\Models\BookSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Product;
use App\Models\Campus;
use App\Models\Cart;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\order;
use Stripe;


class HomeController extends Controller
{

    public function index()
    {
        // Initialize universityValue to null
        $universityValue = null;
    
        // Check if the user is authenticated
        if (Auth::check()) {
            $universityValue = Auth::user()->university;
    
            // Check if the university value is null
            if (is_null($universityValue)) {
                return view('home.university'); // Redirect to the university view
            }
    
            // Get the campus based on the university value
            $campus = Campus::where('name', $universityValue)->first();
    
            if ($campus) {
                // Get the associated restaurant names for the campus
                $restaurantNames = $campus->restaurants()->pluck('name')->map('strtolower')->toArray();
    
                // Retrieve products that belong to these restaurant names
                $product = Product::whereIn('catagory', $restaurantNames)->paginate(9);
            } else {
                $product = Product::paginate(9); // Default to all products if campus not found
            }
        } else {
            // For unauthenticated users, show all products
            $product = Product::paginate(9); // Default to all products
        }
    
        return view('home.userpage', compact('product', 'universityValue'));
    }
    
    

    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if ($usertype=='1')
        {
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();

            $order=order::where('delivery_status','=','delivered')->get();
            $total_revenue=0;

            foreach ($order as $order)
            {
                $total_revenue=$total_revenue+$order->price;
            }


            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
            $total_processing=order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));

        }
        else {
         // Initialize universityValue to null
        $universityValue = null;
    
        // Check if the user is authenticated
        if (Auth::check()) {
            $universityValue = Auth::user()->university;
    
            // Check if the university value is null
            if (is_null($universityValue)) {
                return view('home.university'); // Redirect to the university view
            }
    
            // Get the campus based on the university value
            $campus = Campus::where('name', $universityValue)->first();
    
            if ($campus) {
                // Get the associated restaurant names for the campus
                $restaurantNames = $campus->restaurants()->pluck('name')->map('strtolower')->toArray();
    
                // Retrieve products that belong to these restaurant names
                $product = Product::whereIn('catagory', $restaurantNames)->paginate(9);
            } else {
                $product = Product::paginate(9); // Default to all products if campus not found
            }
        } else {
            // For unauthenticated users, show all products
            $product = Product::paginate(9); // Default to all products
        }
    
        return view('home.userpage', compact('product', 'universityValue'));
        }
    }
    public function university(Request $request)
    {
        // Get the authenticated user's university
        $universityValue = Auth::user()->university;
    
        // Get the campus input from the request
        $campus = $request->input('campus'); 
        $user = Auth::user();
        
        // Update the user's university
        $user->university = $campus;
        $user->save();
    
        // Redirect to the 'redirect' URL
        return redirect()->route('redirect'); // Ensure 'redirect' is defined as a route in your routes file
    }
    
    

    public function product_details(Request $request)
    {
        $id = $request->input('product_id');
        $product= product::find($id);

        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $product=product::find($id);

            $product_exist_id = cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity= $quantity+ $request->quantity;

                if($product-> discount_price!=null)
                {
                    $cart->price=$product->discount_price  * $cart->quantity;
                }
                else
                {
                    $cart->price=$product->price * $cart->quantity;
                }
                $cart->save();
                Alert::success('Added to cart succesfully','we have added product to your cart');

                return redirect ()->back();



            }
            else
            {
                $cart= new cart;

                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;
                if($product-> discount_price!=null)
                {
                    $cart->price=$product->discount_price  * $request->quantity;
                }
                else
                {
                    $cart->price=$product->price * $request->quantity;
                }

                $cart->image=$product->image;
                $cart->Product_id=$product->id;
                $cart->quantity=$request->quantity;


                $cart ->save();
                Alert::success('Added to cart succesfully','we have added product to your cart');

                return redirect ()->back();

            }


        }
        else
        {
            return redirect('login');
        }

    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();
            return view('home.showcart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }

    }

    public function clear_product($id)
    {
        $cart=cart::find($id);
        $cart->delete();

        Alert::success('deleted successfully');

        return redirect()->back();

    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach ($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->quantity=$data->quantity;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='cash ';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Alert::success('Order placed successfully','It will be processed within one day');

        return redirect ()->back();
    }

    public function show_order()
    {
        if (Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;

            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='C̶a̶n̶c̶e̶l̶l̶e̶d̶ t̶h̶i̶s̶ o̶r̶d̶e̶r̶';

        $order->save();

        Alert::success('Product cancelled from your order list');

        return redirect()->back();

    }


    public function product_search(Request $request)
    {
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"%$search_text%")->paginate(9);

        return view('home.product_search',compact('product','search_text'));
    }



    public function stripe($totalprice)
   {
       return view('home.stripe',compact('totalprice'));
   }

    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for shopping with us"
        ]);
        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach ($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->quantity=$data->quantity;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='Paid';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function listen($id)
    {
        $product= product::find($id);

        return view('home.listen',compact('product'));
    }

    public function mpesaa()
    {
        $order=order::all();
        return view('home.mpesaa');
    }
    public function session()
    {
        return view('home.session');
    }
    public function book(Request $request)
    {
        $book = new BookSession();
        $book -> name = $request ->name;
        $book -> number = $request -> Number;
        $book ->artists = $request -> artists;
        $book -> checkindate = $request -> date;
        $book -> checkintime = $request -> time;
        $book-> mpesa = $request -> mpesa;
        $book -> save();

        return redirect()->back();

    }
}
