<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'number', 'amount', 'transactionID', 'conversationID', 'status', 'currence', 'description', 'payment_method_id',
    ];
}
