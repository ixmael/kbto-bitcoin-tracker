<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Ixudra\Curl\Facades\Curl;
use App\Models\BitcoinTracker;

class BitcoinTrackerUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitcoin:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Bitcoin Tracker.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = Curl::to(config('constants.bitso_api'))
            ->asJson(true)
            ->get();

        if(array_key_exists('success', $response) && $response['success'])
        {
            BitcoinTracker::create([
                'high' => $response['payload']['high'],
                'last' => $response['payload']['last'],
                'remote_created_at' => $response['payload']['created_at'],
                'volume' => $response['payload']['volume'],
                'vwap' => $response['payload']['vwap'],
                'low' => $response['payload']['low'],
                'ask' => $response['payload']['ask'],
                'bid' => $response['payload']['bid'],
            ]);
        }
    }
}
