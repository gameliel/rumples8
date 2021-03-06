<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderitems;
use App\Models\User;


class CheckoutController extends Controller
{
    public function checkout()
    {
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();

        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->product_id)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('front.checkout', compact('categories', 'trending', 'cartitems'));
    }

    public function placeorder(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total = 0;
        foreach($cartitems as $item){
            $total += $item->products->price;
        }

        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->postcode = $request->input('postcode');

        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');



        // to calculate the total amount
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $item)
        {
            $total += $item->products->price;
        }

        $order->total_price = $total;
        $order->postcode = $request->input('postcode');
        $order->tracking_no = 'rumples'.rand(1111,9999);
        $order->save();


        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            Orderitems::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'price'=> $item->products->price
            ]);
        }

        if(Auth::user()->address == NULL)
        {
            $user = User::where('id', Auth::id())->first();

            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->postcode = $request->input('postcode');
            $user->update();
        }

        foreach($cartitems as $item)
        {
            $removeItem = Product::where('id', $item->product_id)->get();
            // $removeItem = Product::where('user_id', Auth::id())->get();
        }
        Product::destroy($removeItem);

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);


        if($request->input('payment_mode') == "Paid by paystack")
        {
            return response()->json(['status'=> 'Order placed successfully'], 200);
        }

        return redirect('/')->with('status', 'Order placed successfully');

    }

    public function paystackcheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;

        foreach($cartitems as $item)
        {
            $total_price += $item->products->price;
        }
        $firstname = $request->input('firstname ');
        $lastname = $request->input('lastname ');
        $email = $request->input('email ');
        $phone = $request->input('phone ');
        $address = $request->input('address ');
        $address2 = $request->input('address2 ');
        $city = $request->input('city ');
        $state = $request->input('state ');
        $country = $request->input('country ');
        $postcode =   $request->input('postcode ');

        return response()->json([
            'firstname'=> $firstname,
            'lastname'=> $lastname,
            'email'=> $email,
            'phone'=> $phone,
            'address'=> $address,
            'address2'=> $address2,
            'city'=> $city,
            'state'=> $state,
            'country'=> $country,
            'postcode'=> $postcode,
            'total_price'=>  $total_price
        ]);
    }
}
