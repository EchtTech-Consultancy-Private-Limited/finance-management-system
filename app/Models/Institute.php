<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institute extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
       'program_id',
       'name',
    ];
    
    /**
     * program
     *
     * @return void
     */
    public function program()
    {
        return $this->belongsTo(InstituteProgram::class, 'program_id');
    }
}
