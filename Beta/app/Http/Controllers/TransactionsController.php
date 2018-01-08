<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;
use App\Http\Requests;
use Carbon\Carbon;

class TransactionsController extends Controller
{
    public static function saveTransaction($transactionType, $from_id, $to_id, $amount, $description)
    {
        $transaction = new Transactions();
        
        $transaction->from_id = $from_id;
        $transaction->to_id = $to_id;
        $transaction->amount = $amount;
        $transaction->description = $description;
        $transaction->transaction_type = $transactionType;
        $transaction->created_at = Carbon::now('Europe/Amsterdam');
        $transaction->updated_at = Carbon::now('Europe/Amsterdam');
        
        $transaction->save();
    }
}
