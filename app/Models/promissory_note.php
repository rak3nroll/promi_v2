<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promissory_note extends Model
{

    protected $connection = 'mysql_second';
   
    protected $fillable = [
        'account_no',
        'account_code',
        'promi_name',
        'billmonth',
        'promi_date',
        'trandate',
        'consumer_address',
        'total_balance',
        'is_posted',
        'promi_id',
    ];

    
    protected $table = 'promissory_note';

    public $timestamps = false;
}
