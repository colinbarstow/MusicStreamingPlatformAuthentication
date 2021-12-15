<?php

namespace App\Events;

use App\Contracts\MustSetPassword;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PasswordSet
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The verified user.
     *
     * @var MustSetPassword
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  MustSetPassword  $user
     * @return void
     */
    public function __construct(MustSetPassword $user)
    {
        $this->user = $user;
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
