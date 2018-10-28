<?php

namespace App\Listeners;

use DateTime;
use App\Models;
use Illuminate\Auth\Events;
use Illuminate\Http\Request;

class UseToken
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered $event
     * @return void
     */
    public function handle(Events\Registered $event)
    {
        $token = Models\Token::where('value', $this->request->get('token'))->first();

        $this->hydrate($token, $event);
    }

    /**
     * @param  \App\Models\Token $token
     * @param  \Illuminate\Auth\Events\Registered $event
     * @return void
     */
    protected function hydrate(Models\Token $token, Events\Registered $event)
    {
        $token->owner()->associate($event->user)->save();

        $token->fill([
            'owned_at' => (new DateTime())->format('Y-m-d H:i:s'),
        ])->save();
    }    
}
