<?php

namespace App\Listeners;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateOrdersAfterBuying
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
        $paymentOrder = $event->paymentOrder;
        $orderAddress = $event->orderAddress;
        $carts = $event->carts;
        foreach ($carts as $cart) {
            $product_id = $cart->value('product_id');
            $order = new Order();
            $order->product_id = $product_id;
            $order->user_id = session('user')['id'];
            $order->status = 'pending';
            $order->payment_status = 'pending';
            $order->address = $orderAddress;
            $order->payment_method = $paymentOrder;
            $order->count = $cart->count;
            $order->save();
        }

        // $order = new Order();
        // $order-> product_id = $product_id;
        // $order-> user_id = session('user')['id'];
        // $order-> address = $orderAddress;
        // $order-> payment_method = $paymentOrder;
        // $order-> count = $carts->sum('count');
        // $order->save();
    }
}
