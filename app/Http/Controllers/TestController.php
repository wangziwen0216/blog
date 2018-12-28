<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function index()
    {
        Redis::set('name','Taylor');
        echo Redis::get('name');
    }

    public function subscribe($channel)
    {
        Redis::subscribe([$channel], function($message) {
           echo $message;
        });
    }

    public function unsubscribe($channel)
    {
        Redis::unsubscribe([$channel]);
    }

    public function publish($channel, $message)
    {
        $a = Redis::publish($channel, $message);
        echo $a ? 'Publish ok!' : 'No subscribe!';
    }
}
