<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;

class WriteMessageToFile
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
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        //
        $message = $event->user->name. ' just registered in to the application.';
        Storage::put('loginactivity.txt', $message);
        $data1 = [
           'email' => $event->user->email,
           'password' => 657575987,
       ];
        $email = $event->user->email;
       //echo $data1['email'];
      \Mail::send(['text'=>'mail'], $data1, function($message) use ($email) {
        $message->to($email, 'fumes')->subject('test email');
        $message->from('vikashverma003@gmail.com', 'check');

      });

    }
}
