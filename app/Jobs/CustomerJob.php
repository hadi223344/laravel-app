<?php

namespace App\Jobs;

use App\Mail\BuyingConfirmationEmail;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $carts;
    public $totalPrice;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($carts,$totalPrice)
    {
        $this->carts = $carts;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to(User::where('id', session('user')['id'])->first()->value('email'))->send(new BuyingConfirmationEmail($this->carts,$this->totalPrice));
    }
}
