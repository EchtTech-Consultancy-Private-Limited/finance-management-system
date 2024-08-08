<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SOEUCUploadForm extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'qtr_uc',
        'program_id',
        'institute_id',
        'financial_year',
        'month',
        'file',
        'file_size',
        'date',
    ];
    
    /**
     * users
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * program
     *
     * @return void
     */
    public function program()
    {
        return $this->belongsTo(InstituteProgram::class, 'program_id');
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class, 'institute_id');
    }
}
