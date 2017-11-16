<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class FriendsCounterJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * @param array $user
     * @return mixed
     */
    public static function handle($user)
    {
        return DB::table('friends')->
        where([
            ['requested_user_id', $user->id],
            ['accepted', 1],
            ['active', 1]
        ])->orWhere([
            ['received_user_id', $user->id],
            ['accepted', 1],
            ['active', 1]
        ])->count();
    }
}
