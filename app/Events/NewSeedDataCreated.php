<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Setting;
use App\Models\HelpFunc;
use App\Models\Component;

class NewSeedDataCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $model;
    public $data;


    /**
     * Create a new event instance.
     */
    public function __construct($model, $data)
    {
        $this->model = $model;
        $this->data = $data;
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
