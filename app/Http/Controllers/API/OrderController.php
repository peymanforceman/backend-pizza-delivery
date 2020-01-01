<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\OrderResource;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Fee;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        // here we handle our new order
        $data = json_decode($request->getContent(), true);
        $user = $request->user();
        // step1 (validation ) : validate if json format is the way we want !
        $rule_quiz = [
            'full_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'coupon' => 'nullable|string',
            'cart.*.id' => 'required|integer',
            'cart.*.quantity' => 'required|integer'
        ];

        $validator = Validator::make($data, $rule_quiz);
        if (!$validator->passes()) {
            return Response::json([
                'error' => 'Error: Json parameters are incorrect !'
            ], 400);
        }

        // step 2 get products
        $total_price = 0;
        $discount = 0;
        $products = Product::all();
        // right now our delivery fee works just with a fixed price but later we can check delivery fee by distance and set different delivery fees according to different addresses.
        $delivery_fee = Fee::first();
        foreach ($data['cart'] as $item) {
            $get_product = $products->where('id', $item['id'])->first();
            if ($get_product != null) {
                $total_price += ($get_product->price * $item['quantity']);
            } else {
                return Response::json([
                    'error' => 'Error: A product exists in the cart that we can not find in our database. please refresh the page and try again.'
                ], 400);
            }
        }
        // check coupon code
        if (($data['coupon']) != null) {
            $get_coupon = Coupon::where('code', $data['coupon'])->first();
            if ($get_coupon != null) {
                $discount = $get_coupon->percent;
            }
            $final_price = $total_price - ($total_price / 100 * $discount);
        } else {
            $final_price = $total_price;
        }

        if ($user != null) {
            $user_id = $user->id;
        } else {
            $user_id = null;
        }

        // step 3 register a new order if cart is not empty
        if ($total_price != 0) {
            // register order
            $new_order = Order::Create([
                'user_id' => $user_id,
                'full_name' => $data['full_name'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'coupon' => $data['coupon'],
                'discount' => $discount,
                'status' => 0,
                'delivery_fee' => $delivery_fee->price,
                'total_price' => $total_price,
                'final_price' => ($final_price + $delivery_fee->price)
            ]);

            foreach ($data['cart'] as $item) {
                $get_product = $products->where('id', $item['id'])->first();
                $new_order->order_carts()->Create([
                    'product_id' => $get_product->id,
                    'name' => $get_product->name,
                    'count' => $item['quantity'],
                    'price' => ($item['quantity'] * $get_product->price),
                ]);
            }
            return new OrderResource($new_order);

        } else {
            return Response::json([
                'error' => 'Error: Cart is empty or total price equals 0. please add more items to your cart and try again.'
            ], 400);
        }

    }

    public function get_order($id)
    {
        return new OrderResource(Order::where('id', $id)->with('order_carts')->first());
    }
}
