<?php

namespace App\Events;

use App\Models\Priority;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PriorityDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $priority;

    public function __construct(Priority $priority)
    {
        $this->priority = $priority;
    }
}
