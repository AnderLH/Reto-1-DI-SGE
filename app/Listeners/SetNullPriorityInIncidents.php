<?php

namespace App\Listeners;

use App\Events\PriorityDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetNullPriorityInIncidents implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(PriorityDeleted $event)
    {
        $priority = $event->priority;
        $priority->incidents()->update(['priority_id' => null]);
    }
}
