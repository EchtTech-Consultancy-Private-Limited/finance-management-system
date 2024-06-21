<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NationalSeoExpanse extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
       'user_id',
       'state_id',
       'city_id',
       'program_id',
       'expanse_plan',
       'institute_name',
       'finance_account_officer',
       'finance_account_officer_mobile',
       'finance_account_officer_email',
       'nadal_officer',
       'nadal_officer_mobile',
       'nadal_officer_email',
       'month',
       'financial_year',
       'reason',
       'status',
    ];

    /**
     * @states
     *
     * @return void
     */
    public function states()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
     * @cities
     *
     * @return void
     */
    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    
    /**
     *  @instituteProgram
     *
     * @return void
     */
    public function instituteProgram()
    {
        return $this->belongsTo(InstituteProgram::class, 'program_id');
    }

    /**
     * @SoeUcFormCalculation
     *
     * @return void
     */
    public function SoeUcFormCalculation()
    {
        return $this->hasMany(NationalSeoExpanseCalculation::class, 'national_seo_expanse_id');
    }
}
