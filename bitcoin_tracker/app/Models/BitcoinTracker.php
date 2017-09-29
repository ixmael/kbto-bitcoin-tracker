<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BitcoinTracker extends Model
{
    protected $table = 'bitcoin_tracker';

    protected $fillable = ['high', 'last', 'remote_created_at', 'low', 'ask',
        'bid', 'volume', 'vwap'];
}
