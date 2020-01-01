<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'coupon' => $this->coupon,
            'discount' => $this->discount,
            'delivery_fee' => $this->delivery_fee,
            'status' => $this->status,
            'total_price' => $this->total_price,
            'final_price' => $this->final_price,
            'cart' => CartResource::collection($this->whenLoaded('order_carts')),
        ];
    }
}
