<?php

namespace App\Listeners;

use App\Models\Shop;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCompanyIdToSession
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
        session()->put('company_id', $event->user->company_id);
//        session()->put('shop_id', $event->user->company_id ? Shop::where('company_id', $event->user->company_id)->first()->id : null);
    }
}
