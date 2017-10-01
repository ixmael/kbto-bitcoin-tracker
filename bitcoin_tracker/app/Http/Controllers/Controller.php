<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\BitcoinTracker;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showIndex()
    {
        $last_update_tracker = BitcoinTracker::orderBy('created_at', 'desc')->first();

        return view('index', [
            'last_update_tracker' => $last_update_tracker,
        ]);
    }

    public function showData(Request $request)
    {
        $last_row = $request->input('last_row');

        $conditions = [['created_at', '>=', date('Y-m-d')]];

        if($last_row)
        {
            $conditions[] = ['id', '>', $last_row];
        }

        $bitcoin_tracker = BitcoinTracker::where($conditions)->get();

        return view('data', [
            'bitcoin_tracker' => $bitcoin_tracker,
        ]);
    }
}
