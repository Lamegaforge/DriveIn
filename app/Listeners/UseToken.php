<?php

namespace App\Listeners;

use DateTime;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

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
     * @param  \Illuminate\Auth\Listeners\SendEmailVerificationNotification $event
     * @return void
     */
    public function handle(SendEmailVerificationNotification $event)
    {
        $token = Models\Token::where('value', $this->request->get('token'))->first();

        $this->hydrate($token, $event);
    }

    /**
     * @param  \App\Models\Token $token
     * @param  \Illuminate\Auth\Listeners\SendEmailVerificationNotification $event
     * @return void
     */
    protected function hydrate(Models\Token $token, SendEmailVerificationNotification $event)
    {
        $token->owner()->associate($event->user)->save();

        $token->fill([
            'owned_at' => (new DateTime())->format('Y-m-d H:i:s'),
        ])->save();
    }    
}
