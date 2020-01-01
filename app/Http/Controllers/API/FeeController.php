<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeliveryResource;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{

    public function __invoke(Request $request)
    {
        return DeliveryResource::collection(Fee::all());
    }
}
