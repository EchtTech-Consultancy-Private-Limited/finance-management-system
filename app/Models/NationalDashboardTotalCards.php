<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NationalDashboardTotalCards extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'total_state_ut',
        'total_sentinel_site',
        'total_ppcl_labs',
        'total_regional_coordinator',
        'total_nrcp_labs',
        'total_pm_abhim_sss',
    ];
}
