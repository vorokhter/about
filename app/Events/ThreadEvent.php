<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;


class ThreadEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $new_message;
    public $afterCommit = true;

    public function __construct($new_message)
    {
        $this->new_message = $new_message;
    }

    public function broadcastOn()
    {
        return ['thread-channel'];
    }

    public function broadcastAs()
    {
        return 'new-message';
    }
}
