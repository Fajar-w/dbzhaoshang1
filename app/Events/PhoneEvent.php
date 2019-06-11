<?php

namespace App\Events;

use App\AdminModel\Phonemanage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PhoneEvent
{
    use InteractsWithSockets, SerializesModels;
    public $phonemanage;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Phonemanage $phonemanage)
    {
        //
        $this->phonemanage=$phonemanage;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
