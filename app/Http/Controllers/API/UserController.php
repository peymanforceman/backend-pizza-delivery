<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        // return user history orders
        $user= $request->user();
        return OrderResource::collection(
            Order::with('order_carts')
                ->where('user_id', $user->id)
                ->orderBy('id', 'DESC')->paginate(10)
        );
    }
}
