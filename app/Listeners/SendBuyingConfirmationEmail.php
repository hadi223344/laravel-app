<?php

namespace App\Listeners;

use App\Jobs\CustomerJob;
use App\Mail\BuyingConfirmationEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendBuyingConfirmationEmail
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
        $carts = $event->carts;
        $totalPrice = 0;
        foreach($carts as $cart){
            $totalPrice += $cart['count'] * $cart['price'] +10;
        }
        dispatch(new CustomerJob($carts,$totalPrice))->delay(now()->addminutes(1));
        // Mail::to(User::where('id', session('user')['id'])->first()->value('email'))->send(new BuyingConfirmationEmail($carts,$totalPrice));
    }
}
