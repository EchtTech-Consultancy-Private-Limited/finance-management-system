<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalSeoExpanseCalculation extends Model
{
    use HasFactory;
    protected $fillable = [
        'national_seo_expanse_id',
        'head',
        'sanction_order',
        'unspent_balance_1st',
        'gia_received',
        'total_balance',
        'actual_expenditure',
        'unspent_balance_last',
        'committed_liabilities',
        'unspent_balance_31st',
     ];
}
