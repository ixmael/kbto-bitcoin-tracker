<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Defined Variables
    |--------------------------------------------------------------------------
    |
    | This is a set of variables that are made specific to this application
    | that are better placed here rather than in .env file.
    | Use config('your_key') to get the values.
    |
    */

    'bitso_api' => env('BITSO_API', null),
    'tracker_time_fetch' => env('TRACKER_TIME_FETCH', 5000),
];
