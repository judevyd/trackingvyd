<?php

namespace App\Listeners;

use App\Events\MyEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Joforder
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
     * @param  MyEvents  $event
     * @return void
     */
    public function handle(MyEvents $event)
    {
        return $event;
    }
}
