<?php

namespace App\Listeners\Backend\User;

use App\Events\Backend\User\UserProfileUpdated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserProfileUpdatedUserUpdate implements ShouldQueue
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
     * @param UserProfileUpdated $event
     *
     * @return void
     */
    public function handle(UserProfileUpdated $event)
    {
        $user_profile = $event->user_profile;

        $user = User::where('id', '=', $user_profile->user_id)->first();
        $user->name = $user_profile->name;
        $user->email = $user_profile->email;
        $user->mobile = $user_profile->mobile;
        $user->gender = $user_profile->gender;
        $user->date_of_birth = $user_profile->date_of_birth;
        $user->gender = $user_profile->gender;
        $user->save();
    }
}
