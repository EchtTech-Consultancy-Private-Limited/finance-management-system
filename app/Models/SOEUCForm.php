<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SOEUCForm extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
       'program_name',
       'state',
       'institute_name',
       'finance_account_officer',
       'finance_account_officer_mobile',
       'finance_account_officer_email',
       'nadal_officer',
       'nadal_officer_mobile',
       'nadal_officer_email',
       'month',
       'financial_year',
    ];

    /**
     * @states
     *
     * @return void
     */
    public function states()
    {
        return $this->belongsTo(State::class, 'state');
    }

    /**
     * @SoeUcFormCalculation
     *
     * @return void
     */
    public function SoeUcFormCalculation()
    {
        return $this->hasMany(SOEUCFormCalculatin::class, 'soe_form_id');
    }
}
