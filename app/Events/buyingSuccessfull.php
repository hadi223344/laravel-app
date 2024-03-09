<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class buyingSuccessfull
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $carts;
    public $paymentOrder;
    public $orderAddress;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($carts,$paymentOrder,$orderAddress)
    {
        $this -> carts = $carts;
        $this -> paymentOrder= $paymentOrder;
        $this -> orderAddress = $orderAddress;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
