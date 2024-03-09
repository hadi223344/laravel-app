<?php

namespace App\Listeners;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class UpdateProductsAfterBuying
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $carts = $event ->carts;
        foreach ($carts as $cart) {
            Product::where(['id'=> $cart->product_id])->decrement('source_count', $cart->count);
            Cart::where('id',$cart->id)->delete();
        }
    }
}
