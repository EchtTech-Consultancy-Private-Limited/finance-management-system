<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SOEUCFormCalculatin extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'soe_form_id',
        'head',
        'sanction_order',
        'previous_month_expenditure',
        'previous_month_total',
        'unspent_balance_1st',
        'gia_received',
        'total_balance',
        'actual_expenditure',
        'unspent_balance_last',
        'committed_liabilities',
        'unspent_balance_31st',
     ];
}
